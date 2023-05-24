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
echo "<div class='smallSpace'></div>";

//Set links for categories
$categoryLink = "";
if(!isset($_GET["category"]) or $_GET["category"] == "allassets"){$categoryLink = "";}
if(isset($_GET["category"]) && $_GET["category"] != "allassets"){$categoryLink = "&category=".$_GET["category"]."";}

echo "<div class='paginationForm' style='text-align:center;'>";

//Pagination
foreach ($data["countAssets"] as $count){
	$i += 1;
	$setPage += 1;
	$iT += 1;
	if($iT > 14){$totalPages += 1;$iT = 0;}
	
	if($data["getpage"] < 16){
		if($countLimit < 16){
			//Set the first pagination if there are multiples
			if($i == 16){
				$setNextButton = true;
				if($data["getpage"] == 1){echo "<a class='paginationTextBold'>" . 1 . "</a>";}else{
					echo "<a href='?page=" . $prev . $categoryLink . "'><img class='paginationBtn' src='" . URLROOT . "/public/graphic/global/pointerLeft.svg' /></a>";
					echo "<a class='paginationText' href='?page=" . 1 . $categoryLink . "'>" . 1 . "</a>";
				}
			}
	
			if($setPage > 15){
				$setPage = 1;
				$countLimit += 1;
				if($data["getpage"] == ($i-1+15)/15){echo "<a class='paginationTextBold'>" . ($i-1+15)/15 . "</a>";}else{
					echo "<a class='paginationText' href='?page=" . ($i-1+15)/15 . $categoryLink . "'>" . ($i-1+15)/15 . "</a>";
				}
			}
		}
	}
	
	if($data["getpage"] >= 16){
		
		if($i == 16){
			$setNextButton = true;
			echo "<a href='?page=" . $prev . $categoryLink . "'><img class='paginationBtn' src='" . URLROOT . "/public/graphic/global/pointerLeft.svg' /></a>";
			echo "<a class='paginationText' href='?page=" . 1 . $categoryLink . "'>" . 1 . "..." . "</a>";
		}
		if($setPage > 15 && $i/15 > $data["getpage"]-8 && $i/15 < $data["getpage"]+8){
			$setNextButton = true;
			$setPage = 1;
			$countLimit += 1;
			if($data["getpage"] == ($i-1+15)/15){echo "<a class='paginationTextBold'>" . ($i-1+15)/15 . "</a>";}else{
				echo "<a class='paginationText' href='?page=" . ($i-1+15)/15 . $categoryLink . "'>" . ($i-1+15)/15 . "</a>";
			}
		}
	}

}
//Display last page
if($data["getpage"] <= 15 && $totalPages > 16){echo "<a class='paginationText' href='?page=" . $totalPages . $categoryLink . "'>" . "..." . $totalPages . "</a>";}
if($data["getpage"] < $totalPages-8 && $data["getpage"] > 15){
	echo "<a class='paginationText' href='?page=" . $totalPages . $categoryLink . "'>" . "..." . $totalPages . "</a>";
}

//Set next button
if($setNextButton == true){
	if($data["pagectrl"] > $data["getpage"]){echo "<a href='?page=" . $next . $categoryLink . "'><img class='paginationBtn' src='" . URLROOT . "/public/graphic/global/pointerRight.svg' /></a>";}
}

echo "</div>";
?>