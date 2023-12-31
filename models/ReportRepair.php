<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_repair".
 *
 * @property int $id
 * @property int $report_survey_id
 * @property int $requestor_id
 * @property int $status_id
 * @property string $report_date
 * @property string $report_no
 * @property string $service_description
 * @property string $tools_need
 * @property string $warranty_expiration_date
 * @property string|null $engineer_sign
 * @property string|null $engineer_sign_time
 * @property string|null $engineer_name
 * @property string|null $engineer_position
 * @property string|null $commander_sign
 * @property string|null $commander_sign_time
 * @property string|null $commander_name
 * @property string|null $commander_position
 * @property string $created_time
 * @property string $updated_time
 * @property int $updated_user_id
 */
class ReportRepair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_repair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['report_survey_id', 'requestor_id', 'status_id', 'report_date', 'report_no', 'service_description', 'tools_need', 'warranty_expiration_date', 'created_time', 'updated_time', 'updated_user_id'], 'required'],
            [['report_survey_id', 'requestor_id', 'status_id', 'updated_user_id', 'engineer_sign_status_id', 'commander_sign_status_id'], 'integer'],
            [['report_date', 'warranty_expiration_date', 'engineer_sign_time', 'commander_sign_time', 'created_time', 'updated_time'], 'safe'],
            [['service_description', 'tools_need', 'engineer_sign', 'commander_sign'], 'string'],
            [['report_no'], 'string', 'max' => 50],
            [['engineer_name', 'engineer_position', 'commander_name', 'commander_position'], 'string', 'max' => 100],
            [['engineer_sign_pic', 'commander_sign_pic'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'report_survey_id' => 'No. Laporan Kajian KDJ',
            'requestor_id' => 'Requestor',
            'status_id' => 'Status',
            'report_date' => 'Tarikh',
            'report_no' => 'No. Laporan Pembetulan KDJ',
            'service_description' => 'Keterangan Perkhidmatan KDJ',
            'tools_need' => 'Alat Ganti, Alat Sokongan dan Peralatan Pengujian yang digunakan',
            'warranty_expiration_date' => 'Tarikh Tamat Tempoh Jaminan',
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
            $model1 = ReportRepair::find()->where(['=', 'status_id', 4])->andWhere(['=', 'engineer_sign_status_id', 0])->count();
            $model2 = ReportRepair::find()->where(['=', 'status_id', 4])->andWhere(['=', 'engineer_sign_status_id', 1])->andWhere(['=', 'commander_sign_status_id', 0])->count();
            $counter = $model1 + $model2;
        } else if (Yii::$app->user->identity->user_role_id == 3 || Yii::$app->user->identity->user_role_id == 2){
            $counter = ReportRepair::find()->where(['=', 'status_id', 4])->count();
        } else {
            $counter = ReportRepair::find()->where(['=', 'status_id', 4])->andWhere(['=', 'engineer_sign_status_id', 1])->andWhere(['=', 'commander_sign_status_id', 0])->count();
        }

        return $counter;
    }

    public function getReportSurvey()
    {
        return $this->hasOne(ReportSurvey::className(),['id'=>'report_survey_id']);
    }

    public function getRequestor()
    {
        return $this->hasOne(User::className(),['id'=>'requestor_id']);
    }

    public function getStatus()
    {
        return $this->hasOne(ReportStatus::className(),['id'=>'status_id']);
    }

    public function getRemainingTime()
    {
        //set time and date
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = date_default_timezone_get() ;
        $time = date('Y-m-d H:i:s');
        $date = date('Y-m-d');

        $now = new \DateTime($time);

        $inputDate = new \DateTime($this->warranty_expiration_date);


        $timeDiff = $inputDate->getTimestamp() - $now->getTimestamp();
        $remainingMonths = floor($timeDiff / (60 * 60 * 24 * 30));
        $remainingDays = floor(($timeDiff % (60 * 60 * 24 * 30)) / (60 * 60 * 24));
        $result = $remainingMonths.' bulan dan '.$remainingDays.' hari';

        return $result;
    }

    public function base64_to_png_eng() {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = date_default_timezone_get() ;
        $signDate = date('Ymd_His');
    
        $filename = $this->engineer_name.'-'.$signDate.'.png';
        $path = 'uploads/reportRepair/sign/';
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
        $path = 'uploads/reportRepair/sign/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $location = $path.$filename;
        file_put_contents($location, file_get_contents($this->commander_sign));

        return $filename; 
    }

}
