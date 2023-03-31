<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "boat_images".
 *
 * @property int $id
 * @property int|null $boat_id
 * @property resource|null $image_file
 * @property int|null $uploaded_by
 * @property string|null $date
 */
class BoatImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'boat_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['boat_id', 'uploaded_by'], 'integer'],
            [['image_file'], 'string'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'boat_id' => 'Boat ID',
            'image_file' => 'Image File',
            'uploaded_by' => 'Uploaded By',
            'date' => 'Date',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->image_file->saveAs('uploads/' . $this->image_file->baseName . '.' . $this->image_file->extension);
            return true;
        } else {
            return false;
        }
    }
}
