window.addEventListener("scroll",heading);
function heading(){
    var head= document.getElementById('topHead');
    var nav= document.getElementById('nav');
    var list= document.getElementById('list');
    var yPos= window.pageYOffset;
    if(window.matchMedia("(min-width:1200px)").matches && yPos>50){
        head.style.position="fixed";
        nav.style.position="fixed";
        head.style.width="1140px";
        nav.style.width="285px";
        head.style.top="0px";
        nav.style.top="60px";
        list.style.top="60px";
    }else if(window.matchMedia("(min-width:992px)").matches && yPos>50){
        head.style.position="fixed";
        nav.style.position="fixed";
        head.style.width="940px";
        nav.style.width="235px";
        head.style.top="0px";
        nav.style.top="60px";
        list.style.top="60px";
    }else{
        head.style.position="";
        nav.style.position="";
        head.style.width="";
        nav.style.width="";
        nav.style.top="";
        list.style.top="";
    }
}