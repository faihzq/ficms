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
    .text-left {
      text-align: left;
    }
</style>

<div class="text-center">
    <h4 style="margin: 0px">SULIT</h4>
    <h4 class="text-right" style="margin: 0px; margin-right: 20px;">JADUAL 17A</h4>
    <h4 style="margin: 0px">TENTERA LAUT DIRAJA MALAYSIA<br>FAST INTERCEPTOR CRAFT</h4>
</div>
<hr>
<div class="text-center">
    <h4><u>BORANG PENDAFTARAN LATERN DEFECT</u></h4>
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
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;"><b><?php echo $model->contract_no ?></b></td>
        </tr>
        <tr>
            <td>Hull No./FIC No</td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;"><b><?php echo $model->boat->boat_name ?></b></td>
        </tr>
        <tr>
            <td>Tarikh</td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;"><b><?php echo date('d F Y', strtotime($model->report_date)) ?></b></td>
        </tr>
    </table>
    

    <p style="margin-bottom:0">Pemberitahuan pendaftaran Latern Defect (LD) sebagaimana ditentukan dalam Klausa 23.</p>

    <table style="margin-left: 20px; margin-bottom: 10px;" border="0" width="100%">
        <tr>
            <td width="15px">
                1.
            </td>
            <td colspan="2">
                No. Lapor LD
            </td>
            <td width="20px">
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
                Tarikh Kerosakan
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo date('d F Y', strtotime($model->damage_date)) ?></b>
            </td>
        </tr>
        <tr>
            <td>
                3.
            </td>
            <td colspan="2">
                Lokasi FIC terkini
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->location->name ?></b>
            </td>
        </tr>
        <tr>
            <td rowspan="5" style="vertical-align: top;">
                4.
            </td>
            <td colspan="2">
                Butir-butir Peralatan
            </td>
            <td>
                :
            </td>
        </tr>
        <tr>
            <td width="40px" class="text-right">
                a.
            </td>
            <td width="120px">
                No SEL/ESWBS
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->sel_no ?></b>
            </td>
        </tr>
        <tr>
            <td class="text-right">
                b.
            </td>
            <td>
                No Siri Peralatan
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->equipment_serial ?></b>
            </td>
        </tr>
        <tr>
            <td class="text-right">
                c.
            </td>
            <td>
                Lokasi Peralatan
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->equipmentLocation->name ?></b>
            </td>
        </tr>
        <tr>
            <td class="text-right">
                d.
            </td>
            <td>
                Running Hours
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->running_hours ?> jam</b>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;" rowspan="2">
                5.
            </td>
            <td colspan="4">
                Keterangan pendaftaran LD (Sila sertakan Lampiran/Gambar sekiranya ruang tidak mencukupi):
            </td>
        </tr>
        <tr>
            <td colspan="4" height="50px" style="vertical-align: top;">
                <p style="border-bottom: 1px dotted;"><b><?php echo nl2br($model->damage_information) ?></b></p>
            </td>
        </tr>
        <tr>
            <td class="text-right" rowspan="3" style="vertical-align: top">
                6.
            </td>
            <td colspan="4">
                Pegawai/anggota yang boleh dihubungi :
            </td>
        </tr>
        <tr>
            <td class="text-right">
                a.
            </td>
            <td>
                No/Pangkat/nama
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo nl2br($model->contact_officer_name) ?></b>
            </td>
        </tr>
        <tr>
            <td class="text-right">
                b.
            </td>
            <td>
                No Tel
            </td>
            <td>
                :
            </td>
            <td style="border-bottom: 1px dotted;">
                <b><?php echo $model->contact_officer_tel ?></b>
            </td>
        </tr>
    </table>
</div>


<div class="indent-main">
    <div style="width:40%; float:left;margin-right: 40px;">
        <?php if ($model->status_id == 2){ ?>
            <img src="<?= \Yii::getAlias('@web');?>/uploads/report17Defect/sign/<?= $model->commander_sign_pic ?>" alt="">
            <table autosize="1" width="100%" border="0">
                <tbody>
                    <tr>
                        <th colspan="3" class="text-left">Tandatangan Komander FIC</th>
                    </tr>
                   <tr>
                        <td>Nama</td>
                        <td width="10px">
                            :
                        </td>
                        <td style="border-bottom: 1px dotted;">
                            <b><?php echo $model->commander_name?$model->commander_name:'' ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td>Pangkat</td>
                        <td>
                            :
                        </td>
                        <td style="border-bottom: 1px dotted;">
                            <b><?php echo $model->commander_rank?$model->commander_rank:'' ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td width="50px">Jawatan</td>
                        <td>
                            :
                        </td>
                        <td style="border-bottom: 1px dotted;">
                            <b><?php echo $model->commander_position?$model->commander_position:'' ?></b>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        <?php } else { ?>
            <table style="border-top:  1px dotted black;margin-top: 100px;" autosize="1" width="100%" border="0">
                <tbody>
                    <tr>
                        <th colspan="3" class="text-left">Tandatangan Komander FIC</th>
                    </tr>
                   <tr>
                        <td>Nama</td>
                        <td width="10px">
                            :
                        </td>
                        <td style="border-bottom: 1px dotted;">
                            <b><?php echo $model->commander_name?$model->commander_name:'' ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td>Pangkat</td>
                        <td>
                            :
                        </td>
                        <td style="border-bottom: 1px dotted;">
                            <b><?php echo $model->commander_rank?$model->commander_rank:'' ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td width="50px">Jawatan</td>
                        <td>
                            :
                        </td>
                        <td style="border-bottom: 1px dotted;">
                            <b><?php echo $model->commander_position?$model->commander_position:'' ?></b>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
        
    </div>
</div>

<div style="margin-top: 20px;position: fixed; bottom: 0px;text-align: center;width: 100%;">

    <p style="margin:0 0 10px 0px; font-size:12px">MUKA SURAT J17A-1 DARI J17A-1</p>
    <h4 style="margin: 0px">SULIT</h4>
</div>
