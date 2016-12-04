			<div class=" login-right">
			  	<h3>REGISTERED CUSTOMERS</h3>
				<p>jika kalian sudah memiliki Account Customer atau Account Provider silahkan login disini</p>
				<p><font color="red" size="4">										
						<?php
							$info = $this->session->flashdata('info');
							if (!empty($info)) {
							 	echo $info;
							 } 
						?>
				</font></p>
				<form method="POST" action="<?=base_url();?>login/check">
				  <div>
					<span>Email Address<label>*</label></span>
					<input type="email" class="form-control" name="email"> 
				  </div>
				  <div>
					<span>Password<label>*</label></span>
					<input type="password" class="form-control" name="password"> 
				  </div>
				  <a class="forgot" href="#">Forgot Your Password?</a>
				  <input type="submit" value="Login">
			    </form>
			   </div>	
			    <div class=" login-left">
			  	 <h3>NEW CUSTOMERS</h3>
				 <p>Bingung nyari lapang futsal yang fasilitasnya sesuai keinginan kalian? atau males buat booking secara langsung? yuk gabung bersama jutaan penyedia lapang futsal di web booking lapang futsal terbesar dan terlengkap seIndonesia. Pasti gabakal nyesel deh..</p>
				 <a class="acount-btn" href="<?=base_url();?>welcome/registrasi_customer">Create an Account</a>
			   </div>
			   <div class=" login-left">
			  	 <h3>NEW PROVIDER</h3>
				 <p>Punya lapang futsal tapi bingung ko sepi terus? dan gatau cara ngePromosi'in nya? Ga usah bingung lagi yuk gabung bersama kami dan jutaan customer yang siap bikin lapang futsal kalian penuh terus...</p>
				 <a class="acount-btn" href="<?=base_url();?>welcome/registrasi_provider ">Create an Account</a>
			   </div>