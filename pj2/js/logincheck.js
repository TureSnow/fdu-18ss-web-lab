function loginsubmit() {
    if (loginnameIsnull()&&loginpassIsnull()){
        let name=document.getElementById("login-user").value;
        let pass=document.getElementById("login-pass").value;

        if (window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }else {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                alert(xmlhttp.responseText);
                window.location.reload(true);
            }
        }
        xmlhttp.open("GET","logincheck.php?name="+name+"&pass="+pass,true);
        xmlhttp.send();

    } else {
        alert("please input name or pass!");
        return false;
    }
}
function loginnameIsnull() {
    let name=document.getElementById("login-user").value;
    let pat=new RegExp("^[a-zA-Z]{4,10}$");
    if (!pat.test(name)){
        if (name.length==0)
            document.getElementById("login-user").value="please input username!";
        else
            document.getElementById("login-user").value="error name";
        return false;
    }else {
        return true;
    }
}
function loginpassIsnull(){
    let pass=document.getElementById("login-pass").value;
    if (pass.length==0){
        document.getElementById("login-pass").value="";
        return false;
    }else {
        return true;
    }
}