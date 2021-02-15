<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card " style="width:50%;margin-bottom: 80px;">
        <div class="card-body">
        <?php foreach($saldo as $s):?>
            <form method="POST" action="<?php echo base_url('admin/DataSaldo/tambahDataAksi') ?>">
                <div class="form-group">
                    <label>MarketPlace</label>
                    <select name="marketplace" class="form-control">
                        <option value="<?php echo $s->marketplace?>"><?php echo $s->marketplace?></option>
                        <?php foreach($market as $m):?>
                        <option value="<?php echo $m->marketplace?>"><?php echo $m->marketplace?></option> 
                        <?php endforeach;?>
                    </select>
                    <?php echo form_error('marketplace', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Saldo</label>
                    <input type="number" name="saldo" class="form-control" value="<?php echo $s->saldo?>">
                    <?php echo form_error('saldo', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <select name="keterangan" id="keterangan" class="form-control">
                    <option value="<?php echo $s->keterangan?>"><?php echo $s->keterangan?></option>
                    <option value="saldo masuk">Saldo Masuk</option>
                    <option value="saldo keluar">Saldo Keluar</option>
                    </select>
                    <?php echo form_error('keterangan', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?php echo $s->tanggal?>"> 
                    <?php echo form_error('tanggal', '<div class="text-small text-danger"></div>') ?>
                </div>
                <button type="submit" class="btn btn-success ">Submit</button> 
            </form>
            <?php endforeach;?>
        </div>
    </div>


</div>
<!--end Begin Page Content -->