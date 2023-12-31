<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report17_defect".
 *
 * @property int $id
 * @property int $boat_id
 * @property int $boat_status_id
 * @property string $report_date
 * @property string $report_no
 * @property int $requestor_id
 * @property string $damage_date
 * @property int $status_id
 * @property int $equipment_id
 * @property int $boat_location_id
 * @property string $sel_no
 * @property string $equipment_serial
 * @property int $equipment_location_id
 * @property string $running_hours
 * @property int|null $damage_type_id
 * @property string $damage_information
 * @property string|null $support_doc_1
 * @property string|null $support_doc_2
 * @property string|null $support_doc_3
 * @property string $contact_officer_name
 * @property string $contact_officer_tel
 * @property string|null $commander_sign
 * @property string|null $commander_sign_pic
 * @property string|null $commander_name
 * @property string|null $sign_time
 * @property string|null $commander_rank
 * @property string|null $commander_position
 * @property string|null $contract_no
 * @property string $created_time
 * @property string $updated_time
 * @property int $updated_user_id
 */
class Report17Defect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report17_defect';
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
            'report_no' => 'No. Laporan',
            'requestor_id' => 'Requestor',
            'damage_date' => 'Tarikh Kerosakan',
            'status_id' => 'Status',
            'equipment_id' => 'Nama Peralatan',
            'boat_location_id' => 'Lokasi FIC Terkini',
            'sel_no' => 'No SEL/ESWBS',
            'equipment_serial' => 'No Siri Peralatan',
            'equipment_location_id' => 'Lokasi Peralatan',
            'running_hours' => 'Jam berjalan',
            'damage_information' => 'Keterangan Kerosakan',
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
            $model = Report17Defect::find()->where(['=', 'status_id', 1])->count();
        } else {
            $model = Report17Defect::find()->count();
        }

        return $model;
    }

    public function upload($i)
    {
        $file = 'support_doc_'.$i;
        if ($this->validate()) {            
            $filePath = 'uploads/report17Defect/' . $this->$file->baseName . '.' . $this->$file->extension;
            $directoryPath = dirname($filePath);
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0777, true);
            }
            $this->$file->saveAs($filePath, false);
            $this->$file = $this->$file->baseName . '.' . $this->$file->extension;
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
        $path = 'uploads/report17Defect/sign/';
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
