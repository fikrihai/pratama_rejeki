<!-- Begin Page Content -->
<div class="container-fluid" style="margin-bottom: 100px;">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="mb-2 mt-1 btn btn-sm btn-success" href="<?php echo base_url('admin/DataBarang/tambahData') ?>"><i class="fas fa-plus"></i>Tambah barang</a>
    <?php echo $this->session->flashdata('pesan') ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">ID Barang</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Harga Beli</th>
                            <th class="text-center">Harga Jual</th>
                            <th class="text-center">Accton</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($barang as $b) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $b->id ?></td>
                                <td><?php echo $b->nama_barang  ?></td>
                                <td><?php echo $b->harga_beli ?></td>
                                <td><?php echo $b->harga_jual ?></td>
                                <td>
                                    <center>
                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/DataBarang/updateData/' . $b->id) ?>"><i class="fas fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/Databarang/deleteData/' . $b->id) ?>"><i class="fas fa-trash"></i></a>
                                    </center>
                                </td>
                            </tr>


                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>



<!--end Begin Page Content -->