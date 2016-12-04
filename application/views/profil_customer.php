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
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="<?=base_url();?>assets/img/profile_pict/<?=$customer['foto']?>" class="img-responsive" />
									<img class="etalage_source_image"  title="" src="<?=base_url();?>assets/img/profile_pict/<?=$customer['foto']?>" class="img-responsive" />
								</a>
							</li>
						</ul>
						 <div class="clearfix"> </div>		
				  </div> 
				  <div class="desc1 span_3_of_2">					
					<h4><?=$customer['nama']; ?></h4>
					<div class="cart-b">
						<h4><?=$customer['username']; ?></h4>
					</div>
					<h4><?=$customer['email']; ?></h4>
					<div class="cart-b">
						<h4><?=$customer['no_tlp']; ?></h4>
					</div>
			   		<p><?=$customer['alamat']; ?></p>				
				  </div>
				<a class="now-get get-cart-in" href="<?=base_url();?>welcome/edit_profil_customer">Edit Profil</a>
				<a class="now-get get-cart-in" href="<?=base_url();?>welcome/edit_password_customer">Ganti Password</a>
          	    <div class="clearfix"> </div>

         </div>
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