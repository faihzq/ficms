<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report17_repair".
 *
 * @property int $id
 * @property int $report_survey_id
 * @property int $requestor_id
 * @property int $status_id
 * @property string $report_date
 * @property string $report_no
 * @property string $service_description
 * @property string $tools_need
 * @property string|null $engineer_sign
 * @property int $engineer_sign_status_id
 * @property string|null $engineer_sign_pic
 * @property string|null $engineer_sign_time
 * @property string|null $engineer_name
 * @property string|null $engineer_position
 * @property string|null $commander_sign
 * @property int $commander_sign_status_id
 * @property string|null $commander_sign_pic
 * @property string|null $commander_sign_time
 * @property string|null $commander_name
 * @property string|null $commander_position
 * @property string $created_time
 * @property string $updated_time
 * @property int $updated_user_id
 */
class Report17Repair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report17_repair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['report_survey_id', 'requestor_id', 'status_id', 'report_date', 'report_no', 'service_description', 'tools_need', 'created_time', 'updated_time', 'updated_user_id'], 'required'],
            [['report_survey_id', 'requestor_id', 'status_id', 'engineer_sign_status_id', 'commander_sign_status_id', 'updated_user_id'], 'integer'],
            [['report_date', 'engineer_sign_time', 'commander_sign_time', 'created_time', 'updated_time'], 'safe'],
            [['service_description', 'tools_need', 'engineer_sign', 'commander_sign'], 'string'],
            [['report_no'], 'string', 'max' => 50],
            [['engineer_sign_pic', 'commander_sign_pic'], 'string', 'max' => 200],
            [['engineer_name', 'engineer_position', 'commander_name', 'commander_position'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'report_survey_id' => 'No. Laporan Kajian Kerosakan',
            'requestor_id' => 'Requestor',
            'status_id' => 'Status',
            'report_date' => 'Tarikh',
            'report_no' => 'No. Laporan Pembetulan Kajian',
            'service_description' => 'Keterangan Perkhidmatan Kajian',
            'tools_need' => 'Alat Ganti, Alat Sokongan dan Peralatan Pengujian yang digunakan',
            'engineer_sign' => 'Tandatangan',
            'engineer_sign_time' => 'Tarikh',
            'engineer_name' => 'Nama',
            'engineer_position' => 'Jawatan',
            'commander_sign' => 'Tandatangan',
            'commander_sign_time' => 'Tarikh',
            'commander_name' => 'Nama',
            'commander_position' => 'Jawatan',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'updated_user_id' => 'Updated User ID',
        ];
    }

    public static function getTaskCounter()
    {
        $counter = 0;
        if (Yii::$app->user->identity->user_role_id == 1){
            $model1 = Report17Repair::find()->where(['=', 'status_id', 4])->andWhere(['=', 'engineer_sign_status_id', 0])->count();
            $model2 = Report17Repair::find()->where(['=', 'status_id', 4])->andWhere(['=', 'engineer_sign_status_id', 1])->andWhere(['=', 'commander_sign_status_id', 0])->count();
            $counter = $model1 + $model2;
        } else if (Yii::$app->user->identity->user_role_id == 3 || Yii::$app->user->identity->user_role_id == 2){
            $counter = Report17Repair::find()->where(['=', 'status_id', 4])->count();
        } else {
            $counter = Report17Repair::find()->where(['=', 'status_id', 4])->andWhere(['=', 'engineer_sign_status_id', 1])->andWhere(['=', 'commander_sign_status_id', 0])->count();
        }

        return $counter;
    }

    public function getReportSurvey()
    {
        return $this->hasOne(Report17Survey::className(),['id'=>'report_survey_id']);
    }

    public function getRequestor()
    {
        return $this->hasOne(User::className(),['id'=>'requestor_id']);
    }

    public function getStatus()
    {
        return $this->hasOne(ReportStatus::className(),['id'=>'status_id']);
    }

    public function base64_to_png_eng() {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = date_default_timezone_get() ;
        $signDate = date('Ymd_His');
    
        $filename = $this->engineer_name.'-'.$signDate.'.png';
        $path = 'uploads/report17Repair/sign/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $location = $path.$filename;
        file_put_contents($location, file_get_contents($this->engineer_sign));

        return $filename; 
    }

    public function base64_to_png_com() {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = date_default_timezone_get() ;
        $signDate = date('Ymd_His');
    
        $filename = $this->commander_name.'-'.$signDate.'.png';
        $path = 'uploads/report17Repair/sign/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $location = $path.$filename;
        file_put_contents($location, file_get_contents($this->commander_sign));

        return $filename; 
    }
}
