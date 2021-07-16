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
                    <th>Nama Produsen</th>
                    <th>Deskripsi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($produsen as $key => $value) {
                ?>
                    <tr idx="<?=$value['id_produsen'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['nama'];?></td>
                        <td><?=$value['alamat'];?></td>
                        <td> 
                            <a data-target="#modal-admin" data-backdrop="static" data-toggle="modal" class="update btn btn-sm btn-white text-black"><i class="fa fa-pencil-square-o fa-lg"></i></a>  
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
      <div class="modal-dialog modal-md">

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
                
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Nama Produsen</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="nama" placeholder="Nama Produsen">
                  <input type="hidden" class="form-control" required id="id" name="id_produsen" value=0>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Alamat</label>
                  <div class="col-sm-8">
                    <textarea name="alamat" class="form-control"></textarea>
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
    <!-- /.panel-body -->
</div>


