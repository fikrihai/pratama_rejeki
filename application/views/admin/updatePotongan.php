<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
    <div class="card" style="width:50%;">
        <div class="card-body">
        <?php foreach ($pot_gaji as $p) : ?>
            <form method="post" action="<?php echo base_url('admin/potonganGaji/updateDataAksi/'.$p->id) ?>">
                <div class="form-group">
                    <label>Jenis Potongan</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $p->id ?>">
                    <input type="text" name="potongan" class="form-control" value="<?php echo $p->potongan ?>">
                    <?php echo form_error('potongan')?>
                </div>
                <div class="form-group">
                    <label>Jumlah Potongan</label>
                    <input type="number" name="jml_potongan" class="form-control" value="<?php echo $p->jml_potongan ?>">
                    <?php echo form_error('jml_potongan')?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <?php endforeach; ?> 
        </div>
    </div>



</div>