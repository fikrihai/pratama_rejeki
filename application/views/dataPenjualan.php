<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data penjualan
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="staticEmail2" class=" ">Bulan : </label>
                    <select name="bulan" id="" class="form-control ml-3">
                        <option value="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group  mb-2 ml-5">
                    <label for="staticEmail2" class=" ">Tahun : </label>
                    <select name="tahun" id="" class="form-control ml-3">
                        <option value="">--Pilih Tahun--</option>
                        <?php $tahun = date('Y');
                        for ($i = $tahun; $i < $tahun + 5; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                <a href="<?php echo base_url('Datapenjualan/tambahData') ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-plus"></i>Input Penjualan</a>
            </form>
        </div>
    </div>
    <?php

    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan . $tahun;
    } else {
        $bulan =  date('m');
        $tahun = date('Y');
        $bulantahun = $bulan . $tahun;
    }

    ?>
    <div class=" alert alert-info">
        Menampilkan Data Penjualan Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div>

    <?php

    $jml_data = count($penjualan);
    if ($jml_data > 0) {
    ?>

        <form class="form-inline mb-1">
            <input id="myInput" type="text" placeholder="Search.." class="ml-auto">
        </form>
        <div class="card shadow" style="margin-bottom: 100px;">
            <!--mulai table -->
            <div class="card-body">
                <div class="table-responsive-xl" style="overflow: auto;">
                    <table  class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <thead >
                            <tr class="bg-primary text-white"> 
                                <th class="text-center">Status</th>
                                <th class="text-center" >Tanggal Dana Masuk</th>
                                <th class="text-center">invoice</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Jml Item</th>
                                <th class="text-center">harga Beli</th>
                                <th class="text-center">Jumlah Harga Beli</th>
                                <th class="text-center">Harga Jual</th>
                                <th class="text-center">Jumlah Harga Jual</th>
                                <th class="text-center">MarketPlace</th>
                                <th class="text-center">Fee MarketPlace</th>
                                <th class="text-center">Total Pendapatan</th>
                                <th class="text-center">Tanggal Penjualan</th>
                            <tr>
                        </thead>
                        <tbody id="myTable">
                            <?php $no = 1;
                            foreach ($penjualan as $p) : ?>
                                <tr> 
                                    <?php if ($p->Status == '1') { ?>
                                        <td>Sudah Kirim</td>
                                    <?php } else if ($p->Status == '2') { ?>
                                        <td>Sudah Sampai</td>
                                    <?php } else if ($p->Status == '3') { ?>
                                        <td>Sudah Konfrim</td>
                                    <?php } else if ($p->Status == '4') { ?>
                                        <td>Retur</td>
                                    <?php } ?>
                                    <td><?php echo $p->tanggal_dana_masuk ?></td>
                                    <td><?php echo $p->invoice ?></td>
                                    <td><?php echo $p->nama_barang ?></td>
                                    <td><?php echo $p->total_item ?></td>
                                    <td>Rp.<?php echo number_format($p->harga_beli, 0, ',', '.') ?></td>
                                    <td>Rp.<?php echo number_format($p->jumlah_harga_beli, 0, ',', '.') ?></td>
                                    <td>Rp.<?php echo number_format($p->harga_jual, 0, ',', '.') ?></td>
                                    <td>Rp.<?php echo number_format($p->jumlah_harga_jual, 0, ',', '.') ?></td>
                                    <td><?php echo $p->marketplace ?></td>
                                    <td>Rp.<?php echo number_format($p->fee_marketplace, 0, ',', '.') ?></td>
                                    <td>Rp.<?php echo number_format($p->total_pendapatan, 0, ',', '.') ?></td>
                                    <td><?php echo $p->tgl_penjualan ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <?php foreach ($total as $tot) : ?>
                                <tr>
                                    <th colspan="10">total pendapatan kotor</th>
                                    <th colspan="10" class="text-center">Rp.<?php echo number_format($tot->tk, 0, ',', '.') ?></th>
                                </tr>
                                <tr>
                                    <th colspan="10">total pendapatan bersih</th>
                                    <th colspan="10" class="text-center">Rp.<?php echo number_format($tot->tb, 0, ',', '.') ?></th>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end table -->
    <?php
    } else { ?> <span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data Masih Kosong, Silahkan input data penjualan pada bulan dan tahun yang ada pilih</span>

    <?php
    }
    ?>
</div>
<!--end Begin Page Content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        }); 
    });
</script>