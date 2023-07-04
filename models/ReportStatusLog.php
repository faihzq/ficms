<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_status_log".
 *
 * @property int $id
 * @property int|null $report_id
 * @property int|null $report_status_id
 * @property int|null $report_type_id
 * @property int|null $updated_user_id
 * @property string|null $updated_time
 */
class ReportStatusLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_status_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['report_id', 'report_status_id', 'report_type_id', 'updated_user_id'], 'integer'],
            [['updated_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'report_id' => 'Report ID',
            'report_status_id' => 'Report Status ID',
            'report_type_id' => 'Report Type ID',
            'updated_user_id' => 'Updated User ID',
            'updated_time' => 'Updated Time',
        ];
    }

    public function getStatus()
    {
        return $this->hasOne(ReportStatus::className(),['id'=>'report_status_id']);
    }

    public function getUpdatedUser()
    {
        return $this->hasOne(User::className(),['id'=>'updated_user_id']);
    }
}
