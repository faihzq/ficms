<?php

namespace app\controllers;

use Yii;
use Mpdf\Mpdf;
use app\models\ReportDamage;
use app\models\ReportStatus;
use app\models\Boat;
use app\models\BoatLocation;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * ReportDamageController implements the CRUD actions for ReportDamage model.
 */
class ReportDamageController extends Controller
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
     * Lists all ReportDamage models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = ReportDamage::find()->all();
        $listStatus = ArrayHelper::map(ReportStatus::find()->all(), 'name', 'name');

        // Add a new item to the array
        $listStatus['Semua'] = 'Semua';

        // Define the desired order of the status names
        $statusOrder = ['Semua', 'Baru', 'Lulus'];

        // Reorder the list of status names based on the desired order
        $listStatus = array_replace(array_flip($statusOrder), $listStatus);

        return $this->render('index', [
            'model' => $model,
            'listStatus' => $listStatus,
        ]);
    }

    /**
     * Displays a single ReportDamage model.
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
     * Creates a new ReportDamage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        //set time and date
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = date_default_timezone_get() ;
        $time = date('Y-m-d H:i:s');
        $date = date('Y-m-d');
        $runNoDate = date('Ym');

        $model = new ReportDamage();

        // list boat dropdown
        $listBoat = ArrayHelper::map(Boat::find()->where(['IN', 'boat_status_id', [1]])->all(), 'id', 'boat_name');
        $listLocation = ArrayHelper::map(BoatLocation::find()->all(), 'id', 'name');

        // initial report & damage date
        $model->report_date = $date;
        $model->damage_date = $date;

        $counter = ReportDamage::find()->count();
        $prefix = str_pad($counter+1, 2, '0', STR_PAD_LEFT);
        $runningNo = 'P/'.$runNoDate.'/'.$prefix;
        $model->report_no = $runningNo;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                for ($i=1; $i < 4; $i++) {
                    $file = 'support_doc_'.$i;

                    // input image
                    $model->$file = UploadedFile::getInstance($model, $file);
                    if ($model->$file){
                        $model->upload($i);
                    }
                }
                

                // set created & updated time
                $model->created_time = $time;
                $model->updated_time = $time;
                // set requestor
                $model->requestor_id = Yii::$app->user->identity->id;
                //set status new
                $model->status_id = 1;

                if ($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'listBoat' => $listBoat,
            'listLocation' => $listLocation,
        ]);
    }

    /**
     * Updates an existing ReportDamage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        //set time and date
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = date_default_timezone_get() ;
        $time = date('Y-m-d H:i:s');
        $date = date('Y-m-d');

        $model = $this->findModel($id);

        // list boat dropdown
        $listBoat = ArrayHelper::map(Boat::find()->where(['IN', 'boat_status_id', [1]])->all(), 'id', 'boat_name');
        $listLocation = ArrayHelper::map(BoatLocation::find()->all(), 'id', 'name');

        if ($this->request->isPost && $model->load($this->request->post())) {

            for ($i=1; $i < 4; $i++) {
                $file = 'support_doc_'.$i;

                // input image
                $model->$file = UploadedFile::getInstance($model, $file);
                if ($model->$file){
                    $model->upload($i);
                }
            }

            // set updated time
            $model->updated_time = $time;

            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        }

        return $this->render('update', [
            'model' => $model,
            'listBoat' => $listBoat,
            'listLocation' => $listLocation,
        ]);
    }

    public function actionSign($id)
    {
        //set time and date
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = date_default_timezone_get() ;
        $time = date('Y-m-d H:i:s');
        $date = date('Y-m-d');
        $signDate = date('Ymd_His');

        $model= $this->findModel($id);

        $model->sign_time = $time;

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->commander_sign= Yii::$app->request->post('ReportDamage')['commander_sign'];
            // set updated time
            $model->updated_time = $time;
            $model->updated_user_id = Yii::$app->user->identity->id;
            // set status lulus
            $model->status_id = 2;

            $model->commander_sign_pic = $model->base64_to_png();

            if ($model->save(false)){
                
                // Yii::$app->session->setFlash('success');

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('sign', [
            'model' => $model,
        ]);
        
    }

    public function actionPdf($id)
    {
        $model= $this->findModel($id);
        // Generate some sample content
        $content = $this->renderPartial('mpdf',[
            'model'=>$model,
        ]);

        // Create new mpdf object
        $mpdf = new mPDF([
            'format' => 'A4',
            'default_font_size' => 9
        ]);

        // Write content to PDF
        $mpdf->WriteHTML($content);

        // Output PDF to browser
        $mpdf->Output();
    }

    public function actionRemoveFile($id,$filename)
    {
        $no = 'support_doc_'.$filename;
        $model= $this->findModel($id);
        $path = Yii::getAlias('@webroot') . '/uploads/reportDamage/';
        $file = $path . $model->$no;

        if (file_exists($file)) {
            unlink($file);
        }
        
        $model->$no = NULL;

        $model->save(false);

        echo "1";
    }

    public function actionDownload($filename)
    {
       $path = Yii::getAlias('@webroot') . '/uploads/reportDamage/';

       $file = $path . $filename;

       if (file_exists($file)) {

           Yii::$app->response->sendFile($file);

        } else echo "file not exist";
    }

    /**
     * Deletes an existing ReportDamage model.
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
     * Finds the ReportDamage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ReportDamage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReportDamage::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
