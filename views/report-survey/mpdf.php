<style>
    .indent {
      display: inline-block;
      margin-left: 20px;
    }
    .indent-main {
      display: inline-block;
      margin-left: 40px;
    }
    .text-center {
      text-align: center;
    }
    .text-right {
      text-align: right;
    }
</style>

<div class="text-center">
    <h4 style="margin: 0px">SULIT</h4>
    <h4 class="text-right" style="margin: 0px; margin-right: 20px;">JADUAL 15B</h4>
    <h4 style="margin: 0px">TENTERA LAUT DIRAJA MALAYSIA<br>FAST INTERCEPTOR CRAFT</h4>
</div>
<hr>
<div class="text-center">
    <h4><u>LAPORAN TINJAUAN KEROSAKAN DALAM JAMINAN</u></h4>
</div>
<div class="indent-main">
    <table border="0" width="100%">
        <tr>
            <td>
                Rujukan kepada No. Laporan Kerosakan Dalam Jaminan (DJ) / Tarikh
            </td>
            <td width="10px">
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->reportDamage->report_no ?></b>
            </td>
        </tr>
        
    </table>
    <table border="0" width="100%">
        <tr>
            <td width="150px">
                Hull No./FIC No
            </td>
            
            <td width="10px">
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->reportDamage->boat->boat_name ?></b>
            </td>
        </tr>
        <tr>
            <td>
                Tarikh
            </td>
            <td width="10px">
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo date('d F Y', strtotime($model->report_date)) ?></b>
            </td>
        </tr>
    </table>
    <table border="0" width="100%" style="margin-left: 10px;">
        
        <tr>
            <td width="40px">
                1.
            </td>
            <td colspan="2">
                No. Laporan Kajian
            </td>
            <td width="10px">
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->report_no ?></b>
            </td>
        </tr>
        <tr>
            <td>
                2.
            </td>
            <td colspan="2">
                Tarikh Kajian
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo date('d F Y', strtotime($model->survey_date)) ?></b>
            </td>
        </tr>
        <tr>
            <td>
                3.
            </td>
            <td colspan="2">
                Keterangan Kerosakan
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo nl2br($model->damage_description) ?></b>
            </td>
        </tr>
        <tr>
            <td>
                4.
            </td>
            <td colspan="2">
                Sebab Kemungkinan
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo nl2br($model->probable_cause) ?></b>
            </td>
        </tr>
        <tr>
            <td rowspan="3" style="vertical-align: top">
                5.
            </td>
            <td colspan="2">
                Jaminan Perlindungan
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->warrantyProtection ?></b>
            </td>
        </tr>
        <tr>
            <td width="10px">
                5.1.
            </td>
            <td width="150px" colspan="3">
                Sebab jika TIDAK:
            </td>
        </tr>
        <tr>
            <td colspan="4" height="80px" style="vertical-align: top">
                <p style="border-bottom: 1px dotted;"><b><?php echo nl2br($model->nowarranty_protection_reason) ?></b></p>
            </td>
        </tr>
        <tr>
            <td rowspan="2" style="vertical-align: top;">
                6.
            </td>
            <td colspan="4">
                Cadangan Pembetulan:
            </td>
        </tr>
        <tr>
            <td colspan="4" height="80px" style="vertical-align: top">
                <p style="border-bottom: 1px dotted;"><b><?php echo nl2br($model->suggested_correction) ?></b></p>
            </td>
        </tr>
        <tr>
            <td rowspan="2" style="vertical-align: top;">
                7.
            </td>
            <td colspan="4">
                Keperluan Alat Ganti, Alat Sokongan dan Peralatan Pengujian:
            </td>
        </tr>
        <tr>
            <td colspan="4" height="80px" style="vertical-align: top">
                <p style="border-bottom: 1px dotted;"><b><?php echo nl2br($model->suggested_correction) ?></b></p>
            </td>
        </tr>
    </table>
</div>


<div class="indent-main">
    <div style="width:40%; float:left; margin-top: 100px;">
        <?php if ($model->engineer_sign){ ?>
            <img src="<?= \Yii::getAlias('@web');?>/uploads/reportSurvey/sign/<?= $model->engineer_sign_pic ?>" alt="">
            <table autosize="1" width="100%" border="0">
                <tbody>
                    <tr>
                        <th colspan="3" class="text-left">Jurutera Kerosakan DJ</th>
                    </tr>
                   <tr>
                        <td>Nama</td>
                        <td width="10px">
                            :
                        </td>
                        <td>
                            <b><?php echo $model->engineer_name?$model->engineer_name:'' ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td width="50px">Jawatan</td>
                        <td>
                            :
                        </td>
                        <td>
                            <b><?php echo $model->engineer_position?$model->engineer_position:'' ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td>Tarikh</td>
                        <td>
                            :
                        </td>
                        <td>
                            <b><?php echo $model->engineer_sign_time?date('d F Y', strtotime($model->engineer_sign_time)):'' ?></b>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } else { ?>
            <table autosize="1" width="100%" border="0" style="border-top: 1px dotted;">
                <tbody>
                    <tr>
                        <th colspan="3" class="text-left">Jurutera Kerosakan DJ</th>
                    </tr>
                   <tr>
                        <td>Nama</td>
                        <td width="10px">
                            :
                        </td>
                        <td>
                            <b><?php echo $model->engineer_name?$model->engineer_name:'' ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td width="50px">Jawatan</td>
                        <td>
                            :
                        </td>
                        <td>
                            <b><?php echo $model->engineer_position?$model->engineer_position:'' ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td>Tarikh</td>
                        <td>
                            :
                        </td>
                        <td>
                            <b><?php echo $model->engineer_sign_time?date('d F Y', strtotime($model->engineer_sign_time)):'' ?></b>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>

    
    <div style="width:40%; float:right;margin-right: 40px;">
        <?php if ($model->commander_sign){ ?>
            <img src="<?= \Yii::getAlias('@web');?>/uploads/reportSurvey/sign/<?= $model->commander_sign_pic ?>" alt="">
            <table autosize="1" width="100%" border="0">
                <tbody>
                    <tr>
                        <th colspan="3" class="text-left">Komander FIC</th>
                    </tr>
                   <tr>
                        <td>Nama</td>
                        <td width="10px">
                            :
                        </td>
                        <td>
                            <b><?php echo $model->commander_name?$model->commander_name:'' ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td width="50px">Jawatan</td>
                        <td>
                            :
                        </td>
                        <td>
                            <b><?php echo $model->commander_position?$model->commander_position:'' ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td>Tarikh</td>
                        <td>
                            :
                        </td>
                        <td>
                            <b><?php echo $model->commander_sign_time?date('d F Y', strtotime($model->commander_sign_time)):'' ?></b>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } else { ?>
            <table autosize="1" width="100%" border="0" style="border-top: 1px dotted;">
                <tbody>
                    <tr>
                        <th colspan="3" class="text-left">Komander FIC</th>
                    </tr>
                   <tr>
                        <td>Nama</td>
                        <td width="10px">
                            :
                        </td>
                        <td>
                            <b><?php echo $model->commander_name?$model->commander_name:'' ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td width="50px">Jawatan</td>
                        <td>
                            :
                        </td>
                        <td>
                            <b><?php echo $model->commander_position?$model->commander_position:'' ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td>Tarikh</td>
                        <td>
                            :
                        </td>
                        <td>
                            <b><?php echo $model->commander_sign_time?date('d F Y', strtotime($model->commander_sign_time)):'' ?></b>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>

<div style="margin-top: 20px;position: fixed; bottom: 0px;text-align: center;width: 100%;">

    <p style="margin:0 0 10 0px; font-size:12px">MUKA SURAT J15B-1 DARI J15B-1</p>
    <h4 style="margin: 0px">SULIT</h4>
</div>
