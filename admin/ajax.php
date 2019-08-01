<?php
mysql_connect('localhost','root','');
mysql_select_db('dbtokoonline');
if($_POST['page']){
    $page = $_POST['page'];
    // ADD PART'S
    if($page=='add_pelanggan'){
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        mysql_query("INSERT INTO tb_customer VALUES('','$user','$pass','$nama','$alamat','$telp','$email')");
    } else if($page=='add_produk'){
        $kat = $_POST['kat'];
        $nama = $_POST['nama'];
        $beli = $_POST['beli'];
        $jual = $_POST['jual'];
        $stok = $_POST['stok'];
        $img = $_POST['img'];

        mysql_query("INSERT INTO tb_produk VALUES('','$nama','$kat','$beli','$jual','$stok','$img')");
    } else if($page=='add_kategori'){
        $id = $_POST['id_kat'];
        $kat = $_POST['kat'];
        mysql_query("INSERT INTO tb_kategori VALUES('$id','$kat')");
    }

    // EDIT PART'S
    if($page=='edit_pelanggan'){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        mysql_query("UPDATE tb_customer SET username='$user',password='$pass',nama_customer='$nama',alamat='$alamat',telephone='$telp',email='$email' WHERE id_customer='$id'");
    } else if($page=='edit_produk'){
        $id = $_POST['id'];
        $kat = $_POST['kat'];
        $nama = $_POST['nama'];
        $beli = $_POST['beli'];
        $jual = $_POST['jual'];
        $stok = $_POST['stok'];
        $img = $_POST['img'];
        
        mysql_query("UPDATE tb_produk SET id_kategori='$kat',nama_produk='$nama',harga_beli='$beli',harga_jual='$jual',stok='$stok',gambar='$img' WHERE id_produk='$id'");
    } else if($page=='edit_kategori'){
        $idl = $_POST['id'];
        $id = $_POST['id_kat'];
        $kat = $_POST['kat'];
        mysql_query("UPDATE tb_kategori SET id_kategori='$id', nama_kategori='$kat' WHERE id_kategori='$idl'");
    }




    // Delete PART'S
    if($page=='hapus'){
        $id = $_POST['id'];
        $hal = $_POST['hal'];
        if($hal=='pelanggan'){
            $hal = 'customer';
        }
        $str = "DELETE FROM tb_".$hal." WHERE id_".$hal."='$id'";
        mysql_query($str);
    }

    // Containing Part's
    if($page=='isi'){
        $id = $_POST['id'];
        $hal = $_POST['hal'];
        if($hal=='pelanggan'){
            $hal = 'customer';
        }
        $str = "SELECT * FROM tb_$hal WHERE id_$hal='$id'";
        $sql = mysql_query($str);
        $d = mysql_fetch_array($sql);
        if($hal=='customer'){?>
            <div class="card-header"><h3 class="card-title"><i class="fa fa-user"></i> Edit Pelanggan</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" value="<?= $d['nama_customer'];?>">
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" class="form-control" id="telp" value="<?= $d['telephone'];?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" value="<?= $d['email'];?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" id="alamat"><?= $d['alamat'];?></textarea>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text" class="form-control" id="user" value="<?= $d['username'];?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control" id="pass" value="<?= $d['password'];?>">
                    </div>
                </div>
                <button class="btn btn-success" alt="<?= $d['id_customer'];?>"><i class="fa fa-save"></i></button>
                <button class="btn btn-danger"><i class="fa fa-sign-out-alt"></i></button>
            </div>
        <?php } else if($hal=='produk'){?>
            <div class="card-header"><h3 class="card-title"><i class="fa fa-user"></i> Edit Produk</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" id="idkat">
                        <option value="no">...</option>
                        <?php
                        $id = $d['id_kategori'];
                        $sql = mysql_query("SELECT * FROM tb_kategori ORDER BY id_kategori ASC");
                        while($dt = mysql_fetch_array($sql)){?>
                            <option value="<?= $dt['id_kategori'];?>" <?= $id==$dt['id_kategori'] ? 'selected' : '';?>><?= ucfirst($dt['nama_kategori']);?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" id="namap" value="<?= $d['nama_produk'];?>">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Beli</label>
                            <input type="text" class="form-control" id="beli" value="<?= $d['harga_beli'];?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="text" class="form-control" id="jual" value="<?= $d['harga_jual'];?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Stok</label>
                        <input type="text" class="form-control" id="stok" value="<?= $d['stok'];?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="gmbr">Gambar</label>
                        <input type="file" id="gmbr">
                        <input type="hidden" id="val_img" value="<?= $d['gambar'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <img src="img/produk/<?= $d['gambar'];?>" class="img-thumbnail w-50 mx-auto d-block" id="gambar">
                </div>
                <button class="btn btn-success" alt="<?= $d['id_produk'];?>"><i class="fa fa-save"></i></button>
                <button class="btn btn-danger"><i class="fa fa-sign-out-alt"></i></button>
            </div>
        <?php } else if($hal=='kategori'){?>
            <div class="card-header"><h3 class="card-title"><i class="fa fa-user"></i> Edit Kategori</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <label>ID Kategori</label>
                    <input type="text" class="form-control" id="id" value="<?= $d['id_kategori'];?>">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" class="form-control" id="kat" value="<?= $d['nama_kategori'];?>">
                </div>
                <button class="btn btn-success"><i class="fa fa-save"></i></button>
                <button class="btn btn-danger "><i class="fa fa-sign-out-alt"></i></button>
            </div>
        <?php } ?>
        <script type="text/javascript">
            $(".hal_tambah .btn-success").click(function(){
                aksi = $("#aksi").val();
                var cek = ambilData(aksi)
                if(cek){
                    $(".hal_tambah").hide()
                    $("#"+aksi+" #lihat").show()
                    var val = viewData(aksi)
                    $("#"+aksi).addClass('col-md-12');
                    $("#"+aksi).removeClass('col-md-6 offset-md-3');
                    $("#"+aksi+" .card").before("<div class='alert alert-success'><i class='fa fa-check'></i> Edit "+aksi+" berhasil");
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
        <?php
    }
}
?>
