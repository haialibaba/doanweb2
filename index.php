<?php
include'config.php';

session_start();
if(isset($_SESSION['mySession'])){
    header('location:admin.php');
    exit();
}

$conn = mysqli_connect('localhost','root','','doanweb2');
if(isset($_POST['login'])){
    $username= $conn->real_escape_string($_POST['username']);
    $password= $conn->real_escape_string($_POST['password']);
    $password = md5($password);
    $data= $conn->query("SELECT * FROM tbl_khachhang WHERE TenDangNhap='$username' AND MatKhau='$password' ");
    if($data->num_rows > 0){
        $_SESSION['mySession'] = '1';
        $_SESSION['username'] = $username;
        exit('sucess');
    }else{
    exit('false');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="">
    <div class="container">
        <div class="primary-bg">
            <div class="box signin">
                <h2>Already Have an Account?</h2>
                <button class="signinBtn">Sign in</button>
            </div>

            <div class="box signup">
                <h2>Don't Have an Account?</h2>
                <button class="signupBtn">Sign up</button>
            </div>
        </div>
        <div class="formBx">
            <div class="form signinForm">
                <form id="login-form" action="index.php" method="post">
                    <h3>Sign In</h3>
                    <div class="form-group">
                        <input name="user-name" id="user-name" type="text" placeholder="Username">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <input name="user-password" id="user-password" type="password" placeholder="Password">
                        <span class="form-message"></span>
                    </div>
                    <a href="#" class="forgot">Forgot Password</a>
                    <div class="form-group">
                        <button type="button" class="form-submit login-btn">Submit</button>
                    </div>
                    


                    <div class="auth-form__social">
                        <span class="auth-form__social--title">Login with social: </span>
                        <a href="" class="auth-form__social--facebook btn btn--size-s btn--with-icon">
                         <i class="auth-form__social--icon fab fa-facebook-square"></i>
                        </a>
     
                        <a href="" class=" auth-form__social--google btn btn--size-s btn--with-icon">
                         <i class=" auth-form__social--icon fab fa-google"></i>
                        </a>

                        <a href="" class=" auth-form__social--github btn btn--size-s btn--with-icon">
                            <i class=" auth-form__social--icon fab fa-github"></i>
                           </a>
     
                     </div>

                </form>
            </div>

    <?php
    if(isset($_POST['signup'])){
        $username= $_POST['newusername'];
        $phonenumber = $_POST['newphonenumber'];
        $userpassword= md5($_POST['newuserpassword']);
        $useremail= $_POST['newuseremail'];
        $useraddress= $_POST['newuseraddress'];
        $confirmpassword= $_POST['confirmuserpassword'];

        $check = "SELECT * FROM tbl_khachhang WHERE TenDangNhap = '$username'";
        $result = mysqli_query($conn, $check);

        if( mysqli_num_rows($result) > 0){
            echo '<script language="javascript">alert("Tài khoản đã có người sử dụng, vui lòng tạo tài khoản mới!")</script>';
        }else{
        $sql ="INSERT INTO tbl_khachhang(SDT,DiaChi,TenDangNhap,MatKhau,Email) VALUES ('$phonenumber','$useraddress','$username','$userpassword','$useremail')";
        mysqli_query($conn,$sql);
    
        }
                    
    }
    ?>

            <div class="form signupForm">
                <form action="" method="POST" onsubmit="return check();">
                    <h3>Sign Up</h3>
                    <div class="form-group invalid">
                        <input name="newusername" id="new-user-name" type="text" placeholder="Username">
                        <span id="errolUserName" class="form-message"></span>
                    </div>

                    <div class="form-group invalid">
                        <input name="newphonenumber" id="new-phonenumber" type="number" placeholder="Phone Number">
                        <span id="errolPhoneNumber" class="form-message"></span>
                    </div>

                    <div class="form-group invalid">
                        <input name="newuseremail" id="new-user-email" type="text" placeholder="Email">
                        <span id="errolEmail" class="form-message"></span>
                    </div>
                    <div class="form-group invalid">
                        <input name="newuseraddress" id="new-user-address" type="text" placeholder="Address">
                        <span id="errolAddress" class="form-message"></span>
                    </div>
                    <div class="form-group invalid">
                        <input name="newuserpassword" id="new-user-password" type="password" placeholder="Password" aria-autocomplete="list">
                        <span id="errolPassword" class="form-message"></span>
                    </div>
                    <div class="form-group invalid">
                        <input name="confirmuserpassword" id="confirm-user-password" type="password" placeholder="Confirm Password">
                        <span id="errolConfirmPassword" class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="signup" class="form-submit">Register</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>


    <script src="main.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.login-btn').on('click',function(){
                var username = $('#user-name').val();
            	var password = $('#user-password').val();
                if (username == "" || password == "") {
                    alert("Nhập đầy đủ thông tin vào giùm");
	}else{
        $.ajax({
		  url: "index.php",
		  method : "POST",
          data: { login: 1 , username : username, password : password },
          dataType: 'text',
    success: function(response){
        $("#response").html(response);
            if(response.indexOf('sucess') >= 0)
            swal({
                title: "Đăng nhập thành công!", 
                text: "Bạn đã có thể mua hàng!",
                type: "success",
                timer: 4000 
            });
            window.location ='admin.php';
            if(response.indexOf('false') >= 0)
            swal({
                title: "Sai tài khoản hoặc mất khẩu rồi", 
                text: "Vui lòng nhập lại",
                type: "error",
                
            });
            
    }
});

    }
            });
        });

    function check(){
        var name = document.getElementById('new-user-name').value;
        var phonenumber = document.getElementById('new-phonenumber').value;
        var email = document.getElementById('new-user-email').value;
        var address = document.getElementById('new-user-address').value;
        var password = document.getElementById('new-user-password').value;
        var confirmpass = document.getElementById('confirm-user-password').value;



        if(name == "" || name.length < 5)
    {
        document.getElementById('errolName').textContent= 'Tên không hợp lệ';
        return false;
    }

    if(phonenumber == "" || phonenumber.length < 10)
    {
        document.getElementById('errolPhoneNumber').textContent= 'Số điện thoại không hợp lệ';
        return false;
    }

    
    if(email == "" || email.length < 5 || email.indexOf('@') == -1)
    {
        document.getElementById('errolEmail').textContent= 'Email không hợp lệ';
        return false;
    }
    if(address == "")
    {
        document.getElementById('errolAddress').textContent= 'Địa chỉ không hợp lệ';
        return false;
    }
    if(password == "" || password.length < 5)
    {
        document.getElementById('errolPassword').textContent = "Password phải lớn hơn 5 kí tự";
        return false;
    }
    if(confirmpass != password){
        document.getElementById('errolConfirmPassword').textContent = "Password không trùng khớp";
        return false;
    }

    }


    </script>

</body>
</html>