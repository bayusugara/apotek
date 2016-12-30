<div class="panel panel-default">
    <div class="panel-heading" style="overflow: hidden">

        <a data-target="#modal-admin" data-backdrop="static" data-toggle="modal" style="padding: 4px" class="btn btn-sm btn-primary text-black pull-right"><i class="fa fa-plus-square-o fa-lg"></i></a>  
    </div>
    
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="col-md-12">
          <a href="<?=base_url();?>admin/backup_restore/backup" class="btn btn-primary">Backup Database</a>
        </div>
        <div class="col-md-12">
        <form name="form-<?php echo $title; ?>" id="galleryForm" method="POST" class=" form-horizontal">
              <div class="form-group">
                <div class="col-sm-10">
                  <input type="file" class="form-control" required="" name="file">
                </div>
                <div class="col-sm-2">
                  <input type="button" class="btn btn-block btn-primary" value="Restore" onclick="restoredb();"></button>
                </div>
              </div>
            </div>
            </form>
          </div>
    </div>
     
    <!-- /.panel-body -->
</div>


