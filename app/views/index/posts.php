<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
		<meta name="description" content="All posts and updates from PucciGames." />
    <meta name="keywords" content="posts, updates, news, new, games" />
    <meta name="author" content="<?php echo AUTHOR; ?>" />
	<title>Posts</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<script src="<?php echo URLROOT ?>/public/javascript/imageGallery.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>

	<div class='assetsSection' style='padding-bottom: 64px;'>

			<?php 
			
			echo "<h2 class='postHeaderIntro'>Posts</h2>";
			echo "<div class='postHeaderImageTop' style='background-image: url(".URLROOT."/public/graphic/index/posts_background.jpg);'>";
			echo "</div><div class='postHeaderMargin'></div>";
			
			echo "<div class='postsSection'>";
			
			//Search for posts
			echo "<div class='topWrapper' style='inline-block;'>";
				echo "<form action='" . URLROOT ."/index/posts' method='POST' class='search'>";
				echo "<input type='text' placeholder='Search..' name='postSearch' required/>";
				echo "<button type='submit'></button></form><div class='widthSpace'></div>";
				
				echo "<form action='" . URLROOT ."/index/posts' method='GET'>";
				echo "<select placeholder='All P' class='categorySelect' id='category' name='category'>";
					echo "<option value='allposts'>All Posts</option>";
					echo "<option value='general'>General</option>";
					echo "<option value='2020aspaceodyssey'>2020: A Space Odyssey</option>";
					//echo "<option value='3p'>3P</option>";
				echo "</select>";
				echo "<button class='category' type='submit'></button></form>";
				
			echo "</div>";
			if($data["searchResult"] != ""){echo "<div class='postWrapper'><p class='liteTextBig'>Search results for: <span style='font-weight:bold;'>".$data['searchResult']."</span></p></div>";}

				
				//Print out posts
				$i = 0;
				foreach ($data["posts"] as $posts){
				
				//Format text, Set string length
				$string = $posts->text1;
				if (strlen($string) > 200) {
					$stringCut = substr($string, 0, 200);
					$endPoint = strrpos($stringCut, ' ');
					$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
					$string .= '...';
				}
				
				$getPostHeadline = str_replace(' ', '-', $posts->headline);
					
					echo "<div class='postWrapper'>";
						echo "<h2 class='h2BlackLeftSmall' id='mobileAssign'><a class='postHeadlineA' href='".URLROOT."/posts/post/".$getPostHeadline."?id=".$posts->id."'>".$posts->headline."</a></h2>";
						echo "<a class='postHeadlineA' id='postHeadlineI' href='".URLROOT."/posts/post/".$getPostHeadline."?id=".$posts->id."'><img alt='".$posts->alt1."' src='".URLROOT . $posts->headlineimage."' class='postSectionLeft' /></a>";
						echo "<div class='postSectionMiddle'>";
							echo "<h2 class='h2BlackLeftSmall' id='mobileRemove'><a class='postHeadlineA' href='".URLROOT."/posts/post/".$getPostHeadline."?id=".$posts->id."'>".$posts->headline."</a></h2>";
							echo "<p class='darkText' style='font-style: italic;'>".date('F jS, Y', strtotime($posts->date))."</p>";
							echo "<p class='darkText'>".str_replace( 'h2BlackLeft', 'h2BlackLeftNoDisplay', $string )."</p>";
							echo "<a href='".URLROOT."/posts/post/".$getPostHeadline."?id=".$posts->id."'><button class='button2Right'>READ MORE</button></a>";
						echo "</div>";
					echo "</div>";
					$i ++;
				}
			if($i == 0){echo "<p style='font-weight: bold!important;text-align:center !important;' class='liteTextBig'>No results!</p>";}
			echo "</div>";
			
			
		if(!isset($_POST["postSearch"])){ include APPROOT . "/views/includes/postpagination.php"; }
		else{echo "<div class='contactForm' style='margin-top: 64px;text-align:center;'><a class='linkTextWhite' href='".URLROOT."/index/posts'>Back To All Posts</a></div>";} ?>
		</div>
		
		
		

        <div class="floatClear"></div>

	</div>


    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>