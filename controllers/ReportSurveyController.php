<?php

namespace app\controllers;

use Yii;
use Mpdf\Mpdf;
use app\models\ReportSurvey;
use app\models\ReportDamage;
use app\models\ReportStatus;
use app\models\BoatStatus;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * ReportSurveyController implements the CRUD actions for ReportSurvey model.
 */
class ReportSurveyController extends Controller
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
     * Lists all ReportSurvey models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = ReportSurvey::find()->all();
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
     * Displays a single ReportSurvey model.
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
     * Creates a new ReportSurvey model.
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

        $model = new ReportSurvey();

        // initial report & damage date
        $model->report_date = $date;
        $model->survey_date = $date;

        $counter = ReportSurvey::find()->count();
        $prefix = str_pad($counter+1, 2, '0', STR_PAD_LEFT);
        $runningNo = 'T/'.$runNoDate.'/'.$prefix;
        $model->report_no = $runningNo;

        $listReportDamage = ArrayHelper::map(ReportDamage::find()->where(['IN', 'status_id', [2]])->all(), 'id', 'report_no');
        $listBoatStatus = ArrayHelper::map(BoatStatus::find()->all(), 'id', 'name');

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
            'listReportDamage' => $listReportDamage,
            'listBoatStatus' => $listBoatStatus,
        ]);
    }

    /**
     * Updates an existing ReportSurvey model.
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

        $listReportDamage = ArrayHelper::map(ReportDamage::find()->where(['IN', 'status_id', [2]])->all(), 'id', 'report_no');
        $listBoatStatus = ArrayHelper::map(BoatStatus::find()->all(), 'id', 'name');

        if ($this->request->isPost && $model->load($this->request->post())) {
            // set updated time
            $model->updated_time = $time;

            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        }

        return $this->render('update', [
            'model' => $model,
            'listReportDamage' => $listReportDamage,
            'listBoatStatus' => $listBoatStatus,
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
                $model->engineer_sign= Yii::$app->request->post('ReportSurvey')['engineer_sign'];
                // set updated time
                $model->updated_time = $time;
                $model->updated_user_id = Yii::$app->user->identity->id;

                $model->engineer_sign_pic = $model->base64_to_png_eng();
                
            } else {
                $model->commander_sign= Yii::$app->request->post('ReportSurvey')['commander_sign'];
                // set updated time
                $model->updated_time = $time;
                $model->updated_user_id = Yii::$app->user->identity->id;
                // set status lulus
                $model->status_id = 2;

                $model->commander_sign_pic = $model->base64_to_png_com();
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
            $data = ReportDamage::findOne($selectedValue);
            if ($data) {
                $response = [
                    'result' => $data->boat->boat_name, // replace with the field you want to return
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
            'format' => 'A4'
        ]);

        // Write content to PDF
        $mpdf->WriteHTML($content);

        // Output PDF to browser
        $mpdf->Output();
    }

    /**
     * Deletes an existing ReportSurvey model.
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
     * Finds the ReportSurvey model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ReportSurvey the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReportSurvey::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
