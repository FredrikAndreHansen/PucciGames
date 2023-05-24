<head>
	<?php include APPROOT . "/views/includes/head.php"; ?>
</head>

<?php
echo "<p class='successRegisterh1'>" . $data['success'] . "</p>";
if($data["error"] != ""){echo "<p class='invalidFeedback'>General error: " . $data['error'] . "</p>";}
if($data["headlineimageError"] != ""){echo "<p class='invalidFeedback'>Headlineimage Error: " . $data['headlineimageError'] . "</p>";}
if($data["image1Error"] != ""){echo "<p class='invalidFeedback'>Image1 Error: " . $data['image1Error'] . "</p>";}
if($data["image2Error"] != ""){echo "<p class='invalidFeedback'>Image2 Error: " . $data['image2Error'] . "</p>";}
if($data["image3Error"] != ""){echo "<p class='invalidFeedback'>Image3 Error: " . $data['image3Error'] . "</p>";}
?>