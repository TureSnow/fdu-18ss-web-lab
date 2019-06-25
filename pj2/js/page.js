function changepage(page,issearch) {
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }else {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("stage").innerHTML=xmlhttp.responseText;
        }
    }
    if(issearch){
        var keywords=document.getElementById("search").value;
        xmlhttp.open("GET","changePage.php?page="+page+"&keywords="+keywords,true);

    }else{
        xmlhttp.open("GET","changePage.php?page="+page,true);
    }
    xmlhttp.send();
}