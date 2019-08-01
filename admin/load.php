<?php
mysql_connect('localhost','root','');
mysql_select_db('dbtokoonline');
if($_POST['muat']){
	$muat = $_POST['muat'];
	if($muat=='pelanggan'){
?>
	<div class="card-header"><h3 class="card-title"><i class="fa fa-user"></i> Pelanggan</h3></div>
	<div class="card-body">
		<?php
		$sql = mysql_query("SELECT * FROM tb_customer ORDER BY id_customer ASC");
		$r = mysql_num_rows($sql);
		if($r){?>
		<table class="table table-bordered table-striped">
			<tr class="text-center">
				<th>No</th>
				<th>Nama Customer</th>
				<th>Email</th>
				<th>Telepon</th>
				<th>Alamat</th>
				<th>Aksi</th>
			</tr>
			<?php
			$i = 1;
			while($d = mysql_fetch_array($sql)){?>
				<tr>
					<td class="text-center"><?= $i++;?></td>
					<td><?= $d['nama_customer'];?></td>
					<td><?= $d['email'];?></td>
					<td><?= $d['telephone'];?></td>
					<td><?= $d['alamat'];?></td>
					<td class="text-center">
						<button class="btn btn-warning edit" alt="<?= $d['id_customer'];?>"><i class="fa fa-edit"></i></button>
						<button class="btn btn-danger hapus" alt="<?= $d['id_customer'];?>"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			<?php } ?>
		</table>
		<?php } else {?>
			<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Data Pelanggan masih kosong</div>
		<?php } ?>
		<button class="btn btn-primary add">Tambah</button>
		<button class="btn btn-danger kem">Kembali</button>
	</div>
	<?php
	} else if($muat=='produk'){?>
	<div class="card-header"><h3 class="card-title"><i class="fa fa-building"></i> Produk</h3></div>
	<div class="card-body text-left">
	<?php
	$sql = mysql_query("SELECT * FROM tb_produk a, tb_kategori b WHERE a.id_kategori=b.id_kategori ORDER BY id_produk ASC");
	$r = mysql_num_rows($sql);
	if($r){
	?>
		<table class="table table-bordered table-striped">
			<tr class="text-center">
				<td>No</td>
				<td>Kategori</td>
				<td>Nama Produk</td>
				<td>Harga Beli</td>
				<td>Harga Jual</td>
				<td>Stok</td>
				<td>Gambar</td>
				<td>Opsi</td>
			</tr>
			<?php
			$no = 1;
			while($d = mysql_fetch_array($sql)){?>
			<tr>
				<td class="text-center"><?= $no++;?></td>
				<td><?= ucfirst($d['nama_kategori']);?></td>
				<td><?= ucfirst($d['nama_produk']);?></td>
				<td><?= number_format($d['harga_beli']);?></td>
				<td><?= number_format($d['harga_jual']);?></td>
				<td><?= $d['stok'];?></td>
				<td><img src="img/produk/<?= $d['gambar'];?>" style="width:150px; height:auto"></td>
				<td>
					<button class="btn btn-warning edit" alt="<?= $d['id_produk'];?>"><i class="fa fa-edit"></i></button>
					<button class="btn btn-danger hapus" alt="<?= $d['id_produk'];?>"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
			<?php } ?>
		</table>
	<?php } else { ?>
		<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Data Produk masih kosong</div>
	<?php } ?>
		<button class="btn btn-primary add">Tambah</button>
		<button class="btn btn-danger kem">Kembali</button>
	</div>
<?php } else if($muat=='kategori'){?>
	<?php
	$sql = mysql_query("SELECT * FROM tb_kategori ORDER BY id_kategori ASC");
	$r = mysql_num_rows($sql);
	if($r){
	?>
	<div class="card-header"><h3 class="card-title"><i class="fa fa-building"></i> Kategori</h3></div>
	<div class="card-body text-left">
		<table class="table table-bordered table-striped">
			<tr class="text-center">
				<td>No</td>
				<td>ID Kategori</td>
				<td>Kategori</td>
				<td>Opsi</td>
			</tr>
			<?php
			$no = 1;
			while($d = mysql_fetch_array($sql)){?>
			<tr>
				<td class="text-center"><?= $no++;?></td>
				<td><?= $d['id_kategori'];?></td>
				<td><?= $d['nama_kategori'];?></td>
				<td class="text-center">
					<button class="btn btn-warning edit" alt="<?= $d['id_kategori'];?>"><i class="fa fa-edit"></i></button>
					<button class="btn btn-danger hapus" alt="<?= $d['id_kategori'];?>"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
		<?php } ?>
		</table>
	<?php } else { ?>
		<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Data Kategori masih kosong</div>
	<?php } ?>
		<button class="btn btn-primary add">Tambah</button>
		<button class="btn btn-danger kem">Kembali</button>
	</div>
<?php } ?>
<script type="text/javascript">
	$(".kem").click(function(){
		$("#seks").fadeOut();
	})
	var aksi = $("#aksi").val()
	$(".add").click(function(){
		aksi = $("#aksi").val();
		$("#"+aksi+" #lihat").hide();
		$("#tambah_"+aksi).show();
		var kos = kosongkan(aksi)
		$("#"+aksi).addClass('col-md-6 offset-md-3');
		$("#"+aksi).removeClass('col-md-12');
		// $(".hal_tambah .btn-success").attr('alt','')
	});

	$(".hapus").click(function(){
		var id = $(this).attr('alt')
		if(confirm("Anda yakin ingin menghapus "+aksi))
		{
			$.ajax({
				url: "ajax.php",
				type: "POST",
				data: "id="+id+"&page=hapus&hal="+aksi,
				success: function(ada){
					viewData(aksi)
				}
			})
			$("#"+aksi+" .card").before("<div class='alert alert-success'><i class='fa fa-check'></i> Hapus "+aksi+" berhasil");
			$(".alert-success").fadeOut(2000)
		}
	})

	$(".edit").click(function(){
		var id = $(this).attr('alt')
		var isi = isiData(aksi, id)
		$(".hal_tambah .btn-success").attr('alt',id)
	})
</script>
<?php } ?>