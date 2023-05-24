<?php

class Users extends Controller {
	
	public function __construct(){
		
		$this->userModel = $this->model("User");
		
	}
	
	public function index(){
		
		//Direct away from login if the user is already logged in!
		if(isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/settings");
		}
		
		$data = [
			"username" => "",
			"password" => "",
			"usernameError" => "",
			"passwordError" => ""
		];
		
		$this->view("users/login", $data);
		
	}
	
	public function passwordReset(){
		
		//Direct away from login if the user is already logged in!
		if(isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/settings");
		}
			
		$data = [
			"email" => "",
			"emailError" => "",
			"emailSuccess" => "",
			"emailSuccess2" => ""
		];
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			//Sanitize POST data, this will filter out/remove data that could be harmful
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			$data = [
				"email" => trim($_POST["email"]),
				"emailError" => "",
				"emailSuccess" => "",
				"emailSuccess2" => ""
			];
			
			
			//Validate email
			if(empty($data["email"])){
				$data["emailError"] = "Please enter your email address";
			}elseif(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
				$data["emailError"] = "Please enter a valid email address";
			}else{
				//Check if the email exists
				if($this->userModel->findUserByEmail($data["email"])){
					$data["emailError"] = "";
				}else{$data["emailError"] = "The email doesn't exist";}
			}
			
			//If no errors then execute
			if(empty($data["emailError"])){
				
				$data["emailSuccess"] = "The email is sent!";
				$data["emailSuccess2"] = "Please check your email for further instructions";
				$this->userModel->passwordReset($data);
				
			}
		}
		
		$this->view("users/passwordreset", $data);

		
	}
	
	
	public function setNewPassword(){
		
		//Direct away from login if the user is already logged in!
		if(isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/settings");
		}
		
		if(isset($_GET["email"])){$email = $_GET["email"];}else{$email = "";}
		if(isset($_GET["token"])){$token = $_GET["token"];}else{$token = "";}
		
		$data = [
			"password" => "",
			"confirmPassword" => "",
			"passwordError" => "",
			"confirmPasswordError" => "",
			"email" => "",
			"token" => "",
			"error" => "",
			"error2" => "",
			"success" => "",
			"success2" => ""
		];
		
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			//Sanitize POST data, this will filter out/remove data that could be harmful
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			
			$passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
			
			$data = [
				"password" => trim($_POST["password"]),
				"confirmPassword" => trim($_POST["confirmPassword"]),
				"passwordError" => "",
				"confirmPasswordError" => "",
				"email" => trim($email),
				"token" => trim($token),
				"error" => "",
				"error2" => "",
				"success" => "",
				"success2" => ""
			];
			
			//Validate password on length and numeric values
			if(empty($data['password'])){
				$data['passwordError'] = "Please enter a password";
			}elseif(preg_match($passwordValidation, $data['password'])){
				$data['passwordError'] = "The password must contain at least 1 number";
			}elseif(strlen($data['password']) < 8){
				$data['passwordError'] = "The password must contain at least 1 number";
			}
					
			//Validate confirm password
			if(empty($data["confirmPassword"])){
				$data["confirmPasswordError"] = "Please enter a password";
			}else{
				if($data["password"] != $data["confirmPassword"]){
				$data["confirmPasswordError"] = "The passwords do not match, please try again";
				}
			}
			
			if(empty($data["confirmPasswordError"]) && empty($data["passwordError"])){
				
				$data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
				
				if($this->userModel->setNewPassword($data)){
					$data["success"] = "Your password is changed!";
					$data["success2"] = "Redirecting to the sign-in page now..";
					echo '<meta http-equiv="refresh" content="4; url=login">';
				}else{
					$data["error"] = "Your token is invalid";
					$data["error2"] = "Please try again!";
				}
				
			}
						
		}
		
		$this->view("users/setnewpassword", $data);
	
	}

	
	public function register() {
		
		//Direct away from login if the user is already logged in!
		if(isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/settings");
		}
		
		$data = [
			"username" => "",
			"email" => "",
			"password" => "",
			"confirmPassword" => "",
			"website" => "",
			"usernameError" => "",
			"emailError" => "",
			"passwordError" => "",
			"confirmPasswordError" => "",
			"successMessage" => "",
			"successMessage2" => ""
		];
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			//Sanitize POST data, this will filter out/remove data that could be harmful
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			//Get the data inputs, the trim will remove ay whitespace
			$data = [
				"username" => trim($_POST["username"]),
				"email" => trim($_POST["email"]),
				"password" => trim($_POST["password"]),
				"confirmPassword" => trim($_POST["confirmPassword"]),
				"website" => trim($_POST["website"]),
				"usernameError" => "",
				"emailError" => "",
				"passwordError" => "",
				"confirmPasswordError" => "",
				"successMessage" => "",
				"successMessage2" => ""
			];
			
			$nameValidation = "/^[a-zA-Z0-9]*$/";
			$passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
			
			
			//Validate username on letters and numbers
			if(empty($data["username"])){
				$data["usernameError"] = "Please enter your username";
			}elseif(!preg_match($nameValidation, $data["username"])){
				$data["usernameError"] = "The username can only contain letters and numbers";
			}	//Check if the username exists
				if($this->userModel->findUserByUsername($data["username"])){
					$data["usernameError"] = "The username is taken";
				}
			
			//Validate email
			if(empty($data["email"])){
				$data["emailError"] = "Please enter your email address";
			}elseif(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
				$data["emailError"] = "Please enter a valid email address";
			}else{
				//Check if the email exists
				if($this->userModel->findUserByEmail($data["email"])){
					$data["emailError"] = "The email is taken";
				}
			}
			
			//Validate password on length and numeric values
			if(empty($data['password'])){
			$data['passwordError'] = "Please enter a password";
			}elseif(preg_match($passwordValidation, $data['password'])){
				$data['passwordError'] = "Your password must have atleast 1 number";
			}elseif(strlen($data['password']) < 8){
				$data['passwordError'] = "Your password must have atleast 1 number";
			}
			
			
			//Validate confirm password
			if(empty($data["confirmPassword"])){
				$data["confirmPasswordError"] = "Please enter a password";
			}else{
				if($data["password"] != $data["confirmPassword"]){
					$data["confirmPasswordError"] = "The passwords do not match, please try again";
				}
			}
			
			//Make sure that the errors are empty
			if(empty($data["usernameError"]) && empty($data["emailError"]) && empty($data["passwordError"]) && empty($data["confirmPasswordError"])){
				//Hash password
				$data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
				
				//Register user from model function
				if($this->userModel->register($data)){
					//Redirect to the login page and give a success message
					$data["successMessage"] = "Successfully registered";
					$data["successMessage2"] = "Redirecting to the sign-in page now..";
					echo '<meta http-equiv="refresh" content="4; url=login">';
					//header("location: " . URLROOT . "/users/login");
				}else{
					die("Something went wrong");
				}
			}
			
		}
		
		$this->view("users/register", $data);
		
	}
	
	public function login() {
		
		//Direct away from login if the user is already logged in!
		if(isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/settings");
		}
		
		$this->userModel->dropTempBlock();
		

		$data = [
			"title" => "Login page",
			"username" => "",
			"password" => "",
			"usernameError" => "",
			"passwordError" => "",
			"attempt" => ""
		];
		
		//Check for the POST
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			//Sanitize the post data
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			$data = [
				"username" => trim($_POST["username"]),
				"password" => trim($_POST["password"]),
				"usernameError" => "",
				"passwordError" => "",
				"attempt" => ""
			];
			
			//Validate username
			if(empty($data["username"])){
				$data["usernameError"] = "Please enter a username or a email address";
			}
			
			//Validate password
			if(empty($data["password"])){
				$data["passwordError"] = "Please enter a password";
			}
			
			//Check if all errors are empty
			if(empty($data["usernameError"]) && empty($data["passwordError"])){
				$loggedInUser = $this->userModel->login($data["username"], $data["password"]);
				
				if($loggedInUser){
					$this->createUserSession($loggedInUser);
					$this->userModel->dropTempBlockWhenLogin();
					header("location:" . URLROOT . "/users/settings");
				}else{
					$data["passwordError"] = "The credentials are wrong";
					//Add to the login attempts
					$this->userModel->loginAttempts();
					//Will get the login attempt value
					$attempt = $this->userModel->tempBlock();
					$data["attempt"] = $attempt;
					
					$this->view("users/login", $data);
				}
			}
			
		}else{
			$attempt = $this->userModel->tempBlock();

			$data = [
				"username" => "",
				"password" => "",
				"usernameError" => "",
				"passwordError" => "",
				"attempt" => $attempt
			];
			
		}
		
		$this->view("users/login", $data);

	}
	
	public function createUserSession($user){
		
		$_SESSION["user_id"] = $user->id;
		$_SESSION["username"] = $user->username;
		$_SESSION["email"] = $user->email;
		$_SESSION["website"] = $user->website;
		$_SESSION["validated"] = $user->validated;
		$_SESSION["usertype"] = $user->usertype;
		$_SESSION["imageurl"] = URLROOT . $user->imageurl;
		//If the user is banned then log them off again!
		if($_SESSION["usertype"] == "Banned"){
			$this->logout();
		}
		
	}
	
	public function logout(){
		
		unset($_SESSION["user_id"]);
		unset($_SESSION["username"]);
		unset($_SESSION["email"]);
		unset($_SESSION["website"]);
		unset($_SESSION["validated"]);
		unset($_SESSION["usertype"]);
		unset($_SESSION["imageurl"]);
		header("location:" . URLROOT . "/users/login");
		
	}
	
	
	public function settings(){
		
		//For Admin
		if($_SESSION["usertype"] == "Admin"){
			$users = $this->userModel->getUsers();
			$gameComments = $this->userModel->countGameCommentsAll();
			$postComments = $this->userModel->countPostCommentsAll();
			$assetComments = $this->userModel->countAssetCommentsAll();
			$posts = $this->userModel->countAllPosts();
			$assets = $this->userModel->countAllAssets();
		}
		
		$data = [
			"validatesucess" => "",
			"error" => "",
			"error2" => "",
			"emailsent" => "",
			"emailsent2" => "",
			"emailnotsent" => "Your Email address is not validated",
			"emailnotsent2" => "you are unable to post any comments until you validate your email!",
			"emailchangesuccess" => "",
			"users" => "",
			"gamecomments" => "",
			"posts" => "",
			"postcomments" => "",
			"assets" => "",
			"assetcomments" => ""
		];
		
		if($_SESSION["usertype"] == "Admin"){
			$data["users"] = $users;
			$data["gamecomments"] = $gameComments;
			$data["postcomments"] = $postComments;
			$data["assetcomments"] = $assetComments;
			$data["posts"] = $posts;
			$data["assets"] = $assets;
		}
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();

		$this->view("users/settings", $data);

	}
	

	public function validate(){
		
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
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		if(isset($_SESSION["user_id"]) && $_SESSION["validated"] == 0){
			
			//Check if the user is banned
			$this->userModel->checkIfBanned();
			
			if(!isset($_GET["email"]) && !isset($_GET["token"])){			
				$this->userModel->validateEmail();	
				$data["emailsent"] = "A validation request has been sent to your email!";
				$data["emailsent2"] = "Please check your email for further intructions";
				$data["emailnotsent"] = "";
				$data["emailnotsent2"] = "";
			}else{
					
			if($this->userModel->checkEmailValidation($_GET["email"], $_GET["token"]) == true){
				$data["validatesucess"] = "You are succesfully validated!";
				$data["emailsent"] = "";
				$data["emailsent2"] = "";
				$data["emailnotsent"] = "";
				$data["emailnotsent2"] = "";
				$this->view("users/settings", $data);
				exit();
			}else{
				$data["error"] = "Your token is invalid";
				$data["error2"] = "Please try again!";
				$data["emailsent"] = "";
				$data["emailsent2"] = "";
				$data["emailnotsent"] = "";
				$data["emailnotsent2"] = "";
				$this->view("users/settings", $data);
				exit();
				}
			}
			$this->view("users/settings", $data);	
		}
		
		if(isset($_SESSION["user_id"]) && $_SESSION["validated"] == 1){
			header("location:" . URLROOT . "/users/settings");
		}	
		
	}
	
	
	public function changeEmail(){
		
		$data = [
			"email" => "",
			"emailError" => "",
			"emailSuccess" => "",
			"emailSuccess2" => "",
			"validatesucess" => "",
			"error" => "",
			"error2" => "",
			"emailsent" => "",
			"emailsent2" => "",
			"emailnotsent" => "",
			"emailnotsent2" => "",
			"emailchangesuccess" => ""
			];
			
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		if($_SESSION["validated"] == 0){
			header("location:" . URLROOT . "/users/settings");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
		//Sanitize POST data, this will filter out/remove data that could be harmful
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"email" => trim($_POST["email"]),
				"emailError" => "",
				"emailSuccess" => "",
				"emailSuccess2" => ""
			];
			
			//Validate email
			if(empty($data["email"])){
				$data["emailError"] = "Please enter your email address";
			}elseif(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
				$data["emailError"] = "Please enter a valid email address";
			}else{
				//Check if the email exists
				if($this->userModel->findUserByEmail($data["email"])){
					$data["emailError"] = "The email is taken";
				}
			}
			
			//Send a request to update email if there are no errors!
			if(empty($data["emailError"])){
				
				$newEmail = $data["email"];
				$data["emailSuccess"] = "An email change request is sent!";
				$data["emailSuccess2"] = "Please check your email for further instructions";
				$this->userModel->changeEmailRequest($newEmail);
				
			}
			
		}
		if(isset($_GET["email"]) && isset($_GET["token"])){
			if($this->userModel->changeEmail($_GET["email"], $_GET["token"])){
				$data["emailchangesuccess"] = "You have changed your email!";
				$this->view("users/settings", $data);
				exit();
			}else{
				$data["error"] = "Your token is invalid";
				$data["error2"] = "Please try again!";
				$this->view("users/settings", $data);
				exit();
			}
		}
		
		$this->view("users/changeemail", $data);

	}
	
	
	public function changeimage(){
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		if($_SESSION["validated"] == 0){
			header("location:" . URLROOT . "/users/settings");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		
		$data = [
			"imageSuccess" => "",
			"imageError" => "",
			"image" => ""
		];
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			$data = [
				"imageSuccess" => "",
				"imageError" => "",
				"image" => ""
			];
			
			//Upload the image and change the name to the user id
			$filename = $_SESSION["username"];
			$extension = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION );
			$basename = $filename . "." . $extension;

			$source = $_FILES["file"]["tmp_name"];
			$destination = PUBLICAPPROOT . "/public/graphic/uploads/users/{$basename}";
			
			//Check if the size is to big
			if ($_FILES["file"]["size"]/1024 > 500) {
				$data["imageError"] = "The file is to big, the limit is 500KB!";
			}
			
			// Allow certain file formats
			if ($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif" ) {
				$data["imageError"] = "The file type is wrong, only JPG, JPEG, PNG and GIF are allowed";
			}


			//move the file if there is no errors
			if(empty($data["imageError"])){
				if(move_uploaded_file($source, $destination)){
					//Delete other images if duplicate in a different type
					//If you are uploading PNG
					if($extension == "png"){
						$delJPG = PUBLICAPPROOT . '/public/graphic/uploads/users/' . $_SESSION["username"] . '.jpg';
						$delJPEG = PUBLICAPPROOT . '/public/graphic/uploads/users/' . $_SESSION["username"] . '.jpeg';
						$delGIF = PUBLICAPPROOT . '/public/graphic/uploads/users/' . $_SESSION["username"] . '.gif';
						if(file_exists($delJPG)){unlink($delJPG);}if(file_exists($delJPEG)){unlink($delJPEG);}if(file_exists($delGIF)){unlink($delGIF);}
					}
					//If you are uploading JPG
					if($extension == "jpg"){
						$delPNG = PUBLICAPPROOT . '/public/graphic/uploads/users/' . $_SESSION["username"] . '.png';
						$delJPEG = PUBLICAPPROOT . '/public/graphic/uploads/users/' . $_SESSION["username"] . '.jpeg';
						$delGIF = PUBLICAPPROOT . '/public/graphic/uploads/users/' . $_SESSION["username"] . '.gif';
						if(file_exists($delPNG)){unlink($delPNG);}if(file_exists($delJPEG)){unlink($delJPEG);}if(file_exists($delGIF)){unlink($delGIF);}
					}
					//If you are uploading JPEG
					if($extension == "jpeg"){
						$delPNG = PUBLICAPPROOT . '/public/graphic/uploads/users/' . $_SESSION["username"] . '.png';
						$delJPG = PUBLICAPPROOT . '/public/graphic/uploads/users/' . $_SESSION["username"] . '.jpg';
						$delGIF = PUBLICAPPROOT . '/public/graphic/uploads/users/' . $_SESSION["username"] . '.gif';
						if(file_exists($delPNG)){unlink($delPNG);}if(file_exists($delJPG)){unlink($delJPG);}if(file_exists($delGIF)){unlink($delGIF);}
					}
					//If you are uploading GIF
					if($extension == "gif"){
						$delPNG = PUBLICAPPROOT . '/public/graphic/uploads/users/' . $_SESSION["username"] . '.png';
						$delJPG = PUBLICAPPROOT . '/public/graphic/uploads/users/' . $_SESSION["username"] . '.jpg';
						$delJPEG = PUBLICAPPROOT . '/public/graphic/uploads/users/' . $_SESSION["username"] . '.jpeg';
						if(file_exists($delPNG)){unlink($delPNG);}if(file_exists($delJPG)){unlink($delJPG);}if(file_exists($delJPEG)){unlink($delJPEG);}
					}
					//Change image
					$data["image"] = "/public/graphic/uploads/users/{$basename}";
					unset($_SESSION["imageurl"]);
					$_SESSION["imageurl"] = URLROOT . "/public/graphic/uploads/users/{$basename}";
					$this->userModel->uploadImage($data["image"]);
					//Success message
					$data["imageSuccess"] = "Your image is changed!";
				}else{
					$data["imageError"] = "Something went wrong, please try again!";
				}
			}
		
		}

		$this->view("users/changeimage", $data);

	}
	
	
	public function changewebsite(){
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		if($_SESSION["validated"] == 0){
			header("location:" . URLROOT . "/users/settings");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		
		$data = [
			"websiteSuccess" => "",
			"error" => "",
			"error2" => ""
		];
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
		//Sanitize POST data, this will filter out/remove data that could be harmful
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"websiteSuccess" => "",
				"error" => "",
				"error2" => "",
				"website" => trim($_POST["website"])
			];
			
			if($this->userModel->changeWebsite($data) == true){
				$data["websiteSuccess"] = "You have changed your website!";
				$this->view("users/changewebsite", $data);
				exit();
			}else{
				$data["error"] = "Something went wrong";
				$data["error2"] = "Please try again!";
				$this->view("users/changewebsite", $data);
				exit();
			}
			
		}
		
		$this->view("users/changewebsite", $data);

	}
	
	
	public function changepassword(){
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		if($_SESSION["validated"] == 0){
			header("location:" . URLROOT . "/users/settings");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		
		$data = [
			"passwordSuccess" => "",
			"currentpasswordError" => "",
			"newpasswordError" => "",
			"confirmpasswordError" => "",
			"error" => "",
			"error2" => ""
		];
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
		//Sanitize POST data, this will filter out/remove data that could be harmful
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			$nameValidation = "/^[a-zA-Z0-9]*$/";
			$passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
			
			$data = [
				"currentpassword" => trim($_POST["currentpassword"]),
				"newpassword" => trim($_POST["newpassword"]),
				"confirmpassword" => trim($_POST["confirmpassword"]),
				"passwordSuccess" => "",
				"currentpasswordError" => "",
				"newpasswordError" => "",
				"confirmpasswordError" => "",
				"error" => "",
				"error2" => ""
				];
				
			//Validate password on length and numeric values
			if(empty($data['newpassword'])){
			$data['newpasswordError'] = "Please enter a password";
			}elseif(preg_match($passwordValidation, $data['newpassword'])){
				$data['newpasswordError'] = "Your password must have atleast 1 number";
			}elseif(strlen($data['newpassword']) < 8){
				$data['newpasswordError'] = "Your password must have atleast 1 number";
			}
			
			//Validate confirm password
			if(empty($data["confirmpassword"])){
				$data["confirmpasswordError"] = "Please enter a password";
			}else{
				if($data["newpassword"] != $data["confirmpassword"]){
					$data["confirmpasswordError"] = "The passwords do not match, please try again";
				}
			}
			
			if(empty($data["confirmpasswordError"]) && empty($data['newpasswordError'])){
			
				//$data["currentpassword"] = password_hash($data["currentpassword"], PASSWORD_DEFAULT);
				$data["newpassword"] = password_hash($data["newpassword"], PASSWORD_DEFAULT);
				
				$passwordChangeVerify = $this->userModel->changePassword($data["currentpassword"]);
				
				if($passwordChangeVerify){
					$this->userModel->changePasswordAfterValidation($data["newpassword"]);
					$data["passwordSuccess"] = "You have changed your password!";
					$this->view("users/changepassword", $data);
					exit();
				}else{
					$data["error"] = "Your password is incorrect";
					$data["error2"] = "Please try again!";
					$this->view("users/changepassword", $data);
					exit();
				}
			}
			
		}
		
		$this->view("users/changepassword", $data);

	}
	
	
	
	public function commentgame(){
		
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
				"comment" => trim($_POST["comment"])
			];
			
			if($data["comment"] == ""){$data["error"] = "Something went wrong";
				$data["error2"] = "Please try again!";$this->view("users/commentgame", $data);exit();}
			
			if($this->userModel->commentGame($data) == true){
				$data["commentSuccess"] = "Thank you for your comment!";
				
				//Update sitemap on commenting
				//Set game url
				if($data["page_key"] == 1){$gameURL = URLROOT . "/games/threep";}
				if($data["page_key"] == 2){$gameURL = URLROOT . "/games/twentytwentyaspaceodyssey";}
				if($data["page_key"] == 3){$gameURL = URLROOT . "/games/paperworld";}
				//Countgame comments
				$countAllGameComments = $this->userModel->countGameComments($data["page_key"]);
				$gameCommentCount = 0;
				$a = 0;
				foreach ($countAllGameComments as $c){$gameCommentCount ++;}
				for($x=0;$x<$gameCommentCount;$x++){
					if($a == 10){
						$a = 0;
						$pID = 1 + $x/10;
						$xml = simplexml_load_file (PUBLICAPPROOT . '/public/sitemap.xml');							
						//Check if the node exists
						$targetpc = false;
						$ipc = 0;
						foreach ($xml->url as $mm) {
						if ($mm->loc == $gameURL . "?page=" . $pID) { $targetpc = $ipc; break; }
							$ipc++;
						}
						if ($targetpc !== false) {
							unset($xml->url[$targetpc]);
						}

						$url = $xml->addChild("url");
						$user = $url->addChild("loc", $gameURL . "?page=" . $pID);
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
				if ($m->loc == $gameURL) { $target = $i; break; }
					$i++;
				}
				if ($target !== false) {unset($xml->url[$target]->lastmod);}
				
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
				
				//Update main gamepage
				$target3 = false;
				$i = 0;
				foreach ($xml->url as $m) {
				if ($m->loc == URLROOT . "/index/games") { $target3 = $i; break; }
					$i++;
				}
				if ($target3 !== false) {unset($xml->url[$target3]->lastmod);}

				//Update date in sitemap
				//Indexpage
				$user = $xml->url[$target2]->addChild("lastmod", date("Y-m-d"));
				//Gamepage
				$user = $xml->url[$target]->addChild("lastmod", date("Y-m-d"));
				//Main Gamepage
				$user = $xml->url[$target3]->addChild("lastmod", date("Y-m-d"));
				//Format XML
				$dom = new DOMDocument('1.0');
				$dom->preserveWhiteSpace = false;
				$dom->formatOutput = true;
				$dom->loadXML($xml->asXML());
				$formatxml = new SimpleXMLElement($dom->saveXML());
				//Execute
				echo $formatxml->saveXML(PUBLICAPPROOT . '/public/sitemap.xml'); 
				
				$this->view("users/commentgame", $data);
				exit();
			}else{
				$data["error"] = "Something went wrong";
				$data["error2"] = "Please try again!";
				$this->view("users/commentgame", $data);
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
	
	
	//Admin section
	public function adminCheckAllUsers(){
		
		if($_SESSION["usertype"] != "Admin"){
			header("location:" . URLROOT . "/users/settings");
		}
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		if($_SESSION["usertype"] == "Admin"){
			
			$i = 0;
			$countUsers = $this->userModel->getUsers();
			foreach ($countUsers as $usersCount){$i++;}
			
			$countUncheckedUsers = $this->userModel->countUncheckedUsers();
			
			$this->userModel->updateCountUsersAdmin($i);
			//Get all users if you don't search
			if(!isset($_GET["userSearch"])){$users = $this->userModel->getUsers();}
			if(isset($_GET["userSearch"])){$users = $this->userModel->searchUsers($_GET["userSearch"]);}
			$data = [ 
				"users" => $users,
				"uncheckedUsers" => $countUncheckedUsers	
				];
			$this->view("users/admincheckallusers", $data);
		
		}
		
	}
	
	
	public function adminBanUser(){
		
		if($_SESSION["usertype"] != "Admin"){
			header("location:" . URLROOT . "/users/settings");
		}
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		if($_SESSION["usertype"] == "Admin"){
			
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$userid = trim($_POST["userid"]);
			
				$this->userModel->banUser($userid);

				$this->view("users/adminbanuser");
			}
		}
	}
	
	
	public function adminUnbanUser(){
		
		if($_SESSION["usertype"] != "Admin"){
			header("location:" . URLROOT . "/users/settings");
		}
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		if($_SESSION["usertype"] == "Admin"){
			
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$userid = trim($_POST["userid"]);
			
				$this->userModel->unbanUser($userid);

				$this->view("users/adminunbanuser");
			}
		}
	}
	
	
	public function adminCheckLatestUserChanges(){
		
		if($_SESSION["usertype"] != "Admin"){
			header("location:" . URLROOT . "/users/settings");
		}
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		
		$users = $this->userModel->adminGetLatestUserChanges();
		$this->userModel->adminClearLatestUserChanges();

		$data = [ "users" => $users ];

		$this->view("users/adminchecklatestuserchanges", $data);
			
		
	}
	
	

	public function adminCheckGameComments(){
		
		if($_SESSION["usertype"] != "Admin"){
			header("location:" . URLROOT . "/users/settings");
		}
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		if($_SESSION["usertype"] == "Admin"){
			
			//Clear uncounted gamecomments
			$i = 0;
			$countGameComments = $this->userModel->countGameCommentsAll();
			foreach ($countGameComments as $gameCommentsCount){$i++;}
			$this->userModel->clearGameComments($i);
			
			//Get all users if you don't search
			if(!isset($_GET["commentSearch"])){$comments = $this->userModel->countGameCommentsAll();}
			if(isset($_GET["commentSearch"])){$comments = $this->userModel->searchGameComment($_GET["commentSearch"]);}

			$data = [ "comments" => $comments ];
			$this->view("users/admincheckgamecomments", $data);
		
		}
		
	}
	
	
	public function adminCheckGameCommentsBannedUsers(){
		
		if($_SESSION["usertype"] != "Admin"){
			header("location:" . URLROOT . "/users/settings");
		}
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		if($_SESSION["usertype"] == "Admin"){
			
			//Get all users if you don't search
			if(!isset($_GET["commentSearch"])){$comments = $this->userModel->countGameCommentsAllBannedUsers();}
			if(isset($_GET["commentSearch"])){$comments = $this->userModel->searchGameComment($_GET["commentSearch"]);}

			$data = [ "comments" => $comments ];
			$this->view("users/admincheckgamecommentsbannedusers", $data);
		
		}
		
	}
	
	
	public function adminCheckPostComments(){
		
		if($_SESSION["usertype"] != "Admin"){
			header("location:" . URLROOT . "/users/settings");
		}
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		if($_SESSION["usertype"] == "Admin"){
			
			//Clear uncounted postcomments
			$i = 0;
			$countPostComments = $this->userModel->countPostCommentsAll();
			foreach ($countPostComments as $postCommentsCount){$i++;}
			$this->userModel->clearPostComments($i);
			
			//Get all users if you don't search
			if(!isset($_GET["commentSearch"])){$comments = $this->userModel->countPostCommentsAll();}
			if(isset($_GET["commentSearch"])){$comments = $this->userModel->searchPostComment($_GET["commentSearch"]);}

			$data = [ "comments" => $comments ];
			$this->view("users/admincheckpostcomments", $data);
		
		}
		
	}
	
	
	public function adminCheckPostCommentsBannedUsers(){
		
		if($_SESSION["usertype"] != "Admin"){
			header("location:" . URLROOT . "/users/settings");
		}
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		if($_SESSION["usertype"] == "Admin"){
			
			//Get all users if you don't search
			if(!isset($_GET["commentSearch"])){$comments = $this->userModel->countPostCommentsAllBannedUsers();}
			if(isset($_GET["commentSearch"])){$comments = $this->userModel->searchPostComment($_GET["commentSearch"]);}

			$data = [ "comments" => $comments ];
			$this->view("users/admincheckpostcommentsbannedusers", $data);
		
		}
		
	}
	
	
	public function adminCheckAssetComments(){
		
		if($_SESSION["usertype"] != "Admin"){
			header("location:" . URLROOT . "/users/settings");
		}
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		if($_SESSION["usertype"] == "Admin"){
			
			//Clear uncounted assetcomments
			$i = 0;
			$countAssetComments = $this->userModel->countAssetCommentsAll();
			foreach ($countAssetComments as $assetCommentsCount){$i++;}
			$this->userModel->clearAssetComments($i);
			
			//Get all users if you don't search
			if(!isset($_GET["commentSearch"])){$comments = $this->userModel->countAssetCommentsAll();}
			if(isset($_GET["commentSearch"])){$comments = $this->userModel->searchAssetComment($_GET["commentSearch"]);}

			$data = [ "comments" => $comments ];
			$this->view("users/admincheckassetcomments", $data);
		
		}
		
	}
	
	
	public function adminCheckAssetCommentsBannedUsers(){
		
		if($_SESSION["usertype"] != "Admin"){
			header("location:" . URLROOT . "/users/settings");
		}
		
		if(!isset($_SESSION["user_id"])){
			header("location:" . URLROOT . "/users/login");
		}
		//Check if the user is banned
		$this->userModel->checkIfBanned();
		if($_SESSION["usertype"] == "Admin"){
			
			//Get all users if you don't search
			if(!isset($_GET["commentSearch"])){$comments = $this->userModel->countAssetCommentsAllBannedUsers();}
			if(isset($_GET["commentSearch"])){$comments = $this->userModel->searchAssetComment($_GET["commentSearch"]);}

			$data = [ "comments" => $comments ];
			$this->view("users/admincheckassetcommentsbannedusers", $data);
		
		}
		
	}
	
	
	
}

?>