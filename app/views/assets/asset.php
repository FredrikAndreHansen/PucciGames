<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<title><?php foreach ($data["assets"] as $asset){if($asset->id == $_GET["id"]){ echo $asset->name; $desname = $asset->name;$descategory = $asset->setcategory; $desalt = $asset->alt; $desdescription = $asset->description;}} ?></title>
		<meta name="description" content="<?php echo $desdescription; ?>" />
    <meta name="keywords" content="<?php echo $desalt; ?>" />
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
			foreach ($data["assets"] as $asset){
			    
					
				if($asset->id == $_GET['id']){
					
					echo "<h2 class='postHeaderIntro' id='text-fix'>" . $asset->name . "</h2>";
					echo "<div class='postHeaderImage' style='opacity: 0.75;background-image: url(" . URLROOT . $asset->url."), linear-gradient(180deg, #FFFFFF, #000000);'>";
					echo "</div><div class='postHeaderMargin'></div>";
					
					echo "<div class='postsSection'>";
					echo "<div class='postTextWrapper'><p class='darkText' style='font-style:italic;'>Submitted: <time datetime='".$asset->date."'>" . date('F jS, Y', strtotime($asset->date)) . "</time></p></div>";
					echo "<div class='postTextWrapper'><p class='darkText'>Category: <span class='postCategory'>" . $asset->setcategory . "</span></p></div><div class='superSmallSpace'></div>";

					echo "<div class='postImagePar'><div aria-label='".$asset->alt."' alt='".$asset->alt."' onclick='currentSlide(1);' class='postImage' id='assetImg' style='background-image: url(" . URLROOT . $asset->url . ")'></div><img class='galleryIconPost2' src='" . URLROOT . "/public/graphic/global/magnifyingglass.svg' /></div>";
					echo "<div class='postTextWrapper'>";
					//echo "<img alt='".$asset->alt."' class='assetImg' src='".URLROOT . $asset->url."' />";
					echo "<p class='darkText'>".$asset->description."</p>";
					echo "<a href='" . URLROOT . $asset->url . "' download><button class='button2'>DOWNLOAD</button></a>";
					echo "<p class='darkTextSmall'>Type: <span class='greenBold'>".strtoupper($asset->type)."</span></p>";
					$size = round($asset->size/1024);
					echo "<p class='darkTextSmall'>Size: <span class='greenBold'>".$size." KB</span></p>";
					echo "<div class='smallSpace'></div><p class='darkTextSmall'>* All assets are free to use and won't require any credit. <a class='linkText' href='https://creativecommons.org/publicdomain/zero/1.0/' target='_blank'>Zero (cc0)</a></p>";
					echo "<p class='darkTextSmall'>Feel free to leave a link to your project here.</p>";
	
					echo "</div>";
					echo "</div>";	
					
					echo "<div id='showGallery'>";
					echo "<img src='" . URLROOT . "/public/graphic/global/exit.svg' class='closeGallery' onclick='closeGallery();' />";
					echo "<img src='" . URLROOT . $asset->url . "' alt='" . $asset->alt . "' class='showAssetImage' id='galleryImg1' />";

					echo "<img id='galleryImg2' />";echo "<img id='galleryImg3' />";
					echo "<img id='galleryImg4' />";echo "<img id='galleryImg5' />";echo "<img id='galleryImg6' />";
					echo "<img id='galleryImg7' />";echo "<img id='galleryImg8' />";echo "<img id='galleryImg9' />";
					echo "</div>";
				}
			
			}
			?>
		
		
		<div class="smallSpace"></div>
        <h2 class="headerTextLite" id="centerText">Comments</h2>
        <?php include APPROOT . "/views/includes/commentsAssets.php"; ?>

        <hr class="hr1" />
		
		<?php include APPROOT . "/views/includes/commentsectionassets.php"; ?>

        <div class="floatClear"></div>

	</div>


    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>