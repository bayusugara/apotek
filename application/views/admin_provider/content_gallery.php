<div class="panel panel-default">
    <div class="panel-heading" style="overflow: hidden">
        List Data <?php echo $title; ?> 
    </div>
    
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
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
            </form>
          </div>
        </div>
        
    </div>
     <div id="modal-img" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body">
            <div class='img-show'>
            </div>
          </div>
          
          </form>
        </div>

      </div>
    </div>
    <!-- /.panel-body -->
</div>


