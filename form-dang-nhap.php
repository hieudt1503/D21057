<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form dang nhap</title>
</head>
<body>
    <h3>Form dang nhap</h3>
    <form method="GET" action="xu-ly-dang-nhap.php">
        <label for="username">Username</label>
        <input type="text" name="username" id="username"/><br />
        <label for="password">Password</label>
        <input type="password" name="password" id="password"/><br />

        <label for="gioitinh1">Nam</label>
        <input type="radio" name="gioitinh" id="gioitinh1" value="1"><br />
        <label for="gioitinh">Nu</label>
        <input type="radio" name="gioitinh" id="gioitinh2" value="2"><br />

        <label for="">Ghi nho dang nhap</label>
        <input type="checkbox" name="chkGhiNhoDangNhap" value="1"/><br />

        <button name="btnlogin">Dang nhap</button>
    </form>
</body>
</html>