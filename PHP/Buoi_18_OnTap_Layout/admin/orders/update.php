<?php
    $order_id = $_GET['id'];
    $status = $_GET['status'];
    require '../connect.php';

    $sql = "update orders 
    set status = $status 
    where id = '$order_id'";

    mysqli_query($connect, $sql);



?>