window.onload=function () {
    var thumbnails=document.querySelector("#thumbnails");
    var figure=document.querySelector("figure");
    var flag=0;

    thumbnails.addEventListener("click",function (e) {
    let target=e.target;
    let img=document.querySelector("#featured img");
    img.src="images/medium/"+getPath(target.src.toString());
    img.title=target.title;
    let figcaption=document.querySelector("figcaption");
    figcaption.innerText=target.title.toString();
})

    figure.addEventListener("mouseover",function (e) {
    let top=document.querySelector("figure figcaption");
    fadeIn(top);
})
    figure.addEventListener("mouseout",function (e) {
    let top=document.querySelector("figure figcaption");
    fadeOut(top);
})

    function  getPath(Imgsrc) {
    let reg=/[0-9]+\.jpg$/;
    let path=reg.exec(Imgsrc).toString();
    return path;
}

    function fadeIn(elem){
        flag=0;
        var temp=0;
        var show = self.setInterval(function () {
            temp+=0.008;
            elem.style.opacity=temp;
            if (temp>=0.8){
                show=window.clearInterval(show);
                return;
            }
            if (flag==1){
                show=window.clearInterval(show);
                return;
            }
        },10);
    }
    function fadeOut(elem) {
        flag=1;
        var temp=0.8;
        var disappear = self.setInterval(function () {
            temp-=0.008;
            elem.style.opacity=temp;
            if (temp<=0){
                disappear=window.clearInterval(disappear);
                return;
            }
            if (flag==0){
                disappear=window.clearInterval(disappear);
                return;
            }
        },10);
    }
}