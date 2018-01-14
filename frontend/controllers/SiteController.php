<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;

use common\models\Candidate;
use common\models\Question;

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
        return $this->render('index', [
            'categories' => $categories
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

        $candidates = Candidate::find()->orderBy('name')->all();

        return $this->render('candidate', [
            'candidate' => $candidate,
            'candidates' => $candidates,
        ]);
    }

    public function actionTest() {
        $page = $this->findPage('test');
        $questions = Question::find()->with('answers')->all();
        $categories = Category::find()->all();
        $categoryPages = Page::find()->where(['category_id' => $page->category_id])->all();

        return $this->render('test', [
            'page' => $page,
            'questions' => $questions,
            'categories' => $categories,
            'categoryPages' => $categoryPages,
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