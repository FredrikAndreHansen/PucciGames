<!DOCTYPE html>
<html>

<head>
	<title>About</title>
	<?php include APPROOT . "/views/includes/head.php"; ?>
		<meta name="description" content="About Pucci Games: My name is Fredrik Palladino Hansen and I am a indie game developer, 
                with the occasional help of my wife Raffaella Palladino Hansen" />
    <meta name="keywords" content="about, GameMaker Studio 1, GameMaker Studio 2, Game Maker 8, Audacity, Photoshop" />
    <meta name="author" content="<?php echo AUTHOR; ?>" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/aboutStyle.css" />
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
<main>
    <div class="threeContainer">
    <div class="frontpageContainer" id="container3DAbout">

    <section>
    <h1 class="introTextGames" id="headerMobileFix" style="text-shadow: 2px 2px #000000;">About</h1>

    <div class="aboutpageSpace">
        <div class="darkBackground">
            <p class="whiteTextMedium" id="centerText" style="text-shadow: 1px 1px #000000;">Pucci Games was established early 2022</p>
        </div>
    </div>
    
    <a href="#section2"><img class="pointer" src="<?php echo URLROOT; ?>/public/graphic/global/pointer.svg" /></a>
    </section>
    <section id="section2">
        <div class="space"></div>
        <div class="smallSpace"></div>
        <div class="aboutpageCenteralign">
            <div class="darkBackground">
                <p class="whiteText" id="centerText" style="text-shadow: 1px 1px #000000;">My name is Fredrik Palladino Hansen and I am a indie game developer, 
                with the occasional help of my wife Raffaella Palladino Hansen.</p>
            </div>
        </div>
    </section>

    <section>
        <div class="space"></div>
            <div class="aboutpageCenteralign">
                <div class="darkBackground">
                <p class="whiteText" id="centerText" style="text-shadow: 1px 1px #000000;">The tools I use are GameMaker Studio and Photoshop.</p>
            </div>
        </div>
    </section>

    <section>
        <div class="space"></div>
            <div class="aboutpageCenteralign">
                <div class="darkBackground">
                    <p class="whiteText" id="centerText" style="text-shadow: 1px 1px #000000;">I was introduced to Game Maker sometime around 2003 by a group of friends.</p>
                 <p class="whiteText" id="centerText" style="text-shadow: 1px 1px #000000;">Since then I got my hobby of making fan games (My own version of already existing titles).</p>
            </div>
        </div>
    </section>


    <section>
        <div class="space"></div>
        <div class="aboutpageCenteralign">
            <div class="darkBackground">
                <p class="whiteText" id="centerText" style="text-shadow: 1px 1px #000000;">My logo is a magpie, and the theme of the website is inspired by magpie’s colours.</p>
                <p class="whiteText" id="centerText" style="text-shadow: 1px 1px #000000;">That’s because there’s a magpie who visits our balcony every day, Pucci, 
                and the logo was designed from a real picture of this amazing, intelligent and funny creature!!</p>
            </div>
        </div>
    </section>

    <section>
        <div class="space"></div>
        <div class="aboutpageCenteralign">
            <div class="darkBackground">
                <p class="whiteText" id="centerText" style="text-shadow: 1px 1px #000000;">Thank you for visiting PucciGames, I hope you enjoy your journey!</p>
            </div>
        </div>
    </section>

	<script src="<?php echo URLROOT ?>/public/javascript/three.js"></script>
    <script src="<?php echo URLROOT ?>/public/javascript/3D_About.js"></script>


    <!--FOOTER-->
	<?php include APPROOT . "/views/includes/footer.php"; ?>


    </div>
    </div>
</main>
</body>

</html>