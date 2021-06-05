<?php
//magic variable

//--------1. Tao ket noi--------------
//Directory : thu muc
//C:/xampp/htdoc/D21057
include_once  __DIR__.'/dbconnect.php';


//--------2.chuan bi cau lenh---------

$ten = $_POST['tenhinhthucthanhtoan'];

    $sql=<<<EOT
    INSERT INTO hinhthucthanhtoan(httt_ten) VALUES('$ten');
EOT;

//debug
// var_dump($sql);//hoac dung print_r($sql);
// die;// dung lai de kiem tra

//--------3. Execute sql query: thuc thi cau lenh------------


mysqli_query($conn, $sql);


echo 'Them hinh thuc thanh toan thanh cong';



?>