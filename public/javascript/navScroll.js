//Get navbar after scrolling past "scrollFrontPage"!
window.addEventListener("scroll", function() {
    var elementTarget = document.getElementById("scrollFrontPage");
        if (window.scrollY > (elementTarget.offsetTop + elementTarget.offsetHeight)) {
            document.getElementById("navBar").style.top = "0";
        }else{document.getElementById("navBar").style.top = "-5vw";
        }
    });