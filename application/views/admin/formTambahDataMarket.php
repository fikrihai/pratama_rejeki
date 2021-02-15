<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card " style="width:50%;margin-bottom: 80px;">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/DataMarket/tambahDataAksi') ?>">
                <div class="form-group">
                    <label>Marketplace</label>
                    <input type="text" name="marketplace" class="form-control">
                    <?php echo form_error('marketplace', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>fee</label>
                    <input type="text" name="fee" class="form-control">
                    <?php echo form_error('fee', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Status Toko</label>
                    <select name="statusToko" class="form-control">
                        <option value="">--pilih Status--</option>
                        <option value="1">Aktiv</option>
                        <option value="2">Tutup</option>
                    </select>
                    <?php echo form_error('hargaBeli', '<div class="text-small text-danger"></div>') ?>
                </div> 
                <button type="submit" class="btn btn-success ">Submit</button>

            </form>
        </div>
    </div>


</div>
<!--end Begin Page Content -->