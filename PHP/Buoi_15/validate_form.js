function check_validate(){
    
    let check_error = true ;
   
    // Kiểm tra tên
    let name = document.getElementById('name').value;
    if( name.length === 0 ){
        document.getElementById('error_name').innerHTML = 'Tên không được để trống';
            check_error = true ;
    }else{
        let regex_name = /^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*(?:[ ][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*)*$/;
         if( !regex_name.test(name) ){
            document.getElementById('error_name').innerHTML = 'Tên không hợp lệ'
            check_error = true ;
        }else{
            document.getElementById('error_name').innerHTML = '';
        }
    }
    

    // Kiểm tra ngày sinh
    let ngay_sinh =document.getElementById('ngay_sinh').value;
    if( ngay_sinh.length === 0 ){
        document.getElementById('error_ngay_sinh').innerHTML = 'Ngày sinh không được để trống';
        check_error = true ;
    }else{
            document.getElementById('error_ngay_sinh').innerHTML = '';
    }
    
    // Kiểm tra giới tính
    let mang_gender = document.getElementsByName('gender');
    let check_gender =  false ;
    for( let i = 0 ; i < mang_gender.length ;i++){
        if(mang_gender[i].checked ){
            check_gender = true ;
        }
    }
    if(check_gender == false){
        document.getElementById('error_gender').innerHTML = 'Giới tính không được để trống'
            check_error = true ;
    }else{
            document.getElementById('error_gender').innerHTML = '';
    }

    // Kiểm tra email
    let email = document.getElementById('email').value;
    if(email.length === 0){
        document.getElementById('error_email').innerHTML = 'Vui lòng nhập email';
        error_check = false;
    }
    else{
        let regax_email = /^\S+@\S+\.\S+$/;
        if(regax_email.test(email) == false){
            document.getElementById('error_email').innerHTML = 'Email không hợp lệ';
            error_check = false;
        }
        else{
            document.getElementById('error_email').innerHTML = '';
        }
    }

    // Kiểm tra mật khẩu
    let input_password = document.getElementById('password') ;
    let password = input_password.value ;
    if( password.length === 0){
        //input_password.insertAdjacentHTML("afterend" , '<span id="error_password"  class="span_error">Mật khẩu không được để trống</span>');
        document.getElementById('error_password').innerHTML = 'Mật khẩu không được để trống'
        check_error = true ;
    } else if(password.length < 8){
        document.getElementById('error_password').innerHTML = 'Mật khẩu không được quá ngắn '
        check_error = true ;
    }
    else{
            document.getElementById('error_password').innerHTML = '';
    }

    //Kiem tra địa chỉ
    let address = document.getElementById('address').value;
    if(address.length === 0){
        document.getElementById('error_address').innerHTML = 'Vui lòng nhập địa chỉ';
        error_check = false;
    }
    else{
        document.getElementById('error_address').innerHTML = '';
    }

     // Kiểm tra sở thích
     let hobby = document.getElementById('hobby').value;
     if(hobby.length === 0){
         document.getElementById('error_hobby').innerHTML = 'Vui lòng nhập sở thích của bạn';
         error_check = false;
     }
     else{
         document.getElementById('error_hobby').innerHTML = '';
     }


    //
    if(check_error){
        return false;
    }
}