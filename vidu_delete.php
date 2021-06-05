<?php
//1. Tao ket noi
include_once __DIR__.'/dbconnect.php';
//2. Chuan bi cau lenh
    $sql=<<<EOT
    DELETE FROM hinhthucthanhtoan
    WHERE httt_ma = 4;
EOT;
//3. Thuc thi cau lệnh 

mysqli_query($conn,$sql);
?>