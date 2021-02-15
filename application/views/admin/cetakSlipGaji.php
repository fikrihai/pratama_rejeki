<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title ?></title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: black;
        }
    </style>
</head>

<body>

    <center>
        <h1>PT.FIKRI PRATAMA</h1>
        <h3>Slip Gaji Karyawan</h3>
        <hr style="width: 50%; border-width: 5px; color: black;">
    </center>
    <?php
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $pegawai = $this->input->post('pegawai');
    ?>
    <?php foreach ($potongan as $p) {
                $pot_alpha = $p->jml_potongan;
            } ?>
            <?php  
            foreach ($slip_gaji as $l) : ?>
                <?php $potongan = $l->alpha * $pot_alpha;
                $total = $l->tj_transport + $l->uang_makan + $l->gaji_pokok - $potongan
                ?>
    <table style="width: 100%;">
        <tr>
            <td width="15%">Nama Karyawan</td>
            <td width="2%">:</td>
            <td><?php echo $pegawai ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?php  echo $l->jabatan; ?></td>
        </tr>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?php echo $bulan ?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?php echo $tahun ?></td>
        </tr>
    </table>

    <table class="table table-bordered mt-3 ">
        <tr>
            <th class="text-center" style="width: 5%;">No</th>
            <th class="text-center" style="width: 50%;">Keterangan</th>
            <th class="text-center" style="width: 45%;">Jumlah</th>
        <tr>
            

        <tr>
            <td>1</td>
            <td>Gaji Pokok</td>
            <td>Rp. <?php echo number_format($l->gaji_pokok, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Tunjangan Transport</td>
            <td>Rp. <?php echo number_format($l->tj_transport, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Tunjangan Makan</td>
            <td>Rp. <?php echo number_format($l->uang_makan, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Potongan</td>
            <td>Rp. <?php echo number_format($pot_alpha, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <th colspan="2" class="text-right">total Gaji</th> 
            <th>Rp. <?php echo number_format($total, 0, ',', '.') ?></th>
        </tr>
    
    </table>

    <table width=100%>
        <tr>
            <td>
            </td>
            <td>
                <p><br> Pegawai</p>
                <br>
                <br>
                <p class="font-weight-bold"><?php echo $pegawai ?></p>
            </td>
            <td width="200px">
                <p>Jakarta, <?php echo date("d M Y") ?> <br> HRD</p>
                <br>
                <br>
                <p>__________________</p>
            </td>
        </tr>

    </table>
    <?php endforeach; ?>
</body>

</html>

<script type="text/javascript">
    window.print();
</script>