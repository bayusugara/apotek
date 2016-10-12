<div class="panel panel-default">
    <div class="panel-heading" style="overflow: hidden">
        List Data <?php echo $title; ?> 
    </div>
    
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
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
          <div class="col-md-12">
              <input type="button" class="btn btn-primary pull-right"  value="Save" onclick="post_lapang();"></button>
              
            </div>
            </form>
          </div>
        </div>
        
    </div>
    <!-- /.panel-body -->
</div>


