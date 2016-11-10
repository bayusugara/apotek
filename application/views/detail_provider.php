<head>
	<link rel="stylesheet" href="<?=base_url();?>assets/css/etalage.css" type="text/css" media="all" />
	<script src="<?=base_url();?>assets/js/jquery.etalage.min.js"></script>
	<script>
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
							</tr>
						</thead>
						<?php foreach ($lapang as $key => $value) {  ?>			
							<tr>
								<th class="success"><?php echo $value['kode_lapang']; ?></th>
								<th><?php echo $value['ukuran']; ?> m</th>
								<th class="success"><?php echo $value['jenis']; ?></th>
								<th>Rp. <?php echo $value['harga']; ?></th>
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
</body>	
					 	
