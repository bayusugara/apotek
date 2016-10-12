$(document).ready(function() {
	initLapang(idx);
	$('[name="id"]').val(idx);
	// console.log(idx);
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