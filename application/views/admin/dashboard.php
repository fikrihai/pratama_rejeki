<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1> 
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Pegawai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pegawai?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (lifetime)</div>
                                                <?php foreach($pendapatanbersih as $pen):?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?php echo number_format($pen->total,0,',','.')?></div>
                                            <?php endforeach;?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
         
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Saldo Bukalapak</div>
                                <?php foreach($bukalapak as $b):?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?php echo number_format($b->total,0,',','.')?></div>
                            <?php endforeach;?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                        </div>
                    </div> 
                </div>
                 
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Saldo tokped</div>
                                <?php foreach($tokped as $t):?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?php echo number_format($t->total,0,',','.')?></div>
                            <?php endforeach;?>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo base_url ('marketplace/tokped/home')?>"><i class="fas fa-money-bill-wave fa-2x text-gray-300"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Saldo shoppe</div>
                                <?php foreach($shopee as $s):?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?php echo number_format($s->total,0,',','.')?></div>
                            <?php endforeach;?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->