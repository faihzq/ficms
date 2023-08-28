<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "damage_type_survey".
 *
 * @property int $id
 * @property string $nama
 */
class DamageTypeSurvey extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'damage_type_survey';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
            'name' => 'Nama',
        ];
    }
}
