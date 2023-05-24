<section id="comments">

<?php if(isset($_SESSION["user_id"])) : ?>
	<?php if($_SESSION["validated"] == 1){ ?>
		
			<form action="<?php echo URLROOT; ?>/assets/commentasset" class="contactForm" method="POST">
				<textarea id="message" name="comment" placeholder="Write a comment" class="message" maxlength="640" required></textarea>
				<input type="hidden" name="page_key" id="page_key" value="<?php echo $data["page_key"]; ?>">
				<input type="hidden" name="id" id="id" value="<?php echo $_GET["id"]; ?>">
				<input type="submit" value="SUBMIT" class="button4" />
			</form>
		</section>
	<?php }else{ ?>
		<p class="whiteText" id="centerText">You need to validate your email address before you can post any comments!</p>
		<a href="<?php echo URLROOT; ?>/users/settings"><p class="comLink" id="centerText">Click here to validate your email</p></a>
	<?php } ?>
<?php else: ?>
<p class="whiteText" id="centerText"><a href="<?php echo URLROOT; ?>/users/login" class="comLink">SIGN IN</a> or <a href="<?php echo URLROOT; ?>/users/register" class="comLink">REGISTER</a> to post a comment</p>
<?php endif; ?>