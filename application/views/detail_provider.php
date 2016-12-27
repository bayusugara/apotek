<head>
	<link rel="stylesheet" href="<?=base_url();?>assets/css/etalage.css" type="text/css" media="all" />
	<script src="<?=base_url();?>assets/js/jquery.etalage.min.js"></script>
	<script src="<?=base_url();?>assets/js/front-control.js"></script>
	<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
	<script>
			var base_url = '<?=base_url();?>';
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
	</script>
</head>
<body> 
	 	<div class=" single_top pull-left" style="width:100%;" >
			<div class="single_grid">												
				<div class="grid images_3_of_2">
					<ul id="etalage">
						<?php foreach ($gallery as $key => $value) {
							$id_provider = $value['id_provider'];
							$foto = $value['foto']; 
							$pic_path = base_url()."assets/img/".$id_provider."/".$foto;
						?>
						<li>
							<a href="optionallink.html">
								<img class="etalage_thumb_image"  src="<?= $pic_path ?>"  class="img-responsive"/>
								<img class="etalage_source_image"  title="" src="<?=$pic_path ?>" class="img-responsive" />
							</a>
						</li>
						<?php } ?>
					</ul>
					<div class="clearfix"> </div>		
				</div> 		  
				<div class="desc1 span_3_of_2">
					<h3><?=$provider['nama']; ?></h3>
					<div class="cart-b">
						<div class="left-n ">******</div>				 			
						<div class="clearfix"></div>
					</div>
				 	<table class="table table-boardered table-striped table-hover" background='black'>
						<?php foreach ($fasilitas as $key => $value) { ?>
							<tr>
								<th class="success"><h7> √ <?php echo $value['nama_fasilitas']; ?></h7></th>
							</tr>
						<?php }?>
				 	</table>			
					<p><?=$provider['lokasi'] ?></p>			
				</div>
			</div>

			<div class="toogle">
				<h3 class="m_3">Detail Lapang</h3>
				<p class="m_text">
				<div class="table-responsive">
					<table class="table table-boardered table-striped table-hover">
						<thead>
							<tr>
								<th>Lapang</th>
								<th>Ukuran</th>
								<th>Jenis</th>
								<th>Harga</th>
								<th></th>
							</tr>
						</thead>
						<?php foreach ($lapang as $key => $value) {  ?>			
							<tr>
								<td><?php echo $value['kode_lapang']; ?></td>
								<td><?php echo $value['ukuran']; ?> m</td>
								<td><?php 
									if($value['jenis'] == 0){
										echo "Lantai Vinyl";
									}elseif($value['jenis'] == 1){
										echo "Rumput Sintetis";
									}elseif($value['jenis'] == 2){
										echo"Lantai polypropylene";
									}elseif($value['jenis'] == 3){
										echo"Lantai Beton";
									}
								?></td>
								<td>Rp. <?php echo $value['harga']; ?></td>
								<td><button class="btn btn-success" data-jam-buka="<?=$provider['jam_buka'];?>" data-jam-tutup="<?=$provider['jam_tutup'];?>" data-id="<?=$value['id_lapang'];?>" onclick="openCalendar(this);" data-toggle="modal" data-target="#myModalCalendar">
								Lihat Jadwal</button>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>			     	
				</p>
			</div>	
	    	   
    <!---->

		<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
	</div>
	<!-- Modal -->
<div class="modal fade" id="myModalCalendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Jadwal Lapangan</h4>
        <?php
        if($userdata['id'] != null){
        ?>
        <br>
        <center><button class="btn btn-lg btn-primary btn-booking"  data-toggle="modal" data-target="#myModalBooking" onclick="openModalTransaksi(this);">Booking Here !</button></center>
    	<?php }?>
      </div>
      <div class="modal-body">
        
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModalBooking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Booking</h4>
      </div>
      <div class="modal-body">
      <form name="form-transaksi" id="myForm" method="POST" class=" form-horizontal">
      	<div class="row">
	        <div class="form-group required">
	          <label class="col-sm-3 control-label">Tanggal Booking</label>
	          <div class="col-sm-8">
	          	<input class="datepicker form-control" data-date-start-date="<?=date('Y-m-d');?>" data-date-end-date="<?=date('Y-m-d',strtotime("+7 day"));?>" data-date-format="yyyy-mm-dd" onchange="checkJadwal();" required name="tanggal">
	          	<input type="hidden" name="id_lapang">
	          </div>
	        </div>
	        <div class="form-group required" style="padding-top: 10px">
	          <label class="col-sm-3 control-label">Jam Booking</label>
	          <div class="col-sm-4">
	            <!-- <textarea name="alamat" class="form-control"></textarea> -->
	            <input class="form-control" type="time" onchange="checkJadwal();" name="jam_mulai" required="">
	          </div>
	          <div class="col-sm-4">
	            <!-- <textarea name="alamat" class="form-control"></textarea> -->
	            <input class="form-control" type="time" onchange="checkJadwal();" name="jam_selesai" required="">
	          </div>
	        </div>
	        <div class="form-group required" style="padding-top: 10px">
	          <label class="col-sm-3 control-label">Total Bayar</label>
	          <div class="col-sm-4">
	            <!-- <textarea name="alamat" class="form-control"></textarea> -->
	            <input class="form-control" type="text" name="total_bayar" disabled="">
	          </div>
	        </div>
		</div>

    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary save-btn" onclick="saveTransaksi()" value="">Book now</button>
      </div>

    </div>
  </div>
</div>
</body>	
					 	
