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
 * @property string $equipment_location
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
            [['boat_id', 'report_date', 'report_no', 'requestor_id', 'damage_date', 'status_id', 'boat_location', 'sel_no', 'equipment_serial', 'equipment_location', 'running_hours', 'damage_information', 'contact_officer_name', 'contact_officer_tel', 'created_time', 'updated_time', 'updated_user_id'], 'required'],
            [['boat_id', 'requestor_id', 'status_id', 'updated_user_id'], 'integer'],
            [['report_date', 'damage_date', 'created_time', 'updated_time', 'commander_sign', 'sign_time'], 'safe'],
            [['damage_information'], 'string'],
            [['report_no', 'sel_no', 'equipment_serial', 'contract_no'], 'string', 'max' => 50],
            [['boat_location', 'equipment_location'], 'string', 'max' => 200],
            [['running_hours', 'commander_name', 'commander_rank', 'commander_position'], 'string', 'max' => 100],
            [['contact_officer_name'], 'string', 'max' => 150],
            [['contact_officer_tel'], 'string', 'max' => 20],
            [['support_doc_1','support_doc_2','support_doc_3'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
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
            'report_date' => 'Tarikh',
            'report_no' => 'No. Lapor DJ',
            'requestor_id' => 'Requestor',
            'damage_date' => 'Tarikh Kerosakan',
            'status_id' => 'Status',
            'boat_location' => 'Lokasi FIC Terkini',
            'sel_no' => 'No SEL/ESWBS',
            'equipment_serial' => 'No Siri Peralatan',
            'equipment_location' => 'Loaksi Peralatan',
            'running_hours' => 'Running Hours',
            'damage_information' => 'Keterangan Kerosakan DJ',
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

    public function upload($i)
    {
        $file = 'support_doc_'.$i;
        if ($this->validate()) {            
            $filePath = 'uploads/reportDamage/' . $this->$file->baseName . '.' . $this->$file->extension;
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

    public function getStatusLabel()
    {
        switch ($this->status_id) {
            case 1:
                $statusLabel = 'success';
                break;
            case 2:
                $statusLabel = 'primary';
                break;
            
            default:
                $statusLabel = 'info';
                break;
        }

        return $statusLabel;
    }
}
