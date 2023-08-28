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
 * @property int $status_id
 * @property int|null $updated_user_id
 * @property string|null $created_time
 * @property string|null $updated_time
 */
class Boat extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $imageFiles;
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
            [['boat_name', 'short_name', 'boat_status_id'], 'required'],
            [['length_overall', 'length_over_waterline', 'beam_overall', 'draft'], 'number'],
            [['boat_range'], 'string'],
            [['boat_status_id','updated_user_id'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['boat_description', 'image_file'], 'string'],
            [['boat_name', 'power', 'propulsion', 'speed'], 'string', 'max' => 100],
            [['short_name'], 'string', 'max' => 50],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'boat_name' => 'Nama Bot',
            'short_name' => 'Hull No',
            'boat_description' => 'Penerangan Bot',
            'length_overall' => 'Panjang Keseluruhan',
            'length_over_waterline' => 'Panjang Atas Paras Air',
            'beam_overall' => 'Rasuk Keseluruhan',
            'draft' => 'Draf',
            'power' => 'Kuasa',
            'propulsion' => 'Pendorongan',
            'speed' => 'Kelajuan',
            'boat_range' => 'Julat',
            'boat_status_id' => 'Status',
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

    public function uploads()
    {
        

        if ($this->validate()) {          
            $directoryPath = 'uploads/boatGallery/';
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0777, true);
            }
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $time = date_default_timezone_get();
            $time = date('Y-m-d H:i:s');
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/boatGallery/' . uniqid() . '.' . $file->extension);
                $modelImages = new BoatImages();
                $modelImages->boat_id = $this->id;
                $modelImages->image_file = $file->baseName . '.' . $file->extension;
                $modelImages->uploaded_by = $this->updated_user_id;
                $modelImages->date = $time;

                $modelImages->save(false);
            }
            return true;
        } else {
            return false;
        }
        
    }

    public function getStatus()
    {
        return $this->hasOne(BoatStatus::className(),['id'=>'boat_status_id']);
    }

    public function getCheck($value)
    {
        switch ($value) {
            case 1:
                $checkLabel = 'bg-soft-success text-success';
                break;
            case 0:
                $checkLabel = 'bg-soft-danger text-danger';
                break;
            
            default:
                $checkLabel = 'bg-soft-info text-info';
                break;
        }

        return $checkLabel;
    }

    public function getChecktable($value)
    {
        switch ($value) {
            case 1:
                $checkLabel = '<i class="ri-checkbox-circle-line text-success fs-16"></i>';
                break;
            case 0:
                $checkLabel = '<i class="ri-close-circle-line text-danger fs-16"></i>';
                break;
            
            default:
                $checkLabel = '<i class="ri-check-double-fill text-success fs-16"></i>';
                break;
        }

        return $checkLabel;
    }

    public function getCheckReport($value)
    {

        $reportId = ReportDamage::find()->where(['boat_id'=>$this->id])->andWhere(['damage_type_id'=>$value])->andWhere(['status_id'=>2])->one();

        return $reportId->id;
    }

    public function getLocation()
    {

        $item = ReportDamage::find()->where(['boat_id'=>$this->id])->andWhere(['status_id'=>2])->orderBy(['created_time'=>SORT_DESC])->one();

        if ($item){
            return $item->location->name;
        } else {
            return '';
        }
    }

    public function getUpdatedUser()
    {
        return $this->hasOne(User::className(),['id'=>'updated_user_id']);
    }

    public function getTotalReport()
    {
        $result = ReportDamage::find()->where(['boat_id'=>$this->id])->andWhere(['status_id'=>2])->count();
        if (!$result){
            return '-';
        } else {
            return $result;
        }
    }

    public function getTotalReportRepair()
    {
        $result = ReportDamage::find()->join('JOIN','report_survey', 'report_damage.id = report_survey.report_damage_id')->join('JOIN','report_repair', 'report_survey.id = report_repair.report_survey_id')->andWhere(['report_damage.boat_id' => $this->id, 'report_repair.status_id' => 2])->count();

        if (!$result){
            return '-';
        }else {
            return $result;
        }
    }

    public function getTotalReportNotFixed()
    {
        $total = ReportDamage::find()->where(['boat_id'=>$this->id])->andWhere(['status_id'=>2])->count();
        $fixed = ReportDamage::find()->join('JOIN','report_survey', 'report_damage.id = report_survey.report_damage_id')->join('JOIN','report_repair', 'report_survey.id = report_repair.report_survey_id')->andWhere(['report_damage.boat_id' => $this->id, 'report_repair.status_id' => 2])->count();
        $result = $total - $fixed;
        if (!$result){
            return '-';
        }else {
            return $result;
        }
    }

    public function getTotalReportNoWarranty()
    {
        $result = ReportDamage::find()->join('JOIN','report_survey', 'report_damage.id = report_survey.report_damage_id')->andWhere(['report_damage.boat_id' => $this->id, 'report_survey.status_id' => 2, 'report_survey.warranty_protection'=> 0])->count();
        if (!$result){
            return '-';
        }else {
            return $result;
        }
    }

    public function getImage()
    {
        $avtar_title = explode(" ", $this->boat_name);
        $letters = null;
        if (count($avtar_title) >= 2) {
            $first_letter = substr($avtar_title[0], 0, 1);
            $second_letter = substr($avtar_title[1], 0, 1);
            $letters = $first_letter . $second_letter;
        } else {
            $first_letter = substr($avtar_title[0], 0, 1);
            $letters = $first_letter;
        }

        return $letters;
    }

    public function getImageColor()
    {
        $colors = array('primary', 'dark', 'success', 'info', 'secondary', 'danger');
        $index = array_rand($colors);
        $result = $colors[$index];

        return $result;
    }
}
