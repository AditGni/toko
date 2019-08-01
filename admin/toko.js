function isiData(b, c){
	$.ajax({
		url: "ajax.php",
		type: "POST",
		data: "page=isi&id="+c+"&hal="+b,
		success: function(ada){
			$(".add").click()
			$("#"+b+" .hal_tambah").html(ada)
		}
	})
}

function ambilData(a){
	if(a=='pelanggan'){
		var nama = $("#nama").val()
		var telp = $("#telp").val()
		var email = $("#email").val()
		var alamat = $("#alamat").val()
		var user = $("#user").val()
		var pass = $("#pass").val()

		if(nama==''){
			$("#nama").addClass('border-danger');
		} else {
			$("#nama").removeClass('border-danger');
		}

		if(telp==''){
			$("#telp").addClass('border-danger');
		} else {
			$("#telp").removeClass('border-danger');
		}

		if(email==''){
			$("#email").addClass('border-danger');
		} else {
			$("#email").removeClass('border-danger');
		}

		if(alamat==''){
			$("#alamat").addClass('border-danger');
		} else {
			$("#alamat").removeClass('border-danger')
		}

		if(user==''){
			$("#user").addClass('border-danger')
		} else {
			$("#user").removeClass('border-danger')
		}

		if(pass==''){
			$("#pass").addClass('border-danger')
		} else {
			$("#pass").removeClass('border-danger')
		}
		
		var id = $(".hal_tambah .btn-success").attr('alt')
		if(nama=='' || telp=='' || email=='' || alamat=='' || user=='' || pass==''){
            return false
		} else {
			var go;
			if(id){
				go = 'edit_'+a;
			} else {
				go = 'add_'+a;
			}
			$.ajax({
				url: "ajax.php",
				type: "POST",
				data: "page="+go+"&id="+id+"&nama="+nama+"&telp="+telp+"&email="+email+"&alamat="+alamat+"&user="+user+"&pass="+pass,
				success: function(data){
				}
			})
            return true
		}
	} else if(a=='produk'){
		var kat = $("#idkat").val()
		var nama = $("#namap").val()
		var beli = $("#beli").val()
		var jual = $("#jual").val()
		var stok = $("#stok").val()
		var img = $("#val_img").val()

		if(kat=='no'){
			$("#idkat").addClass('border-danger');
		} else {
			$("#idkat").removeClass('border-danger');
		}

		if(nama==''){
			$("#namap").addClass('border-danger');
		} else {
			$("#namap").removeClass('border-danger');
		}

		if(beli==''){
			$("#beli").addClass('border-danger');
		} else {
			$("#beli").removeClass('border-danger');
		}

		if(jual==''){
			$("#jual").addClass('border-danger');
		} else {
			$("#jual").removeClass('border-danger');
		}

		if(stok==''){
			$("#stok").addClass('border-danger');
		} else {
			$("#stok").removeClass('border-danger')
		}

		if(img==''){
			$(".gmbr").addClass('text-danger');
		} else {
			$(".gmbr").removeClass('text-danger')
		}
		
		var id = $(".hal_tambah .btn-success").attr('alt')
		if(nama=='' || beli=='' || jual=='' || stok=='' || kat=='no' || img==''){
            return false
		} else {
			var go;
			if(id){
				go = 'edit_'+a;
			} else {
				go = 'add_'+a;
			}
			$.ajax({
				url: "ajax.php",
				type: "POST",
				data: "page="+go+"&id="+id+"&nama="+nama+"&kat="+kat+"&beli="+beli+"&jual="+jual+"&img="+img+"&stok="+stok,
				success: function(data){
					// $("#big-title").html(data)
				}
			})
            return true
		}
	} else if(a=='kategori'){
		var idkat = $("#id").val()
		var kat = $("#kat").val()

		if(idkat==''){
			$("#id").addClass('border-danger');
		} else {
			$("#id").removeClass('border-danger');
		}
		if(kat==''){
			$("#kat").addClass('border-danger');
		} else {
			$("#kat").removeClass('border-danger');
		}
		
		var id = $(".hal_tambah .btn-success").attr('alt')
		if(idkat=='' || kat==''){
            return false
		} else {
			var go;
			if(id){
				go = 'edit_'+a;
			} else {
				go = 'add_'+a;
			}
			$.ajax({
				url: "ajax.php",
				type: "POST",
				data: "page="+go+"&id="+id+"&id_kat="+idkat+"&kat="+kat,
				success: function(data){
				}
			})
            return true
		}
	}
}

function viewData(d){
    $.ajax({
        url: "load.php",
        type: "POST",
        data: "muat="+d,
        success: function(ada){
            $("#"+d+" #lihat").html(ada)
        }
    })

}

function kosongkan(a){
	if(a=='pelanggan'){
		$("#nama").val('')
		$("#alamat").val('')
		$("#user").val('')
		$("#pass").val('')
		$("#telp").val('')
		$("#email").val('')
	} else if(a=='kategori'){
		$("#id").val('')
		$("#kat").val('')
	} else if(a=='produk'){
		$("#kat").val('no')
		$("#namap").val('')
		$("#beli").val('')
		$("#jual").val('')
		$("#stok").val('')
	}
}