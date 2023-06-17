<?php

    // Lấy URL của page hiện tại
    function current_url() {
        $url = "http://". $_SERVER['HTTP_HOST'];
        $validURL = str_replace("&", "&amp", $url);
        return $validURL;
    }

    $email = $_POST['email'];
    require 'admin/connect.php';

    $sql = "select id,name from customers
    where email = '$email' ";

    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) === 1){
        $each = mysqli_fetch_array($result);
        $id = $each['id'];
        $name = $each['name'];
        $sql = "delete from forgot_password where
        customer_id ='$id'";
        $result = mysqli_query($connect, $sql);
        $token = uniqid();
        $sql = "insert into forgot_password(customer_id, token)
        values('$id', '$token')";
        mysqli_query($connect, $sql);
        
        $link = current_url().'/j2team/Buoi_18_OnTap_Layout/change_new_password.php?token='.$token;
        echo "Truy cập link sau để đổi mật khẩu $link" ;

        require 'mail.php';
        $title = "Change new Password";
        $content = "Bấm vào đây để đổi mật khẩu
        <a href='$link'>Hiệu lực trong 24 giờ</a>";
        //send_mail($email,$name,$title,$content);
    }
?>