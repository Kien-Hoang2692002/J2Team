<?php
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    require 'admin/connect.php';

    $sql = "select count(*) from customers
    where email = '$email'";
    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_fetch_array($result)['count(*)'];

    if($number_rows == 1){
        session_start();
        $_SESSION['error'] = "Trùng email rồi.Bạn chắc chứ, are you sure?";
        header('location:signup.php');
        exit;
    }

    $sql = "insert into customers(name,email,password,phone_number,address)
    value('$name','$email','$password','$phone_number','$address')";
    mysqli_query($connect, $sql);

    // require 'mail.php';
    // $title = "Đăng kí thành công";
    // $content ="Chúc mừng đăng kí thành công";
    // send_mail($email,$name,$title,$content);

    // Lưu lại trong session những gì hay truy vấn 
    // session: server chủ
    $sql = "select id from customers where email = '$email'";
    $result = mysqli_query($connect, $sql);
    $id = mysqli_fetch_array($result)['id'];
    session_start();
    $_SESSION['id'] = $id ;
    $_SESSION['name'] = $name; 

    mysqli_close($connect);




?>