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
    <form method="POST" action="xu-ly-dang-ky.php">
        <label for="username">Fullname</label>
        <input type="text" name="fullname" id="fullname"/><br />
        <label for="username">Username</label>
        <input type="text" name="username" id="username"/><br />
        <label for="password">Password</label>
        <input type="password" name="password" id="password"/><br />
        <button name="btnlogin">Dang nhap</button>
    </form>
</body>
</html>