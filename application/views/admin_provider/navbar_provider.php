
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">E-futsal Control Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" id="<?=$provider['id_provider'];?>" data-target="#modal-admin" data-backdrop="static" data-toggle="modal" class="update"><i class="fa fa-user fa-fw"></i> Provider Profil</a>
                        </li>
                        <li><a href="#" id="<?=$userdata['id'];?>" data-target="#modal-change-password" data-backdrop="static" data-toggle="modal" class="change-pass"><i class="fa fa-gear fa-fw"></i> Ganti Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url();?>login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

           
