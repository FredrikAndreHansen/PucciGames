window.onload = function( loadCss ){
    document.getElementById("fadeInBox").style.animation = "fadein 3s forwards";
    document.getElementById("fadeInNav").style.animation = "fadeinNav 4s forwards";
    document.getElementById("fadeinPointer").style.animation = "fadeinPointer 5.5s forwards";
    document.getElementById("loader").style.animation = "load 0.4s forwards";
    document.body.style.overflow = "visible";

    //Remove the loader after 0.4s
    setInterval(loaderFinish, 400);
    function loaderFinish() {
        document.getElementById("loader").style.display = "none";
    }

    //Can click on navigation after fadeinNav 3.5s
    setInterval(navFinish, 3500);
    function navFinish() {
         document.getElementById("introNav").style.display = "block";
    }

    //Can click on navigation after fadeinPointer 5s
    setInterval(pointerFinish, 5000);
    function pointerFinish() {
        document.getElementById("pointerLoadFunction").style.display = "block";
    }
}