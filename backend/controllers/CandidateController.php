<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use common\models\Candidate;
use common\models\items\Quotation;
use common\models\items\Perk;
use common\models\items\Thesis;
use common\models\search\CandidateSearch;

/**
 * CandidateController implements the CRUD actions for Candidate model.
 */
class CandidateController extends CController
{
    public function actionIndex()
    {
        $searchModel = new CandidateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Candidate();
        $quotationModels = [];
        $perkModels = [];
        $thesisModels = [];

        $post = Yii::$app->request->post();

        if ($model->load($post)) {
            $transaction = Yii::$app->db->beginTransaction();

            $quotationModels = $this->loadItemModels($post, 'Quotation')['models'];
            $perkModels = $this->loadItemModels($post, 'Perk')['models'];
            $thesisModels = $this->loadItemModels($post, 'Thesis')['models'];

            $validationArr = ArrayHelper::merge(
                ActiveForm::validateMultiple($quotationModels),
                ActiveForm::validateMultiple($perkModels),
                ActiveForm::validateMultiple($thesisModels),
                ActiveForm::validate($model)
            );

            if(empty($validationArr)) {
                try  {
                    $success = $model->save();
                    foreach (array_merge($quotationModels, $perkModels, $thesisModels) as $key => $itemModel) {
                        if($success) {
                            $itemModel->candidate_id = $model->id;
                            $success = $itemModel->save();
                        }
                    }

                    if($success) {
                        $transaction->commit();

                        Yii::$app->session->setFlash("success", 'Данные успешно обновлены');

                        return $this->redirect(['update', 'id' => $model->id]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } 

        return $this->render('create', [
            'model' => $model,
            'quotationModels' => $quotationModels,
            'perkModels' => $perkModels,
            'thesisModels' => $thesisModels,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $quotationModels = $model->quotations;
        $perkModels = $model->perks;
        $thesisModels = $model->theses;

        $post = Yii::$app->request->post();

        if ($model->load($post)) {
            $quotationModelIDsOld = Quotation::find()->select('id')->where(['candidate_id' => $model->id])->column();
            $perkModelIDsOld = Perk::find()->select('id')->where(['candidate_id' => $model->id])->column();
            $thesisModelIDsOld = Thesis::find()->select('id')->where(['candidate_id' => $model->id])->column();

            $transaction = Yii::$app->db->beginTransaction();

            $quotationModels = $this->loadItemModels($post, 'Quotation')['models'];
            $quotationModelIDs = $this->loadItemModels($post, 'Quotation')['itemIDs'];
            $perkModels = $this->loadItemModels($post, 'Perk')['models'];
            $perkModelIDs = $this->loadItemModels($post, 'Perk')['itemIDs'];
            $thesisModels = $this->loadItemModels($post, 'Thesis')['models'];
            $thesisModelIDs = $this->loadItemModels($post, 'Thesis')['itemIDs'];
            
            $validationErrors = ArrayHelper::merge(
                ActiveForm::validateMultiple($quotationModels),
                ActiveForm::validateMultiple($perkModels),
                ActiveForm::validate($model)
            );

            if(empty($validationErrors)) {
                try  {
                    $success = $model->save();
                    foreach (array_merge($quotationModels, $perkModels, $thesisModels) as $key => $itemModel) {
                        if($success) {
                            $itemModel->candidate_id = $model->id;
                            $success = $itemModel->save();
                        }
                    }

                    foreach (array_diff($quotationModelIDsOld, $quotationModelIDs) as $itemId) {
                        $m = Quotation::findOne($itemId);
                        $m->delete();
                    }
                    foreach (array_diff($perkModelIDsOld, $perkModelIDs) as $itemId) {
                        $m = Perk::findOne($itemId);
                        $m->delete();
                    }
                    foreach (array_diff($thesisModelIDsOld, $thesisModelIDs) as $itemId) {
                        $m = Thesis::findOne($itemId);
                        $m->delete();
                    }

                    if($success) {
                        $transaction->commit();

                        Yii::$app->session->setFlash("success", 'Данные успешно обновлены');

                        return $this->redirect(['update', 'id' => $model->id]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } 

        return $this->render('update', [
            'model' => $model,
            'quotationModels' => $quotationModels,
            'perkModels' => $perkModels,
            'thesisModels' => $thesisModels,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAddItem($modelClass, $i) {
        if(Yii::$app->request->isAjax) {
            $modelClass = 'common\models\items\\'.$modelClass;
            $model = new $modelClass;

            return $this->renderAjax('items/'.$model->tableSchema->name, [
                'model' => $model,
                'i' => $i,
            ]);
        }
    }

    /**
     * Finds the Candidate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Candidate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Candidate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function loadItemModels($post, $class) {
        $itemIDs = [];
        $itemModelsArray = [];

        foreach ($post as $key => $itemDataArray) {
            if($key == $class) {
                foreach ($itemDataArray as $i => $itemData) {
                    if(isset($itemData['id'])) {
                        $itemIDs[$key][] = $itemData['id'];
                        $itemModel = $class::findOne($itemData['id']);
                    } else {
                        $class = 'common\models\items\\'.$key;
                        //print_r($key);exit;
                        $itemModel = new $class;
                    }
                    $itemModel->attributes = $itemData;

                    $itemModelsArray[$i] = $itemModel;
                    $itemModel = null;
                }
            }
        }

        return ['models' => $itemModelsArray, 'itemIDs' => $itemIDs];
    }

    protected function check_diff_multi($array1, $array2) {
        $result = array();
        foreach($array1 as $key => $val) {
             if(isset($array2[$key])){
               if(is_array($val) && $array2[$key]){
                   $result[$key] = $this->check_diff_multi($val, $array2[$key]);
               }
           } else {
               $result[$key] = $val;
           }
        }

        return $result;
    }
}
