<?php
//improve : cai tien
$conn = mysqli_connect('127.0.0.1','root','','salomon') or die('Khong ket noi duoc database');

$conn->query("SET NAMES 'utf8'"); 
$conn->query("SET CHARACTER SET UTF8");  
$conn->query("SET SESSION collation_connection = 'utf8_general_ci'");
?>