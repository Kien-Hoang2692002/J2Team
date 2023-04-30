<?php 
    require "admin/connect.php";
    $sql = "select * from products";
    $result = mysqli_query($connect, $sql);
?>

<style>
    .tung_san_pham{
        width: 33%;
        border: 1px solid black;
        height: 250px;
        float: left;
    }
</style>

<div id= "giua">
    <?php foreach($result as $each): ?>
        <div class="tung_san_pham">
            <h1>
                <?php echo $each['name'] ?>
            </h1>
            <img height="100px" src="admin/products/photo/<?php echo $each['photo']?>" alt="">
            <p>  <?php echo $each['price'] ?>$</p>
            <a href="product.php?id=<?php echo $each['id']?>">
                    Xem chi tiết >>>
            </a>
        </div>

    <?php endforeach ?>


</div>