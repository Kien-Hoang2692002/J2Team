<?php
        $token = $_GET['token'];
        require 'admin/connect.php';
        $sql = "select customer_id from 
        forgot_password 
        where token = '$token'";
        $result = mysqli_query($connect, $sql);
        if(mysqli_num_rows($result) === 0){
           header('location:index.php');
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
</head>
<body>
   <form action="process_change_new_password.php" method="post">
        <input type="hidden" name='token' value="<?php echo $token?>">
        Mật khẩu mới
        <input type="password" name='password'>
        <br>
        <button>
            Đổi mật khẩu
        </button>
   </form>
</body>
</html>