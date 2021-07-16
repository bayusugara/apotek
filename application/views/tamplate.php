<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Login SI Apotek</title>
<link href="<?=base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="<?=base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />  
<link href="<?=base_url();?>assets/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" media="all" />  

<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="<?=base_url();?>assets/js/jquery.min.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap-datepicker.min.js"></script>

<script src="<?=base_url();?>assets/plugin/bootbox/bootbox.js"></script>

<!--script-->
</head>
<body> 
    <!--header-->
  <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h1 >Sistem Informasi Apotek</h1>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?=base_url();?>login/check">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>