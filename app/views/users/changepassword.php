<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<title>Change Your Password</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
	
	<div class="assetsSection" style="padding-bottom: 64px;">
	<div class="loginspace"></div>

	<div class="wrapper-login">
	
	<h2 class="h2BlackCenter">Change Your Password</h2>
	
	
	<?php if($data["passwordSuccess"] == ""){ ?>
	
	<form action="<?php echo URLROOT; ?>/users/changepassword" method="POST">
		
		<p class="darkText" id="negativeMargin">Current Password</p>
		<input type="password" name="currentpassword" title="The current password you use" required>
		<p class="invalidFeedback"><?php echo $data["currentpasswordError"]; ?></p>
		
		<hr class="hr2">

		<p class="darkText" id="negativeMargin">New Password</p>
		<input type="password" name="newpassword" title="Your password must be minimum 8 characters long and have atleast 1 number" minlength="8" required>
		<p class="invalidFeedback"><?php echo $data["newpasswordError"]; ?></p>
		
		<p class="darkText" id="negativeMargin">Confirm Your New Password</p>
		<input type="password" name="confirmpassword" title="Repeat your pasword" minlength="8" required>
		<p class="invalidFeedback"><?php echo $data["confirmpasswordError"]; ?></p>
		
		<p class="invalidFeedbackBig" style="text-align: center !important"><?php echo $data["error"]; ?></p>
		<p class="invalidFeedback" style="text-align: center !important"><?php echo $data["error2"]; ?></p>

		<button id="submit" type="submit" value="submit">SUBMIT</button>		
	</form>
	<?php }else{ ?>
		<p class="successRegisterh1"><?php echo $data["passwordSuccess"]; ?></p>
	<?php } ?>
	</div>
	</div>

    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>