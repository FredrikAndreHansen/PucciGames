<?php if($_SESSION["usertype"] == "Admin"){ ?>
<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<title>All Users</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
	
	<div class="assetsSection" id="setGrid" style="padding-bottom: 64px;">
	<div class="loginspace"></div>
	
	
		<div class="adminPage">
		
			<?php
			if(!isset($_GET["userList"])){$_GET["userList"] = 50;}
			echo "<p style='text-align: center!important;word-break: break-all;' class='darkText'>Users(".$_GET["userList"]."):</p>";
			
			echo "<form action='" . URLROOT ."/users/admincheckallusers' method='GET'>";
			echo "<p style='text-align: center!important;' class='darkTextSmall'>Get the amount of users:</p>";
			echo "<p><input type='number' name='userList' required/></p>";
			echo "<input type='submit' value='Get User Amount' id='submit' /></form>";
			
			echo "<hr style='width: 50% !important;' class='hr2' />";
			
			echo "<form action='" . URLROOT ."/users/admincheckallusers' method='GET'>";
			echo "<p style='text-align: center!important;' class='darkTextSmall'>Search for users:</p>";
			echo "<p><input type='text' name='userSearch' required/></p>";
			echo "<input type='submit' value='Search' id='submit' /></form>";
			
			echo "<hr style='width: 50% !important;' class='hr2' />";
			
			//Count unchecked users
			$uncheckedUsers = 0;
			foreach ($data["uncheckedUsers"] as $usersUncheckedCount){$uncheckedUsers += 1;}
			
			if($uncheckedUsers > 0){
			$uncheckedUsersTotal = "<span class='successRegisterh1'>+ " . $uncheckedUsers . "</span>";}else{$uncheckedUsersTotal = "";}
			
			echo "<a href='" . URLROOT . "/users/adminchecklatestuserchanges'><button id='submit'>Check Latest User Changes</button></a>" .$uncheckedUsersTotal;
			
			echo "<hr class='hr2' />";
			
			
			$i = 0;
			//Users
			foreach ($data["users"] as $users){
			
			if($i < $_GET["userList"]){
				$createdAt = date('F jS, Y \a\t G:i', strtotime('-24 hours', strtotime($users->deletetime)));
		
				//Check if validated or banned or admin
				if($users->usertype != "Banned" && $users->usertype != "Admin"){
					if($users->validated == 1){echo "<div style='padding: 4px;margin: 4px;background-color:#f4f7ed;display:inline-block;'>";}
					else{echo "<div style='padding: 4px;margin: 4px;display:inline-block;background-color:#ff8080;'>";}
				}elseif($users->usertype == "Banned"){echo "<div style='padding: 4px;margin: 4px;display:inline-block;background-color:#4d0000;'>";}
				if($users->usertype != "Banned" && $users->usertype == "Admin"){echo "<div style='padding: 4px;margin: 4px;display:inline-block;background-color:#FF8C00;'>";}
				if($users->usertype == "Banned" && $users->usertype == "Admin"){echo "<div style='padding: 4px;margin: 4px;display:inline-block;background-color:#4d0000;'>";}
				
				echo "<div style='background-image: url( " . URLROOT . $users->imageurl . " )' class='smallImg'></div>";
				echo "<p style='word-break: break-all;' class='darkText'>" . $users->username ."</p>";
				echo "<p style='word-break: break-all;' class='darkTextSmall'>" . $createdAt ."</p>";
				echo "<p style='word-break: break-all;' class='darkTextSmall'>" . "Website: " . $users->website ."</p>";
				
				//Ban user if not banned
				if($users->usertype != "Banned" && $users->usertype != "Admin"){
				echo "<form action='" . URLROOT ."/users/adminbanuser' method='POST'>";
				echo "<input type='hidden' name='userid' id='userid' value='" . $users->id . "'>";
				echo "<input type='submit' value='BAN USER' id='logout' /></form>";
				}
				
				//Unban user if banned
				if($users->usertype == "Banned" && $users->usertype != "Admin"){
				echo "<form action='" . URLROOT ."/users/adminunbanuser' method='POST'>";
				echo "<input type='hidden' name='userid' id='userid' value='" . $users->id . "'>";
				echo "<input type='submit' value='UNBAN USER' id='submit' /></form>";
				}
				
				if($users->usertype == "Admin"){echo "<input type='submit' id='spaceSameAsSubmit' />";}
				
				echo "<div class='floatClearNoSpace'></div>";
	
				echo "</div>";
				}
				$i ++;
			}
			
			
			?>
			
		</div>
	</div>

    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>
<?php } ?>