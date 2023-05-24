<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<meta name="description" content="Free sprites, images, and textures for game development. I will post assets I create for my games and they are all free to use without any distribution." />
    <meta name="keywords" content="texture, textures, sprite, sprites, images, assets" />
    <meta name="author" content="<?php echo AUTHOR; ?>" />
	<title>Assets</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<script src="<?php echo URLROOT ?>/public/javascript/imageGallery.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>

	<div class='assetsSection' style='padding-bottom: 64px;'>

			<?php 
			
			echo "<h2 class='postHeaderIntro'>Assets</h2>";
			echo "<div class='postHeaderImageTop' style='background-image: url(".URLROOT."/public/graphic/index/assets_background.jpg);'>";
			echo "</div><div class='postHeaderMargin'></div>";
			
			echo "<div class='postsSection'>";
			
			//Search for assets
			echo "<div class='topWrapper' style='inline-block;'>";
				echo "<form action='" . URLROOT ."/index/assets' method='POST' class='search'>";
				echo "<input type='text' placeholder='Search..' name='assetSearch' required/>";
				echo "<button type='submit'></button></form><div class='widthSpace'></div>";
				
				echo "<form action='" . URLROOT ."/index/assets' method='GET'>";
				echo "<select placeholder='All' class='categorySelect' id='category' name='category'>";
					echo "<option value='allassets'>All Assets</option>";
					echo "<option value='textures'>Textures</option>";
					echo "<option value='sprites'>Sprites</option>";
					echo "<option value='backgrounds'>Backgrounds</option>";
				echo "</select>";
				echo "<button class='category' type='submit'></button></form>";
				
			echo "</div>";
			if(!isset($_POST["assetSearch"])){echo "<div class='smallSpace'></div>";}
			if(isset($_POST["assetSearch"]) && $data["searchResult"] == ""){echo "<div class='space'></div>";}
			if($data["searchResult"] != ""){echo "<div class='postWrapper'><p class='liteTextBig'>Search results for: <span style='font-weight:bold;'>".$data['searchResult']."</span></p></div>";}
				
				//Print out posts
				$i = 0;
				$grid = 0;
				foreach ($data["assets"] as $assets){
					if($grid == 0){echo "<div class='imageGalleryGrid' id='assetsImgGrid'>";}
					//echo "<a href='".URLROOT."/assets/asset?id=".$assets->id."'>";
					$getImgUrl = URLROOT . $assets->url;
					$getAssetName = str_replace(' ', '-', $assets->name);
					
					//Get the image dimension, if the image is too big then scale it down, if small then set the background size to auto to get the true size
					list($width, $height) = getimagesize($getImgUrl);
					$arr = array('h' => $height, 'w' => $width );
					

					if($arr["w"] <= 255){
					   $checkImgSize = true;
					   echo "<div class='galleryThumbnailImagePar'><a href='".URLROOT."/assets/asset/".$getAssetName."?id=".$assets->id."'><div id='setAssetBackground' class='galleryThumbnailImage' style='background: url(".URLROOT . $assets->url.")no-repeat center center fixed;'><img class='galleryIcon' src='".URLROOT."/public/graphic/global/magnifyingglass.svg' /></div></a></div>";
					}
					
					
					if($arr["w"] > 255){
					   $checkImgSize = true;
					   echo "<div class='galleryThumbnailImagePar'><a href='".URLROOT."/assets/asset/".$getAssetName."?id=".$assets->id."'><div id='setAssetBackgroundBig' class='galleryThumbnailImage' style='background: url(".URLROOT . $assets->url.")no-repeat center center fixed;'><img class='galleryIcon' src='".URLROOT."/public/graphic/global/magnifyingglass.svg' /></div></a></div>";
					}
					
					
					//echo "</a>";
					if($grid == 2){echo "</div>";}
				
				$grid ++;
				if($grid > 2){$grid = 0;}				
				$i ++;
				}
				if($i == 0){echo "<p style='font-weight: bold!important;text-align:center !important;' class='liteTextBig'>No results!</p>";}
				echo "</div>";if($grid != 2){echo "</div>";}
		
			
			echo "</div>";
			
			
		 if(!isset($_POST["assetSearch"])){ include APPROOT . "/views/includes/assetpagination.php"; }
		else{echo "<div class='contactForm' style='margin-top: 64px;text-align:center;'><a class='linkTextWhite' href='".URLROOT."/index/assets'>Back To All Assets</a></div>";} ?>
		</div>
		
		
		

        <div class="floatClear"></div>

	</div>


    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>