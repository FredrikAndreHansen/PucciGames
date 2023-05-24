<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
</head>

<?php
echo "<p class='successRegisterh1'>" . $data['success'] . "</p>";
if($data["error"] != ""){echo "<p class='invalidFeedback'>General error: " . $data['error'] . "</p>";}
if($data["imageError"] != ""){echo "<p class='invalidFeedback'>Image Error: " . $data['imageError'] . "</p>";}
?>