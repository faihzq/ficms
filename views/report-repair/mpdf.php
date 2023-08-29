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
    <h4 class="text-right" style="margin: 0px; margin-right: 20px;">JADUAL 15C</h4>
    <h4 style="margin: 0px">TENTERA LAUT DIRAJA MALAYSIA<br>FAST INTERCEPTOR CRAFT</h4>
</div>
<hr>
<div class="text-center">
    <h4><u>LAPORAN PEMBAIKAN KEROSAKAN DALAM JAMINAN</u></h4>
</div>
<div class="indent-main">
    Merujuk Kepada :<br>
    <table style="margin-left: 15px" border="0" width="100%">
        <tr>
            <td width="30px">
                a.
            </td>
            <td>
                No. Laporan Kerosakan Dalam Jaminan (KDJ) / Tarikh
            </td>
            <td width="10px">
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->reportSurvey->reportDamage->report_no ?></b>
            </td>
        </tr>
        <tr>
            <td>
                b.
            </td>
            <td>
                No. Laporan Kajian KDJ / Tarikh
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->reportSurvey->report_no ?></b>
            </td>
        </tr>
    </table>
    <table border="0" style="margin-top: 10px;">
        <tr>
            
            <td width="150px">
                Hull No/FIC No
            </td>
            <td width="10px">
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->reportSurvey->reportDamage->boat->boat_name ?></b>
            </td>
        </tr>
        <tr>
            
            <td>
                Tarikh
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo date('d F Y', strtotime($model->report_date)) ?></b>
            </td>
        </tr>
    </table>
    
    <table width="100%" border="0" style="margin-left: 50px;margin-top: 20px;">
        <tr>
            <td width="40px">
                1.
            </td>
            <td width="250px">
                No. Laporan Pembetulan KDJ
            </td>
            <td width="10px">
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->report_no ?></b>
            </td>
        </tr>
        <tr>
            <td rowspan="2" style="vertical-align: top;">
                2.
            </td>
            <td colspan="3">
                Keterangan Perkhidmatan KDJ:
            </td>
        </tr>
        <tr>
            <td colspan="3" height="80px" style="vertical-align: top;">
                <p style="border-bottom: 1px dotted;"><b><?php echo nl2br($model->service_description) ?></b></p>
            </td>
        </tr>
        <tr>
            <td rowspan="2" style="vertical-align: top;">
                3.
            </td>
            <td colspan="3">
                Alat Ganti, Alat Sokongan dan Peralatan Pengujian yang digunakan:
            </td>
        </tr>
        <tr>
            <td colspan="3" height="80px" style="vertical-align: top;">
                <p style="border-bottom: 1px dotted;"><b><?php echo nl2br($model->tools_need) ?></b></p>
            </td>
        </tr>
        <tr>
            <td rowspan="2" style="vertical-align: top;">
                4.
            </td>
            <td colspan="3">
                Baki tempoh jaminan bahagian atau item yang diperbaiki:
            </td>
        </tr>
        <tr>
            <td colspan="3" height="80px" style="vertical-align: top;">
                <p style="border-bottom: 1px dotted;"><b><?php echo $model->remainingTime ?></b></p>
            </td>
        </tr>
        <tr>
            <td>
                5.
            </td>
            <td>
                Tarikh Tamat Tempoh Jaminan
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo date('d F Y', strtotime($model->warranty_expiration_date)) ?></b>
            </td>
        </tr>

    </table>

    
</div>
<div class="indent-main">
    <div style="width:40%; float:left; margin-top: 75px;">
        <?php if ($model->engineer_sign){ ?>
            <img src="<?= \Yii::getAlias('@web');?>/uploads/reportRepair/sign/<?= $model->engineer_sign_pic ?>" alt="">
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
            <img src="<?= \Yii::getAlias('@web');?>/uploads/reportRepair/sign/<?= $model->commander_sign_pic ?>" alt="">
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

    <p style="margin:0 0 10 0px; font-size:12px">MUKA SURAT J15C-1 DARI J15C-1</p>
    <h4 style="margin: 0px">SULIT</h4>
</div>
