<div class=" login-right">
			  	<h3>REGISTERED CUSTOMERS</h3>
				<p>If you have an account with us, please log in.</p>
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
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				 <a class="acount-btn" href="register.html">Create an Account</a>
			   </div>