<div class="panel panel-default">
    <div class="panel-heading" style="overflow: hidden">
        List Data <?php echo $title; ?>
        <a data-target="#modal-admin" data-backdrop="static" data-toggle="modal" style="padding: 4px" class="btn btn-sm btn-primary text-black pull-right"><i class="fa fa-plus-square-o fa-lg"></i></a>  
    </div>
    
    <!-- /.panel-heading -->
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Penyedia</th>
                    <th>Lokasi</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($provider as $key => $value) {
                ?>
                    <tr idx="<?=$value['id_provider'];?>" id="<?=$value['id'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['nama'];?></td>
                        <td><?=$value['lokasi'];?></td>
                        <td><?=$value['email'];?></td>
                        <td><?php 
                            if($value['status']==0){
                              echo"<div class='label label-danger'>Non active</div>";  
                            }else{
                              echo"<div class='label label-success'>Active</div>";  
                              
                            }
                            ?>
                        </td>
                        <td> 
                            <a data-target="#modal-admin" data-backdrop="static" data-toggle="modal" class="update btn btn-sm btn-white text-black"><i class="fa fa-pencil-square-o fa-lg"></i></a>  
                            <a data-target="#modal-lapang" data-backdrop="static" data-toggle="modal" class="lapangan btn btn-sm btn-white text-black"><i class="fa fa-soccer-ball-o fa-lg"></i></a> 
                            <a data-target="#modal-gallery" data-backdrop="static" data-toggle="modal" class="gallery btn btn-sm btn-white text-black"><i class="fa fa-file-image-o fa-lg"></i></a>
                            <a data-target="#modal-change-password" data-backdrop="static" data-toggle="modal" class="change-pass btn btn-sm btn-white text-black"><i class="fa fa-key fa-lg"></i></a> 
                            <a data-target="#modal-change-password" data-backdrop="static" data-toggle="modal" class="change-pass btn btn-sm btn-white text-black"><i class="fa fa-calendar fa-lg"></i></a>       
                            <a class="delete btn btn-sm btn-white text-red" href="javascript:;"><i class="fa fa-trash-o fa-lg"></i></a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        
    </div>
    <div id="modal-admin" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close-modal">&times;</button>
            <h4 class="modal-title"><?php echo $title; ?> Form<br>
            <small>Tambah, Ubah dan hapus <?php echo $title; ?></small>
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="myForm" method="POST" class=" form-horizontal">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Nama Penyedia</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="nama_penyedia" placeholder="Nama penyedia">
                  <input type="hidden" class="form-control" required id="id" name="id_provider" value=0>
                  <input type="hidden" class="form-control" required name="user_login_id" value=0>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Lokasi</label>
                  <div class="col-sm-8">
                    <textarea name="lokasi" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-8">
                  <input type="email" class="form-control" maxlength="50" required name="email" placeholder="Email">
                  </div>
                </div>
                 <div class="form-group required">
                  <label class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="username" placeholder="Username">
                  </div>
                </div>
                 <div class="form-group password required">
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="password" id="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group password required">
                  <label class="col-sm-3 control-label">Password Confirmation</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="password_conf" id="password_conf" placeholder="Password Confirmation">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Longitude</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" name="longitude" placeholder="Longitude">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Latitude</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" name="latitude" placeholder="Latitude">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Provinsi</label>
                  <div class="col-sm-8">
                  <select name="provinsi" class="form-control" required="">
                    <?php
                      foreach ($provinsi as $key => $value) {
                    ?>
                      <option value="<?=$value['provinsi_id']?>"><?=$value['provinsi_nama']?></option>
                    <?php
                      }
                    ?>
                  </select>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-8">
                  <input type="checkbox" style="margin-top: 10px" name="status" checked>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="fasilitas" style="height:350px;overflow-y: scroll;">

                <label class="control-label">Fasilitas</label>
                <table width="100%" class="table table-striped table-bordered table-hover">
                  <th></th>
                  <th>Fasilitas</th>
                  <?php
                    foreach ($fasilitas as $key => $value) {
                  ?>
                  <tr>
                    <td>
                      <input type="checkbox" name="fasilitas" value="<?=$value['id_fasilitas']?>">
                    </td>
                    <td>
                      <?=$value['nama_fasilitas'];?>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                </table>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default close-modal">Close</button>
            <input type="button" class="btn btn-primary" value="Save" onclick="post_data();"></button>
          </div>
          </form>
        </div>

      </div>
    </div>
    <div id="modal-change-password" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo $title; ?> Form<br>
            <small>Ganti password</small>
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="passwordForm" method="POST" class=" form-horizontal">
            <div class="alert alert-danger" style="display: none">Wrong password</div>
            <div class="row">
                 <div class="form-group password required">
                  <label class="col-sm-3 control-label">Password admin</label>
                  <div class="col-sm-8">
                  <input type="hidden" class="form-control" name="id">
                  <input type="password" class="form-control" maxlength="50" required name="password_admin" placeholder="Password admin">
                  </div>
                </div>
                <div class="form-group password required">
                  <label class="col-sm-3 control-label">New Password</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="new_password" id="new_password" placeholder="Password Confirmation">
                  </div>
                </div>
                <div class="form-group password required">
                  <label class="col-sm-3 control-label">Password Confirmation</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="new_password_conf" id="new_password_conf" placeholder="Password Confirmation">
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="button" class="btn btn-primary" value="Save" onclick="change_pass();"></button>
          </div>
          </form>
        </div>

      </div>
    </div>
    <div id="modal-lapang" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Manage Lapangan<br>
            <small>Tambah, ubah, hapus lapang</small>
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="lapanganForm" method="POST" class=" form-horizontal">

            <input type="hidden" class="form-control" name="id">
            <div class="row">
              <div class="col-md-12">
              <table width="100%" id="tabel-lapangan" class="table table-striped table-bordered table-hover">
                <thead>
                  <th width="10%">Kode</th><th>Harga per jam</th><th>Ukuran</th><th>Jenis</th><th></th>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="button" class="btn btn-primary" value="Save" onclick="post_lapang();"></button>
          </div>
          </form>
        </div>

      </div>
    </div>
    <div id="modal-gallery" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Manage Gallery<br>
            <small>Tambah, ubah, hapus gambar</small>
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="galleryForm" method="POST" class=" form-horizontal">
            <div class="form-group">
              <div class="col-sm-10">
                <input type="file" class="form-control" required="" name="image">
              </div>
              <div class="col-sm-2">
                <input type="button" class="btn btn-block btn-primary" value="Upload" onclick="upload_image();"></button>
              </div>
            </div>
            <input type="hidden" class="form-control" name="id">
            <div class="row">
              <div class="col-md-12 gallery-container" style="margin-top: 20px">
                
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </form>
        </div>

      </div>
    </div>
    <!-- /.panel-body -->
</div>


