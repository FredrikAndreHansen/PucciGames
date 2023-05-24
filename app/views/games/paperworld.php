<!DOCTYPE html>
<html>

<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
		<meta name="description" content="Paper World is a turn-based RPG, it contains a full chapter and the game ends after it.
		This is now a canceled project and no further development is planned." />
    <meta name="keywords" content="RPG, Game Maker 8, turnbased, paper mario" />
    <meta name="author" content="<?php echo AUTHOR; ?>" />
	<title>Paper World</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
    <script src="<?php echo URLROOT ?>/public/javascript/imageGallery.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
    
    <div class="threeContainer">
    <div class="frontpageContainer" id="container3D">

    <h1 class="introTextGames" style="text-shadow: 2px 2px #000000;">Paper World</h1>
    <a href="#about"><img class="pointer" src="<?php echo URLROOT; ?>/public/graphic/global/pointer.svg" /></a>

    <script src="<?php echo URLROOT ?>/public/javascript/three.js"></script>
    <script src="<?php echo URLROOT ?>/public/javascript/3D_Paper_World.js"></script>

    </div>
    </div>

      <!--About section-->
      <div class="gameSection">
        <section id="about">
        <div class="smallSpace"></div>

        <h2 class="headerTextlite" id="centerText">About</h2>

        <div class="gameText">
        <p class="liteText"><span style="font-weight: bold;">Paper World</span> was originally published in 2013.</p>
		<p class="liteText">Before its release in 2013, it was a fan game of Paper Mario (hence the similarities), and its name was "Paper Mario: The Hunt For The Paper Stars" (THFTPS), released in 2009.</p>
		<p class="liteText">Paper World is a turn-based RPG, and it contains only a full chapter. This is now a canceled project and no further development is planned.</p>
		<p class="liteText"><span style="font-weight: bold;">Controls:</span></p>
		<p class="liteText">Arrow keys: <span style="font-weight: bold;">Move</span></p>
		<p class="liteText">V key: <span style="font-weight: bold;">Action key - Jump - Select</span></p>
		<p class="liteText">C key: <span style="font-weight: bold;">Hammer - Deselect</span></p>
		<p class="liteText">X key: <span style="font-weight: bold;">Partner attack</span></p>
		<p class="liteText">Z key: <span style="font-weight: bold;">Toggle GUI</span></p>
		<p class="liteText">Enter: <span style="font-weight: bold;">Menu</span></p>
		<p class="liteText">Escape: <span style="font-weight: bold;">Quit</span></p>
		<p class="liteText"><span style="font-weight: bold;">Installment:</span></p>
		<p class="liteText">No Installments, download, and play (Only for Windows).</p>
        </div>

        </section>
        <div class="smallSpace"></div>
    </div>

    <div class="greenSection">

    <!--Youtube video-->
    <iframe class="frame" src="https://www.youtube.com/embed/JNKA09x7VrU">
    </iframe>-->

    <!--Image gallery-->
    <div class="imageGalleryGrid" id="topImgGrid">
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld1.png');" onclick="currentSlide(1);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld2.png');" onclick="currentSlide(2);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld3.png');" onclick="currentSlide(3);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
    </div>
    <div class="imageGalleryGrid" id="middleImgGrid">
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld4.png');" onclick="currentSlide(4);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld5.png');" onclick="currentSlide(5);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld6.png');" onclick="currentSlide(6);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
    </div>
    <div class="imageGalleryGrid" id="bottomImgGrid">
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld7.png');" onclick="currentSlide(7);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld8.png');" onclick="currentSlide(8);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld9.png');" onclick="currentSlide(9);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
    </div>
    <!--When opening the gallery-->
    <div id="showGallery">
        <img src="<?php echo URLROOT; ?>/public/graphic/global/pointerLeft.svg" class="pointerLess" id="btnLess" onclick="decreaseSlides();" />
        <img src="<?php echo URLROOT; ?>/public/graphic/global/pointerRight.svg" class="pointerMore" id="btnMore" onclick="increaseSlides();" />
        <img src="<?php echo URLROOT; ?>/public/graphic/global/exit.svg" class="closeGallery" onclick="closeGallery();" />
        <img src="<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld1.png" class="showImage" id="galleryImg1" />
        <img src="<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld2.png" class="showImage" id="galleryImg2" />
        <img src="<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld3.png" class="showImage" id="galleryImg3" />
        <img src="<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld4.png" class="showImage" id="galleryImg4" />
        <img src="<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld5.png" class="showImage" id="galleryImg5" />
        <img src="<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld6.png" class="showImage" id="galleryImg6" />
        <img src="<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld7.png" class="showImage" id="galleryImg7" />
        <img src="<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld8.png" class="showImage" id="galleryImg8" />
        <img src="<?php echo URLROOT; ?>/public/graphic/paperworld/PaperWorld9.png" class="showImage" id="galleryImg9" />
    </div>
    
    <!--Download-->
    <div class="space"></div>
	<div class="assetsText">
    <h2 class="headerTextLite" id="centerText">Download</h2>
    <p class="whiteTextMedium" style="text-align: center;">Only available for Windows</p>
    <a href="https://puccigames.com/public/graphic/paperworld/Paper_World.zip"><button class="button3">Download</button></a>
    <p class="whiteTextMedium" style="text-align: center;">5 MB</p>
	</div>
    <div class="floatClear"></div>


    <hr class="hr2" />

    <div class="floatClear"></div>
    </div>

    <div class="assetsSection">

		<!--Updates-->
		<?php include APPROOT . "/views/includes/latestupdatesgames.php"; ?>
		
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