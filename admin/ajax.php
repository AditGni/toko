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
}
?>
