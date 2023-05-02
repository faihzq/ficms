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
    <h4 class="text-right" style="margin: 0px; margin-right: 20px;">JADUAL 15A</h4>
    <h4 style="margin: 0px">TENTERA LAUT DIRAJA MALAYSIA<br>FAST INTERCEPTOR CRAFT</h4>
</div>
<hr>
<div class="text-center">
    <h4><u>BORANG PELAPORAN KEROSAKAN DALAM JAMINAN</u></h4>
</div>
<div class="indent-main">
    <p>Perhatian Kepada :<br><br>
    <b>Pengarah Operasi<br>
    GADING MARINE INDUSTRY SDN. BHD.<br>
    Lot A2, Lumut Port Industrial Park<br>
    Mukim Lumut<br>Jalan Kampung Acheh<br>32000 SITIAWAN<br>Perak</b></p>

    <table style="margin-bottom:15px">
        <tr>
            <td>Tel No.</td>
            <td>: (03) - 41626226</td>
        </tr>
        <tr>
            <td>Fax No.</td>
            <td>: (03) - 41625226</td>
        </tr>
    </table>
    <table style="margin-bottom:15px">
        <tr>
            <td>No. Kontrak</td>
            <td>: <b><?php echo $model->contract_no ?></b></td>
        </tr>
        <tr>
            <td>Hull No./FIC No</td>
            <td>: <?php echo $model->boat->boat_name ?></td>
        </tr>
        <tr>
            <td>Tarikh</td>
            <td>: <?php echo date('d F Y', strtotime($model->report_date)) ?></td>
        </tr>
    </table>
    

    <p>Pemberitahuan kerosakan bahagian atau barang Dalam Jaminan (DJ) sebagaimana ditentukan dalam Klausa 22.</p>

    
    <ol type="1">
        <li>No. Lapor DJ : <?php echo $model->report_no ?></li>
        <li>Tarikh Kerosakan : <?php echo date('d F Y', strtotime($model->damage_date)) ?></li>
        <li>Lokasi FIC terkini : <?php echo $model->boat_location ?></li>
        <li>Butir-butir Peralatan :
            <ol type="a">
                <li>No SEL/ESWBS : <?php echo $model->sel_no ?></li>
                <li>No Siri Peralatan : <?php echo $model->equipment_serial ?></li>
                <li>Lokasi Peralatan : <?php echo $model->equipment_location ?></li>
                <li>Running Hours : <?php echo $model->equipment_location ?></li>
            </ol>
        </li>
        <li style="margin-bottom: 100px;">Keterangan Kerosakan DJ (Sila sertakan Lampiran/Gambar sekiranya ruang tidak mencukupi): <br><?php echo $model->damage_information ?>
        </li>
        <li style="margin-bottom: 100px;">Pegawai/anggota yang boleh dihubungi :
            <ol>
                <li>No/Pangkat/nama : <?php echo $model->contact_officer_name ?></li>
                <li>No Tel : <?php echo $model->contact_officer_tel ?></li>
            </ol>
        </li>
    </ol>
            
    
    

    
</div>


<div class="indent-main">
    <div style="width:40%; float:left;margin-right: 40px;">
        <table style="border-top:  1px dashed black;" cellpadding="5px" autosize="1" width="100%">
            <thead>
                <tr>
                    <th>Tandatangan Komander FIC</th>
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
                    <td>Tarikh: <?php echo $model->sign_time?date('d F Y', strtotime($model->sign_time)):'' ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div style="margin-top: 20px;position: fixed; bottom: 0px;text-align: center;width: 100%;">

    <p style="margin:0 0 10px 0px; font-size:12px">MUKA SURAT J15A-1 DARI J15A-1</p>
    <h4 style="margin: 0px">SULIT</h4>
</div>
