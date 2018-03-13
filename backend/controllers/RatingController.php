<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;

use common\models\Rating;
use common\models\RatingGroup;
use common\models\RatingItem;
use common\models\Share;
use common\models\Candidate;
use common\models\Region;
use common\models\search\RatingSearch;

class RatingController extends CController
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
    // public function actionCreate()
    // {
    //     $model = new Rating();
    //     $share = new Share();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         $share->load(Yii::$app->request->post());
    //         $share->uri = '/rating';
    //         $share->save();

    //         return $this->redirect(['index']);
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

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

    public function actionMultipleInput($group_id = null, $region_id = null) {
        $candidates = Candidate::find()->all();
        $additionalIds = RatingItem::getAdditionalArray();

        if($group_id !== null) {
            $relatedModel = RatingGroup::findOne($group_id);
        } elseif($region_id !== null) {
            $relatedModel = Region::findOne($region_id);
        } else {
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
                if($group_id !== null) {
                    $item->rating_group_id = $group_id;
                } elseif ($region_id !== null) {
                    $item->region_id = $region_id;
                }
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
                $query = RatingItem::find()->where(['candidate_id' => $candidate->id]);
                if($group_id !== null) {
                    $query->where(['rating_group_id' => $group_id]);
                } elseif($region_id !== null) {
                    $query->where(['region_id' => $region_id]);
                }
                $item = $query->one();

                if($item === null) {
                    $item = new RatingItem;
                    $item->candidate_id = $candidate->id;
                }

                $models[$key] = $item;
                $key++;
            }
            foreach ($additionalIds as $additional_id => $title) {
                $query = RatingItem::find()->where(['additional_id' => $additional_id]);
                if($group_id !== null) {
                    $query->where(['rating_group_id' => $group_id]);
                } elseif($region_id !== null) {
                    $query->where(['region_id' => $region_id]);
                }
                $item = $query->one();
                
                if($item === null) {
                    $item = new RatingItem;
                    $item->additional_id = $additional_id;
                }
                $models[$key] = $item;
                $key++;
            }
        }

        return $this->render('multiple-input', [
            'models' => $models,
            'relatedModel' => $relatedModel,
            'candidates' => $candidates,
            'additionalIds' => $additionalIds,
        ]);
    }

    /**
     * Deletes an existing Rating model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

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
