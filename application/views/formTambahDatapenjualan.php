<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card " style="width:50%;margin-bottom: 80px;">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('DataPenjualan/tambahDataAksi') ?>">
                <div class="form-group">
                    <label>Tanggal Dana Masuk</label>
                    <input type="date" name="tglDanaMasuk" id="tglDanaMasuk" class="form-control">
                    <?php echo form_error('tglDanaMasuk', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>nama_barang</label>
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
                    <input type="text" name="hargaBeli" id="hargaBeli" class="form-control"  >
                </div>
                <div class="form-group">
                    <label>Jumlah Harga Beli</label>
                    <input type="text" name="jmlHargaBeli" id="jmlHargaBeli" class="form-control"  >
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
                <div class="form-group">
                    <label>Fee Market Place</label>
                    <input type="text" name="feeMarket" id="feeMarket" class="form-control"  >
                </div>
                <div class="form-group">
                    <label>Total Pendapatan</label>
                    <input type="text" name="totalPendapatan" id="totalPendapatan" class="form-control"  >
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
    <script>
        $(document).ready(function() {
            $("#totalItem").change(function() {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url("index.php/DataPenjualan/listHarga") ?>",
                    data: {
                        namaBarang: $("#namaBarang").val(),
                        totalItem: $("#totalItem").val()
                    },
                    dataType: "json",
                    beforeSend: function(e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8")
                        }
                    },
                    success: function(response) {
                        $("#hargaBeli").val(response.harga_beli);
                        $("#hargaJual").val(response.harga_jual);
                        $("#jmlHargaBeli").val(response.jml_harga_beli);
                        $("#jmlHargaJual").val(response.jml_harga_jual);
                    },
                    error: function(xhr, ajaxOptions, throwError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                    }
                });
            });
            $("#marketplace").change(function() {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url("index.php/DataPenjualan/feeMarket") ?>",
                    data: {
                        marketplace: $("#marketplace").val(),
                        jmlHargaJual: $("#jmlHargaJual").val(),
                        jmlHargaBeli: $("#jmlHargaBeli").val()
                    },
                    dataType: "json",
                    beforeSend: function(e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8")
                        }
                    },
                    success: function(response) {
                        $("#feeMarket").val(response.fee);
                        $("#totalPendapatan").val(response.totalPendapatan);
                    },
                    error: function(xhr, ajaxOptions, throwError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
                    }
                });
            });
        });
    </script>

</div>
<!--end Begin Page Content -->