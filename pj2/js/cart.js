
function dele(artworkID) {
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }else {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            alert("delete ok");
            location.reload(true);
        }
    }
    xmlhttp.open("GET","dele.php?q="+artworkID,true);
    xmlhttp.send();
}

function buy(userID,enough,left,sum){
    if(enough){

        if (window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }else {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                alert("buy ok!");
                location.reload(true);
            }
        }
        xmlhttp.open("GET","pay.php?userID="+userID+"&left="+left+"&sum="+sum,true);
        xmlhttp.send();
    }else {
        alert("your balance is not enough! please do some thing before buy your loves.")
    }
}

function addcart(artworkID,orderID) {
    if (orderID==null){
        if (window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }else {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                alert(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET","addcart.php?artworkID="+artworkID,true);
        xmlhttp.send();

    } else {
        alert("already sell!");
    }
}