<?php

    $ten =$_GET['name'];
    echo "Bạn đã nhập tên là: $ten <br/>";
    

    $ngay_sinh =$_GET['ngay_sinh'];
    echo "Bạn đã nhập ngày sinh là: $ngay_sinh <br/>";

    $gender = $_GET['gender'];
    echo "Bạn đã nhập giới tính là: $gender <br/>";

    $email = $_GET['email'];
    echo "Bạn đã nhập email là: $email <br/>";

    $password = $_GET['password'];
    echo "Bạn đã nhập password là: $password <br/>";

    $address = empty( !$_GET['address'] ) ? 
                        $_GET['address'] : 'Bạn chưa nhập địa chỉ';
    echo "Bạn đã nhập địa chỉ là: $address <br/>";

    $hobby = $_GET['hobby'];
    echo "Bạn đã nhập sở thích là: $hobby <br/>";
                

?>