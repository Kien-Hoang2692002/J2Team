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
    $total= 0;
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
                <td>
                    <span class="span-price">
                        <?php echo $each['price']?>
                    </span>
                </td>
                <td>
                    <!-- <a href="update_quantity_in_cart.php?id=<?php echo $id ?>$type=decrease">
                        -
                    </a> -->
                    <button 
                        class="btn-update-quantity" 
                        data-id='<?php echo $id ?>'
                        data-type='decrease'
                    >
                        -
                    </button>
                    <span class="span-quantity">
                        <?php echo $each['quantity']?>
                    </span>
                    <!-- <a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=increase">
                        +
                    </a> -->
                    <button 
                        class="btn-update-quantity" 
                        data-id='<?php echo $id ?>'
                        data-type='increase'
                    >
                        +
                    </button>
                </td>
                <td>
                    <span class="span-sum">
                        <?php   
                            $sum =  $each['price']* $each['quantity'];
                            $total += $sum;
                            echo $sum;
                        ?>
                    </span>
                </td>
                <td>
                    <button 
                        class="btn-delete"
                        data-id="<?php echo $id ?>"
                    >
                        X
                    </button>
                    <!-- <a href="delete_from_cart.php?id=<?php echo $id ?>">
                        X
                    </a> -->
                </td>
            </tr>

        <?php endforeach ?>
    </table>
    <h1>
        Tổng tiền hóa đơn:
        <span id="span-total">
            $<?php echo $total ?>
        </span>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
           $(".btn-update-quantity").click(function () { 
            let btn = $(this);
            let id = btn.data('id');
            let type = btn.data('type');
            
            $.ajax({
                type: "GET",
                url: "update_quantity_in_cart.php",
                data: {id, type},
                success: function (response) {
                    let parent_tr = btn.parents('tr');
                    let price = parent_tr.find('.span-price').text();
                    let quantity = parent_tr.find('.span-quantity').text();
                    if(type == "increase"){
                        quantity++;
                    }else{
                        quantity--;   
                    }
                    if(quantity === 0){
                        parent_tr.remove();
                    }else{
                        parent_tr.find('.span-quantity').text(quantity);
                        let sum = price * quantity;
                        parent_tr.find('.span-sum').text(sum);
                        getTotal();
                    }  
                }
            });
           });
           // Bắt sự kiện khi bấm delete
           $(".btn-delete").click(function () { 
            let btn = $(this);
            let id = btn.data('id');
            
            $.ajax({
                type: "GET",
                url: "delete_from_cart.php",
                data: id,
                success: function (response) {
                     btn.parents('tr').remove();
                     getTotal();
                }
            });
            
           });
        });
        function getTotal(){
            let total = 0;
            $(".span-sum").each(function () { 
                total += parseFloat($(this).text());
            });
            $("#span-total").text(total);
        }
    </script>
</body>
</html>