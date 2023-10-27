<?php

namespace app\controllers;

use Yii;
use Mpdf\Mpdf;
use app\models\Report17Repair;
use app\models\Report17Survey;
use app\models\ReportStatus;
use app\models\SignatureLog;
use app\models\ReportStatusLog;
use app\models\Boat;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * Report17RepairController implements the CRUD actions for Report17Repair model.
 */
class Report17RepairController extends Controller
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
     * Lists all Report17Repair models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = Report17Repair::find()->all();
        $listStatus = ArrayHelper::map(ReportStatus::find()->all(), 'name', 'name');

        // Add a new item to the array
        $listStatus['Semua'] = 'Semua';

        // Define the desired order of the status names
        // $statusOrder = ['Semua', 'Baru', 'Lulus'];

        // Reorder the list of status names based on the desired order
        // $listStatus = array_replace(array_flip($statusOrder), $listStatus);

        // Remove the flipped array from the resulting array
        // unset($listStatus['Semua']);

        return $this->render('index', [
            'model' => $model,
            'listStatus' => $listStatus,
        ]);
    }

    /**
     * Displays a single Report17Repair model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //set time and date
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = date_default_timezone_get() ;
        $time = date('Y-m-d H:i:s');
        $date = date('Y-m-d');

        $model = $this->findModel($id);

        $modelReportStatusLog = ReportStatusLog::find()->where(['report_id'=>$id])->andWhere(['report_type_id'=>3])->orderBy(['updated_time'=>SORT_DESC])->all();

        return $this->render('view', [
            'model' => $model,
            'modelReportStatusLog' => $modelReportStatusLog
        ]);
    }

    /**
     * Creates a new Report17Repair model.
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

        $model = new Report17Repair();

        // initial report & damage date
        $model->report_date = $date;

        $counter = Report17Repair::find()->count();
        $prefix = str_pad($counter+1, 2, '0', STR_PAD_LEFT);
        $runningNo = 'B/'.$runNoDate.'/'.$prefix;
        $model->report_no = $runningNo;

        $listReport17Survey = ArrayHelper::map(Report17Survey::find()->where(['IN', 'status_id', [4]])->all(), 'id', 'report_no');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                // set created & updated time
                $model->created_time = $time;
                $model->updated_time = $time;
                // set requestor
                $model->requestor_id = Yii::$app->user->identity->id;
                //set status new
                $model->status_id = 4;

                if ($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'listReport17Survey' => $listReport17Survey,
        ]);
    }

    /**
     * Updates an existing Report17Repair model.
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

        $listReport17Survey = ArrayHelper::map(Report17Survey::find()->where(['IN', 'status_id', [4]])->all(), 'id', 'report_no');

        if ($this->request->isPost && $model->load($this->request->post())) {
            // set updated time
            $model->updated_time = $time;

            if ($model->save()){
                $modelReportStatusLog = new ReportStatusLog();
                $modelReportStatusLog->report_id = $model->id;
                $modelReportStatusLog->report_status_id = $model->status_id;
                $modelReportStatusLog->report_type_id = 3;
                $modelReportStatusLog->updated_user_id = $model->requestor_id;
                $modelReportStatusLog->updated_time = $model->updated_time;
                $modelReportStatusLog->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        }

        return $this->render('update', [
            'model' => $model,
            'listReport17Survey' => $listReport17Survey,
        ]);
    }

    public function actionTask()
    {
        if (Yii::$app->user->identity->user_role_id == 1){
            $model1 = Report17Repair::find()->where(['=', 'status_id', 4])->andWhere(['=', 'engineer_sign_status_id', 0])->all();
            $model2 = Report17Repair::find()->where(['=', 'status_id', 4])->andWhere(['=', 'engineer_sign_status_id', 1])->andWhere(['=', 'commander_sign_status_id', 0])->all();
            $model = array_merge($model1, $model2);
        } else if (Yii::$app->user->identity->user_role_id == 3 || Yii::$app->user->identity->user_role_id == 2){
            $model = Report17Repair::find()->where(['=', 'status_id', 4])->all();
        } else {
            $model = Report17Repair::find()->where(['=', 'status_id', 4])->andWhere(['=', 'engineer_sign_status_id', 1])->andWhere(['=', 'commander_sign_status_id', 0])->all();
        }
        $listStatus = ArrayHelper::map(ReportStatus::find()->all(), 'name', 'name');

        // Add a new item to the array
        $listStatus['Semua'] = 'Semua';

        // Define the desired order of the status names
        // $statusOrder = ['Semua', 'Baru', 'Untuk Tindakan GMI', 'Dalam Tindakan GMI', 'Selesai'];

        // Reorder the list of status names based on the desired order
        // $listStatus = array_replace(array_flip($statusOrder), $listStatus);

        return $this->render('index', [
            'model' => $model,
            'listStatus' => $listStatus,
        ]);
    }

    public function actionSign($id, $section)
    {
        //set time and date
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = date_default_timezone_get();
        $time = date('Y-m-d H:i:s');
        $date = date('Y-m-d');

        $model= $this->findModel($id);
        if ($section == 1){
            $model->engineer_sign_time = $time;
        }else {
            $model->commander_sign_time = $time;
        }
        

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($section == 1){
                $model->engineer_sign= Yii::$app->request->post('Report17Repair')['engineer_sign'];
                // set updated time
                $model->updated_time = $time;
                $model->updated_user_id = Yii::$app->user->identity->id;
                $model->engineer_sign_status_id = 1;
                $model->engineer_sign_pic = $model->base64_to_png_eng();
                
            } else {
                $model->commander_sign= Yii::$app->request->post('Report17Repair')['commander_sign'];
                // set updated time
                $model->updated_time = $time;
                $model->updated_user_id = Yii::$app->user->identity->id;
                // set status lulus
                $model->status_id = 5;
                $model->commander_sign_status_id = 1;
                $model->commander_sign_pic = $model->base64_to_png_com();
            }
            

            if ($model->save(false)){

                if ($model->status_id == 5){
                    $modelBoat = Boat::findOne(['id' => $model->reportSurvey->reportDamage->boat_id]);
                    $check = 1;
                    switch ($model->reportSurvey->reportDamage->damage_type_id){
                        case 1:
                            $modelBoat->prop_check = $check;
                            break;
                        case 2:
                            $modelBoat->gen_check = $check;
                            break;
                        case 3:
                            $modelBoat->nav_check = $check;
                            break;
                        case 4:
                            $modelBoat->comm_check = $check;
                            break;
                        case 5:
                            $modelBoat->warframe_check = $check;
                            break; 
                        default:
                            break;
                    }
                    if ($model->reportSurvey->boat_status_id == 1){
                        $modelBoat->boat_status_id = 1;
                    }else {
                        $modelBoat->boat_status_id = 2;
                    }
                    $modelBoat->save(false);
                }

                $modelReportStatusLog = new ReportStatusLog();
                $modelReportStatusLog->report_id = $model->id;
                $modelReportStatusLog->report_status_id = $model->status_id;
                $modelReportStatusLog->report_type_id = 3;
                $modelReportStatusLog->updated_user_id = $model->requestor_id;
                $modelReportStatusLog->updated_time = $model->updated_time;
                $modelReportStatusLog->save();

                $modelSignatureLog = new SignatureLog();
                $modelSignatureLog->user_id = Yii::$app->user->identity->id;
                $modelSignatureLog->report_id = $model->id;
                $modelSignatureLog->report_type = 3;
                $modelSignatureLog->updated_time = $time;
                $modelSignatureLog->save();
                // Yii::$app->session->setFlash('success');

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('sign', [
            'model' => $model,
            'section' => $section,
        ]);
        
    }

    public function actionBoat($id)
    {
        if (Yii::$app->request->isAjax) {
            $selectedValue = Yii::$app->request->post('selectedValue');
            // Fetch data based on selected value
            $data = Report17Repair::findOne($selectedValue);
            if ($data) {
                $response = [
                    'boat_name' => $data->reportSurvey->reportDamage->boat->boat_name,
                    'report_damage_no' => $data->reportSurvey->reportDamage->report_no,
                    'report_survey_no' => $data->reportSurvey->report_no,
                     // replace with the field you want to return
                    'success' => true,
                ];
            } else {
                $response = [
                    'result' => '',
                    'success' => false,
                ];
            }
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $response;
        }
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
        ]);
        
        // Write content to PDF
        $mpdf->WriteHTML($content);

        // Output PDF to browser
        $mpdf->Output();
    }

    /**
     * Deletes an existing Report17Repair model.
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
     * Finds the Report17Repair model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Report17Repair the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Report17Repair::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}