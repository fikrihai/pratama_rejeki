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
        <h2>Laporan Kehadiran Pegawai</h2>
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

    <table class="table table-bordered mt-2 ">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Pegawai</th> 
            <th class="text-center">Jabatan</th> 
            <th class="text-center">Hadir</th>
            <th class="text-center">Sakit</th>
            <th class="text-center">Alpha</th> 
        <tr>
            
            <?php $no = 1;
            foreach ($lap_absensi as $l) : ?> 
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $l->nik ?></td>
            <td><?php echo $l->nama_pegawai ?></td>
            <td><?php echo $l->nama_jabatan ?></td> 
            <td><?php echo $l->hadir ?></td> 
            <td><?php echo $l->sakit ?></td>
            <td><?php echo $l->alpha ?></td>  
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