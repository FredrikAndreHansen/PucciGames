<?php if($_SESSION["usertype"] == "Admin"){ ?>
<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<title>All Game Comments</title>
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
			if(!isset($_GET["commentList"])){$_GET["commentList"] = 50;}
			echo "<p style='text-align: center!important;word-break: break-all;' class='darkText'>Game Comments(".$_GET['commentList']."):</p>";
			
			echo "<form action='" . URLROOT ."/users/admincheckgamecomments' method='GET'>";
			echo "<p style='text-align: center!important;' class='darkTextSmall'>Get the amount of comments:</p>";
			echo "<p><input type='number' name='commentList' required/></p>";
			echo "<input type='submit' value='Get Comment Amount' id='submit' /></form>";
			
			echo "<hr style='width: 50% !important;' class='hr2'>";
			
			echo "<form action='" . URLROOT ."/users/admincheckgamecomments' method='GET'>";
			echo "<p style='text-align: center!important;' class='darkTextSmall'>Search for comments:</p>";
			echo "<p><input type='text' name='commentSearch' required/></p>";
			echo "<input type='submit' value='Search' id='submit' /></form>";
			
			echo "<hr style='width: 50% !important;' class='hr2'>";
			
			echo "<a href='" . URLROOT . "/users/admincheckgamecommentsbannedusers'><button id='logout'>Comments From Banned Users</button></a>";
			
			echo "<hr class='hr2'>";
			
			$i = 0;
			//Comments
			foreach ($data["comments"] as $comments){
			
			//Don't show comments from banned users!
			if($comments->usertype != "Banned"){
				if($i < $_GET["commentList"]){
					if($comments->page_key == 1){$game = "3P";}
					if($comments->page_key == 2){$game = "2020: A Space Odyssey";}
					if($comments->page_key == 3){$game = "Paper World";}
					echo "<div style='padding: 4px;margin: 4px;background-color:#f4f7ed;display:inline-block;'>";
				
					echo "<div style='background-image: url( " . URLROOT . $comments->imageurl . " )' class='smallImg'></div>";
					echo "<p style='word-break: break-all;' class='darkText'>" . $comments->username ."</p>";
					echo "<p class='darkTextSmall'>Date: " . date('F jS, Y \a\t G:i', strtotime($comments->date)) . "</p>";
					echo "<p style='word-break: break-all;' class='darkTextSmall'>" . "Website: " . $comments->website ."</p>";
					echo "<p style='word-break: break-all;color:#8B0000!important;font-weight:bold!important;' class='darkText'>" . $game ."</p>";
					echo "<div style='word-break: break-word;padding-left: 16px;padding-right:16px;'><p class='darkTextSmall'>" . $comments->comment . "</p></div>";

					echo "<div class='floatClearNoSpace'></div>";
	
					echo "</div>";
					}
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