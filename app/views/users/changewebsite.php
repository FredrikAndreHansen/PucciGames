<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<title>Change Website</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
	
	<div class="assetsSection" style="padding-bottom: 64px;">
	<div class="loginspace"></div>

	<div class="wrapper-login">
	
	<h2 class="h2BlackCenter">Change Website</h2>
	
	<p class="darkText" style="text-align: center !important;">Current Website:<br /> 
	<?php if(empty($_SESSION["website"])){ 
		echo "<span style='font-weight:bold;'>No Website!</span>";}
	else{
		echo "<span style='font-weight:bold;line-height: 1 !important;word-break: break-all;'>" . $_SESSION["website"] . "</span>";
	} ?></p>
	<hr class="hr2">
	
	<?php if($data["websiteSuccess"] == ""){ ?>
	<p class="darkText" style="word-break: break-all;text-align: center !important;">New Website</p>
	
	<form action="<?php echo URLROOT; ?>/users/changewebsite" method="POST">
		<input type="url" name="website" title="When someone click on your username they will be directed to your website" required>
		<p class="invalidFeedbackBig" style="text-align: center !important"><?php echo $data["error"]; ?></p>
		<p class="invalidFeedback" style="text-align: center !important"><?php echo $data["error2"]; ?></p>
		<button id="submit" type="submit" value="submit">SUBMIT</button>		
	</form>
	<?php }else{ ?>
		<p class="successRegisterh1"><?php echo $data["websiteSuccess"]; ?></p>
	<?php } ?>
	</div>
	</div>

    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>