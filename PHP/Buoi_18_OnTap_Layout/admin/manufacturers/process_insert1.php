<?php

    // Kiểm tra lỗi 
    if( empty($_POST['name']) || empty($_POST['address'])   ||
    empty($_POST['phone']) ||empty($_POST['photo']) 
    ){
        header('location:form_insert.php?loi=Phải điền đầy đủ thông tin');
    }

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $photo = $_POST['photo'];

    require 'connect.php';

    $sql = "insert into manufacturers(name,address,phone,photo)
            values('$name', '$address', '$phone', '$photo')";

    mysqli_query($connect,$sql);
    mysqli_close($connect);

    // Điều hướng
    header('location:index.php?success=Thêm thành công');

?>