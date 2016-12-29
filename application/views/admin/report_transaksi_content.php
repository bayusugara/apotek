
<div class="panel panel-default">
    <div class="panel-heading" style="overflow: hidden">
        List Data <?php echo $title; ?> 
    </div>
    
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
          <!-- <div class="col-md-12"> -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Start Date</label>
                <input type="text" id="min" class="datepicker form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>End Date</label>
                <input type="text" id="max" class="datepicker form-control">
              </div>
            </div>
          <!-- </div> -->
        </div>
        <div class="row">
          <div class="col-md-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-export">
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Main</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Total Bayar</th>
                    <th>Penyedia</th>
                    <th>Penyewa</th>
                    <th>Lapang</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  foreach ($transaksi as $key => $value) {
                    # code...
                  ?>
                  <tr idx="<?=$value['kode_transaksi'];?>"><td><?=$value['kode_transaksi'];?></td><td><?=$value['tgl_sewa'];?></td><td><?=$value['tgl_main'];?></td><td><?=$value['jam_mulai'];?></td><td><?=$value['jam_selsai'];?></td><td><?=$value['total_bayar'];?></td><td><?=$value['provider'];?></td><td><?=$value['nama'];?></td><td><?=$value['kode_lapang'];?></td><td><?php
                  if($value['status']==0){
                    $status='Pending';
                  }else{
                    $status="Served";
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


