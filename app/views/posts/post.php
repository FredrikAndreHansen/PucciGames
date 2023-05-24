<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<title><?php foreach ($data["posts"] as $posts){if($posts->id == $_GET["id"]){ echo $posts->headline; $desname = $posts->headline;$descategory = $posts->setcategory;$desalt = $posts->alt1; $desdescription = $posts->text1;}} ?></title>
		<meta name="description" content="<?php echo strip_tags(str_replace('"', "", $desdescription)); ?>" />
    <meta name="keywords" content="<?php echo $desname;echo ',';echo $descategory;echo ',';echo $desalt; ?>" />
    <meta name="author" content="<?php echo AUTHOR; ?>" />
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<script src="<?php echo URLROOT ?>/public/javascript/imageGallery.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
	
	<div class='assetsSection' style='padding-bottom: 64px;'>
			<?php 
			foreach ($data["posts"] as $posts){
					
				if($posts->id == $_GET["id"]){
					
					echo "<h2 class='postHeaderIntro' id='text-fix'>" . $posts->headline . "</h2>";
					echo "<div class='postHeaderImage' style='background-image: url(" . URLROOT . $posts->headlineimage . ")'>";
					echo "</div><div class='postHeaderMargin'></div>";
					
					echo "<div class='postsSection'>";
					echo "<div class='postTextWrapper'><p class='darkText' style='font-style:italic;'>Published: <time datetime='".$posts->date."'>" . date('F jS, Y', strtotime($posts->date)) . "</time></p></div>";
					echo "<div class='postTextWrapper'><p class='darkText'>Category: <span class='postCategory'>" . $posts->setcategory . "</span></p></div><div class='superSmallSpace'></div>";
					echo "<div class='postTextWrapper'>" . $posts->text1 . "</div>";
					if(!empty($posts->image1)){echo "<div class='postImagePar'><div alt='" . $posts->alt1 . "' aria-label='" . $posts->alt1 . "' onclick='currentSlide(1);' class='postImage' style='background-image: url(" . URLROOT . $posts->image1 . ")'> <img class='galleryIconPost' src='" . URLROOT . "/public/graphic/global/magnifyingglass.svg' /></div></div>";}
					echo "<div class='postTextWrapper'>" . $posts->text2 . "</div>";
					if(!empty($posts->image2)){echo "<div class='postImagePar'><div alt='" . $posts->alt2 . "' aria-label='" . $posts->alt2 . "' onclick='currentSlide(2);' class='postImage' style='background-image: url(" . URLROOT . $posts->image2 . ")'> <img class='galleryIconPost' src='" . URLROOT . "/public/graphic/global/magnifyingglass.svg' /></div></div>";}
					echo "<div class='postTextWrapper'>" . $posts->text3 . "</div>";
					if(!empty($posts->image3)){echo "<div class='postImagePar'><div alt='" . $posts->alt3 . "' aria-label='" . $posts->alt3 . "' onclick='currentSlide(3);' class='postImage' style='background-image: url(" . URLROOT . $posts->image3 . ")'> <img class='galleryIconPost' src='" . URLROOT . "/public/graphic/global/magnifyingglass.svg' /></div></div>";}
					echo "<div class='postTextWrapper'>" . $posts->text4 . "</div>";
					
					echo "<div id='showGallery'>";
					echo "<img src='" . URLROOT . "/public/graphic/global/exit.svg' class='closeGallery' onclick='closeGallery();' />";
					if(!empty($posts->image1)){echo "<img src='" . URLROOT . $posts->image1 . "' alt='" . $posts->alt1 . "' class='showImage' id='galleryImg1' />";}else{echo "<img id='galleryImg1' />";}
					if(!empty($posts->image2)){echo "<img src='" . URLROOT . $posts->image2 . "' alt='" . $posts->alt2 . "' class='showImage' id='galleryImg2' />";}else{echo "<img id='galleryImg2' />";}
					if(!empty($posts->image3)){echo "<img src='" . URLROOT . $posts->image3 . "' alt='" . $posts->alt3 . "' class='showImage' id='galleryImg3' />";}else{echo "<img id='galleryImg3' />";}
					
					echo "<img id='galleryImg4' />";echo "<img id='galleryImg5' />";echo "<img id='galleryImg6' />";
					echo "<img id='galleryImg7' />";echo "<img id='galleryImg8' />";echo "<img id='galleryImg9' />";
					echo "</div>";
	
					
				}
			
			}
			?>
		</div>
		
		<div class="smallSpace"></div>
        <h2 class="headerTextLite" id="centerText">Comments</h2>
        <?php include APPROOT . "/views/includes/commentsPosts.php"; ?>

        <hr class="hr1" />
		
		<?php include APPROOT . "/views/includes/commentsectionposts.php"; ?>

        <div class="floatClear"></div>

	</div>


    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>