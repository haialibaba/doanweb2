const signinBtn = document.querySelector('.signinBtn')
const signupBtn = document.querySelector('.signupBtn')
const formBx = document.querySelector('.formBx');
const body = document.querySelector('body')

signupBtn.onclick = function() {
    formBx.classList.add('active')
    body.classList.add('active')
}
signinBtn.onclick = function() {
    formBx.classList.remove('active')
    body.classList.remove('active')
}


    $(document).ready(function () {
        
        $('#login-form').submit(function (e) {
            e.preventDefault();
            document.forms[0].submit();
        })
        $('#form-register').submit(function(e){
            e.preventDefault();
            register_input.forEach(item => 
                item.addEventListener('blur',()=>{
                    validate_register();
                })
            )
            if(validate_register()===true){
                document.forms[1].submit();
            }
        })
        const register_input = document.forms[1].querySelectorAll('input');
        
        const validate_register = ()=>{
            const name          = document.getElementById('new-user-name').value;
            const phone         = document.getElementById('new-phonenumber').value;
            const email         = document.getElementById('new-user-email').value;
            const address       = document.getElementById('new-user-address').value;
            const password      = document.getElementById('new-user-password').value;
            const confirmpass   = document.getElementById('confirm-user-password').value;
            isUsername(name)=== false 
                ?show_message('#new-user-name',"Tên tài khoản không hợp lệ"):
                show_message('#new-user-name',"");  
            isPhone(phone)=== false 
            ?show_message('#new-phonenumber',"Số điện thoại không hợp lệ"):
                show_message('#new-phonenumber',"");  
            isPassword(password)=== false?
                show_message('#new-user-password',"Tối thiểu tám ký tự, ít nhất một chữ cái và một số."):
                show_message('#new-user-password',"");
            isEmail(email)=== false?
                show_message('#new-user-email',"Nhập email có dạng abc@gmail.com"):
                show_message('#new-user-email',"")
            isConfirmPassword(password,confirmpass)===false?
                show_message('#confirm-user-password',"Hai mật khẩu không trùng nhau"):
                show_message('#confirm-user-password',"");
            isRequired(address)=== false?
                show_message('#new-user-address',"Vui lòng nhập địa chỉ"):
                show_message('#new-user-address',"")
            if(isUsername(name) && isPassword(password)&& isConfirmPassword(password,confirmpass) && isRequired(address) && isEmail(email)){
                return true;
            }else{
                return false;
            }
        }
    })
    const show_message =(Id,message) => {
        var el = document.querySelector(Id).parentElement.querySelector('.form-message');
        el.innerHTML = message;
    }
    const isUsername = (value) =>{
        const reg = /^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/;
        return reg.test(value);
    }
    const isPhone = (value) =>{
        const reg = /(0|0[3|5|7|8|9])+([0-9]{8})/;
        return reg.test(value);
    }
    const isPassword = (value) =>{
        const reg = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        return reg.test(value);
    }
    const isEmail = (value) =>{
        const reg = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g ;
        return reg.test(value);   
    }
    const isRequired = (value) =>{
        return value === ""|| value ===undefined || value ===null?false:true;
    }
    const isConfirmPassword = (value1,value2) =>{
        return value2 === ""|| value2 ===undefined || value2 ===null || value1 !== value2 ?false :true;
    }

    function check(){
        var name = document.getElementById('new-user-name').value;
        var rexName= /^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/;
        var phonenumber = document.getElementById('new-phonenumber').value;
        var rexPhone = /(0|0[3|5|7|8|9])+([0-9]{8})/;
        var email = document.getElementById('new-user-email').value;
        var rexEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g ;
        var address = document.getElementById('new-user-address').value;
        var password = document.getElementById('new-user-password').value;
        var rexPassword =  /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        var confirmpass = document.getElementById('confirm-user-password').value;

        if(name == "" )
    {
        document.getElementById('errolName').textContent= 'Tên không được để trống';
    }else if(!rexName.test(name)){
        document.getElementById('errolName').textContent= 'Tên không hợp lệ';
    }else{
        document.getElementById('errolName').textContent= '';
        return name;
    }
    if(phonenumber == "" )
    {
        document.getElementById('errolPhoneNumber').textContent= 'Số điện thoại không được để trống';
    }else if(!rexPhone.test(phonenumber)){
        document.getElementById('errolPhoneNumber').textContent= 'Số không hợp lệ';
    }else{
        document.getElementById('errolPhoneNumber').textContent= '';
        return phonenumber;
    }
    if(email == "" )
    {
        document.getElementById('errolEmail').textContent= 'Email không được để trống';
    }else if(!rexEmail.test(email)){
        document.getElementById('errolEmail').textContent= 'Email không hợp lệ';
    }else{
        document.getElementById('errolEmail').textContent= '';
        return email;
    }
    if(address == "" )
    {
        document.getElementById('errolAddress').textContent= 'Email không được để trống';
    }
    if(password == "" )
    {
        document.getElementById('errolPassword').textContent= 'Mật khẩu không được để trống';
    }else if(!rexPassword.test(password)){
        document.getElementById('errolPassword').textContent= 'Mật khẩu không hợp lệ';
    }else{
        document.getElementById('errolPassword').textContent= '';
        return password;
    }
    if(confirmpass== "" )
    {
        document.getElementById('errolConfirmPassword').textContent= 'Cần xác minh mật khẩu';
    }else if(confirmpass != password){
        document.getElementById('errolConfirmPassword').textContent= 'Mật khẩu không giống nhau';
    }else{
        document.getElementById('errolConfirmPassword').textContent= '';
        return confirmpass;
    }
    return false;
        }