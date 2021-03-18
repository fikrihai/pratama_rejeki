<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card " style="width:50%;margin-bottom: 80px;">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('DataPenjualan/tambahDataAksi') ?>">
                <div class="form-group" id="status">
                    <label>Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="">--pilih Status--</option>
                        <option value="1">Sudah Kirim</option>
                        <option value="2">Sudah Sampai</option>
                        <option value="3">Sudah Konfirmasi</option>
                        <option value="4">Return</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Dana Masuk</label>
                    <input type="date" name="tglDanaMasuk" id="tglDanaMasuk" class="form-control">
                    <?php echo form_error('tglDanaMasuk', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Invoice</label>
                    <input type="text" name="invoice" id="invoice" class="form-control">
                    <?php echo form_error('invoice', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <select name="namaBarang" class="form-control" id="namaBarang">
                        <option value="">--pilih barang--</option>
                        <?php foreach ($barang as $b) : ?>
                            <option value="<?php echo $b->nama_barang ?>"><?php echo $b->nama_barang ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('namaBarang', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Total Item</label>
                    <input type="text" name="totalItem" id="totalItem" class="form-control">
                    <?php echo form_error('totalItem', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Harga Beli</label>
                    <input type="text" name="hargaBeli" id="hargaBeli" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jumlah Harga Beli</label>
                    <input type="text" name="jmlHargaBeli" id="jmlHargaBeli" class="form-control">
                </div>
                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="text" name="hargaJual" id="hargaJual" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jumlah Harga Jual</label>
                    <input type="text" name="jmlHargaJual" id="jmlHargaJual" class="form-control">
                </div>
                <div class="form-group">
                    <label>Marketplace</label>
                    <select name="marketplace" class="form-control" id="marketplace">
                        <option value="">--pilih Marketplace--</option>
                        <?php foreach ($market as $m) : ?>
                            <option value="<?php echo $m->marketplace ?>"><?php echo $m->marketplace ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('marketplace', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group" id="bebas">
                    <label>Bebas ongkir</label>
                    <select name="bebasong" class="form-control" id="bebasong">
                        <option value="">--pilih bebas ongkir--</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Fee Market Place</label>
                    <input type="text" name="feeMarket" id="feeMarket" class="form-control">
                </div>
                <div class="form-group">
                    <label>Total Pendapatan</label>
                    <input type="text" name="totalPendapatan" id="totalPendapatan" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tanggal Penjualan</label>
                    <input type="date" name="tglPenjualan" class="form-control">
                    <?php echo form_error('tglPenjualan', '<div class="text-small text-danger"></div>') ?>
                </div>
                <button type="submit" class="btn btn-success ">Submit</button>

            </form>
        </div>
    </div>
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/TambahDatapenjualan.js"> </script>

</div>
<!--end Begin Page Content -->