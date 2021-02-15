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
        <h2>Daftar Gaji Pegawai</h2>
    </center>
    <?php
    $bulan=$this->input->post('bulan');
    $tahun=$this->input->post('tahun');
    ?>
    <table>
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

    <table class="table table-bordered  mt-2 ">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Karyawan</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Tj.Transport</th>
            <th class="text-center">Tj.Uang Makan</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Potongan</th>
            <th class="text-center">Total Gaji</th>
        <tr>
            <?php foreach ($potongan as $p) {
                $alpha = $p->jml_potongan;
            } ?>
            <?php $no = 1;
            foreach ($cetak_gaji as $g) : ?>
                <?php $potongan = $g->alpha * $alpha;
                $total = $g->tj_transport + $g->uang_makan + $g->gaji_pokok - $potongan
                ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $g->nik ?></td>
            <td><?php echo $g->nama_pegawai ?></td>
            <td><?php echo $g->jenis_kelamin ?></td>
            <td><?php echo $g->nama_jabatan ?></td>
            <td>Rp.<?php echo number_format($g->tj_transport, 0, ',', '.') ?></td>
            <td>Rp.<?php echo number_format($g->uang_makan, 0, ',', '.') ?></td>
            <td>Rp.<?php echo number_format($g->gaji_pokok, 0, ',', '.') ?></td>
            <td>Rp.<?php echo number_format($potongan, 0, ',', '.') ?></td>
            <td>Rp.<?php echo number_format($total, 0, ',', '.') ?></td>
        </tr>
    <?php endforeach; ?>
    </table>

    <table width=100%>
        <tr>
            <td></td>
            <td width="200px">
                <p>Jakarta, <?php echo date("d M Y") ?> <br> Finance</p>
                <br>
                <br>
                <p>__________________</p>
            </td>
        </tr>

    </table>

</body>

</html>

<script type="text/javascript">
window.print();
</script>