<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_survey".
 *
 * @property int $id
 * @property int $report_damage_id
 * @property string $report_date
 * @property string $report_no
 * @property string $survey_date
 * @property string $damage_description
 * @property string $probable_cause
 * @property int $warranty_protection
 * @property string|null $nowarranty_protection_reason
 * @property string $suggested_correction
 * @property string $tools_need
 * @property string|null $engineer_sign
 * @property string|null $engineer_sign_time
 * @property string|null $engineer_name
 * @property string|null $engineer_position
 * @property string|null $commander_sign
 * @property string|null $commander_sign_time
 * @property string|null $commander_name
 * @property string|null $commander_position
 * @property string $created_time
 * @property int $updated_user_id
 * @property int $updated_time
 */
class ReportSurvey extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_survey';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['report_damage_id', 'requestor_id', 'status_id', 'report_date', 'report_no', 'survey_date', 'damage_type_survey_id', 'damage_category_id', 'damage_description', 'probable_cause', 'boat_status_id', 'warranty_protection', 'suggested_correction', 'tools_need', 'created_time', 'updated_user_id', 'updated_time'], 'required'],
            [['report_damage_id', 'requestor_id', 'status_id', 'damage_type_survey_id', 'damage_category_id', 'boat_status_id', 'warranty_protection', 'updated_user_id', 'engineer_sign_status_id', 'commander_sign_status_id'], 'integer'],
            [['report_date', 'survey_date', 'engineer_sign_time', 'commander_sign_time', 'created_time', 'updated_time'], 'safe'],
            [['damage_description', 'nowarranty_protection_reason', 'suggested_correction', 'tools_need', 'engineer_sign', 'commander_sign', 'probable_cause'], 'string'],
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
            'report_damage_id' => 'Rujukan No. Laporan Kerosakan',
            'report_date' => 'Tarikh',
            'report_no' => 'No. Laporan Kajian',
            'survey_date' => 'Tarikh Kajian',
            'damage_type_survey_id' => 'Jenis Kerosakan',
            'damage_category_id' => 'Kategori Kerosakan',
            'damage_description' => 'Keterangan Kerosakan',
            'probable_cause' => 'Sebab Kemungkinan',
            'boat_status_id' => 'Status Bot',
            'warranty_protection' => 'Jaminan Perlindungan',
            'nowarranty_protection_reason' => 'Sebab jika TIDAK',
            'suggested_correction' => 'Cadangan Pembetulan',
            'tools_need' => 'Keperluan Alat Ganti, Alat Sokongan dan Peralatan Pengujian',
            'engineer_sign' => 'Tandatangan',
            'engineer_sign_time' => 'Tarikh',
            'engineer_name' => 'Nama',
            'engineer_position' => 'Jawatan',
            'commander_sign' => 'Tandatangan',
            'commander_sign_time' => 'Tarikh',
            'commander_name' => 'Nama',
            'commander_position' => 'Jawatan',
            'status_id' => 'Status',
            'created_time' => 'Created Time',
            'updated_user_id' => 'Updated User ID',
            'updated_time' => 'Updated Time',
        ];
    }

    public static function getTaskCounter()
    {
        if (Yii::$app->user->identity->user_role_id == 1){
            $model = ReportSurvey::find()->where(['=', 'status_id', 2])->andWhere(['=', 'engineer_sign_status_id', 0])->count();
        } else if (Yii::$app->user->identity->user_role_id == 3 || Yii::$app->user->identity->user_role_id == 2){
            $model = ReportSurvey::find()->where(['=', 'status_id', 2])->count();
        } else {
            $model = ReportSurvey::find()->where(['=', 'status_id', 2])->andWhere(['=', 'engineer_sign_status_id', 1])->andWhere(['=', 'commander_sign_status_id', 0])->count();
        }

        return $model;
    }

    public function getReportDamage()
    {
        return $this->hasOne(ReportDamage::className(),['id'=>'report_damage_id']);
    }

    public function getRequestor()
    {
        return $this->hasOne(User::className(),['id'=>'requestor_id']);
    }

    public function getStatus()
    {
        return $this->hasOne(ReportStatus::className(),['id'=>'status_id']);
    }

    public function getStatusBoat()
    {
        return $this->hasOne(BoatStatus::className(),['id'=>'boat_status_id']);
    }

    public function getDamageSurvey()
    {
        return $this->hasOne(DamageTypeSurvey::className(),['id'=>'damage_type_survey_id']);
    }

    public function getDamageCategory()
    {
        return $this->hasOne(DamageCategory::className(),['id'=>'damage_category_id']);
    }

    public function getWarrantyProtection()
    {
        switch ($this->warranty_protection) {
            case 0:
                $label = 'Tidak';
                break;
            case 1:
                $label = 'Ya';
                break;
            
            default:
                $label = 'Ya';
                break;
        }

        return $label;
    }

    public function base64_to_png_eng() {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = date_default_timezone_get() ;
        $signDate = date('Ymd_His');
    
        $filename = $this->engineer_name.'-'.$signDate.'.png';
        $path = 'uploads/reportSurvey/sign/';
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
        $path = 'uploads/reportSurvey/sign/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $location = $path.$filename;
        file_put_contents($location, file_get_contents($this->commander_sign));

        return $filename; 
    }
}
