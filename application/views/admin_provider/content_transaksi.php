<div class="panel panel-default">
    <div class="panel-heading" style="overflow: hidden">
        List Data <?php echo $title; ?> 
    </div>
    
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Bukti Pembayaran</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Main</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Total Bayar</th>
                    <th>Penyewa</th>
                    <!-- <th>Lapang</th> -->
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  foreach ($transaksi as $key => $value) {
                    # code...
                  ?>
                  <?php
                        if($value['bukti_trans']!=null){
                            $foto = $value['bukti_trans'];
                        }else{
                            $foto='default.png';
                        }
                    ?>
                  <tr idx="<?=$value['kode_transaksi'];?>"><td><?=$value['kode_transaksi'];?></td><td><a href="#"  data-toggle="modal" data-target="#myModalDetail" onclick="loadImg('<?=base_url();?>assets/img/bukti_trans/<?=$foto;?>');">

                    <img src='<?=base_url();?>assets/img/bukti_trans/<?=$foto;?>' class="img-responsive" width="30px">
                  </td><td><?=$value['tgl_sewa'];?></td><td><?=$value['tgl_main'];?></td><td><?=$value['jam_mulai'];?></td><td><?=$value['jam_selsai'];?></td><td><?=$value['total_bayar'];?></td><td><?=$value['nama'];?></td><td><?php
                  if($value['status']==0){
                    $status='Waiting Transfer';
                  }else if($value['status']==1){
                    $status="Waiting Approval";
                  }else{
                    $status = "Booking Complete";
                  }
                  echo"<button class='btn btn-default status' onclick='updateStatus(this);'>".$status."</button>";
                  // $value['status'];
                  ?></td></tr>
                  <?php
                  }
                ?>
            </tbody>
            </table>
          </div>
        </div>
        
    </div>
     
    <!-- /.panel-body -->
</div>
<div id="myModalDetail" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail Gambar</h4>
      </div>
      <div class="modal-body">
      <!-- <form name="form-bukti" id="myForm-bukti" method="POST" class=" form-horizontal" enctype="multipart/form-data"> -->
        <div class="row">
          <div class="form-group required">
            <div class="col-sm-12 img-container">
                      
            </div>
          </div>
    </div>

    <!-- </form> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button class="btn btn-primary save-btn" onclick="uploadBukti()" value="">Upload</button> -->
      </div>

    </div>
  </div>
</div>


