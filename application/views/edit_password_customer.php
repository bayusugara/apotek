			<div class="register pull-left" style="width:100%;">
			<div class="register-but">
		  	  <form method="POST" action="<?=base_url();?>welcome/post" enctype="multipart/form-data">
				     <div class="register-bottom-grid">
						    <h3>LOGIN INFORMATION</h3>
							<div class="mation">
								<span>Old Password<label>*</label></span>
								<input type="password" placeholder="Password" id="old_password" name="old_password" class="form-control" required >
								<input type="hidden" class="form-control" name="id">
								<span>Password<label>*</label></span>
								<input type="password" placeholder="Password" id="password" name="password" class="form-control" required >
								<span>Confirm Password<label>*</label></span>
								<input type="password" placeholder="Confirm Password" id="confirm_password" class="form-control" required>
							</div>
					 </div>
				<div class="clearfix"> </div>
								   
					   <input type="submit" value="submit">
					   <div class="clearfix"> </div>
				
			</form>
			</div>	
		   </div>

<script type="text/javascript">
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords tidak sama");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
			