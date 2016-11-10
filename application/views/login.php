<div class=" login-right">
			  	<h3>REGISTERED CUSTOMERS</h3>
				<p>jika sudah memiliki Account silahkan login</p>
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
				 <p>Silahkan buat Account terlebih dahulu...</p>
				 <a class="acount-btn" href="register.html">Create an Account</a>
			   </div>