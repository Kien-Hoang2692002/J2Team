<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style type="text/css">

        #tong{
            width: 100%;
            height: 700px;
            background: black;
        }
        #tren{
            width: 100%;
            height: 20%;
            background: pink;
        }
        #giua{
            width: 100%;
            height: 70%;
            background: red;
        }
        #duoi{
            width: 100%;
            height: 10%;
            background: purple;
        }

    </style>
</head>
<body>
    <div id = "tong">
       <?php include "menu.php" ?>
       <?php include "products.php" ?>
        <?php include "footer.php" ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".btn-add-to-cart").click(function() { 
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "add_to_cart.php",
                    data: "id",
                    success: function(response) {
                        if(response==1){
                            alert("thành công");
                        }
                        else {
                            alert(response);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>