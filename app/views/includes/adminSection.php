<?php
//User section
echo "<div class='adminLeft'>";

echo "<p style='word-break: break-all;' class='darkText'>Latest Users:</p>";
$i = 0;
$countGameComments = 0;
$countPostComments = 0;
$countAssetComments = 0;
$posts = 0;
$assets = 0;
$newUsers = 0;

//Users
foreach ($data["users"] as $users){
	if($i < 4){
		$createdAt = date('F jS, Y \a\t G:i', strtotime('-24 hours', strtotime($users->deletetime)));
		
		//Check if validated or banned
		if($users->usertype != "Banned"){
			if($users->validated == 1){echo "<div style='background-color:#f4f7ed;'>";}else{echo "<div style='background-color:#ff8080;'>";}
		}else{echo "<div style='background-color:#4d0000;'>";}
	
		echo "<div style='background-image: url( " . URLROOT . $users->imageurl . " )' class='smallImg'></div>";
		echo "<p style='word-break: break-all;' class='darkTextSmall'>" . $users->username ."</p>";
		echo "<p style='word-break: break-all;' class='darkTextSmall'>" . $createdAt ."</p>";
		echo "<p style='word-break: break-all;' class='darkTextSmall'>" . "Website: " . $users->website ."</p>";
		echo "<div class='floatClearNoSpace'></div>";
	
		echo "</div>";
	}
	$i ++;
}

//Calculate for new users not seen
foreach ($data["users"] as $users){if($users->id == $_SESSION["user_id"]){$newUsers = $users->newusers;$newGamecomments = $users->newgamecomments;$newPostcomments = $users->newpostcomments;$newAssetcomments = $users->newassetcomments;}}

$newUsers = $i - $newUsers;
if($newUsers > 0){
$newuserTotal = "<span class='successRegisterh1'> +" .$newUsers. "</span>";
}else{$newuserTotal = "";}

echo "<p style='word-break: break-all;' class='darkText'>Total Users: " . $i . $newuserTotal . "</p>";
echo "<a href='" . URLROOT . "/users/admincheckallusers'><button id='submit'>Check all users</button></a>";

//Comments for games only
foreach ($data["gamecomments"] as $gamecomments){
	$countGameComments += 1;
}
//Calculate game comments not seen
$newGamecomments = $countGameComments - $newGamecomments;
if($newGamecomments > 0){
$newgamecommentsTotal = " +" .$newGamecomments;
}else{$newgamecommentsTotal = "";}

//Comments for posts only
foreach ($data["postcomments"] as $postcomments){
	$countPostComments += 1;
}
//Calculate posts comments not seen
$newPostcomments = $countPostComments - $newPostcomments;
if($newPostcomments > 0){
$newpostcommentsTotal = " +" .$newPostcomments;
}else{$newpostcommentsTotal = "";}

//Comments for assets only
foreach ($data["assetcomments"] as $assetcomments){
	$countAssetComments += 1;
}
//Calculate assets comments not seen
$newAssetcomments = $countAssetComments - $newAssetcomments;
if($newAssetcomments > 0){
$newassetcommentsTotal = " +" .$newAssetcomments;
}else{$newassetcommentsTotal = "";}

//Totals
$totalComments = $countPostComments + $countGameComments + $countAssetComments;
//Total new comments
if($newPostcomments > 0 or $newGamecomments > 0 or $newAssetcomments > 0){
	$calculateTotalNewComments = $newPostcomments + $newGamecomments + $newAssetcomments;
	$totalNewComments = "<span class='successRegisterh1'> +".$calculateTotalNewComments."</span>";
}else{$totalNewComments = "";}

echo "<hr class='hr2'>";

echo "<p style='word-break: break-all;' class='darkText'>Total Comments: " . $totalComments . $totalNewComments . "</p>";
echo "<p><a href='" . URLROOT . "/users/admincheckgamecomments'><button id='gamecommentBtn'>Check All Game Comments(".$countGameComments.")".$newgamecommentsTotal."</button></a></p>";
echo "<p><a href='" . URLROOT . "/users/admincheckpostcomments'><button id='postcommentBtn'>Check All Post Comments(".$countPostComments.")".$newpostcommentsTotal."</button></a></p>";
echo "<p><a href='" . URLROOT . "/users/admincheckassetcomments'><button id='assetcommentBtn'>Check All Asset Comments(".$countAssetComments.")".$newassetcommentsTotal."</button></a></p>";

echo "</div>";

//Upload section

//Counts total posts
foreach ($data["posts"] as $post){
	$posts += 1;
}

//Counts total assets
foreach ($data["assets"] as $asset){
	$assets += 1;
}

echo "<div class='adminRight'>";

echo "<p style='word-break: break-all;' class='darkText'>Submit Updates:</p>";

echo "<a href='" . URLROOT . "/posts/addpost'><button id='submitpost'>+ Submit A Post</button></a>";

echo "<p style='word-break: break-all;' class='darkText'>Total Posts: " . $posts . "</p>";

echo "<a href='" . URLROOT . "/assets/addasset'><button id='submitasset'>+ Submit A Asset</button></a>";

echo "<p style='word-break: break-all;' class='darkText'>Total Assets: " . $assets . "</p>";

echo "</div>";
?>