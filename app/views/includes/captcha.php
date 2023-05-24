<div class="captcha">
	<div id="captcha" class="g-recaptcha" data-sitekey="<?php echo CAPTCHA_SITEKEY; ?>" data-callback="removeFakeCaptcha"></div>
	<input type="checkbox" class="captcha-fake-field" required>
</div>
				
<script>
	window.removeFakeCaptcha = function() {
		document.querySelector('.captcha-fake-field').remove();
	}
</script>