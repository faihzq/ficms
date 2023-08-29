<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property string $no_series
 * @property string $name
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_series', 'name'], 'required'],
            [['no_series'], 'string', 'max' => 10],
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
            'no_series' => 'No Series',
            'name' => 'Name',
        ];
    }

    public function getFullname()
    {
        return $this->no_series.' - '.$this->name;
    }

    public function getKekerapan()
    {
        $total = ReportDamage::find()->where(['equipment_id'=>$this->id])->andWhere(['status_id'=>2])->count();
        if (!$total){
            return '-';
        }
        return $total;
        
    }
}
