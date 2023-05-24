<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<title><?php echo $_SESSION["username"] . "'s Profile"; ?></title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
	
	<div class="assetsSection" style="padding-bottom: 64px;">
	<div class="loginspace"></div>
	
	<?php if($_SESSION["usertype"] == "Admin"){include APPROOT . "/views/includes/adminSection.php";} ?>
	
		<div class="wrapper-login">
		
			<h2 class="h2BlackCenter" style="word-break: break-all;">Welcome <?php echo $_SESSION["username"]; ?>!</h2>
			
			<p class="invalidFeedbackBig" style="text-align: center !important;"><?php echo $data["error"]; ?></p>
			<p class="invalidFeedback" style="text-align: center !important;"><?php echo $data["error2"]; ?></p>
			
			<?php if($_SESSION["validated"] == 1){ ?>
			<?php echo "<p class='successRegisterh1'>" . $data["validatesucess"] . "</p>";?>
			<?php echo "<p class='successRegisterh1'>" . $data["emailchangesuccess"] . "</p>";?>
			
			<!--Image -->	
			<div style="display: flex;align-items: center;justify-content: center;">
				<div style="background-image: url('<?php echo $_SESSION["imageurl"]; ?>');" class="userImg"></div>
			</div>
			
			<a href="<?php echo URLROOT; ?>/users/changeimage"><button id="submit">Change Image</button></a>
			<hr class="hr2">
			
			<!--Email-->
			<p class="darkText" style="word-break: break-all;text-align: center !important;"><?php echo $_SESSION["email"]; ?></p>
			<a href="<?php echo URLROOT; ?>/users/changeemail"><button id="submit">Change Email</button></a>
			<hr class="hr2">
			
			<!--Website -->
			<p class="darkText" style="line-height: 1 !important;word-break: break-all;text-align: center !important;">
			<?php if(empty($_SESSION["website"])){
				echo "No Website!";}else{?>
				<a class="linkText" target="_blank" href="<?php echo $_SESSION["website"]; ?>"> <?php echo $_SESSION["website"];
				} ?></a></p>
			
			<a href="<?php echo URLROOT; ?>/users/changewebsite"><button id="submit" style="margin-bottom: 16px;">Change Website</button></a>
			<hr class="hr2">
	
			
			<!--Change passsword -->
			<a href="<?php echo URLROOT; ?>/users/changepassword"><button id="submit" style="margin-bottom: 16px;">Change Password</button></a>
			
			<?php }else{ ?>

				<p class="darkText" style="text-align: center !important;"><?php echo $data["emailnotsent"]; ?></p>
				<p class="darkText" style="text-align: center !important;"><?php echo $data["emailnotsent2"]; ?></p>

				<p class="successRegisterh1" style="text-align: center !important;"><?php echo $data["emailsent"]; ?></p>
				<p class="successRegisterh2" style="text-align: center !important;"><?php echo $data["emailsent2"]; ?></p>

			<a href="<?php echo URLROOT; ?>/users/validate"><button id="submit" style="margin-bottom: 16px;">VALIDATE EMAIL</button></a>
			<hr class="hr2">
			<p class="darkText" style="text-align: center !important;text-decoration: underline !important;">Your user will eventually be deleted if you never validate your email</p>
			<?php } ?>
			
			<hr class="hr2">
			<!--Log out -->
			<a href="<?php echo URLROOT; ?>/users/logout"><button id="logout">LOG OUT</button></a>
			
		</div>
	</div>

    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>