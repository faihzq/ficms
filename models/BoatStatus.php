<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "boat_status".
 *
 * @property int $id
 * @property string|null $name
 */
class BoatStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'boat_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 100],
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
                $statusLabel = 'bg-soft-success text-success';
                break;
            case 2:
                $statusLabel = 'bg-soft-danger text-danger';
                break;
            
            default:
                $statusLabel = 'bg-soft-info text-info';
                break;
        }

        return $statusLabel;
    }
}
