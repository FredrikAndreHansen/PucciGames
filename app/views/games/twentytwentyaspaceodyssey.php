<!DOCTYPE html>
<html>

<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
		<meta name="description" content="2020: A Space Odyssey was first created during the 2020 GMTK Game Jam. The point of the game is simple, you only need to get to the next planet and so on until the end of the stage. But the further you get, the harder it becomes, since you are always building up speed." />
    <meta name="keywords" content="puzzle, Game Maker Studio 2, space, gamemakers toolkit, simple, mobile" />
    <meta name="author" content="<?php echo AUTHOR; ?>" />
	<title>2020: A Space Odyssey</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
    <script src="<?php echo URLROOT ?>/public/javascript/imageGallery.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
    
    <div class="threeContainer">
    <div class="frontpageContainer" id="container3D">

    <h1 class="introTextGames" style="text-shadow: 2px 2px #000000;">2020: A Space Odyssey</h1>
    <a href="#about"><img class="pointer" src="<?php echo URLROOT; ?>/public/graphic/global/pointer.svg" /></a>

    <script src="<?php echo URLROOT ?>/public/javascript/three.js"></script>
    <script src="<?php echo URLROOT ?>/public/javascript/3D_2020_A_Space_Odyssey.js"></script>

    </div>
    </div>

    <!--About section-->
    <div class="gameSection">
        <section id="about">
        <div class="smallSpace"></div>

        <h2 class="headerTextlite" id="centerText">About</h2>

        <div class="gameText">
        <p class="liteText"><span style="font-weight: bold;">2020: A Space Odyssey</span> was first created during the 2020 GMTK Game Jam, which had as a theme "Out of control".</p>
		<p class="liteText">The alpha version was created during the jam in 2 days, the game only contained 1 level at that time.</p>
		<p class="liteText">The point of the game is simple, the player has to get to the next planet and so on until the end of the stage. But the further the player goes, the harder it becomes since he is always building up speed. To get to the next planet, the player  needs to accelerate, and after having accelerated for a certain amount of time, by releasing the space bar he'll get slingshot out of the planet's gravitational pull and can, from there, proceed to the next planet. This process requires good precision and timing, that's the reason why the game gets harder and harder, it is because of the  increasing of the speed.</p>
		<p class="liteText">The game is currently under development and further updates will be posted here.</p>
        <p class="liteText"><span style="font-weight: bold;">Controls:</span></p>
		<p class="liteText">Spacebar: <span style="font-weight: bold;">Accelerate - Proceed</span>
		<p class="liteText">Escape: <span style="font-weight: bold;">Quit</span>
        </div>

        </section>
        <div class="smallSpace"></div>
    </div>

    <div class="greenSection">

    <!--Youtube video-->
    <!--<iframe class="frame" src="https://www.youtube.com/embed/tgbNymZ7vqY">
    </iframe>-->

    <!--Image gallery-->
    <div class="imageGalleryGrid" id="topImgGrid">
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo1.jpg');" onclick="currentSlide(1);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo2.jpg');" onclick="currentSlide(2);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo3.jpg');" onclick="currentSlide(3);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
    </div>
    <div class="imageGalleryGrid" id="middleImgGrid">
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo4.jpg');" onclick="currentSlide(4);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo5.jpg');" onclick="currentSlide(5);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo6.jpg');" onclick="currentSlide(6);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
    </div>
    <div class="imageGalleryGrid" id="bottomImgGrid">
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo7.jpg');" onclick="currentSlide(7);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo8.jpg');" onclick="currentSlide(8);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo9.jpg');" onclick="currentSlide(9);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
    </div>
    <!--When opening the gallery-->
    <div id="showGallery">
        <img src="<?php echo URLROOT; ?>/public/graphic/global/pointerLeft.svg" class="pointerLess" id="btnLess" onclick="decreaseSlides();" />
        <img src="<?php echo URLROOT; ?>/public/graphic/global/pointerRight.svg" class="pointerMore" id="btnMore" onclick="increaseSlides();" />
        <img src="<?php echo URLROOT; ?>/public/graphic/global/exit.svg" class="closeGallery" onclick="closeGallery();" />
        <img src="<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo1.jpg" class="showImage" id="galleryImg1" />
        <img src="<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo2.jpg" class="showImage" id="galleryImg2" />
        <img src="<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo3.jpg" class="showImage" id="galleryImg3" />
        <img src="<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo4.jpg" class="showImage" id="galleryImg4" />
        <img src="<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo5.jpg" class="showImage" id="galleryImg5" />
        <img src="<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo6.jpg" class="showImage" id="galleryImg6" />
        <img src="<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo7.jpg" class="showImage" id="galleryImg7" />
        <img src="<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo8.jpg" class="showImage" id="galleryImg8" />
        <img src="<?php echo URLROOT; ?>/public/graphic/2020aspaceodyssey/spo9.jpg" class="showImage" id="galleryImg9" />
    </div>
    
    <!--Demo download-->
    <div class="space"></div>
	<div class="assetsText">
    <h2 class="headerTextLite" id="centerText">Free demo</h2>
    <p class="whiteTextMedium" style="text-align: center;">Only available for Windows</p>
    <a href="https://puccigames.com/public/graphic/2020aspaceodyssey/2020_A_Space_Oddyssey_Demo.zip"><button class="button3">Download demo</button></a>
    <p class="whiteTextMedium" style="text-align: center;">123 MB</p>
	</div>
    <div class="floatClear"></div>

    <hr class="hr2" />
	<div class="floatClear"></div>
	</div>
	
	<div class="assetsSection">
	
    <!--Updates-->
	<?php include APPROOT . "/views/includes/latestupdatesgames.php"; ?>

    <div class="floatClear"></div>
    
    <!--Comments section-->
    
        <h2 class="headerTextLite" id="centerText">Comments</h2>
        <?php include APPROOT . "/views/includes/comments.php"; ?>

        <hr class="hr1" />

        <?php include APPROOT . "/views/includes/commentsectiongames.php"; ?>

        <div class="floatClear"></div>

    </div>
 
    

    <!--FOOTER-->
	<?php include APPROOT . "/views/includes/footer.php"; ?>
</body>

</html>