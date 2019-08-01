<div id="hilang">
	<input type="hidden" id="aksi">
	<div class="col-md-12" id="pelanggan">
		<div class="card">
			<div id="lihat">
			</div>
			<div id="tambah_pelanggan" class="hal_tambah">
				<div class="card-header"><h3 class="card-title"><i class="fa fa-user"></i> Tambah Pelanggan</h3></div>
				<div class="card-body">
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" id="nama">
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input type="text" class="form-control" id="telp">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" id="email">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" id="alamat"></textarea>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Username</label>
							<input type="text" class="form-control" id="user">
						</div>
						<div class="form-group col-md-6">
							<label>Password</label>
							<input type="password" class="form-control" id="pass">
						</div>
					</div>
					<button class="btn btn-success"><i class="fa fa-save"></i></button>
					<button class="btn btn-danger"><i class="fa fa-sign-out-alt"></i></button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12" id="produk">
		<div class="card">
			<div id="lihat">
			</div>
			<div id="tambah_produk" class="hal_tambah">
				<div class="card-header"><h3 class="card-title"><i class="fa fa-user"></i> Tambah Produk</h3></div>
				<div class="card-body">
					<div class="form-group">
						<label>Kategori</label>
						<select class="form-control" id="idkat">
							<option value="no">...</option>
							<?php
							$sql = mysql_query("SELECT * FROM tb_kategori ORDER BY id_kategori ASC");
							while($d = mysql_fetch_array($sql)){?>
								<option value="<?= $d['id_kategori'];?>"><?= ucfirst($d['nama_kategori']);?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" class="form-control" id="namap">
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Harga Beli</label>
								<input type="text" class="form-control" id="beli">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Harga Jual</label>
								<input type="text" class="form-control" id="jual">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Stok</label>
							<input type="text" class="form-control" id="stok">
						</div>
						<div class="form-group col-md-6">
							<label class="gmbr">Gambar</label>
							<input type="file" id="gmbr">
							<input type="hidden" id="val_img">
						</div>
					</div>
					<div class="form-group">
						<img src="" class="img-thumbnail w-50 mx-auto d-block" id="gambar">
					</div>
					<button class="btn btn-success"><i class="fa fa-save"></i></button>
					<button class="btn btn-danger"><i class="fa fa-sign-out-alt"></i></button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12" id="kategori">
		<div class="card">
			<div id="lihat">
			</div>
			<div id="tambah_kategori" class="hal_tambah">
            <div class="card-header"><h3 class="card-title"><i class="fa fa-user"></i> Tambah Kategori</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label>ID Kategori</label>
                    <input type="text" class="form-control" id="id">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" class="form-control" id="kat">
                </div>
                <button class="btn btn-success"><i class="fa fa-save"></i></button>
                <button class="btn btn-danger "><i class="fa fa-sign-out-alt"></i></button>
            </div>
			</div>
		</div>
	</div>
	<div class="col-md-12" id="keranjang">
		<div class="card">
			<div class="card-header"><h3 class="card-title"><i class="icon-basket-loaded"></i> Keranjang</h3></div>
			<div class="card-body text-left">
				<table class="table table-bordered table-striped">
					<tr>
						<td>No</td>
						<td>Nama</td>
						<td>Tanggal</td>
						<td>Kesimpulan</td>
					</tr>
					<tr>
						<td>No</td>
						<td>Nama</td>
						<td>Tanggal</td>
						<td>Kesimpulan</td>
					</tr>
				</table>
				<button class="btn btn-danger kem">Kembali</button>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(".hal_tambah .btn-success").click(function(){
			alert("disni")
			return false
			aksi = $("#aksi").val();
			var cek = ambilData(aksi)
			if(cek){
				$(".hal_tambah").hide()
				var val = viewData(aksi)
				$("#"+aksi+" #lihat").show()
				$("#"+aksi).addClass('col-md-12');
				$("#"+aksi).removeClass('col-md-6 offset-md-3');
				$("#"+aksi+" .card").before("<div class='alert alert-success'><i class='fa fa-check'></i> Tambah "+aksi+" berhasil");
				$(".alert-success").fadeOut(2000)
			}
		})

		$(".hal_tambah .btn-danger").click(function(){
			$("#"+aksi+" #tambah_"+aksi).hide();
			$("#"+aksi+" #lihat").show()
			var val = viewData(aksi)
			$("#"+aksi).addClass('col-md-12');
			$("#"+aksi).removeClass('col-md-6 offset-md-3');
		})

		$("#gmbr").change(function(){
			var isi = new FormData();
			var nama = $(this).attr('name');
			isi.append(nama, $(this)[0].files[0]);
			$.ajax({
			  url: "ajax2.php",
			  type: "POST",
			  cache: false,
			  processData: false,
			  contentType: false,
			  data: isi,
			  success: function(ada){
			  	$("#gambar").attr('src','img/produk/'+ada);
			  	$("#val_img").val(ada)
			  }
			})
		})
	</script>
</div>