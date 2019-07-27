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
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Aksi</th>
			</tr>
			<?php
			$i = 1;
			while($d = mysql_fetch_array($sql)){?>
				<tr>
					<td class="text-center"><?= $i++;?></td>
					<td id="tnama"><?= $d['nama_customer'];?></td>
					<td id="talamat"><?= $d['alamat'];?></td>
					<td id="ttelp"><?= $d['telephone'];?></td>
					<td id="temail"><?= $d['email'];?></td>
					<td class="text-center">
						<input type="hidden" id="tuser" value="<?= $d['username'];?>">
						<input type="hidden" id="tpass" value="<?= $d['password'];?>">
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
				<td>Berat</td>
				<td>Keterangan</td>
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
				<td><?= number_format($d['harga']);?></td>
				<td><?= $d['Stok'];?></td>
				<td><?= $d['berat'];?></td>
				<td><?= $d['Ket_produk'];?></td>
				<td>
					<button class="btn btn-warning edit"><i class="fa fa-edit"></i></button>
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
		$("#"+aksi).addClass('col-md-6 offset-md-3');
		$("#"+aksi).removeClass('col-md-12');
	});

	$(".hapus").click(function(){
		var id = $(this).attr('alt')
		$.ajax({
			url: "ajax.php",
			type: "POST",
			data: "id="+id+"&page=hapus&hal="+aksi,
			success: function(ada){
				viewData(aksi)
			}
		})
	})

	$(".edit").click(function(){
		// var id = $(this).attr('alt')
		var isi = isiData(aksi)
		$("#"+aksi+" .hal_tambah .btn-success").addClass('btn-warning');
		$("#"+aksi+" .hal_tambah .btn-warning").removeClass("btn-success");
	})
</script>
<?php } ?>