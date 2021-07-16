
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
                <input type="text" id="min" maxdate="max" class="datepicker form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>End Date</label>
                <input type="text" id="max" mindate="min" class="datepicker form-control">
              </div>
            </div>
            <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Filter Date</label>
                <select name="date" class="form-control">
                  <option value="1">Tanggal Transaksi</option>
                  <option value="2">Tanggal Main</option>
                </select>
              </div>
            </div> -->
          <!-- </div> -->
        </div>
        <div class="row">
          <div class="col-md-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-export">
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Pegawai</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Obat</th>
                    <th>Total bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  foreach ($transaksi as $key => $value) {
                    # code...
                  ?>
                  <tr idx="<?=$value['id'];?>"><td><?=$value['id'];?></td><td><?=$value['pegawai'];?></td><td><?=$value['tgl_transaksi'];?></td><td><?=$value['jml_obat'];?></td><td><?=$value['detail_obat'];?></td><td><?=$value['jumlah'];?></td></tr>
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


