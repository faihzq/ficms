<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "signature_log".
 *
 * @property int $id
 * @property int $user_id
 * @property int $report_id
 * @property int $report_type
 * @property string $updated_time
 */
class SignatureLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'signature_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'report_id', 'report_type', 'updated_time'], 'required'],
            [['user_id', 'report_id', 'report_type'], 'integer'],
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
            'user_id' => 'User ID',
            'report_id' => 'Report ID',
            'report_type' => 'Report Type',
            'updated_time' => 'Updated Time',
        ];
    }
}
