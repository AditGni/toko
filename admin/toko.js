function isiData(b){
	if(b=='pelanggan'){
		var nama = $("#tnama").html()
		var telp  = $("#ttelp").html()
		var alamat = $("#talamat").html()
		var email = $("#temail").html()
		var user = $("#tuser").val()
		var pass = $("#tpass").val()
		$(".add").click()
		$(".hal_tambah #nama").val(nama)
		$(".hal_tambah #telp").val(telp)
		$(".hal_tambah #email").val(email)
		$(".hal_tambah #alamat").val(alamat)
		$(".hal_tambah #user").val(user)
		$(".hal_tambah #pass").val(pass)
	}
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

		if(nama=='' || telp=='' || email=='' || alamat=='' || user=='' || pass==''){
            return false
		} else {
			$.ajax({
				url: "ajax.php",
				type: "POST",
				data: "page=add_pelanggan&nama="+nama+"&telp="+telp+"&email="+email+"&alamat="+alamat+"&user="+user+"&pass="+pass,
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