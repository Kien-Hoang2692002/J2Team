<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    ?>

<form action="process_signup.php" method="post">

    <h1>Form đăng ký</h1>
    Tên 
    <input type="text" name="name">
    <br>
    Email
    <input type="email" name="email">
    <br>
    Mật khẩu
    <input type="password" name="password">
    <br>
    Số điện thoại
    <input type="text" name="phone_number">
    <br>
    Địa chỉ
    <input type="text" name="address">
    <br>
    <button>Đăng ký</button>
</form>

</body>
</html>