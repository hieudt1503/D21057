<?php

//1. Tao ket noi
include_once __DIR__.'/dbconnect.php';
//2. Chuan bi cau lenh

    $sql =<<<EOT
    SELECT httt_ma AS MaThanhToan, httt_ten AS TenThanhToan 
    FROM 'hinhthucthanhtoan';

EOT;

//3. Thuc thi cau lenh
    $result = mysqli_query($conn,$sql);

//4. Boc tach du lieu
    $data =[];
    while($row = mysql_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'ma' => $row['MaThanhToan'],
            'ten'=> $row['TenThanhToan'],
        );

    }



?>

<table>
    <thead>
        <tr>
            <td>Ma HTTT</td>
            <td>Ten HTTT</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ?>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>