 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        <li>
                            <a href="<?=base_url();?>admin"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                        </li>
                        <?php if($userdata['jabatan']==3 || $userdata['jabatan']==0){
                        ?>
                        <li>
                            <a href="<?=base_url();?>admin/obat/"><i class="fa fa-cubes fa-fw"></i> Obat</a>
                        </li>
                        <?php } ?>
                        <?php if($userdata['jabatan']==0){
                        ?>
                        <li>
                            <a href="<?=base_url();?>admin/produsen/"><i class="fa fa-institution fa-fw"></i> Produsen Obat</a>
                        </li>
                        <?php } ?>
                        <?php if($userdata['jabatan']==3 ||$userdata['jabatan']==2 || $userdata['jabatan']==0){
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-money fa-fw"></i> Transaksi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if($userdata['jabatan']==2 || $userdata['jabatan']==0){
                                    ?>
                                <li>
                                    <a href="<?=base_url();?>admin/transaksi/penjualan">Transasksi Penjualan</a>
                                </li>

                                <?php } ?>
                                <?php if($userdata['jabatan']==3 || $userdata['jabatan']==0){
                                ?>
                                <li>
                                    <a href="<?=base_url();?>admin/transaksi/pembelian">Transasksi Pembelian</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if($userdata['jabatan']==1 || $userdata['jabatan']==0){
                        ?>
                        <li>
                            <a href="<?=base_url();?>admin/pegawai/"><i class="fa fa-user fa-fw"></i> Pegawai</a>
                        </li>
                        <?php } ?>
                        <?php if($userdata['jabatan']==3 ||$userdata['jabatan']==2 || $userdata['jabatan']==0){
                        ?>
                        <li>
                            <a href="<?=base_url();?>admin/customer/"><i class="fa fa-users fa-fw"></i> Pembeli</a>
                        </li>
                        <?php } ?>
                        <?php if($userdata['jabatan']==1 || $userdata['jabatan']==0){
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Report<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=base_url();?>admin/report/transaksi_penjualan">Report Transasksi Penjualan</a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/report/transaksi_pembelian">Report Transasksi Pembelian</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php } ?>
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>