$(document).ready(function() {
	get_gallery(idx);
	$('[name="id"]').val(idx);
	// console.log(idx);
});
function get_gallery(id){
	$('.gallery-container').empty();
	$.post( base_url+"admin/provider/get_gallery", {id: id}).done(function( data1 ) {
		var json = $.parseJSON(data1);
		if(json.length == 0){

		}else{
			for (var i = 0; i < json.length; i++) {
				var def = 'alert';
				if(json[i].is_display_picture == 1){
					def = 'alert alert-success';
				}
				$('.gallery-container').append('<div class="col-md-3 '+def+'"><a href="#" class="details-img"><img src="'+base_url+'assets/img/'+json[i].id_provider+'/'+json[i].foto+'" width="100%" alt="..." class="img-thumbnail"></a>'+
					'<div class="row"><a class="delete-img col-md-6 btn btn-white text-red" href="javascript:;" onclick=delete_img('+json[i].id+',"'+json[i].foto+'",'+json[i].id_provider+');><i class="fa fa-trash-o fa-lg"></i></a>'+
					'<a class="default-img col-md-6 btn btn-white text-red" href="javascript:;" onclick=set_default('+json[i].id+','+json[i].id_provider+');><i class="fa fa-check fa-lg" style="color:'+def+'"></i></a></div>'+
					'</div>');
			}
		}
	})
}
$(document).on('click','.details-img',function(){
	$('.img-show').empty();
	$('.img-show').append($(this).html());
	$('#modal-img').modal('show');
})
function set_default(id,id_provider){
	bootbox.confirm("Apakan anda yakin akan menjadikan gambar ini sebagai foto profil anda?", function(result){
		if (result) {
			$.post( base_url+"admin/provider/set_default", {id : id,id_provider : id_provider}).done(function( data ) {
				if (data == '1'){
					bootbox.alert("Foto profil berhasil di set.", function(){
						get_gallery(id_provider);
					})
				} else {
					bootbox.alert('Foto profil gagal di set.');
				}
			});
		}else{
		}
	});
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