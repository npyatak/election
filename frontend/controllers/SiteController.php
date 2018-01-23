<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;

use common\models\Candidate;
use common\models\Question;
use common\models\Card;
use common\models\Calendar;
use common\models\TestText;
use common\models\Rating;
use common\models\RatingItem;
use common\models\News;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    public function actionIndex() {
        $timeNow = time();
        $calendar = Calendar::find()->orderBy('date ASC')->limit(2)->where(['>', 'date', time()])->orderBy('date') ->all();
        $candidates = Candidate::find()->orderBy('surname')->indexBy('id')->all();
        $cards = Card::find()->where(['show_on_main' => 1])->limit(6)->all();
        $testText = TestText::find()->orderBy(new \yii\db\Expression('rand()'))->one();
        
        $rating = Rating::find()->orderBy('id DESC')->one();
        $ratingResults = RatingItem::find()->where(['rating_group_id' => 1])->orderBy('score DESC')->limit(7)->asArray()->all();

        $news = News::find()->orderBy('date DESC')->limit(3)->all();
        
        return $this->render('index', [
            'calendar' => $calendar,
            'candidates' => $candidates,
            'cards' => $cards,
            'testText' => $testText,
            'rating' => $rating,
            'ratingResults' => $ratingResults,
            'news' => $news,
        ]);
    }

    public function actionPage($alias) {
        $page = $this->findPage($alias);
        $categories = Category::find()->all();
        $categoryPages = Page::find()->where(['category_id' => $page->category_id])->all();

        return $this->render('page', [
            'page' => $page,
            'categories' => $categories,
            'categoryPages' => $categoryPages,
        ]);
    }

    public function actionCandidate($id) {
        $candidate = Candidate::findOne($id);
        if($candidate === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $candidates = Candidate::find()->where(['not', ['id' => $id]])->orderBy('surname')->all();

        $rating = Rating::find()->orderBy('id DESC')->one();

        $ratingResults = RatingItem::find()->select(['score', 'candidate_id'])->where(['not', ['candidate_id' => null]])->groupBy('candidate_id')->orderBy('score DESC')->indexBy('candidate_id')->asArray()->all();
        $candidatePlace = array_search($id, array_keys($ratingResults)) + 1;

        return $this->render('candidate', [
            'candidate' => $candidate,
            'candidates' => $candidates,
            'rating' => $rating,
            'ratingResults' => $ratingResults,
            'candidatePlace' => $candidatePlace,
        ]);
    }

    public function actionCandidates() {
        $candidates = Candidate::find()->orderBy('surname')->all();

        return $this->render('candidates', [
            'candidates' => $candidates,
        ]);
    }

    public function actionCards($id = null) {
        $cards = Card::find()->all();
        $candidates = Candidate::find()->orderBy('name')->all();

        return $this->render('cards', [
            'cards' => $cards,
            'candidates' => $candidates,
            'id' => $id,
        ]);
    }

    public function actionCalendar($id = null) {
        $items = Calendar::find()->orderBy('date ASC')/*->where(['>', 'date', time()])*/->orderBy('date') ->all();

        return $this->render('calendar', [
            'items' => $items,
            'id' => $id,
        ]);
    }

    public function actionTest() {
        $questions = Question::find()->with('answers')->all();

        return $this->render('test', [
            'questions' => $questions,
        ]);
    }

    protected function findPage($alias) {
        $model = Page::find()->where(['alias' => $alias])->one();
        if ($model === null || $model->status === Page::STATUS_INACTIVE) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $model;
    }
}