<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card " style="width:50%;margin-bottom: 80px;">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/DataPegawai/tambahDataAksi') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="number" name="nik" class="form-control">
                    <?php echo form_error('nik', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control">
                    <?php echo form_error('nama_pegawai', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                    <?php echo form_error('username', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <?php echo form_error('password', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">--pilih jenis kelamin--</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <?php echo form_error('jenis_kelamin', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan" class="form-control">
                        <option value="">--pilih jabatan--</option>
                        <?php foreach ($jabatan as $j) : ?>
                            <option value="<?php echo $j->nama_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('jabatan', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>tanggal masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control">
                    <?php echo form_error('tanggal_masuk', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>status</label>
                    <select name="status" class="form-control">
                        <option value="">--pilih Status--</option>
                        <option value="Pegawai tetap">Pegawai tetap</option>
                        <option value="Pegawai tidak tetap">Pegawai tidak tetap</option>
                    </select>
                    <?php echo form_error('status', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control"> 
                </div>
                <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="hak_akses" class="form-control">
                        <option value="">--Pilih Hak Akses--</option>
                        <option value="1">Admin</option>
                        <option value="2">Pegawai</option>
                    </select>
                    <?php echo form_error('hak_akses', '<div class="text-small text-danger"></div>') ?>
                </div>
                <button type="submit" class="btn btn-success ">Submit</button>

            </form>
        </div>
    </div>


</div>
<!--end Begin Page Content -->