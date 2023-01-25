<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="validate_form.js"></script>
    <title>Form</title>
</head>
<body>

    <form method="get" action="process.php">

        Tên 
        <input type="text" id="name" name="name">
        <span id="error_name"  class="span_error"></span>
        <br>
        Ngày sinh
        <input type="date" name="ngay_sinh" id="ngay_sinh">
        <span id="error_ngay_sinh" class="span_error"></span>
        <br>
        
        Giới tính
        <input type="radio"  name="gender" value="Nam">Nam
        <input type="radio" name="gneder" value="Nữ" >Nữ
        <span id="error_gender" class="span_error"></span>
        <br>
        
        Email
        <input type="email" name="email" id="email" >
        <span id="error_email" class="span_error"></span>
        <br>
       
        Mật khẩu
        <input type="password" name="password" id="password">
         <span id="error_password"  class="span_error" ></span> 
        <br>
       
        Địa chỉ
        <input type="text" id="address" name="address">
        <span id="error_address"  class= "span_error" ></span> 
        <br>

        Sở thích
        <select id="" name="hobby" >
            <option value="Kinh dị">Kinh dị</option>
            <option value="Trinh thám">Trinh thám</option>
            <option value="Người lớn tình cảm">Người lớn tình cảm</option>
        </select>
        <br>
           
        Mô tả bản thân 
        <textarea name="mo_ta" id="" cols="30" rows="10"></textarea>
        <br>
        
        Chọn ảnh
        <input type="file" name="anh">
        <br>
        <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input id="btn_submit" type="submit" value="Đăng kí" onclick="return check_validate()">
        </a>
        <!-- <button type="submit" onclick="return check_validate()">Đăng ký</button> -->


    </form>

</body>
</html>