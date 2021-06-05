<?php
//1. Tao ket noi
include_once __DIR__.'/dbconnect.php';

//2. Chuan bi ket noi
    $sql =<<<EOT
    UPDATE hinhthucthanhtoan
    SET httt_ten = 'Tiền mặt update from PHP'
    WHERE httt_ma = 1;

EOT;

// var_dump($sql);
// die;

//3. Thuc thi cau lenh
 mysqli_query($conn,$sql);
?>