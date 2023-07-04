<?php

namespace frontend\modules\cars\controllers;

use frontend\modules\carPhotos\models\CarPhotos;
use frontend\modules\cars\models\Cars;
use frontend\modules\cars\models\CarsSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CarsController implements the CRUD actions for Cars model.
 */
class CarsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Cars models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CarsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cars model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cars model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cars();
        $modelPhoto = new CarPhotos();

        if ($this->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->photo_id = $this->uploadFile($modelPhoto);
            if  ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else {
            $model->loadDefaultValues();
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelPhoto' => $modelPhoto
        ]);
    }

    public function uploadFile($file)
    {
        $file->path = UploadedFile::getInstance($file, 'path');
        $file->path->saveAs("@frontend/web/images/cars/{$file->path->baseName}.{$file->path->extension}");
        $file->save(false);
        return $file->id;
    }

    /**
     * Updates an existing Cars model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelPhoto = new CarPhotos();
        $photo = $model->photo_id;

        if ($this->request->isPost) {
            $model->load(Yii::$app->request->post());
            if (UploadedFile::getInstance($modelPhoto, 'path'))
                $model->photo_id = $this->uploadFile($modelPhoto);
            else
                $model->photo_id = $photo;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $model->loadDefaultValues();
            }
        }
        return $this->render('update', [
            'model' => $model,
            'modelPhoto' => $modelPhoto
        ]);
    }

    /**
     * Deletes an existing Cars model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cars model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Cars the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cars::findOne(['id' => $id])) !== null) {
            $model->photo->path = \common\models\CarPhotos::getItem($model);
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
