<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>
        Đây là trang chủ
    </h1>

<?php 
     $ket_noi = mysqli_connect('localhost','root','admin','j2school');
     mysqli_set_charset($ket_noi, 'utf8');
 
     $sql = "select * from tin_tuc";
     $ket_qua = mysqli_query($ket_noi, $sql);

?>  
    <a href="form_insert.php">Thêm bài viết</a>

    <table border="1" >
        <tr>
            <th>Mã</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Ảnh</th>
        </tr>


        <?php foreach($ket_qua as $tung_bai_tin_tuc){ ?>
            
         <tr>
            <td> <?php echo $tung_bai_tin_tuc['ma'] ?> </td>
            <td> 
                <a href="show.php?ma=<?php echo $tung_bai_tin_tuc['ma'] ?>">
                    <?php echo $tung_bai_tin_tuc['tieu_de'] ?> 
                </a>
            </td>
            <td> <?php echo $tung_bai_tin_tuc['noi_dung'] ?> </td>
            <td> 
                <img src=" <?php echo $tung_bai_tin_tuc['anh'] ?> " alt=""
                height="100">  
            </td>
        </tr>

        <?php } ?>
        

    </table>
 <?php mysqli_close($ket_noi) ?>
</body>
</html>