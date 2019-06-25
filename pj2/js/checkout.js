function checkout() {
    var xmlrequset;
    if (window.XMLHttpRequest){
        xmlrequset=new XMLHttpRequest();
    } else {
        xmlrequset= new ActiveXObject(Microsoft.xmlhttp);
    }
    xmlrequset.onreadystatechange=function(){
        if (xmlhttp.readyState==4&&xmlhttp.status==200){

        }
    }
    xmlrequset.open("get","checkout.php",ture);
    xmlrequset.send();
}
