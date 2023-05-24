<?php if($_SESSION["usertype"] == "Admin"){ ?>
<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
	<title>Submit A Post</title>
    <script src="<?php echo URLROOT ?>/public/javascript/pageLoad.js"></script>
	<?php include APPROOT . "/views/includes/navbarMain.php"; ?>
</head>

<body>
    <!--LOADING PAGE-->
    <?php include APPROOT . "/views/includes/load.php"; ?>
	
	<div class="assetsSection" style="padding-bottom: 64px;">
	<div class="loginspace"></div>
	
		<div class="addPostSection">

			<form class="postForm" action="<?php echo URLROOT; ?>/posts/submitpost" method="POST" enctype="multipart/form-data">
			
				<p class="darkText" style="text-align:center;">Headline</p>
				<input type="text" name="headline" required />
				
				<p class="darkText" style="text-align:center;">Headline Image</p>
				<input type="file" name="headlineimage" required />
				
				<p class="darkText" style="text-align:center;">Text 1(Use p class='darkText' and h2 class='h2BlackLeft')</p>
				<textarea style="background-color:#f2f2f2;" id="message" name="text1" class="message" maxlength="2000"></textarea>
				
				<p class="darkText" style="text-align:center;">Image 1</p>
				<input type="file" name="image1" />
				
				<p class="darkText" style="text-align:center;">Image1 Alt</p>
				<textarea style="background-color:#f2f2f2;height:50px;" id="message" name="alt1" class="message" maxlength="255"></textarea>
				
				<p class="darkText" style="text-align:center;">Text 2(Use p class='darkText' and h2 class='h2BlackLeft')</p>
				<textarea style="background-color:#f2f2f2;" id="message" name="text2" class="message" maxlength="2000" ></textarea>
				
				<p class="darkText" style="text-align:center;">Image 2</p>
				<input type="file" name="image2" />
				
				<p class="darkText" style="text-align:center;">Image2 Alt</p>
				<textarea style="background-color:#f2f2f2;height:50px;" id="message" name="alt2" class="message" maxlength="255"></textarea>
				
				<p class="darkText" style="text-align:center;">Text 3(Use p class='darkText' and h2 class='h2BlackLeft')</p>
				<textarea style="background-color:#f2f2f2;" id="message" name="text3" class="message" maxlength="2000" ></textarea>
				
				<p class="darkText" style="text-align:center;">Image 3</p>
				<input type="file" name="image3" />
				
				<p class="darkText" style="text-align:center;">Image3 Alt</p>
				<textarea style="background-color:#f2f2f2;height:50px;" id="message" name="alt3" class="message" maxlength="255"></textarea>
				
				<p class="darkText" style="text-align:center;">Text 4(Use p class='darkText' and h2 class='h2BlackLeft')</p>
				<textarea style="background-color:#f2f2f2;" id="message" name="text4" class="message" maxlength="2000" ></textarea>
				
				<p class="darkText" style="text-align:center;">Category</p>
				<input id="general" type="radio" name="category" value="general">
				<label class="darkTextRadio" for="general"><span></span>General</label>

				<input id="3p" type="radio" name="category" value="3p">
				<label class="darkTextRadio" for="3p"><span></span>3P</label>
				
				<input id="2020aspaceodyssey" type="radio" name="category" value="2020aspaceodyssey">
				<label class="darkTextRadio" for="2020aspaceodyssey"><span></span>2020: A Space Odyssey</label>
				
				<input id="paperworld" type="radio" name="category" value="paperworld">
				<label class="darkTextRadio" for="paperworld"><span></span>Paper World</label>
				
				
				<input type="submit" value="SUBMIT" id="submit" />
			
			</form>
		</div>
	</div>
    <!--FOOTER-->
    <?php include APPROOT . "/views/includes/footer.php"; ?>
	
</body>
</html>
<?php } ?>