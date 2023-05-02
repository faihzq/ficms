<?php

namespace app\controllers;

use Yii;
use app\models\Boat;
use app\models\BoatStatus;
use app\models\BoatImages;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;


/**
 * BoatController implements the CRUD actions for Boat model.
 */
class BoatController extends Controller
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
     * Lists all Boat models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = Boat::find()->all();

        return $this->render('indexTable', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Boat model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $modelImages = BoatImages::find()->andWhere(['boat_id'=>$id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelImages' => $modelImages,
        ]);
    }

    /**
     * Creates a new Boat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Boat();
        $listBoatStatus = ArrayHelper::map(BoatStatus::find()->all(), 'id', 'name');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                date_default_timezone_set('Asia/Kuala_Lumpur');
                $time = date_default_timezone_get() ;
                $time = date('Y-m-d H:i:s');
                $model->created_time = $time;
                $model->updated_time = $time;

                // input image
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if ($model->imageFile){
                    $model->upload();
                }
                // input gallery
                $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
                if ($model->imageFiles){
                    $directoryPath = 'uploads/boatGallery/';
                    if (!file_exists($directoryPath)) {
                        mkdir($directoryPath, 0777, true);
                    }
                    foreach ($model->imageFiles as $file) {
                        $filename = uniqid() . '.' . $file->extension;
                        $file->saveAs('uploads/boatGallery/' . $filename);
                        $modelImages = new BoatImages();
                        $modelImages->boat_id = $model->id;
                        $modelImages->image_file = $filename;
                        $modelImages->uploaded_by = $model->updated_user_id;
                        $modelImages->date = $time;

                        $modelImages->save(false);
                    }
                }

                if ($model->save(false)){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'listBoatStatus' => $listBoatStatus,
        ]);
    }

    /**
     * Updates an existing Boat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $listBoatStatus = ArrayHelper::map(BoatStatus::find()->all(), 'id', 'name');

        if ($this->request->isPost && $model->load($this->request->post())) {
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $time = date_default_timezone_get() ;
            $time = date('Y-m-d H:i:s');
            $model->updated_time = $time;

            // input image
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            
            if ($model->imageFile){
                $model->upload();
            }
            // input gallery
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->imageFiles){
                $directoryPath = 'uploads/boatGallery/';
                if (!file_exists($directoryPath)) {
                    mkdir($directoryPath, 0777, true);
                }
                foreach ($model->imageFiles as $file) {
                    $filename = uniqid() . '.' . $file->extension;
                    $file->saveAs('uploads/boatGallery/' . $filename);
                    $modelImages = new BoatImages();
                    $modelImages->boat_id = $model->id;
                    $modelImages->image_file = $filename;
                    $modelImages->uploaded_by = $model->updated_user_id;
                    $modelImages->date = $time;

                    $modelImages->save(false);
                }
            }

            if ($model->save(false)){
                return $this->redirect(['view', 'id' => $model->id]);
            }

            
        }

        return $this->render('update', [
            'model' => $model,
            'listBoatStatus' => $listBoatStatus,
        ]);
    }  

    /**
     * Deletes an existing Boat model.
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
     * Finds the Boat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Boat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Boat::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
