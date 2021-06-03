<?php
    $username_client=$_GET['username'];
    $password_client=$_GET['password'];
    $ghinho=isset($_GET['chkGhiNhoDangNhap']) ? $_GET['chkGhiNhoDangNhap'] : 'no';
    $gioitinh=isset($_GET['gioitinh']) ? $_GET['gioitinh'] : 'no';

?>
    
<ul> 
    <li>Username: <?php echo $username_client;?></li>
    <li>Password: <?php echo $password_client;?></li>
    <li>ghinho: <?php echo $ghinho;?></li>
    <li>gioitinh: <?php echo $gioitinh;?></li>
</ul>




