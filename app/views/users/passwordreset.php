<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
		<meta name="description" content="Reset your password by receiving a password reset email." />
    <meta name="keywords" content="password reset, puccigames, comment" />
    <meta name="author" content="<?php echo AUTHOR; ?>" />
	<title>Reset Your Password</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
	
	<div class="assetsSection" style="padding-bottom: 64px;">
	<div class="loginspace"></div>

	<div class="wrapper-login">
	
	<h2 class="h2BlackCenter">Reset Your Password</h2>

	<p class="successRegisterh1" style="text-align: center !important"><?php echo $data["emailSuccess"]; ?></p>
	<p class="successRegisterh2" style="text-align: center !important"><?php echo $data["emailSuccess2"]; ?></p>
	
	<?php if($data["emailSuccess"] == "") { ?>
	<p class="darkText" style="text-align: center !important">Enter your email address and you will receive a link to reset your password.</p>
	
	<hr class="hr2">
	
	<form action="<?php echo URLROOT; ?>/users/passwordreset" method="POST">
		<p class="darkText" id="negativeMargin">Email Address</p>
		<input type="email" name="email" required>
		<p class="invalidFeedback" style="text-align: center !important"><?php echo $data["emailError"]; ?></p>
		
		<!--Captcha-->
		<?php include APPROOT . "/views/includes/captcha.php"; ?>
				
		<button id="submit" type="submit" value="submit">SUBMIT</button>		
	</form>
	<?php } ?>
		
	<hr class="hr2">
			
	<p class="darkText" style="text-align:center !important;"><a class="linkText" href="<?php echo URLROOT; ?>/users/login">Sign In</a>|<a class="linkText" href="<?php echo URLROOT; ?>/users/register">Register</a></p>

	</div>
	</div>

    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>