function search(){
    var keywords=document.getElementById("search").value;
    if (keywords.length==0){
        alert("please input some thing");
    } else{
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
        xmlhttp.open("GET","forsearch.php?keywords="+keywords,true);
        xmlhttp.send();
    }

}