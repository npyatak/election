<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\helpers\Url;

use common\models\Candidate;
use common\models\Question;
use common\models\Card;
use common\models\Calendar;
use common\models\TestText;
use common\models\Rating;
use common\models\RatingItem;
use common\models\RatingGroup;
use common\models\News;
use common\models\Share;
use common\models\TestResult;

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

    public function beforeAction($action) {
        $share = Share::find()->where(['uri' => $_SERVER['REQUEST_URI']])->asArray()->one();
        if($share === null) {
            $share = Share::find()->where(['uri' => '/'.$action->controller->action->id])->asArray()->one();
        }
        if($share === null) {
            $share = Yii::$app->params['defaultShare'];
        }
        $share['url'] = Url::current([], true);
        $share['image'] = Url::to([$share['image']], true);

        $view = $this->getView();
        $view->params['share'] = $share;

        return parent::beforeAction($action);
    }
    
    public function actionIndex() {
        $timeNow = time();
        $calendar = Calendar::find()->orderBy('date ASC')->limit(2)->where(['>', 'date', time()])->orderBy('date') ->all();
        $candidates = Candidate::find()->orderBy('surname')->indexBy('id')->all();
        $cards = Card::find()->where(['show_on_main' => 1])->limit(6)->all();
        $testText = TestText::find()->orderBy(new \yii\db\Expression('rand()'))->one();
        
        $rating = Rating::find()->orderBy('id DESC')->one();
        $ratingResults = RatingItem::find()->where(['rating_group_id' => 1])->andWhere(['not', ['candidate_id' => null]])->orderBy('score DESC')->limit(7)->asArray()->all();

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

    public function actionCandidate($alias = null) {
        if(!$alias) {
            $candidates = Candidate::find()->orderBy('surname')->all();

            return $this->render('candidates', [
                'candidates' => $candidates,
            ]);
        }

        $candidate = Candidate::find()->where(['alias' => $alias])->one();
        if($candidate === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $candidates = Candidate::find()->where(['not', ['id' => $candidate->id]])->orderBy('surname')->all();

        $rating = Rating::find()->orderBy('id DESC')->one();

        $ratingResults = RatingItem::find()->select(['score', 'candidate_id'])->where(['not', ['candidate_id' => null]])->groupBy('candidate_id')->orderBy('score DESC')->indexBy('candidate_id')->asArray()->all();
        $candidatePlace = array_search($candidate->id, array_keys($ratingResults)) + 1;

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

    public function actionFaq($id = null) {
        $cards = Card::find()->all();
        $candidates = Candidate::find()->orderBy('name')->all();

        return $this->render('faq', [
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
        $testResults = TestResult::find()->all();

        return $this->render('test', [
            'questions' => $questions,
            'testResults' => $testResults,
        ]);
    }

    public function actionRating($group = 1) {
        $rating = Rating::find()->orderBy('id DESC')->one();
        $candidates = Candidate::find()->orderBy('surname')->all();
        $ratingGroups = [];
        foreach (RatingGroup::find()->where(['not', ['sub_category' => null]])->asArray()->all() as $g) {
            $ratingGroups[$g['sub_category']][] = $g;
        }
        //print_r($ratingGroups);exit;
        $results = [];
        foreach (RatingItem::find()->where(['rating_id' => $rating->id])->asArray()->all() as $r) {
            if($r['candidate_id']) {
                $results[$r['rating_group_id']]['c'][$r['candidate_id']] = $r['score'];
            } else {
                $results[$r['rating_group_id']]['a'][$r['additional_id']] = $r['score'];
            }
        }
        //print_r($ratingResults[1]);exit;

        return $this->render('rating', [
            'group' => $group,
            'rating' => $rating,
            'ratingGroups' => $ratingGroups,
            'candidates' => $candidates,
            'results' => $results,
        ]);
    }
}