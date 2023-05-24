<?php
$i = 0;
$iT = -1;
$totalPages = 1;
$setPage = 0;
$setNextButton = false;
$firstPage = $data["getpage"];
$prevCount = $data["getpage"];
$nextCount = $data["getpage"];
$prev = $prevCount -= 1;
$next = $nextCount += 1;
if($data["getpage"] < 16){$countLimit = 1;}else{$countLimit = $data["getpage"];}
echo "<div class='smallSpace'></div><div class='contactForm'>";

foreach ($data["comments"] as $comments){
	
	if(!empty($comments->website)){$website = "<a class='linkTextWhite' target='_blank' href='" . $comments->website . "'>";$end = "</a>";}else{$website = "";$end = "";}
	if($comments->usertype == "Admin"){$span = "<span style='color: #FF8C00!important;'>";$endSpan = "</span>";}else{$span="";$endSpan="";}
	
	echo "<div class='commentDiv'>";
	echo "<div style='background-image: url( " . URLROOT . $comments->imageurl . " )' class='commentImg'></div>";
	echo "<div class='usernameCommentWrapper'>";
	echo "<p style='word-break: break-all;' class='liteText'>Posted by: " . $website . $span . $comments->username . $end . $endSpan . "</p>";
	echo "<p class='liteTextSmall'>Date: " . date('F jS, Y \a\t G:i', strtotime($comments->date)) . "</p>";
	echo "</div><div style='height: 16px;' class='floatClearNoSpace'></div>";
	echo "<div style='word-break: break-word;padding-left: 16px;padding-right:16px;'><p class='liteText'>" . $comments->comment . "</p></div>";
	echo "</div>";

}

echo "</div><div class='paginationForm' style='text-align:center;'>";

//Pagination
foreach ($data["countassetscomments"] as $count){
	$i += 1;
	$setPage += 1;
	$iT += 1;
	if($iT > 9){$totalPages += 1;$iT = 0;}
	
	if($data["getpage"] < 16){
		if($countLimit < 16){
			//Set the first pagination if there are multiples
			if($i == 11){
				$setNextButton = true;
				if($data["getpage"] == 1){echo "<a class='paginationTextBold'>" . 1 . "</a>";}else{
					echo "<a href='?id=" . $_GET["id"] ."&page=" . $prev . "#comments'><img class='paginationBtn' src='" . URLROOT . "/public/graphic/global/pointerLeft.svg' /></a>";
					echo "<a class='paginationText' href='?id=" . $_GET["id"] ."&page=" . 1 . "#comments'>" . 1 . "</a>";
				}
			}
	
			if($setPage > 10){
				$setPage = 1;
				$countLimit += 1;
				if($data["getpage"] == ($i-1+10)/10){echo "<a class='paginationTextBold'>" . ($i-1+10)/10 . "</a>";}else{
					echo "<a class='paginationText' href='?id=" . $_GET["id"] ."&page=" . ($i-1+10)/10 . "#comments'>" . ($i-1+10)/10 . "</a>";
				}
			}
		}
	}
	
	if($data["getpage"] >= 16){
		
		if($i == 11){
			$setNextButton = true;
			echo "<a href='?id=" . $_GET["id"] ."&page=" . $prev . "#comments'><img class='paginationBtn' src='" . URLROOT . "/public/graphic/global/pointerLeft.svg' /></a>";
			echo "<a class='paginationText' href='?id=" . $_GET["id"] ."&page=" . 1 . "#comments'>" . 1 . "..." . "</a>";
		}
		if($setPage > 10 && $i/10 > $data["getpage"]-8 && $i/10 < $data["getpage"]+8){
			$setNextButton = true;
			$setPage = 1;
			$countLimit += 1;
			if($data["getpage"] == ($i-1+10)/10){echo "<a class='paginationTextBold'>" . ($i-1+10)/10 . "</a>";}else{
				echo "<a class='paginationText' href='?id=" . $_GET["id"] ."&page=" . ($i-1+10)/10 . "#comments'>" . ($i-1+10)/10 . "</a>";
			}
		}
	}

}
//Display last page
if($data["getpage"] <= 15 && $totalPages > 16){echo "<a class='paginationText' href='?id=" . $_GET["id"] ."&page=" . $totalPages . "#comments'>" . "..." . $totalPages . "</a>";}
if($data["getpage"] < $totalPages-8 && $data["getpage"] > 15){
	echo "<a class='paginationText' href='?id=" . $_GET["id"] ."&page=" . $totalPages . "#comments'>" . "..." . $totalPages . "</a>";
}

//Set next button
if($setNextButton == true){
	if($data["pagectrl"] > $data["getpage"]){echo "<a href='?id=" . $_GET["id"] ."&page=" . $next . "#comments'><img class='paginationBtn' src='" . URLROOT . "/public/graphic/global/pointerRight.svg' /></a>";}
}

echo "</div>";

if($i == 0){echo "<p class='whiteText' id='centerText'>No comments!</p>";}
?>