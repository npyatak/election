<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

use common\models\Page;
use common\models\search\PageSearch;

class PageController extends CController 
{

    public function actionIndex() {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate() {
        $model = new Page();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $images = ['image' => 'imageFile', 'share_image' => 'shareImageFile'];
            foreach ($images as $attr => $fileAttr) {
                $model->$fileAttr = UploadedFile::getInstance($model, $fileAttr);

                if($model->$fileAttr) {
                    $path = $model->imageSrcPath;
                    if(!file_exists($path)) {
                        mkdir($path, 0775, true);
                    }
                    $model->$attr = md5(time()).'.'.$model->$fileAttr->extension;
                    
                    $model->$fileAttr->saveAs($path.$model->$attr);
                    $model->save(false, [$attr]);
                }
            }

            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $images = ['image' => 'imageFile', 'share_image' => 'shareImageFile'];
            foreach ($images as $attr => $fileAttr) {
                $model->$fileAttr = UploadedFile::getInstance($model, $fileAttr);

                if($model->$fileAttr) {
                    $path = $model->imageSrcPath;
                    if(!file_exists($path)) {
                        mkdir($path, 0775, true);
                    }
                    if($model->$attr && file_exists($path.$model->$attr)) {
                        unlink($path.$model->$attr);
                    }

                    $model->$attr = md5(time()).'.'.$model->$fileAttr->extension;
                    
                    $model->$fileAttr->saveAs($path.$model->$attr);
                    $model->save(false, [$attr]);
                }
            }

            return $this->redirect(['index']);
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id) {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
