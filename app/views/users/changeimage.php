<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<title>Change Image</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
	
	<div class="assetsSection" style="padding-bottom: 64px;">
	<div class="loginspace"></div>

	<div class="wrapper-login">
	
	<h2 class="h2BlackCenter">Change Image</h2>
	
	
	<?php if($data["imageSuccess"] == ""){ ?>
	<p class="darkText" style="word-break: break-all;text-align: center !important;font-weight:bold;">Upload image</p>
	
	<hr class="hr2">
	<p class="darkText" style="text-align: center !important;">Maximum size is 500KB</p>
	<p class="darkText" style="text-align: center !important;">Only JPG, JPEG, PNG and GIF are allowed</p>
	
	<form action="<?php echo URLROOT; ?>/users/changeimage" method="POST" enctype="multipart/form-data">
		<input type="file" name="file" required>
		<p class="invalidFeedback" style="text-align: center !important"><?php echo $data["imageError"]; ?></p>
		<button id="submit" type="submit" value="submit">UPLOAD</button>		
	</form>
	<?php }else{ ?>
		<p class="successRegisterh1"><?php echo $data["imageSuccess"]; ?></p>
		<div style="display: flex;align-items: center;justify-content: center;">
			<div style="background-image: url('<?php echo $_SESSION["imageurl"]; ?>');" class="userImg"></div>
		</div>
	<?php } ?>
	</div>
	</div>

    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>