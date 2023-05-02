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
    <p>Rujukan kepada No. Laporan Kerosakan Dalam Jaminan (DJ) / Tarikh : <?php echo $model->reportDamage->report_no ?><br>
    Hull No./FIC No : <?php echo $model->reportDamage->boat->boat_name ?><br>
    Tarikh : <?php echo date('d F Y', strtotime($model->report_date)) ?></p>

    <ol type="1">
        <li>No. Laporan Kajian DJ : <?php echo $model->report_no ?></li>
        <li>Tarikh Kajian : <?php echo date('d F Y', strtotime($model->survey_date)) ?></li>
        <li>Keterangan Kerosakan : <?php echo $model->damage_description ?></li>
        <li>Sebab Kemungkinan : <?php echo $model->probable_cause ?></li>
        <li>Jaminan Perlindungan : <?php echo $model->warrantyProtection ?>
            <ul>
                <li style="margin-bottom: 100px;">Sebab jika TIDAK :<br><?php echo $model->nowarranty_protection_reason ?></li>
            </ul>
        </li>
        <li style="margin-bottom: 100px;">Cadangan Pembetulan : <?php echo $model->suggested_correction ?></li>
        <li style="margin-bottom: 100px;">Keperluan Alat Ganti, Alat Sokongan dan Peralatan Pengujian : <?php echo $model->tools_need ?></li>
    </ol>
    

    
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

    <p style="margin:0 0 10 0px; font-size:12px">MUKA SURAT J15B-1 DARI J15B-1</p>
    <h4 style="margin: 0px">SULIT</h4>
</div>
