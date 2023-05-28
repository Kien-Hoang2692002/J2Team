<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
   <?php
    session_start();
    $cart = $_SESSION['cart'];
    $sum = 0;
    ?>

    <table border="1" width="100%" >
        <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Xóa</th>
        </tr>
        <?php foreach($cart as $id => $each): ?>
            <tr>
                <td><img height="100px" src="admin/products/photo/<?php echo $each['photo']?>" alt=""></td>
                <td><?php echo $each['name']?></td>
                <td><?php echo $each['price']?></td>
                <td>
                    <a href="update_quantity_in_cart.php?id=<?php echo $id ?>$type=decrease">
                        -
                    </a>
                    <?php echo $each['quantity']?>
                    <a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=increase">
                        +
                    </a>
                </td>
                <td>
                    <?php   
                        $result =  $each['price']* $each['quantity'];
                        echo $result;
                        $sum += $result;
                    ?>
                </td>
                <td>
                    <a href="delete_from_cart.php?id=<?php echo $id ?>">
                        X
                    </a>
                </td>
            </tr>

        <?php endforeach ?>
    </table>
    <h1>
        Tổng tiền hóa đơn:
        $<?php echo $sum ?>
    </h1>

    <?php
        $id = $_SESSION['id'];
        require 'admin/connect.php';
        $sql = "select * from customers where id ='$id'";
        $result = mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);
    ?>

    <form action="process_checkout.php" method="POST">
        Tên người nhận
        <input type="text" name="name_receiver" value="<?php echo $each['name']?>">
        <br>
        Số điện thoại người nhận 
        <input type="text" name="phone_receiver" value="<?php echo $each['phone_number']?>">
        <br>
        Địa chỉ người nhận 
        <input type="text" name="address_receiver" value="<?php echo $each['address']?>">
        <br>
        <button>Đặt hàng</button>
    </form>
</body>
</html>