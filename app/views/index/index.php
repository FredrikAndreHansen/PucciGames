<!DOCTYPE html>
<html>

<head>
	<title><?php echo SITENAME; ?></title>
    <?php include APPROOT . "/views/includes/head.php"; ?>
        <meta name="description" content="Pucci Games is a small independent game developing studio run by Fredrik Palladino Hansen." />
    <meta name="keywords" content="Indie games, GameMaker Studio, Assets, RPG, Puzzle" />
    <meta name="author" content="<?php echo AUTHOR; ?>" />
    <script src="<?php echo URLROOT ?>/public/javascript/introPageLoad.js"></script>
    <script src="<?php echo URLROOT ?>/public/javascript/navScroll.js"></script>
    <?php include APPROOT . "/views/includes/navbarFrontpage.php"; ?>
</head>

<body>
    <!--LANDING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
   
    <div class="threeContainer">
    <div class="frontpageContainer" id="container3D">

        <script src="<?php echo URLROOT ?>/public/javascript/three.js"></script>
        <script src="<?php echo URLROOT ?>/public/javascript/3D_FrontPage.js"></script>
 
        <div class="topBar"></div>

        <div id="fadeInNav">
            <ul id="introNav">
                <a href="<?php echo URLROOT; ?>/index/games"><li class="introLi">GAMES</li></a>
                <a href="<?php echo URLROOT; ?>/index/posts"><li class="introLi">POSTS</li></a>
                <a href="<?php echo URLROOT; ?>/index/assets"><li class="introLi">ASSETS</li></a>
                <a href="<?php echo URLROOT; ?>/index/about"><li class="introLi">ABOUT</li></a>
                <a href="#contact"><li class="introLi">CONTACT</li></a>
            </ul>
        </div>

        <div class="centerContainer">

            <div id="fadeInBox">
                <img class="logo" src="<?php echo URLROOT; ?>/public/graphic/global/logo.svg" />
                <img class="rectangle" src="<?php echo URLROOT; ?>/public/graphic/global/rectangle.svg" />   
                <h1 class="introText"><span class="introTextSpan">PUCCI</span><br>GAMES</h1>
            </div>

            <div id="fadeinPointer">
                <a id="pointerLoadFunction" href="#games"><img class="pointerIntro" src="<?php echo URLROOT; ?>/public/graphic/global/pointer.svg" /></a>
            </div>
        
        </div>
        <div class="bottomBar" id="scrollFrontPage"></div>

    </div>
    </div>

    <!--GAME SECTION-->
    <div class="gameSection">

        <div class="space"></div>
        <section id="games">
        <div class="space"></div>
        
        <div class="gameImgContainer">
        

            <div class="game1Content">
                <h2><a class='postHeadlineA' href="<?php echo URLROOT; ?>/games/threep">Unnamed Project (3P)</a></h2>
				<img src="<?php echo URLROOT; ?>/public/graphic/index/gameImg1.jpg" class="mobilefrontImg" />
				<div style="text-align: justify;text-justify: inter-word;">
                <p class="liteText"><span style="font-weight: bold;">3P</span> is an ongoing project in its early stages.</p>
				<p class="liteText">There is a direction for the game, even though there is no story yet. It will be an RPG with a level system,
				but it will not be turn-based. The combat will be a real-time fighting system, which is based on three ways to win: Skill, Level, and Tactic.</p>
				</div>
                    <a href="<?php echo URLROOT; ?>/games/threep"><button class="button1">READ MORE</button></a>
            </div>
            <img src="<?php echo URLROOT; ?>/public/graphic/index/gameImg1.jpg" class="frontImg1" />

            <div class="floatClear"></div>

                <div class="game2Content">
                    <h2><a class='postHeadlineA' href="<?php echo URLROOT; ?>/games/twentytwentyaspaceodyssey">2020: A Space Odyssey</a></h2>
					<img src="<?php echo URLROOT; ?>/public/graphic/index/gameImg2.jpg" class="mobilefrontImg" />
                    <p class="liteText"><span style="font-weight: bold;">2020: A Space Odyssey</span> was first created during the 2020 GMTK Game Jam.</p>
                    <p class="liteText">The point of the game is simple, you only need to get to the next planet and so on until the end of the stage. But the further you get
                    the harder it becomes, since you are always building up speed.</p>
                    <a href="<?php echo URLROOT; ?>/games/twentytwentyaspaceodyssey"><button class="button1">READ MORE</button></a>
                </div>
                <img src="<?php echo URLROOT; ?>/public/graphic/index/gameImg2.jpg" class="frontImg2" />

                <div class="floatClear"></div>
                
                <div class="game1Content">
                    <h2><a class='postHeadlineA' href="<?php echo URLROOT; ?>/games/paperworld">Paper World</a></h2>
					<img src="<?php echo URLROOT; ?>/public/graphic/index/gameImg3.jpg" class="mobilefrontImg" />					
                    <p class="liteText"><span style="font-weight: bold;">Paper World</span> was originally published in 2013.</p>
					<p class="liteText">Paper World is a turn-based RPG, it contains a full chapter and the game ends after it.
					This is now a canceled project and no further development is planned.</p>
                    <a href="<?php echo URLROOT; ?>/games/paperworld"><button class="button1">READ MORE</button></a>
                </div>
                <img src="<?php echo URLROOT; ?>/public/graphic/index/gameImg3.jpg" class="frontImg1" />

                <div class="floatClear"></div>
                
        </section>
        </div>

    </div>

    <!--POSTS SECTION-->
    <div class="postSection">
        <h2 class="headerText" id="marginTopLeft">Updates</h2>
    </div>

    <div class="greenSection">
		<?php
		$i = 0;
		if($i < 4){
			foreach ($data["posts"] as $posts){
		
			//First post
			if($i == 0){
				//Replace html classes in the text to give white colors
				$searchTerms = array ( 'darkText', 'h2BlackLeft' );
				$replacements = array ( 'liteText', 'h2WhiteLeft' );
				//Set string length
				$string = $posts->text1;
				if (strlen($string) > 500) {
					$stringCut = substr($string, 0, 500);
					$endPoint = strrpos($stringCut, ' ');
					$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
					$string .= '...';
				}
				$getPostHeadline = str_replace(' ', '-', $posts->headline);
				echo "<div class='post1'>";
				echo "<h2 class='h2WhiteLeft'> ".$posts->headline."</h2>";
				echo "<p class='liteText' style='font-style: italic;'> ".date('F jS, Y', strtotime($posts->date))."</p>";
				echo "<a href='".URLROOT."/posts/post/".$getPostHeadline."?id=".$posts->id."'><img alt='".$posts->alt1."' src='".URLROOT . $posts->headlineimage."' class='postImg' /></a>";
				echo "<p class='liteText'>".str_replace( $searchTerms, $replacements, $string )."</p>";
				echo "<a href='".URLROOT."/posts/post/".$getPostHeadline."?id=".$posts->id."'><button class='button2'>READ MORE</button></a>";
				echo "</div>";
			}
			
			//second post
			if($i == 1){
				//Replace html classes in the text to give white colors
				$searchTerms = array ( 'darkText', 'h2BlackLeft' );
				$replacements = array ( 'liteText', 'h2WhiteLeft' );
				//Set string length
				$string = $posts->text1;
				if (strlen($string) > 500) {
					$stringCut = substr($string, 0, 500);
					$endPoint = strrpos($stringCut, ' ');
					$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
					$string .= '...';
				}
				$getPostHeadline = str_replace(' ', '-', $posts->headline);
				echo "<div class='post2'>";
				echo "<h2 class='h2WhiteLeft'> ".$posts->headline."</h2>";
				echo "<p class='liteText' style='font-style: italic;'> ".date('F jS, Y', strtotime($posts->date))."</p>";
				echo "<a href='".URLROOT."/posts/post/".$getPostHeadline."?id=".$posts->id."'><img alt='".$posts->alt1."' src='". URLROOT . $posts->headlineimage."' class='postImg' /></a>";
				echo "<p class='liteText' style='color: #FFFFFF!important;'>".str_replace( $searchTerms, $replacements, $string )."</p>";
				echo "<a href='".URLROOT."/posts/post/".$getPostHeadline."?id=".$posts->id."'><button class='button2'>READ MORE</button></a>";
				echo "</div>";
			}
			
			//third post
			if($i == 2){
				//Replace html classes in the text to give white colors
				$searchTerms = array ( 'darkText', 'h2BlackLeft' );
				$replacements = array ( 'liteText', 'h2WhiteLeft' );
				//Set string length
				$string = $posts->text1;
				if (strlen($string) > 500) {
					$stringCut = substr($string, 0, 500);
					$endPoint = strrpos($stringCut, ' ');
					$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
					$string .= '...';
				}
				$getPostHeadline = str_replace(' ', '-', $posts->headline);
				echo "<div class='post3'>";
				echo "<h2 class='h2WhiteLeft'> ".$posts->headline."</h2>";
				echo "<p class='liteText' style='font-style: italic;'> ".date('F jS, Y', strtotime($posts->date))."</p>";
				echo "<a href='".URLROOT."/posts/post/".$getPostHeadline."?id=".$posts->id."'><img alt='".$posts->alt1."' src='". URLROOT . $posts->headlineimage."' class='postImg' /></a>";
				echo "<p class='liteText' style='color: #FFFFFF!important;'>".str_replace( $searchTerms, $replacements, $string )."</p>";
				echo "<a href='".URLROOT."/posts/post/".$getPostHeadline."?id=".$posts->id."'><button class='button2'>READ MORE</button></a>";
				echo "</div>";
			}
			
			//fourth post
			if($i == 3){
				//Replace html classes in the text to give white colors
				$searchTerms = array ( 'darkText', 'h2BlackLeft' );
				$replacements = array ( 'liteText', 'h2WhiteLeft' );
				//Set string length
				$string = $posts->text1;
				if (strlen($string) > 500) {
					$stringCut = substr($string, 0, 500);
					$endPoint = strrpos($stringCut, ' ');
					$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
					$string .= '...';
				}
				$getPostHeadline = str_replace(' ', '-', $posts->headline);
				echo "<div class='post4'>";
				echo "<h2 class='h2WhiteLeft'> ".$posts->headline."</h2>";
				echo "<p class='liteText' style='font-style: italic;'> ".date('F jS, Y', strtotime($posts->date))."</p>";
				echo "<a href='".URLROOT."/posts/post/".$getPostHeadline."?id=".$posts->id."'><img alt='".$posts->alt1."' src='". URLROOT . $posts->headlineimage."' class='postImg' /></a>";
				echo "<p class='liteText' style='color: #FFFFFF!important;'>".str_replace( $searchTerms, $replacements, $string )."</p>";
				echo "<a href='".URLROOT."/posts/post/".$getPostHeadline."?id=".$posts->id."'><button class='button2'>READ MORE</button></a>";
				echo "</div>";
			}
		
			$i += 1;
			}
		}
		
		?>


        <div class="floatClear"></div>
		</div>
        <!--Assets-->
		<div class="assetsSection">
        <div class="space"></div>
		<div class="assetsText">
			<h2 class="headerTextLite" id="centerText">Free assets</h2>
			<p class="whiteTextBig" id="centerText">Need assets for your projects?
			<br><br id="mobileSpace"><span class="whiteTextMedium">I will post the assets I make for my games and they are free to use</span></p>
			<br id="mobileSpace">
		</div>

        <div class="assetsImg">
            <div class="assetImg1"></div>
            <div class="assetImg2"></div>
            <div class="assetImg3"></div>
        </div>
        <div class="assetsImg">
            <div class="assetImg4"></div>
            <div class="assetImg5"></div>
        </div>
           
        <div class="floatClear"></div>

        <a href="<?php echo URLROOT; ?>/index/assets"><button class="button3">GO TO ASSETS</button></a>
        <div class="space"></div>

    

    <!--CONTACT SECTION-->
    <section id="contact">
    <div class="contactSection">
    <div class="smallSpace"></div>

        <h2 class="headerTextLite" id="centerText">Contact</h2>
        <div class="assetsText">
		<?php 
		echo "<p class='whiteTextBig' id='centerText' style='color:#FFFFFF !important;'>" . $data["emailSent"] . "</p>";
		echo "<p class='whiteTextMedium' id='centerText' style='color:#CCCCCC !important;'>" . $data["emailSent2"] . "</p>";
		?>
		</div>
		<div class="smallSpace"></div>
		
        <form action="<?php echo URLROOT; ?>/index/index#contact" method="POST" class="contactForm">
            <input type="text" name="name" placeholder="Name" class="name" required />
            <input type="email" name="email" placeholder="Email" class="email" required />
            <textarea id="message" name="message" placeholder="Message" class="message" required></textarea>
			
			<!--Captcha-->
			<div class="btnRight">
				<?php include APPROOT . "/views/includes/captchaFrontpage.php"; ?>
			</div>
			
            <div class="btnLeft">
                <input type="submit" value="SEND" class="button4" />
            </div>
        </form>
        <div class="floatClear"></div>
    </div>
    </section>
	</div>
	
    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footerFrontpage.php"; ?>

</body>

</html>