<?php if($_SESSION["usertype"] == "Admin"){ ?>
<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<title>Submit A Asset</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
	
	<div class="assetsSection" style="padding-bottom: 64px;">
	<div class="loginspace"></div>
	
		<div class="addPostSection">

			<form class="postForm" action="<?php echo URLROOT; ?>/assets/submitasset" method="POST" enctype="multipart/form-data">
			
				<p class="darkText" style="text-align:center;">Name</p>
				<input type="text" name="name" required />
				
				<p class="darkText" style="text-align:center;">Description</p>
				<input type="text" name="description" required />
				
				<p class="darkText" style="text-align:center;">Image</p>
				<input type="file" name="image" required />
				
				<p class="darkText" style="text-align:center;">Alt</p>
				<input type="text" name="alt" required />
				
				
				<p class="darkText" style="text-align:center;">Category</p>
			
				<input id="textures" type="radio" name="category" value="textures">
				<label class="darkTextRadio" for="textures"><span></span>Textures</label>
				
				<input id="sprites" type="radio" name="category" value="sprites">
				<label class="darkTextRadio" for="sprites"><span></span>Sprites</label>
				
				<input id="backgrounds" type="radio" name="category" value="backgrounds">
				<label class="darkTextRadio" for="backgrounds"><span></span>Backgrounds</label>
				
				<input type="submit" value="SUBMIT" id="submit" />
			
			</form>
		</div>
	</div>
    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>
<?php } ?>