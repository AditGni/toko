<?php
/*error_reporting(0);
session_start();
mysql_connect('localhost','root','');
mysql_select_db('db_penjualankredit');*/
$arr = implode("", array_keys($_FILES));
$n = $_FILES[$arr]['name'];
$fol = "img/produk/".$n;
move_uploaded_file($_FILES[$arr]['tmp_name'], $fol);
echo $n;
?>