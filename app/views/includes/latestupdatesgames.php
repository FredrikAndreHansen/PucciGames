<div class='smallSpace'></div><?php
$i = 0;

foreach ($data["posts"] as $posts){
	if($i < 2 && $data["category"] == $posts->category){
		if($i == 0){echo "<h2 class='headerTextLite' id='centerText'>Latest updates</h2><div class='smallSpace'></div>";}
		
		echo "<div class='latestUpdateWrapper'>";
		
			echo "<div class='latestUpdatesHeader'>";
				echo "<h2><a class='postHeadlineA' href='".URLROOT."/posts/post?id=".$posts->id."'>".$posts->headline."</a></h2>";
				echo "<p class='liteText' style='font-style: italic;'>".date('F jS, Y', strtotime($posts->date))."</p>";
				echo "<a class='postHeadlineA' href='".URLROOT."/posts/post?id=".$posts->id."'><img alt='".$posts->alt1."' src='".URLROOT . $posts->headlineimage."' class='postImg' /></a>";
			echo "</div>";
			
			$searchTerms = array ( 'darkText', 'h2BlackLeft' );
			$replacements = array ( 'whiteText', 'h2WhiteLeftSmall' );
			//Set string length
			$string = $posts->text1;
			if (strlen($string) > 300) {
				$stringCut = substr($string, 0, 300);
				$endPoint = strrpos($stringCut, ' ');
				$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
				$string .= '...';
			}
			
			echo "<div class='latestUpdatesInfo'>";
				echo "<p class='whiteText'>".str_replace( $searchTerms, $replacements, $string )."</p>";
				echo "<a href='".URLROOT."/posts/post?id=".$posts->id."'><button class='button5'>READ MORE</button></a>";
			echo "</div>";
			
		echo "</div><div class='floatClear'></div>";
		$i+=1;
	}
}

?>