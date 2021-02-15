<!-- Begin Page Content -->
<div class="container-fluid" style="margin-bottom: 100px;">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('admin/DataSaldo/tambahData') ?>"><i class="fas fa-plus"></i>Tambah transaksi saldo</a>
    <?php echo $this->session->flashdata('pesan') ?> 
    <div class="card shadow mb-4">
        <!--mulai table -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th> 
                            <th class="text-center">MarketPlace</th>
                            <th class="text-center">Saldo</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">tanggal</th>
                            <th class="text-center">Acction</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($saldo as $s) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $s->marketplace ?></td>
                                <td>Rp.<?php echo number_format($s->saldo, 0, ',', '.')  ?></td>
                                <td><?php echo $s->keterangan ?></td>
                                <td><?php echo $s->tanggal ?></td>
                                <td>
                                    <center>
                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/DataSaldo/updateData/' . $s->id) ?>"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/DataSaldo/deleteData/' . $s->id) ?>"><i class="fas fa-trash"></i></a>
                                    </center>
                                </td>
                            </tr>
 
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end table -->

</div>
<!--end Begin Page Content -->