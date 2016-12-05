			<div class="register pull-left" style="width:100%;">
			<div class="register-but">
		  	  <form method="POST" action="<?=base_url();?>welcome/post" enctype="multipart/form-data">
				 <div class="register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					<div class="mation">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  
 <style> 
.thumbnail {
  width: 400px;
  overflow: hidden;
}
.view-img img{
  width:100%;
  display:block;
}
#upload {
  display: none;
}

.uploadbtn {
  border: 0;
  background: #F97E76;
  border-radius: 0;
  color: #fff;
  font: 400 15px 'Roboto', Arial, Helvetica, sans-serif;
  line-height: 1.1;
  float: right;
  margin-top: 20px;
  width: 155px;
  padding: 11px;
  position: relative;
  overflow: hidden;
  text-align: center;
  cursor: pointer;
}

.uploadbtn:after {
  content: "\f093";
  font-family: FontAwesome;
  color: #fff;
  font-size: 24px;
  width: 100%;
  height: 100%;
  position: absolute;
  top: -100%;
  text-align: center;
  line-height: 38px;
  left: 0;
  -webkit-transition: all 0.15s;
  -moz-transition: all 0.15s;
  transition: all 0.15s;
}

.uploadbtn span {
  display: inline-block;
  width: 100%;
  height: 100%;
  -webkit-transition: all 0.15s;
  -webkit-backface-visibility: hidden;
  -moz-transition: all 0.15s;
  -moz-backface-visibility: hidden;
  transition: all 0.15s;
  backface-visibility: hidden;
}

.uploadbtn:hover:after {
  top: 0;
}

.uploadbtn:hover span {
  -webkit-transform: translateY(300%);
  -moz-transform: translateY(300%);
  -ms-transform: translateY(300%);
  transform: translateY(300%);
}
 </style>   



						<span>Nama<label>*</label></span>
						<input type="text" name="nama" required>
						<input type="hidden" class="form-control" required id="id_customer" name="id_customer" value=0>
                  		<input type="hidden" class="form-control" required name="user_login_id" value=0>
                  		<input type="hidden" class="form-control" required name="image_path" value=''> 
					
						<span>User name<label>*</label></span>
						<input type="text" name="username" class="form-control" required>

						<span>Email<label>*</label></span>
						<input type="email" name="email" class="form-control" required> 
					 
						 <span>Alamat<label>*</label></span>
						 <input type="text" name="alamat" class="form-control" required>

						 <span>No Telepon<label>*</label></span>
						 <input type="text" name="no_tlp" required>

						 <div class="thumbnail">
  <div class="view-img">
    <img src="<?=base_url();?>assets/img/profile_pict/default.png" alt="">
  </div>
  <input type="file" id="upload" name="image" accept="image/.png">
  <button type="button" class="btn uploadbtn"><span>Upload Image</span></button>
</div>
  
<script>
    $(document).ready(function() {

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('.view-img img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#upload").change(function() {
    readURL(this);
  });

  $('.uploadbtn').on('click', function() {
    $('#upload').trigger('click');
    
  });
});
</script>
  
					</div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>LOGIN INFORMATION</h3>
							<div class="mation">
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
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
			