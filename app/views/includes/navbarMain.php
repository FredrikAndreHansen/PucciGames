<div id="navBarMain">
    <a class="navA" href="<?php echo URLROOT; ?>">
        <div class="navLogo"></div>
        <h2 class="logoText"><span class="navTextSpan">PUCCI</span><img class="rectangleNav" src="<?php echo URLROOT; ?>/public/graphic/global/rectangleBlack.svg" />GAMES</h2>
    </a>

    <ul class="navList">
        <a href="<?php echo URLROOT; ?>/index/games"><li class="introLi">GAMES</li></a>
        <a href="<?php echo URLROOT; ?>/index/posts"><li class="introLi">POSTS</li></a>
        <a href="<?php echo URLROOT; ?>/index/assets"><li class="introLi">ASSETS</li></a>
        <a href="<?php echo URLROOT; ?>/index/about"><li class="introLi">ABOUT</li></a>
        <a href="<?php echo URLROOT ?>#contact"><li class="introLi">CONTACT</li></a>
		
		<?php if(isset($_SESSION["user_id"])) : ?>
			<a href="<?php echo URLROOT; ?>/users/settings"><div class="settingsLogo"></div></a>
		<?php endif; ?>
    </ul>

</div>

<div id="myNav" class="overlay">

  <img src="<?php echo URLROOT; ?>/public/graphic/global/exit.svg" id="mobileMenuClose" onclick="closeNav();" />
  <div class="overlay-content">
	
	<div class="navLogo"><a class="navA" style="position:absolute;top:0;left:0;right:0;bottom:0;" href="<?php echo URLROOT; ?>"></a></div>
	
    <li class="mobileLi"><a href="<?php echo URLROOT; ?>/index/games">GAMES</a></li>
    <li class="mobileLi"><a href="<?php echo URLROOT; ?>/index/posts">POSTS</a></li>
    <li class="mobileLi"><a href="<?php echo URLROOT; ?>/index/assets">ASSETS</a></li>
    <li class="mobileLi"><a href="<?php echo URLROOT; ?>/index/about">ABOUT</a></li>
    <li class="mobileLi"><a href="<?php echo URLROOT ?>#contact">CONTACT</a></li>
	<?php if(isset($_SESSION["user_id"])) : ?>
		<li class="mobileLi"><a href="<?php echo URLROOT ?>/users/settings">SETTINGS</a></li>
	<?php endif; ?>
  </div>
</div>

<div id="mobileMenu" onclick="openNav();"></div>