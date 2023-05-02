<?php

namespace app\controllers;

use Yii;
use Mpdf\Mpdf;
use app\models\ReportRepair;
use app\models\ReportSurvey;
use app\models\ReportStatus;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * ReportRepairController implements the CRUD actions for ReportRepair model.
 */
class ReportRepairController extends Controller
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
     * Lists all ReportRepair models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = ReportRepair::find()->all();
        $listStatus = ArrayHelper::map(ReportStatus::find()->all(), 'name', 'name');

        // Add a new item to the array
        $listStatus['Semua'] = 'Semua';

        // Define the desired order of the status names
        $statusOrder = ['Semua', 'Baru', 'Lulus'];

        // Reorder the list of status names based on the desired order
        $listStatus = array_replace(array_flip($statusOrder), $listStatus);

        // Remove the flipped array from the resulting array
        // unset($listStatus['Semua']);

        return $this->render('index', [
            'model' => $model,
            'listStatus' => $listStatus,
        ]);
    }

    /**
     * Displays a single ReportRepair model.
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

        $remainingTime = $model->remainingTime;

        return $this->render('view', [
            'model' => $model,
            'remainingTime' => $remainingTime,
        ]);
    }

    /**
     * Creates a new ReportRepair model.
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
        $datePlusOne = date('Y-m-d', strtotime($date . ' +1 day'));

        $model = new ReportRepair();

        // initial report & damage date
        $model->report_date = $date;
        $model->warranty_expiration_date = $datePlusOne;

        $listReportSurvey = ArrayHelper::map(ReportSurvey::find()->where(['IN', 'status_id', [2]])->all(), 'id', 'report_no');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
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
            'listReportSurvey' => $listReportSurvey,
        ]);
    }

    /**
     * Updates an existing ReportRepair model.
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

        $listReportSurvey = ArrayHelper::map(ReportSurvey::find()->where(['IN', 'status_id', [2]])->all(), 'id', 'report_no');

        if ($this->request->isPost && $model->load($this->request->post())) {
            // set updated time
            $model->updated_time = $time;

            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        }

        return $this->render('update', [
            'model' => $model,
            'listReportSurvey' => $listReportSurvey,
        ]);
    }

    public function actionSign($id, $section)
    {
        //set time and date
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = date_default_timezone_get() ;
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
                $model->engineer_sign= Yii::$app->request->post('ReportRepair')['engineer_sign'];
                // set updated time
                $model->updated_time = $time;
                $model->updated_user_id = Yii::$app->user->identity->id;
                
            } else {
                $model->commander_sign= Yii::$app->request->post('ReportRepair')['commander_sign'];
                // set updated time
                $model->updated_time = $time;
                $model->updated_user_id = Yii::$app->user->identity->id;
                // set status lulus
                $model->status_id = 2;
            }
            

            if ($model->save(false)){

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
            $data = ReportSurvey::findOne($selectedValue);
            if ($data) {
                $response = [
                    'boat_name' => $data->reportDamage->boat->boat_name,
                    'report_damage_no' => $data->reportDamage->report_no,
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
     * Deletes an existing ReportRepair model.
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
     * Finds the ReportRepair model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ReportRepair the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReportRepair::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}