<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<title>Change Email</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
	
	<div class="assetsSection" style="padding-bottom: 64px;">
	<div class="loginspace"></div>

	<div class="wrapper-login">
	
	<h2 class="h2BlackCenter">Change Email</h2>
	
	<p class="darkText" style="text-align: center !important;">Current Email:<br /> <?php echo "<span style='font-weight:bold;line-height: 1 !important;word-break: break-all;'>" . $_SESSION["email"] . "</span>"; ?></p>
	<hr class="hr2">
	
	<?php if($data["emailSuccess"] == ""){ ?>
	<p class="darkText" style="word-break: break-all;text-align: center !important;">New Email</p>
	
	<form action="<?php echo URLROOT; ?>/users/changeemail" method="POST">
		<input type="email" name="email" maxlength="320" title="Your new email address" required>
		<p class="invalidFeedback" style="text-align: center !important"><?php echo $data["emailError"]; ?></p>
		<button id="submit" type="submit" value="submit">SUBMIT</button>		
	</form>
	<?php }else{ ?>
		<p class="successRegisterh1"><?php echo $data["emailSuccess"]; ?></p>
		<p class="successRegisterh2"><?php echo $data["emailSuccess2"]; ?></p>
	<?php } ?>
	</div>
	</div>

    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>