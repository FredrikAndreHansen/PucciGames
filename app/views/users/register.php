<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<meta name="description" content="Register to PucciGames to comment. The registration is free and you will never receive any emails unless you request it." />
    <meta name="keywords" content="registration, puccigames, comment" />
    <meta name="author" content="<?php echo AUTHOR; ?>" />
	<title>Register</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>

    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
	
	<div class="assetsSection" style="padding-bottom: 64px;">
	<div class="loginspace"></div>
		<div class="wrapper-login">
			
			<p class="successRegisterh1"><?php echo $data["successMessage"]; ?></p>
			<p class="successRegisterh2"><?php echo $data["successMessage2"]; ?></p>
			
			<?php if($data["successMessage"] == NULL){ ?>
			
			<h2 class="h2BlackCenter">Register</h2>
			
			<form action="<?php echo URLROOT; ?>/users/register" method="POST">
			
				<p class="darkText" id="negativeMargin">Username*</p>
				<input type="text" name="username" title="Your username is what you are recognised as" minlength="3" maxlength="20" required>
				<p class="invalidFeedback"><?php echo $data["usernameError"]; ?></p>
				
				<p class="darkText" id="negativeMargin">Email*</p>
				<input type="email" name="email" title="No one is able to see your email and you will never receive any emails unless you request it" maxlength="320" required>
				<p class="invalidFeedback"><?php echo $data["emailError"]; ?></p>
				
				<p class="darkText" id="negativeMargin">Password*</p>
				<input type="password" name="password" title="Your password must be minimum 8 characters long and have atleast 1 number" minlength="8" required>
				<p class="invalidFeedback"><?php echo $data["passwordError"]; ?></p>
				
				<p class="darkText" id="negativeMargin">Confirm Password*</p>
				<input type="password" name="confirmPassword" title="Repeat your pasword" minlength="8" required>
				<p class="invalidFeedback"><?php echo $data["confirmPasswordError"]; ?></p>
				
				<p class="darkText" id="negativeMargin">Website</p>
				<input type="url" name="website" title="(Optional) When someone click on your username they will be directed to your website">
				
				<!--Captcha-->
				<?php include APPROOT . "/views/includes/captcha.php"; ?>
				
				<button id="submit" type="submit" value="submit">REGISTER</button>
			
			</form>
			
			<hr class="hr2">
			
			<p class="darkText" style="text-align:center !important;"><a class="linkText" href="<?php echo URLROOT; ?>/users/login">Sign In</a>|<a class="linkText" href="<?php echo URLROOT; ?>/users/passwordreset">Forgot Password?</a></p>
			<?php } ?>
			
		</div>
	</div>
    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>