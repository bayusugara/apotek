<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>e-futsal Admin</title>
    <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>';

    </script>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url(); ?>assets/plugin/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?=base_url(); ?>assets/plugin/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?=base_url(); ?>assets/plugin/datatables-plugins/buttons.dataTables.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="<?=base_url(); ?>assets/plugin/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url(); ?>assets/plugin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    




</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <?php
            if(!empty($navbar)){
                $this->load->view($navbar);
            }
        ?>
        <?php
            if(!empty($sidebar)){
                $this->load->view($sidebar);
            }
        ?>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?=$title?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                     <?php
                        if(!empty($content)){
                            $this->load->view($content);
                        }
                    ?>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
          <script type="text/javascript">
            var idx = '<?=$provider['id_provider'];?>';
          </script>
        </div>
        <!-- /#page-wrapper -->
        <div id="modal-admin" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close-modal">&times;</button>
            <h4 class="modal-title">Form Penyedia Lapang<br>
            <small>Edit Profil</small>
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="myForm" method="POST" class=" form-horizontal">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Nama Penyedia</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="nama_penyedia" placeholder="Nama penyedia">
                  <input type="hidden" class="form-control" required id="id" name="id_provider" value=0>
                  <input type="hidden" class="form-control" required name="user_login_id" value=0>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Lokasi</label>
                  <div class="col-sm-8">
                    <textarea name="lokasi" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-8">
                  <input type="email" class="form-control" maxlength="50" required name="email" placeholder="Email">
                  </div>
                </div>
                 <div class="form-group required">
                  <label class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="username" placeholder="Username">
                  </div>
                </div>
                 <div class="form-group password required">
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="password" id="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group password required">
                  <label class="col-sm-3 control-label">Password Confirmation</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="password_conf" id="password_conf" placeholder="Password Confirmation">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Longitude</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" name="longitude" placeholder="Longitude">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Latitude</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" name="latitude" placeholder="Latitude">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Provinsi</label>
                  <div class="col-sm-8">
                  <select name="provinsi" class="form-control" required="">
                    <?php
                    $provinsi =$this->provider_model->get_provinsi()->result_array();
                      foreach ($provinsi as $key => $value) {
                    ?>
                      <option value="<?=$value['provinsi_id']?>"><?=$value['provinsi_nama']?></option>
                    <?php
                      }
                    ?>
                  </select>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-8">
                  <input type="checkbox" style="margin-top: 10px" name="status" checked>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="fasilitas" style="height:350px;overflow-y: scroll;">

                <label class="control-label">Fasilitas</label>
                <table width="100%" class="table table-striped table-bordered table-hover">
                  <th></th>
                  <th>Fasilitas</th>
                  <?php
                    $fasilitas = $this->fasilitas_model->get()->result_array();
                    foreach ($fasilitas as $key => $value) {
                  ?>
                  <tr>
                    <td>
                      <input type="checkbox" name="fasilitas" value="<?=$value['id_fasilitas']?>">
                    </td>
                    <td>
                      <?=$value['nama_fasilitas'];?>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                </table>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default close-modal">Close</button>
            <button type="button" class="btn btn-success" value="Edit" onclick="edit_profile();">Edit</button>
            <input type="button" class="btn btn-primary" value="Save" onclick="post_data();"></button>
          </div>
          </form>
        </div>

      </div>
    </div>
    <div id="modal-change-password" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Penyedia Lapang Form<br>
            <small>Ganti password</small>
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="passwordForm" method="POST" class=" form-horizontal">
            <div class="alert alert-danger" style="display: none">Wrong password</div>
            <div class="row">
                 <div class="form-group password required">
                  <label class="col-sm-3 control-label">Old Password</label>
                  <div class="col-sm-8">
                  <input type="hidden" class="form-control" name="id">
                  <input type="password" class="form-control" maxlength="50" required name="old_password" placeholder="Old Password">
                  </div>
                </div>
                <div class="form-group password required">
                  <label class="col-sm-3 control-label">New Password</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="new_password" id="new_password" placeholder="Password Confirmation">
                  </div>
                </div>
                <div class="form-group password required">
                  <label class="col-sm-3 control-label">Password Confirmation</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="new_password_conf" id="new_password_conf" placeholder="Password Confirmation">
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="button" class="btn btn-primary" value="Save" onclick="change_pass();"></button>
          </div>
          </form>
        </div>

      </div>
    </div>
    </div>
    <!-- /#wrapper -->
    <script src="<?=base_url();?>assets/plugin/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url();?>assets/plugin/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?=base_url();?>assets/plugin/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>assets/plugin/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/plugin/datatables-responsive/dataTables.responsive.js"></script>

    <!-- <script src="<?=base_url();?>assets/plugin/jquery-validation/dataTables.bootstrap.min.js"></script> -->
    <script src="<?=base_url();?>assets/plugin/datatables-responsive/dataTables.responsive.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url();?>assets/js/sb-admin-2.min.js"></script>
    <script src="<?=base_url();?>assets/js/moment.js"></script>
    <?php  
    for($i=0;$i<count($scripts);$i++):
    ?>
           <script type='text/javascript' src = '<?=base_url();?>assets/<?=$scripts[$i];?>'></script>
 <?php endfor;?>
    <!-- 
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script> -->
    <script>
    $(document).ready(function() {
        $('.datepicker').datepicker();
        $('#dataTables-example').DataTable({
            responsive: true
        });

      var table = $('#dataTables-export').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                  extend: 'excelHtml5',
                  title: 'Data export laporan transaksi - '+'<?=date('Y-m-d');?>'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data export laporan transaksi - '+'<?=date('Y-m-d');?>'
                }
            ]

        } );
      $.fn.dataTableExt.afnFiltering.push(
            function( oSettings, aData, iDataIndex ) {

                var grab_daterange = $("#date_range").val();
                // var give_results_daterange = grab_daterange.split(" to ");
                var filterstart = $('#min').val();
                var filterend = $('#max').val();
                var iStartDateCol = $('[name="date"]').val(); //using column 2 in this instance
                var iEndDateCol = $('[name="date"]').val();
                var tabledatestart = aData[iStartDateCol];
                var tabledateend= aData[iEndDateCol];

                if ( filterstart === "" && filterend === "" )
                {
                    return true;
                }
                else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isBefore(tabledatestart)) && filterend === "")
                {
                    return true;
                }
                else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isAfter(tabledatestart)) && filterstart === "")
                {
                    return true;
                }
                else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isBefore(tabledatestart)) && (moment(filterend).isSame(tabledateend) || moment(filterend).isAfter(tabledateend)))
                {
                    return true;
                }
                return false;
            }
            );
        $('.datepicker').datepicker()
        .on('change', function(e) {
            // `e` here contains the extra attributes
            table.draw();
        });
        $('[name="date"]').on('change',function(){
             table.draw();
        });
        var base_url = '<?=base_url();?>';
        console.log(base_url)
        initValidatorStyle();
    });

    function initValidatorStyle(){
    $.validator.setDefaults({
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            }else if (element.hasClass('select2')) {     
                error.insertAfter(element.next('span'));
            }else {
                error.insertAfter(element);
            }
        }
    });
}
    </script>

</body>

</html>
