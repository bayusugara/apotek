<div class="panel panel-default">
    <div class="panel-heading" style="overflow: hidden">
        List Data <?php echo $title; ?>
        <a data-target="#modal-transaksi" data-backdrop="static" data-toggle="modal" style="padding: 4px" class="btn btn-sm btn-primary text-black pull-right transaksi"><i class="fa fa-plus-square-o fa-lg"></i></a>  
    </div>
    
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
             <div class="row">

              <div class="col-md-12">
              <table width="100%" id="dataTables-example" class="table table-striped table-bordered table-hover">
                <thead>
                  <th width="10%">#</th><th>Pegawai</th><th>Tanggal</th><th>jumlah</th><th></th>
                </thead>
                <tbody>
                  <?php
                    foreach ($transaksi as $key => $value) {
                ?>
                    <tr idx="<?=$value['id'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['pegawai'];?></td>
                        <td><?=$value['tgl_transaksi'];?></td>
                        <td><?=$value['jml_obat'];?></td>
                        <td align="center"> 
                            <a data-target="#modal-transaksi" data-backdrop="static" data-toggle="modal" class="detail btn btn-sm btn-white text-black btn btn-default">Lihat Detail Transaksi</a>  
                            
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
              </table>
              </div>
            </div>
          </div>
          
        </div>
        
    </div>
    <!-- /.panel-body -->
</div>
<div id="modal-transaksi" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah Transaksi<br>
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="transaksiForm" method="POST" class=" form-horizontal">
            <div class="col-sm-6">
              <div class="form-group required">
                <label class="col-sm-3 control-label">Tanggal</label>
                <div class="col-sm-8">
                  <input name="tanggal" class="form-control" disabled="" value="<?=date('Y-m-d')?>">
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-3 control-label">Pembeli</label>
                <div class="col-sm-8">
                  <select name="pembeli" class="form-control">
                  <option value="">Select Pembeli</option>
                  <?php
                  foreach ($pembeli as $key => $value) {
                  ?>    # code...
                    
                  <option value="<?=$value['id_customer']?>"><?=$value['nama']?></option>
                  <?php
                  }
                  ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group required">
                <label class="col-sm-3 control-label">Kasir</label>
                <div class="col-sm-8">
                  <input name="pegawai" class="form-control" disabled="" value="<?=$kasir?>">
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-3 control-label">Kode Transaksi</label>
                <div class="col-sm-8">
                  <input name="kd_transaksi" class="form-control" disabled="" value="<?=$kode_transaksi?>">
                </div>
              </div>
            </div>
            <input type="hidden" class="form-control" name="id">
            <div class="row">
              <div class="col-md-12">
              <table width="100%" id="tabel-transaksi" class="table table-striped table-bordered table-hover">
                <thead>
                  <th width="25%">Obat</th><th>Harga</th><th width="10%">Jumlah</th><th>Sub Total</th><th></th>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
              <div class="col-sm-6 pull-right">
                <div class="form-group required">
                  <label class="col-sm-4 control-label">Total Item</label>
                  <div class="col-sm-8">
                    <input name="total_item" class="form-control" disabled="" value="">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-4 control-label">Jumlah Bayar</label>
                  <div class="col-sm-8">
                    <input name="jml_bayar" class="form-control" disabled="" value="">
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="button" class="btn btn-primary save" value="Save" onclick="post_transaksi();"></button>
          </div>
          </form>
        </div>

      </div>
    </div>


