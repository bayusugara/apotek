<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>e-futsal | web booking lapang futsal terbaik & terlengkap seindonesia</title>
<link href="<?=base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="<?=base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />  
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="<?=base_url();?>assets/js/jquery.min.js"></script>
<!--script-->
</head>
<body> 
    <!--header-->
    <div class="header">
       <?php
            if($navbar!=null){
                $this->load->view($navbar,$userdata);
            }
       ?>
    </div>
    <!---->
    <div class="container">
            <div class="shoes-grid">
            <a href="single.html">
            <div class="wrap-in">
               <div class="wmuSlider example1 slide-grid">   
                <?php
                    if($slide!=null){
                        $this->load->view($slide);
                    }
               ?>
               </div>
              </div>
                </a>
                  <!---->

                <!-- <div class="wrap-in" style=""> -->
                <?php
                    if($content!=null){
                        $this->load->view($content);
                    }
                ?>
                <!-- </div> -->
                

               </div>   
               <div class="sub-cate">
                <?php
                    if($sidebar!=null){
                        $this->load->view($sidebar);
                    }
                ?>
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
                <div class="clearfix"> </div>                    
        </div>
    
    <!---->
    <div class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="latter">
                    <h6>E-FUTSAL</h6>
                    <div class="clearfix"> </div>
                </div>
                <div class="latter-right">
                    <p>FOLLOW US</p>
                    <ul class="face-in-to">
                        <li><a href="#"><span> </span></a></li>
                        <li><a href="#"><span class="facebook-in"> </span></a></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>>
    </div>
</body>
</html>