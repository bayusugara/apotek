var table = $('#dataTables-modal').DataTable({
        		responsive: true
    		});
$(document).ready(function() {
	initCloseBtn();
	initValidatorStyle();
	initValidatorFormMain();
	initValidatorFormPass();
	table;
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
function initValidatorFormPass(){
	var validator = $( "#passwordForm" ).validate({
		rules: {
			password_admin:{
		        required: true,
		        remote: {
		          url: base_url+"/admin/provider/check_password_admin",
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
	      password_admin:{
	        required: "This field is required.",
	        remote: "Password admin salah"
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
		// var arr = $("input[name='fasilitas']:checked").getCheckboxVal()
		// if(arr.length <= 0){
		// 	var arr = 0;
		// }
		var data = $( "#myForm" ).serialize();
		// data.push($('[name="username"]').val());
		// data.push($('[name="password"]').val());
		// data.push($('[name="lokasi"]').val());
		// data.push($('[name="email"]').val());
		// data.push($('[name="nama_penyedia"]').val());
		// data.push($('[name="status"]').val());
		// data.push($('[name="id_provider"]').val());
		// data.push($('[name="user_login_id"]').val());
		// data.push($('[name="longitude"]').val());
		// data.push($('[name="latitude"]').val());
		// data.push($('[name="provinsi"]').val());
		// data.push(7);
		// data.push(17);
		// data.push('no rek');
		// var data = $('#myForm').serialize();

		// $.post('url', data);
		var api = base_url+"admin/pegawai/post";
		
		$.post(api, data).done(function( data ) {
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
$(document).on('click','.delete',function(){
	var idx = $(this).closest('tr').attr('id');
	var tr = $(this).closest('tr');
	
	bootbox.confirm("Apakan anda yakin akan menghapus "+$(tr).find('td').eq(1).html()+"?", function(result){
		if (result) {
			$.post( base_url+"admin/pegawai/delete", {id : idx}).done(function( data ) {
				if (data == '1'){
					bootbox.alert("Data berhasil dihapus.", function(){
						location.reload();
					})
				} else {
					bootbox.alert('Data gagal dihapus.');
				}
			});
		}else{
		}
	});
});
$(document).on('click','.change-pass',function(){
	var id = $(this).closest('tr').attr('id');
	$('[name="id"]').val(id);
});
$(document).on('click','.gallery',function(){
	var id = $(this).closest('tr').attr('idx');
	$('[name="id"]').val(id);
	get_gallery(id);
});
function get_gallery(id){
	$('.gallery-container').empty();
	$.post( base_url+"admin/provider/get_gallery", {id: id}).done(function( data1 ) {
		var json = $.parseJSON(data1);
		if(json.length == 0){

		}else{
			for (var i = 0; i < json.length; i++) {
				$('.gallery-container').append('<div class="col-md-3"><img src="'+base_url+'assets/img/'+json[i].id_provider+'/'+json[i].foto+'" width="100%" alt="..." class="img-thumbnail">'+
					'<div class="row"><a class="delete-img btn btn-block btn-white text-red" href="javascript:;" onclick=delete_img('+json[i].id+',"'+json[i].foto+'",'+json[i].id_provider+');><i class="fa fa-trash-o fa-lg"></i></a></div>'+
					'</div>');
			}
		}
	})
}
function delete_img(id,foto,id_provider){
	bootbox.confirm("Apakan anda yakin akan menghapus gambar ini?", function(result){
		if (result) {
			$.post( base_url+"admin/provider/delete_img", {id : id,foto : foto,id_provider : id_provider}).done(function( data ) {
				if (data == '1'){
					bootbox.alert("Data berhasil dihapus.", function(){
						get_gallery(id_provider);
					})
				} else {
					bootbox.alert('Data gagal dihapus.');
				}
			});
		}else{
		}
	});
}
function upload_image(){
	var data = new FormData($('#galleryForm')[0]);
 	var validator = $( "#galleryForm" ).validate({
 		rules: {
               image: {
	      		required: true,
	      		accept: "image/png"
	      	},
        },
        messages:{
	      image:{
	        accept: "Masukan file berekstensi png."
	      }
	    }
 	});
	
	if(validator.form()){
    	$.ajax({
           type:"POST",
           url:base_url+"admin/provider/upload_image_gallery",
           data:data,
           mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
           success:function(data)
          {
            if (data != "0"){
				bootbox.alert("Data berhasil disimpan.", function(){
				get_gallery(data);
				})
			}else{
				bootbox.alert("Data gagal disimpan.");
			}		

           }
       });
   	}
}
$(document).on('click','.lapangan',function(){
	var idx = $(this).closest('tr').attr('idx');
	// alert();
	$('[name="id"]').val(idx);
	initLapang(idx);

});
function initLapang(idx){
	// $('[name="id"]').val(idx);
	$('.lapang-row').remove();
	$.post( base_url+"admin/provider/get_lapangan", {idx: idx}).done(function( data1 ) {
		var json = $.parseJSON(data1);
		if(json.length == 0){
			$('#tabel-lapangan').append(
				'<tr class="lapang-row"><td><input type"text" class="form-control" name="kode_lapang[]" required></td>'+
				'<td><input type"number" class="form-control" name="harga[]" required><input type="hidden" class="form-control" value="0" name="id_lapang[]"></td>'+
				'<td><input type"text" class="form-control" name="ukuran[]" required></td>'+
				'<td><select class="form-control" name="jenis[]"><option value="0">Lantai Vinyl</option>'+
				'<option value="1">Rumput Sintetis</option>'+
				'<option value="2">Lantai polypropylene</option>'+
				'<option value="3">Lantai Beton</option></select></td><td>'+
				'<a class="btn btn-sm btn-white text-black" onclick="tambahLapang();"><i class="fa fa-plus-square-o fa-lg"></i></a>'+ 
				'<a class="btn btn-sm btn-white text-black" onclick="hapusLapang(this);"><i class="fa fa-minus-square-o fa-lg"></i></a>'+ 
				'</td></tr>'
			);
		}else{
			console.log(json);
			for (var i = 0; i < json.length; i++) {
				$('#tabel-lapangan').append('<tr class="lapang-row"><td><input type="text" class="form-control" value="'+json[i].kode_lapang+'" name="kode_lapang[]" required></td>'+
				'<td><input type="number" value="'+json[i].harga+'" class="form-control" name="harga[]" required></td>'+
				'<td><input type="text" value="'+json[i].ukuran+'" class="form-control" name="ukuran[]" required><input type="hidden" value="'+json[i].id_lapang+'" class="form-control" name="id_lapang[]" required></td>'+
				'<td><select class="form-control" value="'+json[i].kode_lapang+'" name="jenis[]"><option value="0">Lantai Vinyl</option>'+
				'<option value="1">Rumput Sintetis</option>'+
				'<option value="2">Lantai polypropylene</option>'+
				'<option value="3">Lantai Beton</option></select></td><td>'+
				'<a class="btn btn-sm btn-white text-black" onclick="tambahLapang();"><i class="fa fa-plus-square-o fa-lg"></i></a>'+ 
				'<a class="btn btn-sm btn-white text-black" onclick="hapusLapang(this);"><i class="fa fa-minus-square-o fa-lg"></i></a>'+ 
				'</td></tr>');
				$('[name="jenis[]"]').eq(i).val(json[i].jenis);
			}
		}
	});
}
function tambahLapang(){
	$('#tabel-lapangan').append(
		'<tr class="lapang-row"><td><input type="text" class="form-control" name="kode_lapang[]" required></td>'+
		'<td><input type="number" class="form-control" name="harga[]" required></td>'+
		'<td><input type="text" class="form-control" name="ukuran[]" required><input type="hidden" class="form-control" value="0" name="id_lapang[]"></td>'+
		'<td><select class="form-control" name="jenis[]"><option value="0">Lantai Vinyl</option>'+
		'<option value="1">Rumput Sintetis</option>'+
		'<option value="2">Lantai polypropylene</option>'+
		'<option value="3">Lantai Beton</option></select></td><td>'+
		'<a class="btn btn-sm btn-white text-black" onclick="tambahLapang();"><i class="fa fa-plus-square-o fa-lg"></i></a>'+ 
		'<a class="btn btn-sm btn-white text-black" onclick="hapusLapang(this);"><i class="fa fa-minus-square-o fa-lg"></i></a>'+ 
		'</td></tr>'
	);
}
function hapusLapang(el){
	var idx = $(el).closest('tr').find('[name="id_lapang[]"]').val();
	var kode = $(el).closest('tr').find('[name="kode_lapang[]"]').val();
	if(idx == 0){
		$(el).parent().parent().remove();
	}else{
		bootbox.confirm("Apakan anda yakin akan menghapus lapangan "+kode+"?", function(result){
			if (result) {
				$.post( base_url+"admin/provider/delete_lapang", {id : idx}).done(function( data ) {
					if (data == '1'){
						bootbox.alert("Data berhasil dihapus.", function(){
							$(el).parent().parent().remove();
						})
					} else {
						bootbox.alert('Data gagal dihapus.');
					}
				});
			}else{
			}
		});
	}
}
function post_lapang(){
	var data = $('#lapanganForm').serialize();
	var api = base_url+"admin/provider/post_lapang";
	    
    $.post(api, data).done(function( data ) {
      if (data == "1"){
        bootbox.alert("Data lapangan berhasil disimpan.", function(){
          initLapang($('[name="id"]').val());
        })
      }else{
        bootbox.alert("Gagal menyimpan data.");
      }   
    });
    console.log(base_url);
 }
$('#modal-change-password').on('hide.bs.modal', function () {
    $("#passwordForm").trigger("reset");
});
$(document).on('click','.update',function(){
	$('#myForm').trigger("reset");
	var idx = $(this).closest('tr').attr('idx');
	var tr = $(this).closest('tr');
	$('#active').show();
	$('.password').hide();
	
	$.post( base_url+"admin/pegawai/get_by_id", {idx: idx}).done(function( data1 ) {
		var json = $.parseJSON(data1);
		console.log(json)
		$('[name="id_pegawai"]').val(json.id_pegawai);
		$('[name="user_login_id"]').val(json.user_login_id);
		$('[name="username"]').val(json.username);
		$('[name="nama"]').val(json.nama);
		$('[name="email"]').val(json.email);
		$('[name="alamat"]').val(json.alamat);
		$('[name="telp"]').val(json.no_hp);
		// $('[name="longitude"]').val(json.longitude);
		$('[name="jabatan"]').val(json.jabatan);
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
	});
});
function change_pass(){
	var validator = $( "#passwordForm" ).validate();
	  if(validator.form()){
	    var data = $('#passwordForm').serialize();
	    // $.post('url', data);
	    var api = base_url+"admin/pegawai/change_pass";
	    
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
$(document).on('click','.show-trans',function(){
	var idx = $(this).closest('tr').attr('idx');
	$('#dataTables-modal').find('tbody').empty();
	$.post( base_url+"admin/provider/get_trans_by_id", {idx: idx}).done(function( data ) {
		var json = $.parseJSON(data);
		// for (var i = 0; i < json.length; i++) {
		// 	$('#dataTables-modal').append('<tr><td>'+json[i].kode_transaksi+
		// 		'</td><td>'+json[i].tgl_sewa+'</td><td>'+json[i].tgl_main+
		// 		'</td><td>'+json[i].jam_mulai+'</td><td>'+
		// 		json[i].jam_selsai+'</td><td>'+json[i].total_bayar+'</td><td>'+json[i].id_customer+
		// 		'</td><td>'+json[i].id_lapang+'</td><td>'+json[i].status+'</td><td></td></tr>');
		// }
		// $.each(data.data, function(){
		//    this[0] = 'John Smith';
		// });

		// Clear table
		table.clear();

		// Add updated data
		table.rows.add(json);
		table.draw();
		
	});

	
    // alert();
})