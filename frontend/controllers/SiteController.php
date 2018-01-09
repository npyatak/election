<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;

use common\models\Category;
use common\models\Page;
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
        //$pages = Page::find()->where(['status' => Page::STATUS_ACTIVE])->all();
        $categories = Category::find()->all();
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

    public function actionPreview($alias) {
        $page = $this->findPage($alias);
        $categories = Category::find()->all();
        $categoryPages = Page::find()->where(['category_id' => $page->category_id])->all();
        
        return $this->render('preview', [
            'page' => $page,
            'categories' => $categories,
            'categoryPages' => $categoryPages,
        ]);
    }

    public function actionCategory($alias) {
        // $category = Category::find()->where(['alias' => $alias])->one();
        // $categories = Category::find()->all();
        // if ($category === null) {
        //     throw new NotFoundHttpException('The requested page does not exist.');
        // }

        // return $this->render('category', [
        //     'category' => $category,
        //     'categories' => $categories,
        // ]);
        $category = Category::find()->where(['alias' => $alias])->one();
        $page = Page::find()->where(['category_id' => $category->id])->orderBy('id ASC')->one();
        $categories = Category::find()->all();
        $categoryPages = Page::find()->where(['category_id' => $page->category_id])->all();
        
        return $this->render('preview', [
            'page' => $page,
            'categories' => $categories,
            'categoryPages' => $categoryPages,
        ]);
    }

    public function actionInfographic() {
        $category = Category::find()->one();
        $categories = Category::find()->all();
        $page = Page::find()->where(['alias' => 'infographic'])->one();

        return $this->render('infographic', [
            'category' => $category,
            'categories' => $categories,
            'page' => $page,
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