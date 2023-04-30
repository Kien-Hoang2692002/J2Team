<?php 
    $id = $_GET['id'];
    require "admin/connect.php";
    $sql = "select * from products
    where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
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
            <h1>
                <?php echo $each['name'] ?>
            </h1>
            <img height="100px" src="admin/products/photo/<?php echo $each['photo']?>" alt="">
            <p>  <?php echo $each['price'] ?>$</p>
            <p>  <?php echo $each['description'] ?></p>

</div>