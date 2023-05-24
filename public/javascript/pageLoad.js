window.onload = function( loadCss ){
    document.getElementById("loader").style.animation = "load 0.4s forwards";
    document.body.style.overflow = "visible";

    //Remove the loader after 0.4s
    setInterval(loaderFinish, 400);
    function loaderFinish() {
        document.getElementById("loader").style.display = "none";
    }

}