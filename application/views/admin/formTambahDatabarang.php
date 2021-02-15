<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card " style="width:50%;margin-bottom: 80px;">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/DataBarang/tambahDataAksi') ?>">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="namaBarang" class="form-control">
                    <?php echo form_error('namaBarang', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Harga Beli</label>
                    <input type="text" name="hargaBeli" class="form-control">
                    <?php echo form_error('hargaBeli', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="text" name="hargaJual" class="form-control">
                    <?php echo form_error('hargaJual', '<div class="text-small text-danger"></div>') ?>
                </div>
                <button type="submit" class="btn btn-success ">Submit</button>

            </form>
        </div>
    </div>


</div>
<!--end Begin Page Content -->