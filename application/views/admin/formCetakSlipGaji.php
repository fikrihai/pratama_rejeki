<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
    <div class="card mx-auto " style="width: 35%;">
        <div class="card-header bg-primary text-white text-center">
            Filter Slip Gaji Pegawai
        </div>
        <form method="POST" action="<?php echo base_url('admin/SlipGaji/cetakSlipGaji') ?>">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Bulan</label>
                    <div class="col-sm-9">
                        <select name="bulan" id="bulan" class="form-control ml-3">
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
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tahun</label>
                    <div class="col-sm-9">
                        <select name="tahun" id="tahun" class="form-control ml-3">
                            <option value="">--Pilih Tahun--</option>
                            <?php $tahun = date('Y');
                            for ($i = $tahun; $i < $tahun + 5; $i++) { ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-9">
                        <select name="pegawai" id="tahun" class="form-control ml-3">
                            <option value="">--Pilih Pegawai--</option>
                            <?php foreach($pegawai as $p): ?>
                                <option value="<?php echo $p->nama_pegawai ?>"><?php echo $p->nama_pegawai ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-print"></i>Cetak Slip Gaji</button>


            </div>
        </form>
    </div>


</div>
<!--end Begin Page Content -->