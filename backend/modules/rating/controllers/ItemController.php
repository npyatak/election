<?php

namespace backend\modules\rating\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;

use common\models\Candidate;
use common\models\Rating;
use common\models\RatingItem;
use common\models\RatingGroup;
use common\models\search\RatingItemSearch;

class ItemController extends \backend\controllers\CController
{
    /**
     * Lists all RatingItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RatingItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new RatingItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($rating_id = null, $group_id = null)
    {
        $model = new RatingItem();

        if ($model->load(Yii::$app->request->post())) {
            if($rating_id) {
                $model->rating_id = $rating_id;
                $model->rating_group_id = $group_id;
            }
            if($model->save()) 
                return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'rating_id' => $rating_id,
                'group_id' => $group_id,
            ]);
        }
    }

    public function actionMultipleInput($rating_id, $group_id) {
        $models = RatingItem::find()->where(['rating_id' => $rating_id, 'rating_group_id' => $group_id])->all();
        $candidates = Candidate::find()->all();
        $additionalIds = RatingItem::getAdditionalArray();

        $rating = Rating::findOne($rating_id);
        $group = RatingGroup::findOne($group_id);
        if($rating === null || $group === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $post = Yii::$app->request->post();
        if(!empty($post) && !empty($post['RatingItem'])) {
            $transaction = Yii::$app->db->beginTransaction();
            $models = [];
            foreach ($post['RatingItem'] as $key => $postItem) {
                if(isset($postItem['id'])) {
                    $item = RatingItem::findOne($postItem['id']);
                } else {
                    $item = new RatingItem;
                }
                $item->attributes = $postItem;
                $item->rating_id = $rating_id;
                $item->rating_group_id = $group_id;
                $models[] = $item;
            }

            $validationArr = ActiveForm::validateMultiple($models);
           
            if(empty($validationArr)) {
                try  {
                    $success = true;
                    foreach ($models as $key => $m) {
                        if($success) {
                            $success = $m->save();
                        }
                    }

                    if($success) {
                        $transaction->commit();

                        Yii::$app->session->setFlash("success", 'Данные успешно обновлены');

                        return $this->redirect(Yii::$app->request->referrer);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        if(empty($models)) {
            $key = 0;
            foreach ($candidates as $candidate) {
                $item = new RatingItem;
                $item->candidate_id = $candidate->id;
                $models[$key] = $item;
                $key++;
            }
            foreach ($additionalIds as $additional_id => $title) {
                $item = new RatingItem;
                $item->additional_id = $additional_id;
                $models[$key] = $item;
                $key++;
            }
        }

        return $this->render('multiple-input', [
            'models' => $models ? $models : [new RatingItem],
            'rating' => $rating,
            'group' => $group,
            'candidates' => $candidates,
            'additionalIds' => $additionalIds,
        ]);
    }

    /**
     * Updates an existing RatingItem model.
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
     * Deletes an existing RatingItem model.
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
     * Finds the RatingItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RatingItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RatingItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
