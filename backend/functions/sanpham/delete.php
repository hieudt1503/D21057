<?php
//Thu thập dữ liệu người dùng gợi đến
$sp_ma = $_GET['sp_ma'];

//1. Mở kết nối database
include_once __DIR__ . '/../../../dbconnect.php';

//2. Chuẩn bị câu lệnh
$sql = "DELETE FROM sanpham WHERE sp_ma=$sp_ma";

//3. Thực thi câu lệnh
mysqli_query($conn, $sql);

//4. điều hướng đến trang index.php
echo '<script>location.href="index.php"</script>';
?>