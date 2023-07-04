<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_status".
 *
 * @property int $id
 * @property string $name
 */
class ReportStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function getStatusLabel()
    {
        switch ($this->id) {
            case 1:
                $statusLabel = 'success';
                break;
            case 2:
                $statusLabel = 'primary';
                break;
            case 3:
                $statusLabel = 'dark';
                break;
            case 4:
                $statusLabel = 'secondary';
                break;
            
            default:
                $statusLabel = 'info';
                break;
        }

        return $statusLabel;
    }

    public function getStatusIcon()
    {
        switch ($this->id) {
            case 1:
                $statusIcon = ' ri-information-line';
                break;
            case 2:
                $statusIcon = 'ri-calendar-check-fill';
                break;
            case 3:
                $statusIcon = 'ri-pen-nib-fill';
                break;
            case 4:
                $statusIcon = 'ri-file-add-line';
                break;
            
            default:
                $statusIcon = 'info';
                break;
        }

        return $statusIcon;
    }
}
