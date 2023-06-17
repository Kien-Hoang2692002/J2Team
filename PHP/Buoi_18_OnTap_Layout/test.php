
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        Điền gì đó đi:
        <input type="text" name='ten' id='ten'>
    </form>
    <div id="ket_qua"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            //$("#ten").val('Kien');
            $("#ten").change(function(event) {
                let ten = $(this).val();
                $("#ket_qua").text("Bạn đã điền:" + ten);
                //$("#ket_qua").html();
            });
        });
    </script>
</body>
</html>