<?php

namespace backend\modules\rating\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

use common\models\Rating;
use common\models\RatingGroup;
use common\models\search\RatingSearch;
use common\models\Share;

/**
 * Default controller for the `rating` module
 */
class DefaultController extends \backend\controllers\CController
{
    /**
     * Lists all Rating models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RatingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $groups = RatingGroup::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'groups' => $groups,
        ]);
    }

    /**
     * Creates a new Rating model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rating();
        $share = new Share();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $share->load(Yii::$app->request->post());
            $share->url = $model->url;
            $share->save();

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Rating model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rating model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rating model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rating the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rating::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
