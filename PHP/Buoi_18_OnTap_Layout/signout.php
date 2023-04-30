<?php

    session_start();
    // unset(): xóa một biến hoặc một phần tử trong mảng. 
    // Nó sẽ hủy bỏ giá trị của biến hoặc phần tử đó 
    // và xóa nó khỏi bộ nhớ.Không thể truy cập được nữa.
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    
    header('location:index.php');


?>