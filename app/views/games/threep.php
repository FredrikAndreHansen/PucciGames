<!DOCTYPE html>
<html>

<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
		<meta name="description" content="3P is an ongoing project in its early stages." />
    <meta name="keywords" content="RPG, Game Maker Studio 1, open world, cartoon graphics" />
    <meta name="author" content="<?php echo AUTHOR; ?>" />
	<title>3P</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
    <script src="<?php echo URLROOT ?>/public/javascript/imageGallery.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
    
    <div class="threeContainer">
    <div class="frontpageContainer" id="container3D">

    <h1 class="introTextGames" style="text-shadow: 2px 2px #000000;">3P</h1>
    <a href="#about"><img class="pointer" src="<?php echo URLROOT; ?>/public/graphic/global/pointer.svg" /></a>

    <script src="<?php echo URLROOT ?>/public/javascript/three.js"></script>
    <script src="<?php echo URLROOT ?>/public/javascript/3D_3P.js"></script>

    </div>
    </div>

      <!--About section-->
      <div class="gameSection">
        <section id="about">
        <div class="smallSpace"></div>

        <h2 class="headerTextLite" id="centerText">About</h2>

        <div class="gameText">
        <p class="liteText"><span style="font-weight: bold;">3P</span> is an ongoing project in its early stages.</p>
		<p class="liteText">The name 3P stands for "Paper Pocket Pals", I started this project years ago, and it has gone through multiple directions. The game will eventually change its title, along with its storyline.</p>
		<p class="liteText">There is a direction for the game, even though there is no story yet. It will be an RPG with a level system, but it won't be turn-based. The combat will be a real-time fighting system, and the victory will be based on 3 different perspectives:  Skill, Level, and Tactic.</p>
		<p class="liteText">The skill is the player's ability, so even though the enemies are stronger than you, you can still win the fight thanks to your skill. The second perspective is based on the player level: when you win fights, your player will level up and become stronger. This will make your character stronger instead of you as a player. The last method is tactic, all enemies will have a type, you, as a player, will also have a type (based on the armor the player is wearing), and your weapons will have a type. You can plan a strategy before a fight, based on your weapons, armor and items against specific enemies.</p>
		<p class="liteText">Outside of combat, the overworld will be an open world, where you can proceed to every location you want, and the obstacles will be stronger enemies only.</p>
        </div>

        </section>
        <div class="smallSpace"></div>
    </div>

    <div class="greenSection">

    <!--Image gallery-->
    <div class="imageGalleryGrid" id="topImgGrid">
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/3p/3P1.jpg');" onclick="currentSlide(1);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/3p/3P2.jpg');" onclick="currentSlide(2);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/3p/3P3.jpg');" onclick="currentSlide(3);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
    </div>
    <div class="imageGalleryGrid" id="middleImgGrid">
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/3p/3P4.jpg');" onclick="currentSlide(4);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/3p/3P5.jpg');" onclick="currentSlide(5);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/3p/3P6.jpg');" onclick="currentSlide(6);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
    </div>
    <div class="imageGalleryGrid" id="bottomImgGrid">
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/3p/3P7.jpg');" onclick="currentSlide(7);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/3p/3P8.jpg');" onclick="currentSlide(8);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
        <div class="galleryThumbnailImagePar"><div class="galleryThumbnailImage" style="background-image: URL('<?php echo URLROOT; ?>/public/graphic/3p/3P9.jpg');" onclick="currentSlide(9);"><img class="galleryIcon" src="<?php echo URLROOT; ?>/public/graphic/global/magnifyingglass.svg" /></div></div>
    </div>
    <!--When opening the gallery-->
    <div id="showGallery">
        <img src="<?php echo URLROOT; ?>/public/graphic/global/pointerLeft.svg" class="pointerLess" id="btnLess" onclick="decreaseSlides();" />
        <img src="<?php echo URLROOT; ?>/public/graphic/global/pointerRight.svg" class="pointerMore" id="btnMore" onclick="increaseSlides();" />
        <img src="<?php echo URLROOT; ?>/public/graphic/global/exit.svg" class="closeGallery" onclick="closeGallery();" />
        <img src="<?php echo URLROOT; ?>/public/graphic/3p/3P1.jpg" class="showImage" id="galleryImg1" />
        <img src="<?php echo URLROOT; ?>/public/graphic/3p/3P2.jpg" class="showImage" id="galleryImg2" />
        <img src="<?php echo URLROOT; ?>/public/graphic/3p/3P3.jpg" class="showImage" id="galleryImg3" />
        <img src="<?php echo URLROOT; ?>/public/graphic/3p/3P4.jpg" class="showImage" id="galleryImg4" />
        <img src="<?php echo URLROOT; ?>/public/graphic/3p/3P5.jpg" class="showImage" id="galleryImg5" />
        <img src="<?php echo URLROOT; ?>/public/graphic/3p/3P6.jpg" class="showImage" id="galleryImg6" />
        <img src="<?php echo URLROOT; ?>/public/graphic/3p/3P7.jpg" class="showImage" id="galleryImg7" />
        <img src="<?php echo URLROOT; ?>/public/graphic/3p/3P8.jpg" class="showImage" id="galleryImg8" />
        <img src="<?php echo URLROOT; ?>/public/graphic/3p/3P9.jpg" class="showImage" id="galleryImg9" />
    </div>
    
    <!--Download-->
    <div class="space"></div>
	<div class="assetsText">
    <h2 class="headerTextLite" id="centerText">No downloads available</h2>
    <p class="whiteTextMedium" style="text-align: center;">I don't have any timeframes yet for when the demo will be available</p>
    <p class="whiteTextMedium" style="text-align: center;">Further updates will be posted here!</p>
	</div>
    <div class="floatClear"></div>


    <hr class="hr2" />

    <div class="floatClear"></div>
    </div>
		<!--Comments section-->
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