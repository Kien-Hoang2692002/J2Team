<?php 
    
    session_start();
    if(empty($_SESSION['id'])){
        header('location:signin.php?error=Đăng nhập đi bạn');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    Đây là trang người dùng. Xin chào bạn 

<?php 
    echo $_SESSION['name'];
?>
    <a href="signout.php">
        Ơ đã đăng xuất rồi à, đừng bỏ rơi tôi
    </a>

</body>
</html>