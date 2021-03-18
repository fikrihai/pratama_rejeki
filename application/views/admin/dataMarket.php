<!-- Begin Page Content -->
<div class="container-fluid" style="margin-bottom: 100px;">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('admin/DataMarket/tambahData') ?>"><i class="fas fa-plus"></i>Tambah Marketplace</a>
    <?php echo $this->session->flashdata('pesan') ?> 
    <div class="card shadow mb-4"> <!--mulai table -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Marketplace</th>
                            <th class="text-center">fee</th>
                            <th class="text-center">fee bebas ongkir</th>
                            <th class="text-center">Status Toko</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($market as $m) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $m->marketplace ?></td>
                                <td><?php echo $m->fee ?> %</td>
                                <td><?php echo $m->fee_bebasngkir ?> %</td>
                                <?php if ($m->aktiv == '1') { ?>
                                    <td>Aktif</td>
                                <?php } else { ?>
                                    <td>Tutup</td>
                                <?php } ?>
                                <td>
                                    <center>
                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/DataMarket/updateData/' . $m->id) ?>"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/DataPegawai/deleteData/' . $m->id) ?>"><i class="fas fa-trash"></i></a>
                                    </center>
                                </td>
                            </tr> 
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--end table -->

</div>