<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_damage".
 *
 * @property int $id
 * @property int $boat_id
 * @property string $report_date
 * @property string $report_no
 * @property int $requestor_id
 * @property string $damage_date
 * @property string $boat_location
 * @property string $sel_no
 * @property string $equipment_serial
 * @property string $equipment_location_id
 * @property string $running_hours
 * @property string $damage_information
 * @property string $contact_officer_name
 * @property string $contact_officer_tel
 * @property string|null $contract_no
 * @property string $created_time
 * @property string $updated_time
 * @property int $updated_user_id
 */
class ReportDamage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_damage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['boat_id', 'boat_status_id', 'report_date', 'report_no', 'requestor_id', 'damage_date', 'status_id', 'equipment_id', 'boat_location_id', 'sel_no', 'equipment_serial', 'equipment_location_id', 'running_hours', 'damage_information', 'damage_type_id', 'contact_officer_name', 'contact_officer_tel', 'created_time', 'updated_time', 'updated_user_id'], 'required'],
            [['boat_id', 'requestor_id', 'status_id', 'equipment_id', 'updated_user_id', 'boat_location_id', 'damage_type_id', 'equipment_location_id'], 'integer'],
            [['report_date', 'damage_date', 'created_time', 'updated_time', 'commander_sign', 'sign_time'], 'safe'],
            [['damage_information', 'contact_officer_name'], 'string'],
            [['report_no', 'sel_no', 'equipment_serial', 'contract_no'], 'string', 'max' => 50],
            [['commander_sign_pic'], 'string', 'max' => 200],
            [['commander_name', 'commander_rank', 'commander_position'], 'string', 'max' => 100],
            [['running_hours'], 'number'],
            [['contact_officer_tel'], 'string', 'max' => 20],
            [['support_doc_1','support_doc_2','support_doc_3'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, pdf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'boat_id' => 'Hull No/FIC No.',
            'boat_status_id' => 'Status Bot',
            'report_date' => 'Tarikh',
            'report_no' => 'No. Lapor DJ',
            'requestor_id' => 'Requestor',
            'damage_date' => 'Tarikh Kerosakan',
            'status_id' => 'Status',
            'equipment_id' => 'Nama Peralatan',
            'boat_location_id' => 'Lokasi FIC Terkini',
            'sel_no' => 'No SEL/ESWBS',
            'equipment_serial' => 'No Siri Peralatan',
            'equipment_location_id' => 'Lokasi Peralatan',
            'running_hours' => 'Running Hours',
            'damage_information' => 'Keterangan Kerosakan DJ',
            'damage_type_id' => 'Jenis Kerosakan',
            'sign_time' => 'Tarikh',
            'commander_name' => 'Nama',
            'commander_rank' => 'Pangkat',
            'commander_position' => 'Jawatan',
            'contact_officer_name' => 'No/Pangkat/Nama',
            'contact_officer_tel' => 'No Tel',
            'contract_no' => 'No. Kontrak',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'updated_user_id' => 'Updated User ID',
        ];
    }

    public static function getTaskCounter()
    {
        if (Yii::$app->user->identity->user_role_id == 1){
            $model = ReportDamage::find()->where(['=', 'status_id', 1])->count();
        } else {
            $model = ReportDamage::find()->count();
        }

        return $model;
    }

    public function upload($i, $uploadedFile)
    {
        $file = 'support_doc_'.$i;
        $name = $uploadedFile->baseName .'_'.date('YmdHis'). '.' . $uploadedFile->extension;
        if ($this->validate()) {
            $filePath = 'uploads/reportDamage/' . $name;
            $directoryPath = dirname($filePath);
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0777, true);
            }
            $uploadedFile->saveAs($filePath, false);
            // Check if a file already exists for the specific support_doc field
            if ($this->$file && file_exists('uploads/reportDamage/' . $this->$file)) {
                unlink('uploads/reportDamage/' . $this->$file); // Delete the previous file
            }
            $this->$file = $name;
            return true;
        } else {
            return false;
        }
    }

    public function base64_to_png() {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = date_default_timezone_get() ;
        $signDate = date('Ymd_His');

        $filename = $this->commander_name.'-'.$signDate.'.png';
        $path = 'uploads/reportDamage/sign/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $location = $path.$filename;
        file_put_contents($location, file_get_contents($this->commander_sign));

        return $filename; 
    }

    public function getRequestor()
    {
        return $this->hasOne(User::className(),['id'=>'requestor_id']);
    }

    public function getBoat()
    {
        return $this->hasOne(Boat::className(),['id'=>'boat_id']);
    }

    public function getStatus()
    {
        return $this->hasOne(ReportStatus::className(),['id'=>'status_id']);
    }

    public function getBoatstatus()
    {
        return $this->hasOne(BoatStatus::className(),['id'=>'boat_status_id']);
    }

    public function getLocation()
    {
        return $this->hasOne(BoatLocation::className(),['id'=>'boat_location_id']);
    }

    public function getDamagetype()
    {
        return $this->hasOne(DamageType::className(),['id'=>'damage_type_id']);
    }

    public function getEquipmentLocation()
    {
        return $this->hasOne(EquipmentLocation::className(),['id'=>'equipment_location_id']);
    }

    public function getEquipment()
    {
        return $this->hasOne(Equipment::className(),['id'=>'equipment_id']);
    }
}
