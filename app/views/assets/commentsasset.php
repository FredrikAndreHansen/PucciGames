<?php 
echo "<div style='width;100vw;height:100vh;background-color:#000000;position:absolute;top:0;left:0;right:0;bottom:0;'></div>";
echo '<script type="text/javascript">
           window.location = "'.$_SERVER['HTTP_REFERER'].'#comments"
      </script>';

exit();
?>