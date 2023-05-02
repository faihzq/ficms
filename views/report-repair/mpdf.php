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
    <ol type="a">
        <li>No. Laporan Kerosakan Dalam Jaminan (KDJ) / Tarikh : <?php echo $model->reportSurvey->reportDamage->report_no ?></li>
        <li>No. Laporan Kajian KDJ / Tarikh : <?php echo $model->reportSurvey->report_no ?></li>
    </ol>
    
    <p>Hull No/FIC No : <?php echo $model->reportSurvey->reportDamage->boat->boat_name ?><br>
    Tarikh : <?php echo date('d F Y', strtotime($model->report_date)) ?></p>

    <div class="indent">
        <ol type="1">
            <li>No. Laporan Pembetulan KDJ : <?php echo $model->report_no ?></li>
            <li style="margin-bottom: 100px;">Keterangan Perkhidmatan KDJ :<br><?php echo $model->service_description ?></li>
            <li style="margin-bottom: 100px;">Alat Ganti, Alat Sokongan dan Peralatan Pengujian yang digunakan :<br><?php echo $model->tools_need ?></li>
            <li>Baki tempoh jaminan bahagian atau item yang diperbaiki :<br><?php echo $model->remainingTime ?></li>
            <li>Tarikh Tamat Tempoh Jaminan :<?php echo date('d F Y', strtotime($model->warranty_expiration_date)) ?></li>
        </ol>
    </div>

    
</div>
<div class="indent-main">
    <div style="width:40%; float:left; margin-top: 100px;">
        <table style="border-top:  1px dashed black;" cellpadding="5px" autosize="1" width="100%">
            <thead>
                <tr>
                    <th>Jurutera KDJ</th>
                </tr>
            </thead>
            <tbody>
               <tr>
                    <td>Nama: <?php echo $model->engineer_name?$model->engineer_name:'' ?></td>
                </tr>
                <tr>
                    <td>Jawatan: <?php echo $model->engineer_position?$model->engineer_position:'' ?></td>
                </tr>
                <tr>
                    <td>Tarikh: <?php echo $model->engineer_sign_time?date('d F Y', strtotime($model->engineer_sign_time)):'' ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="width:40%; float:right;margin-right: 40px;">
        <table style="border-top:  1px dashed black;" cellpadding="5px" autosize="1" width="100%">
            <thead>
                <tr>
                    <th>Komander FIC</th>
                </tr>
            </thead>
            <tbody>
               <tr>
                    <td>Nama: <?php echo $model->commander_name?$model->commander_name:'' ?></td>
                </tr>
                <tr>
                    <td>Jawatan: <?php echo $model->commander_position?$model->commander_position:'' ?></td>
                </tr>
                <tr>
                    <td>Tarikh: <?php echo $model->commander_sign_time?date('d F Y', strtotime($model->commander_sign_time)):'' ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div style="margin-top: 20px;position: fixed; bottom: 0px;text-align: center;width: 100%;">

    <p style="margin:0 0 10 0px; font-size:12px">MUKA SURAT J15C-1 DARI J15C-1</p>
    <h4 style="margin: 0px">SULIT</h4>
</div>
