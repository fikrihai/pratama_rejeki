<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
    <div style="margin-bottom: 80px;">
        <?php $no = 1;
        foreach ($penjualan as $p) : ?>
            <div class="card mb-2">
                <div class="card-header">
                    <label><?php echo $p->marketplace ?> / <?php echo $p->invoice ?> / <?php if ($p->Status == '1') { ?>
                            Sudah Kirim
                        <?php } else if ($p->Status == '2') { ?>
                            Sudah Sampai
                        <?php } else if ($p->Status == '3') { ?>
                            Sudah Konfrim
                        <?php } else if ($p->Status == '4') { ?>
                            Retur
                        <?php } ?> / <?php echo $p->tgl_penjualan ?> </label>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $p->nama_barang ?></h5>
                    <p class="card-text">Total item: <?php echo $p->total_item ?> X Rp. <?php echo number_format($p->harga_jual, 0, ',', '.') ?></p>
                    <p class="card-text">total harga : Rp. <?php echo number_format($p->jumlah_harga_jual, 0, ',', '.') ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
 

</div>
<!--end Begin Page Content -->