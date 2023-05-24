<?php
class Index extends Controller {
	
	public function __construct(){
		
		$this->userModel = $this->model("User");
		
	}
	
	public function index(){
		
		$posts = $this->userModel->countAllPosts();
		$emailSent = "";
		$emailSent2 = "";
		$checkSpam = ['SEO', 'GMB', 'ahrefs', 'UR40+', 'Moz', 'MOZ', 'FREE', 'EXPIRATION', 'Semrush'];
		$spam = false;
		
		//Send email
		if($_SERVER["REQUEST_METHOD"] == "POST"){
		    //Check email for spam keywords
		    for($i = 0; $i < count($checkSpam); $i++){
		        if (str_contains($_POST["message"], $checkSpam[$i])){
		            $spam = true;
		        }
		    }
		    //Check if email is empty
		    if (empty($_POST["message"]) || empty($_POST["name"]) || empty($_POST["email"])){
		        $spam = true;
		    }
		    
		    if($spam === false){
			    $emailSent = "Thank you for your email";
			    $emailSent2 = "I will respond back as soon as I can!";
            
                $email =  EMAIL;
                $ccemail =  CCEMAIL;
                $fullemail = $email .",". $ccemail;
			    $subject = "PucciGames - Email from: " . $_POST["name"];
			    $message = "Name: " . $_POST["name"] . "<br>Email: " . $_POST["email"] . "<br><br>Message:<br>" . $_POST["message"];
			    $headers = "From: no-reply@puccigames.com\r\n";
			    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                mail($fullemail,$subject,$message,$headers);
		    } else {
		        $emailSent = "Email not sent!";
		        $emailSent2 = "Your message couldn't be delivered because you weren't recognised as a valid sender!";
		    }
		}
		
		$data = [
			"posts" => $posts,
			"emailSent" => $emailSent,
			"emailSent2" => $emailSent2
		];
		$this->view("index/index", $data);
		
	}
	
	public function about(){
		
		$this->view("index/about");
		
	}
	
	public function games(){
		
		$this->view("index/games");
		
	}
	
	
	public function assets(){
		
		
		if(!isset($_GET["category"]) or $_GET["category"] == "allassets"){$countAssets = $this->userModel->countAllAssets();}
		if(isset($_GET["category"]) && $_GET["category"] != "allassets"){$countAssets = $this->userModel->countAssetsByCategory($_GET["category"]);}
		$getPage = 1;
		//Counting the outputs to control the GET value
		$countPage = count($countAssets);
		$pageCtrl = 1;
		$check = 0;
		for($i=0;$i<$countPage;$i++){
			$check+=1;
			if($check > 15){$check=1;$pageCtrl+=1;}
		}
		
		if(isset($_GET["page"])){
			//Check for get value and only allow numbers
			$_GET["page"] = preg_replace('/\D/', '', $_GET["page"]);
			if(!empty($_GET["page"])){
				$start = $_GET["page"]*15;
				$start -= 15;
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
		
		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		//Get all assets
		if(!isset($_POST["assetSearch"])){
			if(!isset($_GET["category"]) or $_GET["category"] == "allassets"){$assets = $this->userModel->getAllAssets($start);}
			if(isset($_GET["category"]) && $_GET["category"] != "allassets"){$assets = $this->userModel->getAssetsByCategory($start, $_GET["category"]);}
		}
		
		if(isset($_POST["assetSearch"])){$searchResult = trim($_POST["assetSearch"]); $assets = $this->userModel->searchAllAssets(trim($_POST["assetSearch"]));}else{$searchResult = "";}
		
		$data = [
			"assets" => $assets,
			"searchResult" => $searchResult,
			"countAssets" => $countAssets,
			"getpage" => $getPage,
			"pagectrl" => $pageCtrl
		];

		$this->view("index/assets", $data);
		
	}
	
	public function posts(){
		
		if(!isset($_GET["category"]) or $_GET["category"] == "allposts"){$countPosts = $this->userModel->countAllPosts();}
		if(isset($_GET["category"]) && $_GET["category"] != "allposts"){$countPosts = $this->userModel->countPostsByCategory($_GET["category"]);}
		$getPage = 1;
		//Counting the outputs to control the GET value
		$countPage = count($countPosts);
		$pageCtrl = 1;
		$check = 0;
		for($i=0;$i<$countPage;$i++){
			$check+=1;
			if($check > 5){$check=1;$pageCtrl+=1;}
		}
		
		if(isset($_GET["page"])){
			//Check for get value and only allow numbers
			$_GET["page"] = preg_replace('/\D/', '', $_GET["page"]);
			if(!empty($_GET["page"])){
				$start = $_GET["page"]*5;
				$start -= 5;
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

		
		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		//Get all posts
		if(!isset($_POST["postSearch"])){
			if(!isset($_GET["category"]) or $_GET["category"] == "allposts"){$posts = $this->userModel->getAllPosts($start);}
			if(isset($_GET["category"]) && $_GET["category"] != "allposts"){$posts = $this->userModel->getPostsByCategory($start, $_GET["category"]);}
		}
		
		if(isset($_POST["postSearch"])){$searchResult = trim($_POST["postSearch"]); $posts = $this->userModel->searchAllPosts(trim($_POST["postSearch"]));}else{$searchResult = "";}
		
		$data = [
			"posts" => $posts,
			"searchResult" => $searchResult,
			"countPosts" => $countPosts,
			"getpage" => $getPage,
			"pagectrl" => $pageCtrl
		];
		
		$this->view("index/posts", $data);
		
	}
	
	public function twentytwentyaspaceodyssey(){
		
		$page_key = 2;
		$countGameComments = $this->userModel->countGameComments($page_key);
		$getPage = 1;
		$posts = $this->userModel->countAllPosts();
		
		//Counting the outputs to control the GET value
		$countPage = count($countGameComments);
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

		$comments = $this->userModel->getGameComments($page_key, $start);
		$users = $this->userModel->getUsers();
		
		$data = [
			"comments" => $comments,
			"page_key" => $page_key,
			"users" => $users,
			"countgamecomments" => $countGameComments,
			"getpage" => $getPage,
			"pagectrl" => $pageCtrl,
			"posts" => $posts,
			"category" => "2020aspaceodyssey"
		];
		
		$this->view("games/twentytwentyaspaceodyssey", $data);
		
	}
	
	public function threep(){
		
		$page_key = 1;
		$countGameComments = $this->userModel->countGameComments($page_key);
		$getPage = 1;
		$posts = $this->userModel->countAllPosts();
		
		//Counting the outputs to control the GET value
		$countPage = count($countGameComments);
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

		$comments = $this->userModel->getGameComments($page_key, $start);
		$users = $this->userModel->getUsers();
		
		$data = [
			"comments" => $comments,
			"page_key" => $page_key,
			"users" => $users,
			"countgamecomments" => $countGameComments,
			"getpage" => $getPage,
			"pagectrl" => $pageCtrl,
			"posts" => $posts,
			"category" => "3p"
		];
		
		$this->view("games/threep", $data);
		
	}
	
	public function paperworld(){
		
		$page_key = 3;
		$countGameComments = $this->userModel->countGameComments($page_key);
		$getPage = 1;
		$posts = $this->userModel->countAllPosts();
		
		//Counting the outputs to control the GET value
		$countPage = count($countGameComments);
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

		$comments = $this->userModel->getGameComments($page_key, $start);
		$users = $this->userModel->getUsers();
		
		$data = [
			"comments" => $comments,
			"page_key" => $page_key,
			"users" => $users,
			"countgamecomments" => $countGameComments,
			"getpage" => $getPage,
			"pagectrl" => $pageCtrl,
			"posts" => $posts,
			"category" => "paperworld"
		];
		
		$this->view("games/paperworld", $data);
		
	}
	
}


?>