$(document).ready(function() {
	initCloseBtn();
	initValidatorStyle();
	initValidatorFormMain();
	initValidatorFormPass();
	// console.log(idx);
	$(document).ready(function() {
    // $('#dataTables-export').DataTable( {
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // } );
} );
});

function initValidatorFormMain(){
	var validator = $( "#myForm" ).validate({
		rules: {
			email:{
		        required: true,
		        remote: {
		          url: base_url+"/admin/provider/check_code",
		          type: "post",
		          data: {
		            id: function() {
		              return $( "input[name=user_login_id]" ).val();
		            }
		          }
		        }
			},
           password: { 
             required: true,
                minlength: 6,
                maxlength: 50

           } , 
               password_conf: { 
                equalTo: "#password",
                 minlength: 6,
                 maxlength: 50
           }
        },
        messages:{
	      email:{
	        required: "This field is required.",
	        remote: "This email already exist."
	      }
	    }
	});
}
function restoredb(){
	bootbox.dialog({message:"Tunggu restore data sedang di lakukan.",closeButton:false,onEscape:false});
	var data = new FormData($('#galleryForm')[0])
	$.ajax({
           type:"POST",
           url:base_url+"admin/backup_restore/restoredb",
           data:data,
           mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
           success:function(data)
          {
            if (data != "0"){
            	bootbox.hideAll();
				bootbox.alert("Data berhasil direstore.", function(){
				// get_gallery(data);
				})
			}else{
				bootbox.alert("Data gagal direstore.");
			}		

           }
       });
}
function initValidatorFormPass(){
	var validator = $( "#passwordForm" ).validate({
		rules: {
			old_password:{
		        required: true,
		        remote: {
		          url: base_url+"/admin_provider/home/check_password",
		          type: "post",
		          data: {
		            id: function() {
		              return $( "input[name=id]" ).val();
		            }
		          }
		        }
			},
           new_password: { 
             required: true,
                minlength: 6,
                maxlength: 50

           } , 
               new_password_conf: { 
                equalTo: "#new_password",
                 minlength: 6,
                 maxlength: 50
           }
        },
        messages:{
	      old_password:{
	        required: "This field is required.",
	        remote: "Password salah"
	      }
	    }
	});
}
function initCloseBtn(){
  var $form = $('form'),
    origForm = $form.serialize();

  $('form :input').on('change input', function() {
      if($form.serialize() !== origForm){
        $("#myForm").data('changed', 1);
      }
  });

  $('.close-modal').on('click', function(e){
    e.preventDefault();
    if($("#myForm").data('changed') == 1) {
      bootbox.dialog({
        message: "Apakah anda yakin akan menutup form ini? form akan direset ketika ditutup.",
        buttons: {
          close: {
            label: "Cancel",
            className: "btn-default flat",
            callback: function () {
              $(this).modal('hide');
            }
          },
          danger: {
            label: "Confirm",
            className: "btn-primary flat",
            callback: function () {
              $('#modal-admin').modal('hide');
            }
          }
        }
      });
    }else{
      $('#modal-admin').modal('hide');
    }
  });
}
$('#modal-admin').on('hide.bs.modal', function () {
    $("#myForm").trigger("reset");
	$('.password').show();
    $("#myForm").validate().resetForm();
    $("#myForm").get(0).reset();
    $("#myForm").data('changed', 0);
});
function post_data(){
	var validator = $( "#myForm" ).validate();
	console.log();
	if(validator.form()){
		if($('[name="status"]').is(":checked")){
			$('[name="status"]').val(1);
		}else{
			$('[name="status"]').val(0);
		}
		var arr = $("input[name='fasilitas']:checked").getCheckboxVal()
		if(arr.length <= 0){
			var arr = 0;
		}
		var data = [];
		data.push($('[name="username"]').val());
		data.push($('[name="password"]').val());
		data.push($('[name="lokasi"]').val());
		data.push($('[name="email"]').val());
		data.push($('[name="nama_penyedia"]').val());
		data.push($('[name="status"]').val());
		data.push($('[name="id_provider"]').val());
		data.push($('[name="user_login_id"]').val());
		data.push($('[name="longitude"]').val());
		data.push($('[name="latitude"]').val());
		data.push($('[name="provinsi"]').val());
		// var data = $('#myForm').serialize();

		// $.post('url', data);
		var api = base_url+"admin/provider/post";
		
		$.post(api, {arr:arr,data:data}).done(function( data ) {
			if (data == "1"){
				bootbox.alert("Data berhasil disimpan.", function(){
					location.reload();
				})
			}else{
				bootbox.alert("Data gagal disimpan.");
			}		
		});
	}
}
jQuery.fn.getCheckboxVal = function(){
	var vals = [];
	var i = 0;
	this.each(function(){
		vals[i++] = jQuery(this).val();
	});
	return vals;
}

$(document).on('click','.change-pass',function(){
	var id = $(this).attr('id');
	$('[name="id"]').val(id);
});

function edit_profile(){
	if($('input').attr('disabled')){
		// console.log('asd');
		$('input,.form-control').removeAttr('disabled');
	}else{
		$('input,.form-control').attr('disabled','disabled');
	}
}

$(document).on('click','.update',function(){
	$('#myForm').trigger("reset");
	var idx = $(this).attr('id');
	var tr = $(this).closest('tr');
	$('#active').show();
	$('.password').hide();
	$('input,.form-control').attr('disabled','disabled');
	$.post( base_url+"admin/provider/get_by_id", {idx: idx}).done(function( data1 ) {
		var json = $.parseJSON(data1);
		console.log(json)
		$('[name="id_provider"]').val(json.id_provider);
		$('[name="user_login_id"]').val(json.user_login_id);
		$('[name="username"]').val(json.username);
		$('[name="nama_penyedia"]').val(json.nama);
		$('[name="email"]').val(json.email);
		$('[name="lokasi"]').val(json.lokasi);
		$('[name="latitude"]').val(json.latitude);
		$('[name="longitude"]').val(json.longitude);
		$('[name="provinsi"]').val(json.provinsi_id);
		$('[name="password"]').val(json.password);
		$('[name="password_conf"]').val(json.password);
		// $('[name="requester_institution"]').val(json.requester_institution);
		if(json.status==1){
			$('[name="status"]').attr('checked',true);
			$('[name="status"]').val(1);
		}else{
			$('[name="status"]').attr('checked',false);
			$('[name="status"]').val(0);
		}
		$.post( base_url+"admin/provider/get_fasilitas_by_id", {idx: idx}).done(function( data ) {
			var json = $.parseJSON(data)
			var values = [];

			for (var i = 0; i < json.length; i++) {
				// console.log(json[i].TrcTypeID);
				values.push(String(json[i].id_fasilitas));
				// $("#user-list [value=" + json[i].TrcTypeID + "]").attr("checked", "checked");
			}
			// console.log(values);
			if(json.length > 0){
				$(".fasilitas").find('[value=' + values.join('], [value=') + ']').prop("checked", true);
			}
		});	
	});
});
function change_pass(){
	var validator = $( "#passwordForm" ).validate();
	  if(validator.form()){
	    var data = $('#passwordForm').serialize();
	    // $.post('url', data);
	    var api = base_url+"admin_provider/home/change_pass";
	    
	    $.post(api, data).done(function( data ) {
	      if (data == "1"){
	        bootbox.alert("Password berhasil diubah.", function(){
	          location.reload();
	        })
	      }else{
	        bootbox.alert("Gagal mengubah password.");
	      }   
	    });
	    console.log(base_url);
	  }
}
function updateStatus(el){
	var idx = $(el).closest('tr').attr('idx');

	$.post( base_url+"admin/provider/updateStatus", {idx: idx}).done(function( data1 ) {
		if(data1=='0'){
			// if($(el).html())
			bootbox.alert('Status gagal di update');
		}else{
			if($(el).html() == 'Waiting Transfer'){
				$(el).html("Waiting Approval");
			}else if($(el).html() == "Waiting Approval"){
				$(el).html("Booking Complete");
			}
			bootbox.alert("Status berhasil diubah.", function(){
	          location.reload();
	        })
		}
	})
	console.log($(el).html());
}
function loadImg(img){
	$('.img-container').empty();
	$('.img-container').append('<center><img src="'+img+'" class="img-responsive" width="600px"></center>');
}