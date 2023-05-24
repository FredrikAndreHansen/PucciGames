<?php if(isset($data["attempt"]->attempt)){$attempt = $data["attempt"]->attempt;}else{$attempt = 0;} ?>
<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<meta name="description" content="Sign in to PucciGames." />
    <meta name="keywords" content="sign in, puccigames, comment" />
    <meta name="author" content="<?php echo AUTHOR; ?>" />
	<title>Sign In</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>

    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
	<div class="assetsSection" style="padding-bottom: 64px;">
	<div class="loginspace"></div>
	
		<div class="wrapper-login">
		
			<h2 class="h2BlackCenter">Sign In</h2>
			
			<?php if($attempt < 5){ ?>
			
			<form action="<?php echo URLROOT; ?>/users/login" method="POST">
			
				<p class="darkText" id="negativeMargin">Email or Username</p>
				<input type="text" name="username" minlength="3" required>
				<p class="invalidFeedback"><?php echo $data["usernameError"]; ?></p>
				
				<p class="darkText" id="negativeMargin">Password</p>
				<input type="password" name="password" minlength="8" required>
				<p class="invalidFeedback"><?php echo $data["passwordError"]; ?></p>

				<!--Captcha-->
				<?php include APPROOT . "/views/includes/captcha.php"; ?>
				
				<button id="submit" type="submit" value="submit">SIGN IN</button>
			
			</form>
			
			<?php }else{ ?>
			
			<p class="invalidFeedbackBig" style="text-align: center!important;">Too many failed attempts</p>
			<p class="invalidFeedback" style="text-align: center!important;">Please try again later!</p>
			
			<?php } ?>
			
			<hr class="hr2">
			
			<p class="darkText" style="text-align:center !important;"><a class="linkText" href="<?php echo URLROOT; ?>/users/register">Register</a>|<a class="linkText" href="<?php echo URLROOT; ?>/users/passwordreset">Forgot Password?</a></p>
			
		</div>
	</div>

    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>

</body>
</html>