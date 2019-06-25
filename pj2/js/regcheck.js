function check() {
    if(check_user()&&check_pass()&&check_same()&&check_email()){
        document.getElementById("reg-name").value="";
        document.getElementById("reg-pass").value="";
        document.getElementById("reg-confirm").value="";
        document.getElementById("phone").value="";
        document.getElementById("reg-email").value="";
        return true;
    }
    else {
        alert("error");
        return false;
    }
}

function check_user() {
    let x;
    x=document.getElementById("reg-name").value;
    let pat=new RegExp("^[a-zA-Z]{4,10}$");  //匹配正则表达式
    if(!pat.test(x)) {
        document.getElementById("reg-name").value="error name!";
        document.getElementById("reg-name").focus();
        return false;
    }
    else {
        return true;
    }
}


function check_phone() {
    let x;
    x=document.getElementById("reg-phone").value;
    let pat=new RegExp("^1[0-9]{6,16}$");
    if(!pat.test(x)) {
        document.getElementById("phone").value="phone form error";
        document.getElementById("phone").focus();
        return false;
    }
    else {
        return true;
    }
}


function check_pass() {
    let x;
    x=document.getElementById("reg-pass").value;
    let pat=new RegExp("^[0-9A-Za-z@.]{6,16}$");
    if(!pat.test(x)) {
        alert("6-16 letters,number or @. as your password");
        document.getElementById("reg-pass").value="";
        document.getElementById("reg-pass").focus();
        return false;
    }
    else {
        return true;
    }
}


function check_same() {
    let x=document.getElementById("reg-pass").value;
    let y=document.getElementById("reg-confirm").value;
    //从表中获取input信息
    if(x!==y) {
        alert("not same!")
        document.getElementById("reg-confirm").value="";
        document.getElementById("reg-confirm").focus();
        return false;
    }
    else {
        return true;
    }
}


function check_email() {
    let x;
    x=document.getElementById("reg-email").value;
    let pat=new RegExp("^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\\.[a-zA-Z0-9_-]+)+$");
    if(!pat.test(x))
    {
        /*let txt=document.getElementById("reg-email").innerHTML;
        txt=txt.replace(txt,"email格式不正确！");*/
        alert("email form error");
        document.getElementById("reg-email").value="";
        document.getElementById("reg-email").focus();
        return false;
    }
    else {
        return true;
    }
}


