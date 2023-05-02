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
            [['report_damage_id', 'requestor_id', 'status_id', 'report_date', 'report_no', 'survey_date', 'damage_description', 'probable_cause', 'warranty_protection', 'suggested_correction', 'tools_need', 'created_time', 'updated_user_id', 'updated_time'], 'required'],
            [['report_damage_id', 'requestor_id', 'status_id', 'warranty_protection', 'updated_user_id'], 'integer'],
            [['report_date', 'survey_date', 'engineer_sign_time', 'commander_sign_time', 'created_time', 'updated_time'], 'safe'],
            [['damage_description', 'nowarranty_protection_reason', 'suggested_correction', 'tools_need', 'engineer_sign', 'commander_sign'], 'string'],
            [['report_no'], 'string', 'max' => 50],
            [['probable_cause'], 'string', 'max' => 200],
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
            'report_damage_id' => 'Rujukan No. Laporan Kerosakan DJ',
            'report_date' => 'Tarikh',
            'report_no' => 'No. Laporan Kajian DJ',
            'survey_date' => 'Tarikh Kajian',
            'damage_description' => 'Keterangan Kerosakan',
            'probable_cause' => 'Sebab Kemungkinan',
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
            'created_time' => 'Created Time',
            'updated_user_id' => 'Updated User ID',
            'updated_time' => 'Updated Time',
        ];
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

    public function getStatusLabel()
    {
        switch ($this->status_id) {
            case 1:
                $statusLabel = 'success';
                break;
            case 2:
                $statusLabel = 'primary';
                break;
            
            default:
                $statusLabel = 'info';
                break;
        }

        return $statusLabel;
    }

    public function getWarrantyProtection()
    {
        switch ($this->warranty_protection) {
            case 0:
                $label = 'Tidak';
                break;
            case 1:
                $label = 'ya';
                break;
            
            default:
                $label = 'Ya';
                break;
        }

        return $label;
    }
}