<?php
   
   // Kiểm tra lỗi id
   if( empty($_POST['id'])){
    header('location:index.php?loi=Phải truyền mã để sửa');
    exit;
}
    $id = $_POST['id'];
    // Kiểm tra lỗi 
    if( empty($_POST['id']) ||
        empty($_POST['name']) || empty($_POST['address'])   ||
    empty($_POST['phone']) ||empty($_POST['photo']) 
    ){
        header("location:form_update.php?id=$id&loi=Phải điền đầy đủ thông tin");
        exit;
    }
  
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $photo = $_POST['photo'];

    require 'connect.php';

    $sql = "update manufacturers
            set
            name = '$name',
            address = '$address',
            phone = '$phone',
            photo = '$photo'
            where 
            id = '$id'";

    mysqli_query($connect,$sql);
    $error = mysqli_error($connect);
    mysqli_close($connect);

    // Điều hướng
    if(empty($error)){
        header('location:index.php?success=Sửa thành công');
    }else{
        header("location:form_update.php?id=$id&loi=Lỗi truy vấn");
    }
   
?>