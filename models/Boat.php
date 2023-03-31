<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "boat".
 *
 * @property int $id
 * @property string|null $boat_name
 * @property float|null $length_overall
 * @property float|null $length_over_waterline
 * @property float|null $beam_overall
 * @property float|null $draft
 * @property string|null $power
 * @property string|null $propulsion
 * @property string|null $speed
 * @property string|null $boat_range
 * @property int|null $status_id
 * @property int|null $updated_user_id
 * @property string|null $created_time
 * @property string|null $updated_time
 */
class Boat extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'boat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['boat_name', 'required'],
            [['length_overall', 'length_over_waterline', 'beam_overall', 'draft'], 'number'],
            [['boat_range'], 'string'],
            [['status_id','updated_user_id'], 'integer'],
            [['status_id','created_time', 'updated_time'], 'safe'],
            [['boat_description', 'image_file'], 'string'],
            [['boat_name', 'power', 'propulsion', 'speed'], 'string', 'max' => 100],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'boat_name' => 'Boat Name',
            'boat_description' => 'Boat Description',
            'length_overall' => 'Length Overall',
            'length_over_waterline' => 'Length Over Waterline',
            'beam_overall' => 'Beam Overall',
            'draft' => 'Draft',
            'power' => 'Power',
            'propulsion' => 'Propulsion',
            'speed' => 'Speed',
            'boat_range' => 'Range',
            'status_id' => 'Status',
            'updated_user_id' => 'Updated User ID',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {            
            $filePath = 'uploads/boatImages/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $directoryPath = dirname($filePath);
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0777, true);
            }
            $this->imageFile->saveAs($filePath, false);
            $this->image_file = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            return true;
        } else {
            return false;
        }
    }

    public function getStatus()
    {
        return $this->hasOne(BoatStatus::className(),['id'=>'status_id']);
    }

    public function getStatusLabel()
    {
        switch ($this->status_id) {
            case 1:
                $statusLabel = 'bg-success';
                break;
            case 2:
                $statusLabel = 'bg-dark';
                break;
            case 3:
                $statusLabel = 'bg-warning';
                break;
            
            default:
                $statusLabel = 'bg-info';
                break;
        }

        return $statusLabel;
    }

    public function getUpdatedUser()
    {
        return $this->hasOne(User::className(),['id'=>'updated_user_id']);
    }

}
