<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Input Data Absensi Pegawai
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="staticEmail2" class=" ">Bulan : </label>
                    <select name="bulan" id="" class="form-control ml-3">
                        <option value="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group  mb-2 ml-5">
                    <label for="staticEmail2" class=" ">Tahun : </label>
                    <select name="tahun" id="" class="form-control ml-3">
                        <option value="">--Pilih Tahun--</option>
                        <?php $tahun = date('Y');
                        for ($i = $tahun; $i < $tahun + 5; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Generate Data</button>
            </form>
        </div>
    </div>
    <?php

    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan . $tahun;
    } else {
        $bulan =  date('m');
        $tahun = date('Y');
        $bulantahun = $bulan . $tahun;
    }

    ?>
    <div class="alert alert-info">
        Menampilkan Data Kehadiran Pegawai Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div>

    <form method="POST">
        <table class="table table-bordered mt-2 ">
            <tr>
                <th class="text-center">No Rekap</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nama Karyawan</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center" width="8%">Hadir</th>
                <th class="text-center" width="8%">Sakit</th>
                <th class="text-center" width="8%">Alpha</th>
            <tr>
                <?php $no = 1;
                foreach ($input_absensi as $a) : ?>
            <tr>
                 <input type="hidden" name="bulan[]" id="" class="form-control" value="<?php echo $bulantahun ?>"> 
                 <input type="hidden" name="nik[]" id="" class="form-control" value="<?php echo $a->nik ?>">  
                 <input type="hidden" name="nama_pegawai[]" id="" class="form-control" value="<?php echo $a->nama_pegawai ?>">  
                 <input type="hidden" name="jenis_kelamin[]" id="" class="form-control" value="<?php echo $a->jenis_kelamin ?>">  
                 <input type="hidden" name="nama_jabatan[]" id="" class="form-control" value="<?php echo $a->nama_jabatan ?>">  
                <td><?php echo $no++ ?></td>
                <td><?php echo $a->nik ?></td>
                <td><?php echo $a->nama_pegawai ?></td>
                <td><?php echo $a->jenis_kelamin ?></td>
                <td><?php echo $a->nama_jabatan ?></td>
                <td><input type="number" name="hadir[]" id="" class="form-control" value="0"></td>
                <td><input type="number" name="sakit[]" id="" class="form-control" value="0"></td>
                <td><input type="number" name="alpha[]" id="" class="form-control" value="0"></td>
            </tr>

        <?php endforeach; ?>
        </table>
        <button class="btn btn-success" type="submit" name="submit" value="submit"> Simpan</button>
    </form>
</div>
<!--end Begin Page Content -->