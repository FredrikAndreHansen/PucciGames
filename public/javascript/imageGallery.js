let slideIndex = 1;
let state = false;

//document.addEventListener('click', closeGallery);
 document.addEventListener('keydown', function(e) {
     if (e.key === 'Escape' && state === true){
         closeGallery();
    }
 });
 
 document.addEventListener('keydown', function(e) {
     if (e.key === 'Tab' && state === true){
         e.preventDefault();
     }
 });
 

//openGallery(slideIndex);

// Next/previous controls

//clearTimeout(timeout);
function decreaseSlides(){

        //Button cooldown
        document.getElementById("btnLess").style.pointerEvents = "none";
        setTimeout(enable, 600);
        function enable(){document.getElementById("btnLess").style.pointerEvents = "auto";}

        //Previous image
            if(slideIndex == 1){
                document.getElementById("galleryImg1").style.left = "-1500px";
                document.getElementById("galleryImg9").style.left = "3000px";
                document.getElementById("galleryImg9").style.top = "50%";
            }
    
            if(slideIndex == 2){
                document.getElementById("galleryImg2").style.left = "-1500px";
                document.getElementById("galleryImg1").style.left = "3000px";
                document.getElementById("galleryImg1").style.top = "50%";
            }
    
            if(slideIndex == 3){
                document.getElementById("galleryImg3").style.left = "-1500px";
                document.getElementById("galleryImg2").style.left = "3000px";
                document.getElementById("galleryImg2").style.top = "50%";
            }
    
            if(slideIndex == 4){
                document.getElementById("galleryImg4").style.left = "-1500px";
                document.getElementById("galleryImg3").style.left = "3000px";
                document.getElementById("galleryImg3").style.top = "50%";
            }
    
            if(slideIndex == 5){
                document.getElementById("galleryImg5").style.left = "-1500px";
                document.getElementById("galleryImg4").style.left = "3000px";
                document.getElementById("galleryImg4").style.top = "50%";
            }
    
            if(slideIndex == 6){
                document.getElementById("galleryImg6").style.left = "-1500px";
                document.getElementById("galleryImg5").style.left = "3000px";
                document.getElementById("galleryImg5").style.top = "50%";
            }
    
            if(slideIndex == 7){
                document.getElementById("galleryImg7").style.left = "-1500px";
                document.getElementById("galleryImg6").style.left = "3000px";
                document.getElementById("galleryImg6").style.top = "50%";
            }
    
            if(slideIndex == 8){
                document.getElementById("galleryImg8").style.left = "-1500px";
                document.getElementById("galleryImg7").style.left = "3000px";
                document.getElementById("galleryImg7").style.top = "50%";
            }
    
            if(slideIndex == 9){
                document.getElementById("galleryImg9").style.left = "-1500px";
                document.getElementById("galleryImg8").style.left = "3000px";
                document.getElementById("galleryImg8").style.top = "50%";
            }
    
            setTimeout(openGalleryDelay, 350);
            function openGalleryDelay(){
                if(slideIndex == 1){ document.getElementById("galleryImg9").style.left = "50%";document.getElementById("galleryImg1").style.top = "700%";}
                if(slideIndex == 2){ document.getElementById("galleryImg1").style.left = "50%";document.getElementById("galleryImg2").style.top = "700%";}
                if(slideIndex == 3){ document.getElementById("galleryImg2").style.left = "50%";document.getElementById("galleryImg3").style.top = "700%";}
                if(slideIndex == 4){ document.getElementById("galleryImg3").style.left = "50%";document.getElementById("galleryImg4").style.top = "700%";}
                if(slideIndex == 5){ document.getElementById("galleryImg4").style.left = "50%";document.getElementById("galleryImg5").style.top = "700%";}
                if(slideIndex == 6){ document.getElementById("galleryImg5").style.left = "50%";document.getElementById("galleryImg6").style.top = "700%";}
                if(slideIndex == 7){ document.getElementById("galleryImg6").style.left = "50%";document.getElementById("galleryImg7").style.top = "700%";}
                if(slideIndex == 8){ document.getElementById("galleryImg7").style.left = "50%";document.getElementById("galleryImg8").style.top = "700%";}
                if(slideIndex == 9){ document.getElementById("galleryImg8").style.left = "50%";document.getElementById("galleryImg9").style.top = "700%";}
                openGallery(slideIndex -= 1);
            }
        
}

function increaseSlides() {
    
        //Button cooldown
        document.getElementById("btnMore").style.pointerEvents = "none";
        setTimeout(enable, 600);
        function enable(){document.getElementById("btnMore").style.pointerEvents = "auto";}

        //Next image
        if(slideIndex == 1){
            document.getElementById("galleryImg1").style.left = "3000px";
            document.getElementById("galleryImg2").style.left = "-1500px";
            document.getElementById("galleryImg2").style.top = "50%";
        }

        if(slideIndex == 2){
            document.getElementById("galleryImg2").style.left = "3000px";
            document.getElementById("galleryImg3").style.left = "-1500px";
            document.getElementById("galleryImg3").style.top = "50%";
        }

        if(slideIndex == 3){
            document.getElementById("galleryImg3").style.left = "3000px";
            document.getElementById("galleryImg4").style.left = "-1500px";
            document.getElementById("galleryImg4").style.top = "50%";
        }

        if(slideIndex == 4){
            document.getElementById("galleryImg4").style.left = "3000px";
            document.getElementById("galleryImg5").style.left = "-1500px";
            document.getElementById("galleryImg5").style.top = "50%";
        }

        if(slideIndex == 5){
            document.getElementById("galleryImg5").style.left = "3000px";
            document.getElementById("galleryImg6").style.left = "-1500px";
            document.getElementById("galleryImg6").style.top = "50%";
        }

        if(slideIndex == 6){
            document.getElementById("galleryImg6").style.left = "3000px";
            document.getElementById("galleryImg7").style.left = "-1500px";
            document.getElementById("galleryImg7").style.top = "50%";
        }

        if(slideIndex == 7){
            document.getElementById("galleryImg7").style.left = "3000px";
            document.getElementById("galleryImg8").style.left = "-1500px";
            document.getElementById("galleryImg8").style.top = "50%";
        }

        if(slideIndex == 8){
            document.getElementById("galleryImg8").style.left = "3000px";
            document.getElementById("galleryImg9").style.left = "-1500px";
            document.getElementById("galleryImg9").style.top = "50%";
        }

        if(slideIndex == 9){
            document.getElementById("galleryImg9").style.left = "3000px";
            document.getElementById("galleryImg1").style.left = "-1500px";
            document.getElementById("galleryImg1").style.top = "50%";
        }

        setTimeout(openGalleryDelay, 350);
        function openGalleryDelay(){
            if(slideIndex == 1){document.getElementById("galleryImg2").style.left = "50%";document.getElementById("galleryImg1").style.top = "700%";}
            if(slideIndex == 2){document.getElementById("galleryImg3").style.left = "50%";document.getElementById("galleryImg2").style.top = "700%";}
            if(slideIndex == 3){document.getElementById("galleryImg4").style.left = "50%";document.getElementById("galleryImg3").style.top = "700%";}
            if(slideIndex == 4){document.getElementById("galleryImg5").style.left = "50%";document.getElementById("galleryImg4").style.top = "700%";}
            if(slideIndex == 5){document.getElementById("galleryImg6").style.left = "50%";document.getElementById("galleryImg5").style.top = "700%";}
            if(slideIndex == 6){document.getElementById("galleryImg7").style.left = "50%";document.getElementById("galleryImg6").style.top = "700%";}
            if(slideIndex == 7){document.getElementById("galleryImg8").style.left = "50%";document.getElementById("galleryImg7").style.top = "700%";}
            if(slideIndex == 8){document.getElementById("galleryImg9").style.left = "50%";document.getElementById("galleryImg8").style.top = "700%";}
            if(slideIndex == 9){document.getElementById("galleryImg1").style.left = "50%";document.getElementById("galleryImg9").style.top = "700%";}
            openGallery(slideIndex += 1);
        }
    
}
  
  // Thumbnail image controls
  function currentSlide(n) {
    openGallery(slideIndex = n);
    if(n == 1){document.getElementById("galleryImg1").style.top = "50%";}
    if(n == 2){document.getElementById("galleryImg2").style.top = "50%";}
    if(n == 3){document.getElementById("galleryImg3").style.top = "50%";}
    if(n == 4){document.getElementById("galleryImg4").style.top = "50%";}
    if(n == 5){document.getElementById("galleryImg5").style.top = "50%";}
    if(n == 6){document.getElementById("galleryImg6").style.top = "50%";}
    if(n == 7){document.getElementById("galleryImg7").style.top = "50%";}
    if(n == 8){document.getElementById("galleryImg8").style.top = "50%";}
    if(n == 9){document.getElementById("galleryImg9").style.top = "50%";}
  }

// Open gallery
function openGallery(n) {
    
    state = true;
    if(n > 9){slideIndex = 1;}
    if(n < 1){slideIndex = 9;}
    document.getElementById("showGallery").style.display = "block";
    document.body.style.overflow = "hidden";

    if(n == 0){n = 9;}if(n == 10){n = 1;}
    if(slideIndex == 1){document.getElementById("galleryImg1").style.left = "50%";}
    if(slideIndex == 2){document.getElementById("galleryImg2").style.left = "50%";}
    if(slideIndex == 3){document.getElementById("galleryImg3").style.left = "50%";}
    if(slideIndex == 4){document.getElementById("galleryImg4").style.left = "50%";}
    if(slideIndex == 5){document.getElementById("galleryImg5").style.left = "50%";}
    if(slideIndex == 6){document.getElementById("galleryImg6").style.left = "50%";}
    if(slideIndex == 7){document.getElementById("galleryImg7").style.left = "50%";}
    if(slideIndex == 8){document.getElementById("galleryImg8").style.left = "50%";}
    if(slideIndex == 9){document.getElementById("galleryImg9").style.left = "50%";}
  }
  
  // Close gallery
  function closeGallery() {
    state = false;
    document.getElementById("galleryImg1").style.top = "700%";
    document.getElementById("galleryImg2").style.top = "700%";
    document.getElementById("galleryImg3").style.top = "700%";
    document.getElementById("galleryImg4").style.top = "700%";
    document.getElementById("galleryImg5").style.top = "700%";
    document.getElementById("galleryImg6").style.top = "700%";
    document.getElementById("galleryImg7").style.top = "700%";
    document.getElementById("galleryImg8").style.top = "700%";
    document.getElementById("galleryImg9").style.top = "700%";
    document.getElementById("showGallery").style.display = "none";
    document.body.style.overflow = "visible";
  }