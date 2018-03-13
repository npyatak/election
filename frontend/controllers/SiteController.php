<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Response;

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
use common\models\Region;
use common\models\Settings;

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
        if(Yii::$app->controller->action->id == 'candidate') {
            return parent::beforeAction($action);
        }

        $share = Share::find()->where(['uri' => $_SERVER['REQUEST_URI']])->asArray()->one();
        if($share === null) {
            $share = Share::find()->where(['uri' => '/'.$action->controller->action->id])->asArray()->one();
        }
        if($share === null) {
            $share = Yii::$app->params['defaultShare'];
        }

        $view = $this->getView();
        $view->params['share'] = $share;

        return parent::beforeAction($action);
    }
    
    public function actionIndex() {
        $mainPageType = Yii::$app->settings->get('mainPage');

        if($mainPageType == Settings::INDEX_ORIGINAL) {
            $calendar = Calendar::find()->orderBy('date ASC')->limit(2)->where(['>', 'date', time()])->orderBy('date') ->all();
            $candidates = Candidate::find()->orderBy('surname')->indexBy('id')->all();
            $cards = Card::find()->where(['show_on_main' => 1])->limit(6)->orderBy(new \yii\db\Expression('rand()'))->all();
            $testText = TestText::find()->orderBy(new \yii\db\Expression('rand()'))->one();
            
            $rating = Rating::findOne(1);
            $ratingResults = RatingItem::find()
                ->joinWith('candidate')
                ->where(['rating_group_id' => 1])
                ->andWhere(['not', ['candidate_id' => null]])
                ->andWhere(['not', ['candidate.active' => Candidate::QUIT]])
                ->orderBy('no_poll, score DESC')
                ->limit(8)->asArray()->all();

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
        } elseif($mainPageType == Settings::INDEX_FIRST_HOURS) {
            $cards = Card::find()->where(['show_on_main' => 1])->limit(6)->orderBy(new \yii\db\Expression('rand()'))->all();

            return $this->render('index_first_hours', [
                'cards' => $cards,
            ]);
        
        } elseif($mainPageType == Settings::INDEX_VOTER_PARTICIPATION) {
            $cards = Card::find()->where(['show_on_main' => 1])->limit(6)->orderBy(new \yii\db\Expression('rand()'))->all();

            $candidates = Candidate::find()->orderBy('surname')->all();
            $news = News::find()->orderBy('date DESC')->limit(3)->all();

            $regionStatusArr = Region::find()->select(['status'])->indexBy('id')->column();
            
            return $this->render('index_voter_participation', [
                'cards' => $cards,
                'candidates' => $candidates,
                'news' => $news,
                'regionStatusArr' => $regionStatusArr,
            ]);
        } elseif($mainPageType == Settings::INDEX_FIRST_RESULTS) {
            $cards = Card::find()->where(['show_on_main' => 1])->limit(6)->orderBy(new \yii\db\Expression('rand()'))->all();
            $news = News::find()->orderBy('date DESC')->limit(5)->all();
            $candidateResults = RatingItem::find()->where(['rating_group_id' => 21])->andWhere(['not', ['candidate_id' => null]])->orderBy('score DESC')->asArray()->all();
            $candidates = Candidate::find()->orderBy('surname')->indexBy('id')->all();
            $regions = Region::find()->indexBy('id')->asArray()->all();
            
            $regionResults = RatingItem::find()->select(['candidate_id', 'region_id', 'score'])->where(['not', ['region_id' => null]])->andWhere(['not', ['candidate_id' => null]])->asArray()->all();
            $regionResultsArr = [];
            foreach ($regionResults as $rr) {
                $regionResultsArr[$rr['region_id']][$rr['candidate_id']] = $rr['score'];
            }
            
            return $this->render('index_first_results', [
                'candidates' => $candidates,
                'cards' => $cards,
                'news' => $news,
                'candidateResults' => $candidateResults,
                'regions' => $regions,
                'regionResultsArr' => $regionResultsArr,
            ]);
        } elseif($mainPageType == Settings::INDEX_FINAL_RESULTS) {
            // $regions = Region::find()->indexBy('id')->asArray()->all();
            
            // $regionResults = RatingItem::find()->select(['candidate_id', 'region_id', 'score'])->where(['not', ['region_id' => null]])->andWhere(['not', ['candidate_id' => null]])->asArray()->all();
            // $regionResultsArr = [];
            // foreach ($regionResults as $rr) {
            //     $regionResultsArr[$rr['region_id']][$rr['candidate_id']] = $rr['score'];
            // }

            return $this->render('index_final_results', [

            ]);
        }
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

        $rating = Rating::findOne(1);

        $ratingResults = RatingItem::find()
            ->select(['score', 'candidate_id', 'no_poll'])
            ->joinWith('candidate')
            ->where(['not', ['candidate_id' => null]])
            ->andWhere(['not', ['candidate.active' => Candidate::QUIT]])
            ->groupBy('candidate_id')
            ->orderBy('no_poll, score DESC')
            ->indexBy('candidate_id')
            ->asArray()->all();
        $candidatePlace = array_search($candidate->id, array_keys($ratingResults)) + 1;
        if(!isset($ratingResults[$candidate->id]) || $ratingResults[$candidate->id]['no_poll']) {
            $candidatePlace = false;
        }

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
        if (Yii::$app->request->isAjax && isset($_GET['url'])) {
            $share = Share::find()->where(['uri' => $_GET['url']])->asArray()->one();
            $share['uri'] = Url::to($_GET['url'], $_SERVER['REQUEST_SCHEME']);
            $share['image'] = $share['image'] ? Url::to($share['image'], $_SERVER['REQUEST_SCHEME']) : '';
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $share;
        }

        $cards = Card::find()->all();
        $candidates = Candidate::find()->orderBy('name')->all();

        return $this->render('faq', [
            'cards' => $cards,
            'candidates' => $candidates,
            'id' => $id,
        ]);
    }

    public function actionCalendar($id = null) {
        $items = Calendar::find()->orderBy('date ASC')->orderBy('date')->all();
        $closest = Calendar::find()->select(['*', "ABS(date - ".time().") as closestDate"])->orderBy('closestDate')->one();

        return $this->render('calendar', [
            'items' => $items,
            'id' => $id,
            'closestId' => $closest->id,
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
        $ratings = Rating::find()->all();
        $candidates = Candidate::find()->orderBy('surname')->where(['not', ['active' => Candidate::QUIT]])->all();
        $ratingGroups = [];
        $ratingGroupIds = [];
        foreach (RatingGroup::find()->where(['not', ['sub_category' => null]])->asArray()->all() as $g) {
            $ratingGroups[$g['sub_category']][] = $g;
            $ratingGroupIds[] = $g['id'];
        }
        
        $resultsArray = [];
        $ratingItems = RatingItem::find()->where(['not', ['rating_group_id' => null]])->orderBy('score DESC')->asArray()->all();
        foreach ($ratingItems as $r) {
            $score = $r['no_poll'] ? false : $r['score'];
            if($r['candidate_id']) {
                $resultsArray[$r['rating_group_id']]['c'][$r['candidate_id']] = $score;
            } else {
                $resultsArray[$r['rating_group_id']]['a'][$r['additional_id']] = $score;
            }
        }

        return $this->render('rating', [
            'group' => $group,
            'ratings' => $ratings,
            'ratingGroups' => $ratingGroups,
            'candidates' => $candidates,
            'resultsArray' => $resultsArray,
            'ratingGroupIds' => $ratingGroupIds,
        ]);
    }
}