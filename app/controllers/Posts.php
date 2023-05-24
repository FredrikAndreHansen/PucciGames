<?php

class Posts extends Controller {
	
	public function __construct(){
		
		$this->userModel = $this->model("Post");
		
	}
	
	
	public function addPost(){
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/index/index");
		}
		if($_SESSION["usertype"] != "Admin"){
			header("location:" . URLROOT . "/index/index");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		
		$this->view("posts/addpost");
		
	}
	
	
	public function submitPost(){
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/index/index");
		}
		if($_SESSION["usertype"] != "Admin"){
			header("location:" . URLROOT . "/index/index");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		
		$data = [
				"success" => "",
				"error" => "",
				"headlineimageError" => "",
				"image1Error" => "",
				"image2Error" => "",
				"image3Error" => ""
		];
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			$headlineimageError = "";
			$image1Error = "";
			$image2Error = "";
			$image3Error = "";

			//Images
			//headlineimage		
			$extension = pathinfo( $_FILES["headlineimage"]["name"], PATHINFO_EXTENSION );
			$source = $_FILES["headlineimage"]["tmp_name"];
			$destination = PUBLICAPPROOT . "/public/graphic/uploads/posts/" . $_POST['category'] . "/" . basename($_FILES['headlineimage']['name']);
			$headlineimage = "/public/graphic/uploads/posts/" . $_POST['category'] . "/" . basename($_FILES['headlineimage']['name']);
			$imageFileType = strtolower(pathinfo($headlineimage,PATHINFO_EXTENSION));
			
			if (file_exists($destination)) {$headlineimageError = "File already exists! Change the name";}
			if ($_FILES["headlineimage"]["size"] > 1000000) {$headlineimageError = "File is to large! Max 1MB";}
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {$headlineimageError = "Wrong type! Only JPG, JPEG, GIF and PNG allowed";}
			
			
			//Image1
			if (!file_exists($_FILES['image1']['tmp_name']) || !is_uploaded_file($_FILES['image1']['tmp_name'])){$image1 = "";}else{

				$extension2 = pathinfo( $_FILES["image1"]["name"], PATHINFO_EXTENSION );
				$source2 = $_FILES["image1"]["tmp_name"];
				$destination2 = PUBLICAPPROOT . "/public/graphic/uploads/posts/" . $_POST['category'] . "/" . basename($_FILES['image1']['name']);
				$image1 = "/public/graphic/uploads/posts/" . $_POST['category'] . "/" . basename($_FILES['image1']['name']);
				$imageFileType2 = strtolower(pathinfo($image1,PATHINFO_EXTENSION));
			
				if (file_exists($destination2)) {$image1Error = "File already exists! Change the name";}
				if ($_FILES["image1"]["size"] > 1000000) {$image1Error = "File is to large! Max 1MB";}
				if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" ) {$image1Error = "Wrong type! Only JPG, JPEG, GIF and PNG allowed";}
				
			}
			
			//Image2
			if (!file_exists($_FILES['image2']['tmp_name']) || !is_uploaded_file($_FILES['image2']['tmp_name'])){$image2 = "";}else{

				$extension3 = pathinfo( $_FILES["image2"]["name"], PATHINFO_EXTENSION );
				$source3 = $_FILES["image2"]["tmp_name"];
				$destination3 = PUBLICAPPROOT . "/public/graphic/uploads/posts/" . $_POST['category'] . "/" . basename($_FILES['image2']['name']);
				$image2 = "/public/graphic/uploads/posts/" . $_POST['category'] . "/" . basename($_FILES['image2']['name']);
				$imageFileType3 = strtolower(pathinfo($image2,PATHINFO_EXTENSION));
			
				if (file_exists($destination3)) {$image2Error = "File already exists! Change the name";}
				if ($_FILES["image2"]["size"] > 1000000) {$image2Error = "File is to large! Max 1MB";}
				if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" && $imageFileType3 != "gif" ) {$image2Error = "Wrong type! Only JPG, JPEG, GIF and PNG allowed";}
				
			}
			
			//Image3
			if (!file_exists($_FILES['image3']['tmp_name']) || !is_uploaded_file($_FILES['image3']['tmp_name'])){$image3 = "";}else{

				$extension4 = pathinfo( $_FILES["image3"]["name"], PATHINFO_EXTENSION );
				$source4 = $_FILES["image3"]["tmp_name"];
				$destination4 = PUBLICAPPROOT . "/public/graphic/uploads/posts/" . $_POST['category'] . "/" . basename($_FILES['image3']['name']);
				$image3 = "/public/graphic/uploads/posts/" . $_POST['category'] . "/" . basename($_FILES['image3']['name']);
				$imageFileType4 = strtolower(pathinfo($image3,PATHINFO_EXTENSION));
			
				if (file_exists($destination4)) {$image3Error = "File already exists! Change the name";}
				if ($_FILES["image3"]["size"] > 1000000) {$image3Error = "File is to large! Max 1MB";}
				if($imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg" && $imageFileType4 != "gif" ) {$image3Error = "Wrong type! Only JPG, JPEG, GIF and PNG allowed";}
				
			}
			
			
			$data = [
				"headline" => $_POST["headline"],
				"headlineimage" => $headlineimage,
				"text1" => $_POST["text1"],
				"image1" => $image1,
				"alt1" => $_POST["alt1"],
				"text2" => $_POST["text2"],
				"image2" => $image2,
				"alt2" => $_POST["alt2"],
				"text3" => $_POST["text3"],
				"image3" => $image3,
				"alt3" => $_POST["alt3"],
				"text4" => $_POST["text4"],
				"category" => $_POST["category"],
				"success" => "",
				"error" => "",
				"headlineimageError" => $headlineimageError,
				"image1Error" => $image1Error,
				"image2Error" => $image2Error,
				"image3Error" => $image3Error
			];
			
			if($headlineimageError == "" && $image1Error == "" && $image2Error == "" && $image3Error == ""){
				if($this->userModel->submitPost($data)){
					$data["success"] = "Success!";
					
					//Update Sitemap
					//Get the ID of the lastest asset
					$getID = $this->userModel->getLatestPost();
					$getAllPosts = $this->userModel->getAllPosts();
					$i = 0;
					$i2 = 0;
					$a = 0;
					if($i == 0){foreach ($getID as $id){$setID = $id->id;$i = 1;}}
					
					//Check if the asset page get a new page
					foreach ($getAllPosts as $c){$i2 ++;}
					for($x=0;$x<$i2;$x++){
						//Check for every asset page, except for the first, since it already exists
						if($a == 5){
							$a=0;$pID = 1 + $x/5;
							$setURL = URLROOT . "index/posts?page=";
							
							$xml = simplexml_load_file (PUBLICAPPROOT . '/public/sitemap.xml');

							//Check if the node exists
							$target = false;
							$i = 0;
							foreach ($xml->url as $m) {
								if ($m->loc == URLROOT . "/index/posts?page=" . $pID) { $target = $i; break; }
								$i++;
							}
							if ($target !== false) {
								unset($xml->url[$target]);
							}

							$url = $xml->addChild("url");
							$user = $url->addChild("loc", URLROOT . "/index/posts?page=" . $pID);
							$user = $url->addChild("changefreq", "weekly");
							$user = $url->addChild("lastmod", date("Y-m-d"));
							//Format XML
							$dom = new DOMDocument('1.0');
							$dom->preserveWhiteSpace = false;
							$dom->formatOutput = true;
							$dom->loadXML($xml->asXML());
							$formatxml = new SimpleXMLElement($dom->saveXML());
							//Execute
							echo $formatxml->saveXML(PUBLICAPPROOT . '/public/sitemap.xml'); 
									
							}
						$a++;
						}
						

					//Load sitemap
					$xml = simplexml_load_file (PUBLICAPPROOT . '/public/sitemap.xml');
					//Update indexpage and postpage when submitting a post
					$target2 = false;
					$i3 = 0;
					foreach ($xml->url as $m2) {
					if ($m2->loc == URLROOT) { $target2 = $i3; break; }
						$i3++;
					}
					if ($target2 !== false) {
						unset($xml->url[$target2]->lastmod);
					}
					$target4 = false;
					$i4 = 0;
					foreach ($xml->url as $m4) {
					if ($m4->loc == URLROOT . "/index/posts") { $target4 = $i4; break; }
						$i4++;
					}
					if ($target4 !== false) {
						unset($xml->url[$target4]->lastmod);
					}

					//Add url child node
					$url = $xml->addChild("url");
					//Add nodes in url
					//$user = $url->addChild("loc", URLROOT . "/posts/post?id=" . $setID);
					$getPostHeadline = str_replace(' ', '-', $data['headline']);
					$user = $url->addChild("loc", URLROOT . "/posts/post/".$getPostHeadline."?id=" . $setID);
					$user = $url->addChild("lastmod", date("Y-m-d"));
					//Indexpage
					$user = $xml->url[$target2]->addChild("lastmod", date("Y-m-d"));
					//Postspage
					$user = $xml->url[$target4]->addChild("lastmod", date("Y-m-d"));
					//Format XML
					$dom = new DOMDocument('1.0');
					$dom->preserveWhiteSpace = false;
					$dom->formatOutput = true;
					$dom->loadXML($xml->asXML());
					$formatxml = new SimpleXMLElement($dom->saveXML());
					//Execute
					echo $formatxml->saveXML(PUBLICAPPROOT . '/public/sitemap.xml'); 
					
					
					move_uploaded_file($source, $destination);
					if (!file_exists($_FILES['image1']['tmp_name']) || !is_uploaded_file($_FILES['image1']['tmp_name'])){}else{move_uploaded_file($source2, $destination2);}
					if (!file_exists($_FILES['image2']['tmp_name']) || !is_uploaded_file($_FILES['image2']['tmp_name'])){}else{move_uploaded_file($source3, $destination3);}
					if (!file_exists($_FILES['image3']['tmp_name']) || !is_uploaded_file($_FILES['image3']['tmp_name'])){}else{move_uploaded_file($source4, $destination4);}
				}else{$data["error"] = "Something went wrong with the upload!";}
			}
		
		}
		$this->view("posts/submitpost", $data);
		
	}
	
	
	public function index(){
		
		if(!isset($_GET["id"])){
			header("location:" . URLROOT . "/index/index");
		}else{
			//If page doesn't exist
			if($this->userModel->checkPostExist($_GET["id"]) == false){header("location:" . URLROOT . "/index/index");}
		}
		
		$page_key = $_GET["id"] = preg_replace('/\D/', '', $_GET["id"]);
		$countPostComments = $this->userModel->countPostComments($page_key);
		$getPage = 1;
		
		//Coonting the outputs to control the GET value
		$countPage = count($countPostComments);
		$pageCtrl = 1;
		$check = 0;
		for($i=0;$i<$countPage;$i++){
			$check+=1;
			if($check > 10){$check=1;$pageCtrl+=1;}
		}
		
		if(isset($_GET["page"])){
			//Check for get value and only allow numbers
			$_GET["page"] = preg_replace('/\D/', '', $_GET["page"]);
			if(!empty($_GET["page"])){
				$start = $_GET["page"]*10;
				$start -= 10;
				$getPage = $_GET["page"];
				if($_GET["page"] < 1){$start = 0;$getPage = 1;}
				if($_GET["page"] > $pageCtrl){$start = 0;$getPage = 1;}
			}else{
				$start = 0;
				$getPage = 1;
			}
		}else{
			$start = 0;
			$getPage = 1;
		}

		$comments = $this->userModel->getPostComments($page_key, $start);
		$users = $this->userModel->getUsers();
		
		$posts = $this->userModel->getAllPosts();
		
		$data = [
			"comments" => $comments,
			"page_key" => $page_key,
			"users" => $users,
			"countpostcomments" => $countPostComments,
			"getpage" => $getPage,
			"pagectrl" => $pageCtrl,
			"posts" => $posts
		];
		
		
		$this->view("posts/post", $data);
		
	}
	
	
	public function commentpost(){
		
		$data = [
			"commentSuccess" => "",
			"error" => "",
			"error2" => ""
		];
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			//Check if the user is banned
			$this->userModel->checkIfBanned();
			
			//Sanitize POST data, this will filter out/remove data that could be harmful
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"commentSuccess" => "",
				"error" => "",
				"error2" => "",
				"page_key" => trim($_POST["page_key"]),
				"comment" => trim($_POST["comment"]),
				"id" => $_POST["id"]
			];
			
			if($data["comment"] == ""){$data["error"] = "Something went wrong";
			$data["error2"] = "Please try again!";$this->view("posts/commentpost", $data);exit();}
			
			if($this->userModel->commentPost($data) == true){
			    
				$data["commentSuccess"] = "Thank you for your comment!";
				
				//Update sitemap on commenting
				
				//Countpost comments
				$countAllPostsComments = $this->userModel->countPostComments($data["page_key"]);
				$postCommentCount = 0;
				foreach ($countAllPostsComments as $c){$postCommentCount ++;}
				for($x=0;$x<$postCommentCount;$x++){
					if($a == 10){
						$a = 0;
						$pID = 1 + $x/10;
						$xml = simplexml_load_file (PUBLICAPPROOT . '/public/sitemap.xml');							
						//Check if the node exists
						$targetpc = false;
						$ipc = 0;
						foreach ($xml->url as $mm) {
						if ($mm->loc == URLROOT . "/posts/post?id=" . $data["page_key"] . "&page=" . $pID) { $targetpc = $ipc; break; }
							$ipc++;
						}
						if ($targetpc !== false) {
							unset($xml->url[$targetpc]);
						}

						$url = $xml->addChild("url");
						$user = $url->addChild("loc", URLROOT . "/posts/post?id=" . $data["page_key"] . "&amp;page=" . $pID);
						$user = $url->addChild("lastmod", date("Y-m-d"));
						//Format XML
						$dom = new DOMDocument('1.0');
						$dom->preserveWhiteSpace = false;
						$dom->formatOutput = true;
						$dom->loadXML($xml->asXML());
						$formatxml = new SimpleXMLElement($dom->saveXML());
						//Execute
						echo $formatxml->saveXML(PUBLICAPPROOT . '/public/sitemap.xml'); 
					}$a++;
				}
				
				$xml = simplexml_load_file (PUBLICAPPROOT . '/public/sitemap.xml');
				//Check if the node exists
				$target = false;
				$i = 0;
				foreach ($xml->url as $m) {
				if ($m->loc == URLROOT . "/posts/post?id=" . $data["page_key"]) { $target = $i; break; }
					$i++;
				}
				//Update indexpage
				$target2 = false;
				$i3 = 0;
				foreach ($xml->url as $m2) {
				if ($m2->loc == URLROOT) { $target2 = $i3; break; }
					$i3++;
				}
				if ($target2 !== false) {
					unset($xml->url[$target2]->lastmod);
				}

				if ($target !== false) {unset($xml->url[$target]);}
				//Update date in sitemap
				$url = $xml->addChild("url");
				$user = $url->addChild("loc", URLROOT . "/posts/post?id=" . $data["page_key"]);
				$user = $url->addChild("lastmod", date("Y-m-d"));
				//Indexpage
				$user = $xml->url[$target2]->addChild("lastmod", date("Y-m-d"));
				//Format XML
				$dom = new DOMDocument('1.0');
				$dom->preserveWhiteSpace = false;
				$dom->formatOutput = true;
				$dom->loadXML($xml->asXML());
				$formatxml = new SimpleXMLElement($dom->saveXML());
				//Execute
				echo $formatxml->saveXML(PUBLICAPPROOT . '/public/sitemap.xml'); 
				
				
				$this->view("posts/commentpost", $data);
				exit();
			}else{
				$data["error"] = "Something went wrong";
				$data["error2"] = "Please try again!";
				$this->view("posts/commentpost", $data);
				exit();
			}
			
		}
		
		$data = [
			"validatesucess" => "",
			"error" => "",
			"error2" => "",
			"emailsent" => "",
			"emailsent2" => "",
			"emailnotsent" => "Your Email address is not validated",
			"emailnotsent2" => "you are unable to post any comments until you validate your email!",
			"emailchangesuccess" => ""
		];
		
		$this->view("users/settings", $data);

	}
	
	
}