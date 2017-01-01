<link rel="stylesheet" href="<?=base_url();?>assets/css/etalage.css" type="text/css" media="all" />
	<script src="<?=base_url();?>assets/js/jquery.etalage.min.js"></script>
	<script src="<?=base_url();?>assets/js/front-control.js"></script>
	<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		var base_url = '<?=base_url();?>';
	</script>
	     

          	    	<div class="toogle">
				     	<h3 class="m_3">History Transaction</h3>
				     	<p class="m_text">
				<div class="table-responsive">
					<table class="table table-boardered table-striped table-hover">
						<thead>
							<tr>
								<th>Kode Trans</th>
								<th>Tgl Trans</th>
								<th>Tgl Main</th>
								<th>Jam Mulai</th>
								<th>Jam Selsai</th>
								<th>Total Biaya</th>
								<th>Provider</th>
								<th>Lapang</th>
							</tr>
						</thead>
						<?php foreach ($transaksi as $key => $value) {  ?>			
							<tr>
								<td><?php echo $value['kode_transaksi']; ?></td>
								<td><?php echo $value['tgl_transaksi']; ?></td>
								<td><?php echo $value['tgl_main']; ?></td>
								<td><?php echo $value['jam_mulai']; ?></td>
								<td><?php echo $value['jam_selsai']; ?></td>
								<td><?php echo $value['total_bayar']; ?></td>
								<td><?php echo $value['nama_provider']; ?></td>
								<td><?php echo $value['kode_lapang']; ?></td>
								
							</tr>
						<?php } ?>
					</table>
				</div>			     	
				</p>
				     </div>

				     <div class="toogle">
				     	<h3 class="m_3">Transaction on Confirm</h3>
				     	<p class="m_text">
				<div class="table-responsive">
					<table class="table table-boardered table-striped table-hover">
						<thead>
							<tr>
								<th>Kode Trans</th>
								<th>Tgl Main</th>
								<th>Jam Mulai</th>
								<th>Jam Selsai</th>
								<th>Total Biaya</th>
								<th>Provider</th>
								<th>Lapang</th>
								<th></th>
							</tr>
						</thead>
						<?php foreach ($transaksiconf as $key => $value) {  ?>			
							<tr idx="<?=$value['kode_transaksi'];?>" id="<?=$value['kode_transaksi'];?>">
								<td><?php echo $value['kode_transaksi']; ?></td>
								<td><?php echo $value['tgl_main']; ?></td>
								<td><?php echo $value['jam_mulai']; ?></td>
								<td><?php echo $value['jam_selsai']; ?></td>
								<td><?php echo $value['total_bayar']; ?></td>
								<td><?php echo $value['nama_provider']; ?></td>
								<td><?php echo $value['kode_lapang']; ?></td>
								<td><button class="btn btn-success" data-toggle="modal" data-target="#myModalConf" data-id="<?=$value['kode_transaksi'];?>" onclick="openBukti(this);">
								Konfirmasi Pembayaran</button>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>			     	
				</p>
				     </div>	

  <div id="myModalConf" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Silahkan Masukan Bukti Pembayaran</h4>
      </div>
      <div class="modal-body">
      <form name="form-bukti" id="myForm-bukti" method="POST" class=" form-horizontal" enctype="multipart/form-data">
      	<!-- <div class="row"> -->
	        <div class="form-group required">
	          <div class="col-sm-12">
                  <input type="file" class="form-control" required="" name="image">
                  <input type="hidden" class="form-control" required name="kode_transaksi" >
                </div>
	        </div>
		<!-- </div> -->

    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary save-btn" onclick="uploadBukti()" value="">Upload</button>
      </div>

    </div>
  </div>
</div>