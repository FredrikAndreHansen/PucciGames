<?php

class Assets extends Controller {
	
	public function __construct(){
		
		$this->userModel = $this->model("Asset");
		
	}
	
	
	
	public function index(){
		
		if(!isset($_GET["id"])){
			header("location:" . URLROOT . "/index/index");
		}else{
			//If page doesn't exist
			if($this->userModel->checkAssetExist($_GET["id"]) == false){header("location:" . URLROOT . "/index/index");}
		}
		
		$page_key = $_GET["id"] = preg_replace('/\D/', '', $_GET["id"]);
		$countAssetsComments = $this->userModel->countAssetComments($page_key);
		$getPage = 1;
		
		//Coonting the outputs to control the GET value
		$countPage = count($countAssetsComments);
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

		$comments = $this->userModel->getAssetComments($page_key, $start);
		$users = $this->userModel->getUsers();
		
		$assets = $this->userModel->getAllAssets();
		
		$data = [
			"comments" => $comments,
			"page_key" => $page_key,
			"users" => $users,
			"countassetscomments" => $countAssetsComments,
			"getpage" => $getPage,
			"pagectrl" => $pageCtrl,
			"assets" => $assets
		];
		
		
		$this->view("assets/asset", $data);
		
	}
	
	
	public function addAsset(){
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/index/index");
		}
		if($_SESSION["usertype"] != "Admin"){
			header("location:" . URLROOT . "/index/index");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		
		$this->view("assets/addasset");
		
	}
	
	
	
	public function submitAsset(){
		
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
				"imageError" => ""
		];
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			$imageError = "";
			
			//Image
			$extension = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION );
			$source = $_FILES["image"]["tmp_name"];
			$destination = PUBLICAPPROOT . "/public/graphic/uploads/assets/" . $_POST['category'] . "/" . basename($_FILES['image']['name']);
			$image = "/public/graphic/uploads/assets/" . $_POST['category'] . "/" . basename($_FILES['image']['name']);
			$imageFileType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
			
			if (file_exists($destination)) {$imageError = "File already exists! Change the name";}
			if ($_FILES["image"]["size"] > 2000000) {$imageError = "File is to large! Max 2MB";}
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {$imageError = "Wrong type! Only JPG, JPEG, GIF and PNG allowed";}
			
			$data = [
				"name" => $_POST["name"],
				"image" => $image,
				"description" => $_POST["description"],
				"alt" => $_POST["alt"],
				"category" => $_POST["category"],
				"type" => $imageFileType,
				"size" => $_FILES["image"]["size"],
				"success" => "",
				"error" => "",
				"imageError" => $imageError
			];
			
			if($imageError == ""){
				if($this->userModel->submitAsset($data)){
					$data["success"] = "Success!";
					
					//Update Sitemap
					//Get the ID of the lastest asset
					$getID = $this->userModel->getLatestAsset();
					$getAllAssets = $this->userModel->getAllAssets();
					$i = 0;
					$i2 = 0;
					$a = 0;
					if($i == 0){foreach ($getID as $id){$setID = $id->id;$i = 1;}}
					
					//Check if the asset page get a new page
					foreach ($getAllAssets as $c){$i2 ++;}
					for($x=0;$x<$i2;$x++){
						//Check for every asset page, except for the first, since it already exists
						if($a == 15){
							$a=0;$pID = 1 + $x/15;
							
							$xml = simplexml_load_file (PUBLICAPPROOT . '/public/sitemap.xml');

							//Check if the node exists
							$target = false;
							$i = 0;
							foreach ($xml->url as $m) {
								if ($m->loc == URLROOT . "/index/assets?page=" . $pID) { $target = $i; break; }
								$i++;
							}
							if ($target !== false) {
								unset($xml->url[$target]);
							}
							$url = $xml->addChild("url");
							$user = $url->addChild("loc", URLROOT . "/index/assets?page=" . $pID);
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
					if ($m4->loc == URLROOT . "/index/assets") { $target4 = $i4; break; }
						$i4++;
					}
					if ($target4 !== false) {
						unset($xml->url[$target4]->lastmod);
					}
					//Add url child node
					$url = $xml->addChild("url");
					//Add nodes in url
					$getAssetName = str_replace(' ', '-', $data['name']);
					//$user = $url->addChild("loc", URLROOT . "/assets/asset?id=" . $setID . "/" . $getAssetName);
					$user = $url->addChild("loc", URLROOT . "/assets/asset/" . $getAssetName . "?id=" . $setID);
					$user = $url->addChild("lastmod", date("Y-m-d"));
					//Indexpage
					$user = $xml->url[$target2]->addChild("lastmod", date("Y-m-d"));
					//Assetspage
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
					}
				}else{$data["error"] = "Something went wrong with the upload!";}
			}
			
		
		$this->view("assets/submitasset", $data);		
		
	}
	
	
	
	public function commentasset(){
		
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
			$data["error2"] = "Please try again!";$this->view("assets/commentsasset", $data);exit();}
			
			if($this->userModel->commentAsset($data) == true){
				$data["commentSuccess"] = "Thank you for your comment!";
				
				//Update sitemap on commenting
				
				//Countassets comments
				$countAllAssetsComments = $this->userModel->countAssetComments($data["page_key"]);
				$assetCommentCount = 0;
				foreach ($countAllAssetsComments as $c){$assetCommentCount ++;}
				for($x=0;$x<$assetCommentCount;$x++){
					if($a == 10){
						$a = 0;
						$pID = 1 + $x/10;
						$xml = simplexml_load_file (PUBLICAPPROOT . '/public/sitemap.xml');							
						//Check if the node exists
						$targetpc = false;
						$ipc = 0;
						foreach ($xml->url as $mm) {
						if ($mm->loc == URLROOT . "/assets/asset?id=" . $data["page_key"] . "&page=" . $pID) { $targetpc = $ipc; break; }
							$ipc++;
						}
						if ($targetpc !== false) {
							unset($xml->url[$targetpc]);
						}

						$url = $xml->addChild("url");
						$user = $url->addChild("loc", URLROOT . "/assets/asset?id=" . $data["page_key"] . "&amp;page=" . $pID);
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
				if ($m->loc == URLROOT . "/assets/asset?id=" . $data["page_key"]) { $target = $i; break; }
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
				$user = $url->addChild("loc", URLROOT . "/assets/asset?id=" . $data["page_key"]);
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
				
				$this->view("assets/commentsasset", $data);
				exit();
			}else{
				$data["error"] = "Something went wrong";
				$data["error2"] = "Please try again!";
				$this->view("assets/commentssasset", $data);
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