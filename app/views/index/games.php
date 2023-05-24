<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
		<meta name="description" content="All games by PucciGames." />
    <meta name="keywords" content="RPG, Puzzle, 3D, 2D" />
    <meta name="author" content="<?php echo AUTHOR; ?>" />
	<title>Games</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<script src="<?php echo URLROOT ?>/public/javascript/imageGallery.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>

	<div class='assetsSection' style='padding-bottom: 64px;'>


			
			<h2 class='postHeaderIntro'>Games</h2>
			<div class='postHeaderImageTop' style='background-image: url("<?php echo URLROOT; ?>/public/graphic/index/games_background.jpg");'></div>
			<div class='postHeaderMargin'></div>
			
			<div class='postsSection'>
			
			<div class="topWrapper" style="display:block">
			<p class='darkText'>My Games</p>
			<hr class="hr2" />
			</div>
			
			<div class="postWrapper" style="display:block;">
			
			<a href="<?php echo URLROOT; ?>/games/threep" class='postHeadlineA' id='postHeadlineI'><img class='gameImg' src="<?php echo URLROOT; ?>/public/graphic/index/3P_frontImg.jpg" /></a>
			<p class='h2BlackLeftSmall'><a class="postHeadlineA" href="<?php echo URLROOT; ?>/games/threep">Unnamed Project(3P)</a></p>
			<hr class="hr2" />
			<p class='darkText'>An ongoing project in its early stages. I am currently building all the fundamentals, when it's done I will release a demo.</p>
			<a href="<?php echo URLROOT; ?>/games/threep"><button class="button2">READ MORE</button></a>
			
			
			<div class="Space"></div>
			<a href="<?php echo URLROOT; ?>/games/twentytwentyaspaceodyssey" class='postHeadlineA' id='postHeadlineI'><img class='gameImg' src="<?php echo URLROOT; ?>/public/graphic/index/2020_frontImg.jpg" /></a>
			<p class='h2BlackLeftSmall'><a class="postHeadlineA" href="<?php echo URLROOT; ?>/games/twentytwentyaspaceodyssey">2020: A Space Odyssey</a></p>
			<hr class="hr2" />
			<p class='darkText'>A challenging game to navigate through space without any control for direction.</p>
			<a href="<?php echo URLROOT; ?>/games/twentytwentyaspaceodyssey"><button class="button2">READ MORE</button></a>
			
			
			<div class="Space"></div>
			<a href="<?php echo URLROOT; ?>/games/paperworld" class='postHeadlineA' id='postHeadlineI'><img class='gameImg' src="<?php echo URLROOT; ?>/public/graphic/index/PaperWorld_frontImg.jpg" /></a>
			<p class='h2BlackLeftSmall'><a class="postHeadlineA" href="<?php echo URLROOT; ?>/games/paperworld">Paper World</a></p>
			<hr class="hr2" />
			<p class='darkText'>A turn-based RPG, the demo contains a full chapter.</p>
			<a href="<?php echo URLROOT; ?>/games/paperworld"><button class="button2">READ MORE</button></a>
			
			</div>
			
			
			</div>
		
		
		

        <div class="floatClear"></div>

	</div>


    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>