 <div class="top-header">
            <div class="container">
                <div class="top-header-left">
                    <ul class="support">
                        <li><a href="#"><label> </label></a></li>
                        <li><a href="#">E-<span class="live">FUTSAL</span></a></li>
                    </ul>
                    <ul class="support">
                        <li class="van"><a href="#"><label> </label></a></li>
                        <li><a href="#">WEB <span class="live">booking lapang futsal terbaik & terlengkap seindonesia</span></a></li>
                    </ul>
                    <div class="clearfix"> </div>
                </div>
                <div class="top-header-right">
                    <div class="down-top top-down">
                           <ul class="support">
                        <li><a href="#">YUUUK... <span class="live">gabung!!</span></a></li>
                    </ul>
                     </div>
                     <!---->
                    <div class="clearfix"> </div>   
                </div>
                <div class="clearfix"> </div>       
            </div>
</div>
        <div class="bottom-header">
            <div class="container">
                <div class="header-bottom-left">
                    <div class="logo">
                        <a href="index.html"><img src="images/logo.png" alt=" " /></a>
                    </div>
                    <div class="search">
                        <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
                        <input type="submit"  value="SEARCH">
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="header-bottom-right">
                        <?php 
                            // print_r($userdata);
                            if(!isset($userdata)){
                        ?>                   
                            <div class="account"><a href="login.html"><span> </span>YOUR ACCOUNT</a></div>
                        <?php
                            }else{
                            echo'<div class="account"><a href="'.base_url().'welcome/profil_customer/'.$userdata['id'].'"><span> </span>YOUR ACCOUNT ('.$userdata['username'].') </a></div>';
                            }
                        ?>
                            <ul class="login">
                            	<?php 
                            	// print_r($userdata);
                            	if(!isset($userdata)){?>
	                                <li><a href="<?=base_url();?>login"><span> </span>LOGIN</a></li> |
	                                <li ><a href="<?=base_url();?>login">SIGNUP</a></li>
                            	<?php
                            	}else{
	                                echo'<li><a href="'.base_url().'login/logout"><span> </span>LOGOUT</a></li>';
                            	}
                            	?>
                            </ul>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>   
            </div>
        </div>