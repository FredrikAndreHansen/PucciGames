<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<title>Set Your New Password</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
	<?php if(isset($_GET["email"])){$email = $_GET["email"];}else{$email = "";}if(isset($_GET["token"])){$token = $_GET["token"];}else{$token = "";} ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
	
	<div class="assetsSection" style="padding-bottom: 64px;">
	<div class="loginspace"></div>

	<div class="wrapper-login">
	
	<h2 class="h2BlackCenter">Reset Your Password</h2>
	
	<p class="successRegisterh1"><?php echo $data["success"]; ?></p>
	<p class="successRegisterh2"><?php echo $data["success2"]; ?></p>
	
	<p class="invalidFeedbackBig" style="text-align: center !important;"><?php echo $data["error"]; ?></p>
	<p class="invalidFeedback" style="text-align: center !important;"><?php echo $data["error2"]; ?></p>
	
	<?php if($data["success"] == "") { ?>
	<form action="<?php echo URLROOT; ?>/users/setnewpassword?email=<?php echo $email . "&token=" . $token; ?>" method="POST">
		<p class="darkText" id="negativeMargin">New Password</p>
		<input type="password" name="password" minlength="8" required>
		<p class="invalidFeedback" style="text-align: center !important;"><?php echo $data["passwordError"]; ?></p>
				
		<p class="darkText" id="negativeMargin">Confirm Password</p>
		<input type="password" name="confirmPassword" minlength="8" required>
		<p class="invalidFeedback" style="text-align: center !important;"><?php echo $data["confirmPasswordError"]; ?></p>
		
		<!--Captcha-->
		<?php include APPROOT . "/views/includes/captcha.php"; ?>
				
		<button id="submit" type="submit" value="submit">SUBMIT</button>		
	</form>

	<hr class="hr2">
			
	<p class="darkText" style="text-align:center !important;"><a class="linkText" href="<?php echo URLROOT; ?>/users/login">Sign In</a>|<a class="linkText" href="<?php echo URLROOT; ?>/users/register">Register</a></p>
	
	<?php } ?>
	</div>
	</div>

    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>