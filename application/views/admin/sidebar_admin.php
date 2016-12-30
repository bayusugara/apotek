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
                        <li>
                            <a href="<?=base_url();?>admin/fasilitas/"><i class="fa fa-cubes fa-fw"></i> Fasilitas</a>
                        </li>
                        <li>
                            <a href="<?=base_url();?>admin/provider/"><i class="fa fa-institution fa-fw"></i> Penyedia Lapang</a>
                        </li>
                        <li>
                            <a href="<?=base_url();?>admin/customer/"><i class="fa fa-users fa-fw"></i> Penyewa</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Report<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=base_url();?>admin/report/transaksi">Report Transasksi</a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/report/penyewa">Report Penyewa</a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>admin/report/provider">Report Provider</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?=base_url();?>admin/backup_restore/"><i class="fa fa-database fa-fw"></i> Backup & Restore</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>