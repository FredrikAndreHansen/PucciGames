<?php
class User {
	
	private $db;
	
	public function __construct() {
		
		$this->db = new Database;
		
	}
	
	public function getUsers() {
		
		$this->db->query("SELECT * FROM users ORDER BY deletetime DESC");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	public function passwordReset($data){

		$email = $data["email"];
		$this->db->query('UPDATE users SET passwordvalidationcode = :passwordvalidationcode, passwordresetexpire = :passwordresetexpire, passwordresettime = :passwordresettime WHERE email = :email');
		
		
		//Generate validation code when registering, just so that the validation code is always random
		function generateValidationCodePWRS() {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < 60; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		$passwordvalidationcode = generateValidationCodePWRS();
		$passwordresetexpire = 0;
		$passwordresettime = date('Y/m/d H:i:s', time() + 60 * 10);
		
		$this->db->bind(':passwordvalidationcode', $passwordvalidationcode);
		$this->db->bind(':passwordresetexpire', $passwordresetexpire);
		$this->db->bind(':passwordresettime', $passwordresettime);
		$this->db->bind(':email', $email);
		
		//Execute function, if true then send out a email
		if($this->db->execute()){
		
			$link = URLROOT . "/users/setnewpassword?email=" . $email . "&token=" . $passwordvalidationcode;
		
			//Send email with validation link
			$subject = "Reset Your Password - PucciGames";
			$message = "
			    <h1>PucciGames</h1>
			    <hr style='float: left;height:1px;width:256px;border:0;background-color:#808080;' />
			    <div style='clear:both;'></div>
				<p>Hello,</p>
				<p>You have sent a request to change your password for your PucciGames account associated with: 
				<br /><a name='name' style='font-size:16px;font-style:italic;font-weight:bold;color:#008B8B;text-decoration:none !important;'>".$email."</a>.</p>
				<p>No changes have been made to your account.</p>
				<br />
				<button style='background-color:#008B8B;border:none;padding: 10px;font-size:20px;'><a style='color:#000000;text-decoration:none;' target='_blank' href='".$link."'>Click Here To Reset Your Password</a></button>
				<br />
				<br />
				<p>If you didn't request a password reset then please contact me at <a style='color:#008B8B;font-weight: bold;' href='www.puccigames.com/#contact'>www.puccigames.com/#contact</a></p>
				<p>Kind regards,<br />PucciGames</p>
			";
				$headers = "From: no-reply@puccigames.com\r\n";
				$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                mail($email,$subject,$message,$headers);

			

        return true;
		}else{
			return false;
		}
		
	}
	
	
	public function setNewPassword($data){
		
		$email = $data["email"];
		$token = $data["token"];
		$password = $data["password"];
		$passwordresetexpire = 1;
		
		//First check if the token is expired, will not execute code if token is expired
		$this->db->query("SELECT passwordresettime FROM users WHERE email = :email");
		$this->db->bind(':email', $email);
		//Result is returned as a stdObject class
		$result = $this->db->single();
		
		$ctime = date('Y/m/d H:i:s', time());
		$currenttime = strtotime($ctime);
		//Get only the string value from the stdObject class and convert so it can be compared with currentime!
		//Also check if result is set, execute code if it is set!
		if(is_object($result)){
			
			$rstime = $result->passwordresettime;
			$passwordresettime = strtotime($rstime);
			
		}else{
			$passwordresettime = 0;
		}
		//Update passwordresetexpire to 1(token expired!) if the currenttime is greater that pwrstime!
		if($currenttime > $passwordresettime){
			$this->db->query('UPDATE users SET passwordresetexpire = 1 WHERE email = :email');
			$this->db->bind(':email', $email);
			$this->db->execute();
		}
		
		//If the user have the correct email but wrong token then expire the token!
		$this->db->query('UPDATE users SET passwordresetexpire = 1 WHERE email = :email AND passwordvalidationcode != :passwordvalidationcode');
		$this->db->bind(':email', $email);
		$this->db->bind(':passwordvalidationcode', $token);
		$this->db->execute();
		
		//Check if the query can be done, if it can then return true	
		$this->db->query("SELECT * FROM users WHERE email = :email AND passwordvalidationcode = :passwordvalidationcode AND passwordresetexpire = 0");
		$this->db->bind(':email', $email);
		$this->db->bind(':passwordvalidationcode', $token);
		
		if(!empty($this->db->resultSet())){
			//Execute query
			$this->db->query('UPDATE users SET password = :password, passwordresetexpire = :passwordresetexpire WHERE email = :email AND passwordvalidationcode = :passwordvalidationcode AND passwordresetexpire = 0');
			$this->db->bind(':email', $email);
			$this->db->bind(':passwordvalidationcode', $token);
			$this->db->bind(':passwordresetexpire', $passwordresetexpire);
			$this->db->bind(':password', $password);
			//Execute function
			$this->db->execute();
			return true;		
		}else{
			return false;
		}
		

		
	}
	
	public function register($data){
		
		$this->db->query('INSERT INTO users (username, email, password, website, imageurl, validated, validationcode, passwordvalidationcode, expire, passwordresetexpire, deletetime, usertype, emailchange, ip, checked, newusers, newgamecomments, newpostcomments, newassetcomments) VALUES (:username, :email, :password, :website, :imageurl, :validated, :validationcode, :passwordvalidationcode, :expire, :passwordresetexpire, :deletetime, :usertype, :emailchange, :ip, :checked, :newusers, :newgamecomments, :newpostcomments, :newassetcomments)');
		
		function getUserRegisterIP() {
			$ip = '';
			if (isset($_SERVER['REMOTE_ADDR']))
				$ip = $_SERVER['REMOTE_ADDR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED']))
				$ip = $_SERVER['HTTP_X_FORWARDED'];
			else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
				$ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
			else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
				$ip = $_SERVER['HTTP_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_FORWARDED']))
				$ip = $_SERVER['HTTP_FORWARDED'];
			else if(isset($_SERVER['HTTP_CLIENT_IP']))
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			else
				$ip = 'UNKNOWN';
			return $ip;
		}
			
		$ip = getUserRegisterIP();
		
		//Generate validation code when registering, just so that the validation code is always random
		function generateValidationCodeRegister() {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < 60; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		$validated = 0;
		$validationcode = generateValidationCodeRegister();
		$expire = 1;
		$deletetime = date('Y/m/d H:i:s', time() + 60 * 60 * 24);

		//Bind values
		$this->db->bind(':username', $data['username']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':password', $data['password']);
		$this->db->bind(':website', $data['website']);
		$this->db->bind(':imageurl', "/public/graphic/global/userPlaceholder.png");
		$this->db->bind(':validated', $validated);
		$this->db->bind(':validationcode', $validationcode);
		$this->db->bind(':passwordvalidationcode', $validationcode);
		$this->db->bind(':expire', $expire);
		$this->db->bind(':passwordresetexpire', $expire);
		$this->db->bind(':deletetime', $deletetime);
		$this->db->bind(':usertype', "User");
		$this->db->bind(':emailchange', "");
		$this->db->bind(':ip', $ip);
		$this->db->bind(':checked', 1);
		$this->db->bind(':newusers', 0);
		$this->db->bind(':newgamecomments', 0);
		$this->db->bind(':newpostcomments', 0);
		$this->db->bind(':newassetcomments', 0);
		
		//Execute function
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	public function login($username, $password){
		
		//Get login IP
		function getUserLoginIP() {
			$ip = '';
			if (isset($_SERVER['REMOTE_ADDR']))
				$ip = $_SERVER['REMOTE_ADDR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED']))
				$ip = $_SERVER['HTTP_X_FORWARDED'];
			else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
				$ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
			else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
				$ip = $_SERVER['HTTP_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_FORWARDED']))
				$ip = $_SERVER['HTTP_FORWARDED'];
			else if(isset($_SERVER['HTTP_CLIENT_IP']))
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			else
				$ip = 'UNKNOWN';
			return $ip;
		}
			
		$ip = getUserLoginIP();
		$ipBan = false;
		
		//If the IP match with a banned user then deny the user logging in!
		$this->db->query("SELECT * FROM users WHERE ip = :ip AND usertype = :usertype");
		$this->db->bind(':ip', $ip);
		$this->db->bind(':usertype', "Banned");
		if(!empty($this->db->resultSet())){$ipBan = true;}
		
		//Check for unvalidated accounts and delete them if the time has expired!
		$currenttime = date('Y/m/d H:i:s', time());
		$this->db->query("DELETE FROM users WHERE validated = 0 AND deletetime < :currenttime");
		$this->db->bind(':currenttime', $currenttime);
		$this->db->execute();
		
		$this->db->query("SELECT * FROM users WHERE username = :username OR email = :username");
		//Bind value
		$this->db->bind(":username", $username);
		
		$row = $this->db->single();
		
		
		//Check if $row is set, if set then get password, if not then return an empty string
		if(is_object($row)){
			$hashedPassword = $row->password;
			if($row->usertype == "Banned" or $ipBan == true){$hashedPassword = "";}
		}else{$hashedPassword = "";}
		
		if(password_verify($password, $hashedPassword)){
			return $row;
		}else{
			return false;
		}
		
	}
	
	//Check if email exist
	public function findUserByEmail($email){
		
		$this->db->query("SELECT * FROM users WHERE email = :email");
		
		//Email param will be binded with the email variable
		$this->db->bind(':email', $email);
		
		//Check if email is already registered
		if(!empty($this->db->resultSet())){
			return true;
		}else{
			return false;
		}
		
	}
	
	//Check if user exist
	public function findUserByUsername($user){
		
		$this->db->query("SELECT * FROM users WHERE username = :user");
		
		//Email param will be binded with the email variable
		$this->db->bind(':user', $user);
		
		//Check if email is already registered
		if(!empty($this->db->resultSet())){
			return true;
		}else{
			return false;
		}
		
	}
	
	
	public function validateEmail(){
		
		//Check if user exist, if not then log the user out(This is just in case the user is logged in after the user is deleted)
		$email = $_SESSION["email"];
		$this->db->query('SELECT * FROM users WHERE email = :email');
		$this->db->bind(':email', $email);
		//Log user out if the email doesn't exist anymore!
		if(empty($this->db->resultSet())){
			$this->logout();
		}
		
		//Generate validation code
		function generateValidationCode() {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < 60; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
	
		$validatonCode = generateValidationCode();
		$resettime = date('Y/m/d H:i:s', time() + 60 * 10);
		$email = $_SESSION["email"];
		$username = $_SESSION["username"];
		$link = URLROOT . "/users/validate?email=" . $email . "&token=" . $validatonCode;
		
		//Send email with validation link
		$subject = "Validate Your Email - PucciGames";
		$message = "
		    <h1>PucciGames</h1>
			<hr style='float: left;height:1px;width:256px;border:0;background-color:#808080;' />
			<div style='clear:both;'></div>
			<p>Hi ".$username.",</p>
			<p>Thank you for signing up!</p>
			<br />
			<button style='background-color:#008B8B;border:none;padding: 10px;font-size:20px;'><a style='color:#000000;text-decoration:none;' target='_blank' href='".$link."'>Click Here To Validate Your Email</a></button>
            <br />
            <br />
            <p>If you didn't request an email validation then please contact me at <a style='color:#008B8B;font-weight: bold;' href='www.puccigames.com/#contact'>www.puccigames.com/#contact</a></p>
		    <p>Kind regards,<br />PucciGames</p>
		";
		$headers = "From: no-reply@puccigames.com\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		mail("$email",$subject,$message,$headers);
		
		//Execute updates in DB to compare values with the email receied
		$this->db->query('UPDATE users SET validationcode = :validationcode, expire = 0, resettime = :resettime WHERE email = :email');
		$this->db->bind(':validationcode', $validatonCode);
		$this->db->bind(':email', $email);
		$this->db->bind(':resettime', $resettime);
		
		$this->db->execute();
		
	}
	

	public function checkEmailValidation($email, $token){

		if($_SESSION["email"] != $email){$email = "";}
		//First check if the token is expired, will not execute code if token is expired
		$this->db->query("SELECT resettime FROM users WHERE email = :email");
		$this->db->bind(':email', $email);
		//Result is returned as a stdObject class
		$result = $this->db->single();
		
		$ctime = date('Y/m/d H:i:s', time());
		$currenttime = strtotime($ctime);
		//Get only the string value from the stdObject class and convert so it can be compared with currentime!
		//Also check if result is set, execute code if it is set!
		if(is_object($result)){
			
			$rstime = $result->resettime;
			$resettime = strtotime($rstime);
			
		}else{
			$resettime = 0;
		}
		
		//If the user have the correct email but wrong token then expire the token!
		$this->db->query('UPDATE users SET expire = 1 WHERE email = :email AND validationcode != :validationcode');
		$this->db->bind(':email', $email);
		$this->db->bind(':validationcode', $token);
		$this->db->execute();
		
		//Execute if current time is less than resettime
		if($currenttime < $resettime){
			$this->db->query('SELECT * FROM users WHERE email = :email AND validationcode = :validationcode AND expire = 0');
			$this->db->bind(':email', $email);
			$this->db->bind(':validationcode', $token);
		
			if(!empty($this->db->resultSet())){
				$this->db->query('UPDATE users SET validated = 1 WHERE email = :email');
				$this->db->bind(':email', $email);
				$this->db->execute();
				$_SESSION["validated"] = 1;
				//header("location:" . URLROOT . "/users/settings?success");
				return true;
			}else {
				return false;
			}
		}else{
			//If the token has expired check to find the entry in the db and set the expire value to 1!
			$this->db->query('UPDATE users SET expire = 1 WHERE email = :email AND validationcode = :validationcode');
			$this->db->bind(':email', $email);
			$this->db->bind(':validationcode', $token);
			$this->db->execute();
			return false;
			
		}
		
	}
	
	
	public function changeEmailRequest($newEmail){
		
		//Generate validation code
		function generateValidationCodeChange() {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < 60; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		$id = $_SESSION["user_id"];
		$validatonCode = generateValidationCodeChange();
		$resettime = date('Y/m/d H:i:s', time() + 60 * 10);
		$username = $_SESSION["username"];
		
		$link = URLROOT . "/users/changeemail?email=" . $newEmail . "&token=" . $validatonCode;
		
		//Send email with validation link
		$subject = "Change Your Email Address - PucciGames";
		$message = "
		    <h1>PucciGames</h1>
			<hr style='float: left;height:1px;width:256px;border:0;background-color:#808080;' />
			<div style='clear:both;'></div>
			<p>Hi ".$username.",</p>
			<br />
			<button style='background-color:#008B8B;border:none;padding: 10px;font-size:20px;'><a style='color:#000000;text-decoration:none;' target='_blank' href='".$link."'>Click Here To Change Your Email</a></button>
            <br />
            <br />
            <p>If you didn't request to change your email address then please contact me at <a style='color:#008B8B;font-weight: bold;' href='www.puccigames.com/#contact'>www.puccigames.com/#contact</a></p>
		    <p>Kind regards,<br />PucciGames</p>

		";
		
		$headers = "From: no-reply@puccigames.com\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		mail($newEmail,$subject,$message,$headers);
		
		$this->db->query('UPDATE users SET expire = 0, validationcode = :validationcode, resettime = :resettime, emailchange = :emailchange  WHERE id = :id');
		$this->db->bind(':id', $id);
		$this->db->bind(':resettime', $resettime);
		$this->db->bind(':emailchange', $newEmail);
		$this->db->bind(':validationcode', $validatonCode);
		$this->db->execute();
		
	}
	
	
	public function changeEmail($email, $token){
		
		$currentemail = $_SESSION["email"];
		//First check if the token is expired, will not execute code if token is expired
		$this->db->query("SELECT resettime FROM users WHERE emailchange = :email");
		$this->db->bind(':email', $email);
		//Result is returned as a stdObject class
		$result = $this->db->single();
		
		$ctime = date('Y/m/d H:i:s', time());
		$currenttime = strtotime($ctime);
		//Get only the string value from the stdObject class and convert so it can be compared with currentime!
		//Also check if result is set, execute code if it is set!
		if(is_object($result)){
			
			$rstime = $result->resettime;
			$resettime = strtotime($rstime);
			
		}else{
			$resettime = 0;
		}
		
		//If the user have the correct email but wrong token then expire the token!
		$this->db->query('UPDATE users SET expire = 1 WHERE emailchange = :email AND validationcode != :validationcode');
		$this->db->bind(':email', $email);
		$this->db->bind(':validationcode', $token);
		$this->db->execute();
		
		//Execute if current time is less than resettime
		if($currenttime < $resettime){
			$this->db->query('SELECT * FROM users WHERE emailchange = :email AND validationcode = :validationcode AND expire = 0 AND email = :currentemail');
			$this->db->bind(':email', $email);
			$this->db->bind(':validationcode', $token);
			$this->db->bind(':currentemail', $currentemail);
		
			if(!empty($this->db->resultSet())){
				$this->db->query('UPDATE users SET email = :email, expire = 1 WHERE emailchange = :email');
				$this->db->bind(':email', $email);
				if($this->db->execute()){$_SESSION["email"] = $email;return true;}else{return false;}
			}else {
				return false;
			}
		}else{
			//If the token has expired check to find the entry in the db and set the expire value to 1!
			$this->db->query('UPDATE users SET expire = 1 WHERE emailchange = :email AND validationcode = :validationcode');
			$this->db->bind(':email', $email);
			$this->db->bind(':validationcode', $token);
			$this->db->execute();
			return false;
		}
		
	}
	
	
	public function tempBlock() {
		
		//Check for IP    
		function getUserTempIP() {
			$ip = '';
			if (isset($_SERVER['REMOTE_ADDR']))
				$ip = $_SERVER['REMOTE_ADDR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED']))
				$ip = $_SERVER['HTTP_X_FORWARDED'];
			else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
				$ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
			else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
				$ip = $_SERVER['HTTP_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_FORWARDED']))
				$ip = $_SERVER['HTTP_FORWARDED'];
			else if(isset($_SERVER['HTTP_CLIENT_IP']))
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			else
				$ip = 'UNKNOWN';
			return $ip;
		}
			
		$ip = getUserTempIP();
		
		$this->db->query("SELECT attempt FROM loginattempts WHERE ip = :ip");
		$this->db->bind(':ip', $ip);
		
		$result = $this->db->single();
		
		return $result;
		
	}
	
	
	public function dropTempBlockWhenLogin() {
		
		//Check for IP    
		function getUserDropTempWhenLoginIP() {
			$ip = '';
			if (isset($_SERVER['REMOTE_ADDR']))
				$ip = $_SERVER['REMOTE_ADDR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED']))
				$ip = $_SERVER['HTTP_X_FORWARDED'];
			else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
				$ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
			else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
				$ip = $_SERVER['HTTP_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_FORWARDED']))
				$ip = $_SERVER['HTTP_FORWARDED'];
			else if(isset($_SERVER['HTTP_CLIENT_IP']))
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			else
				$ip = 'UNKNOWN';
			return $ip;
		}
			
		$ip = getUserDropTempWhenLoginIP();
		//Check for the IP and then delete from loginattempts
		$this->db->query("DELETE FROM loginattempts WHERE ip = :ip");
		$this->db->bind(':ip', $ip);
		$this->db->execute();
		
		
	}
	
	public function dropTempBlock() {
		
		//Check for IP    
		function getUserDropTempIP() {
			$ip = '';
			if (isset($_SERVER['REMOTE_ADDR']))
				$ip = $_SERVER['REMOTE_ADDR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED']))
				$ip = $_SERVER['HTTP_X_FORWARDED'];
			else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
				$ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
			else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
				$ip = $_SERVER['HTTP_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_FORWARDED']))
				$ip = $_SERVER['HTTP_FORWARDED'];
			else if(isset($_SERVER['HTTP_CLIENT_IP']))
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			else
				$ip = 'UNKNOWN';
			return $ip;
		}
			
		$ip = getUserDropTempIP();
		
		
		$this->db->query("SELECT resettime FROM loginattempts WHERE ip = :ip");
		$this->db->bind(':ip', $ip);
		//Result is returned as a stdObject class
		$result = $this->db->single();

		$ctime = date('Y/m/d H:i:s', time());
		//Get only the string value from the stdObject class and convert so it can be compared with currentime!
		//Also check if result is set, execute code if it is set!
		if(is_object($result)){
			
			$rstime = $result->resettime;
			$resettime = strtotime($rstime);
			$currenttime = strtotime($ctime);

			//If more time have passed after the reset time(10 minutes) then delete row
			if($currenttime > $resettime){
				$this->db->query("DELETE FROM loginattempts WHERE ip = :ip");
				$this->db->bind(':ip', $ip);
				$this->db->execute();
			}
		}
		
	}
	
	
	public function loginAttempts(){
		
		//Check for IP    
		function getUserIP() {
			$ip = '';
			if (isset($_SERVER['REMOTE_ADDR']))
				$ip = $_SERVER['REMOTE_ADDR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED']))
				$ip = $_SERVER['HTTP_X_FORWARDED'];
			else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
				$ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
			else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
				$ip = $_SERVER['HTTP_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_FORWARDED']))
				$ip = $_SERVER['HTTP_FORWARDED'];
			else if(isset($_SERVER['HTTP_CLIENT_IP']))
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			else
				$ip = 'UNKNOWN';
			return $ip;
		}
			
		$ip = getUserIP();
		//Timeout for 10 minutes
		$resettime = date('Y/m/d H:i:s', time() + 60 * 10);

		//Check if IP exist, if so then create a table if not then update
		$this->db->query("SELECT * FROM loginattempts WHERE ip = :ip");
		$this->db->bind(':ip', $ip);
		
		//If the IP doesn't exist, create new table
		if(empty($this->db->resultSet())){
			//First attempt! Create table
			$attempt = 1;
			
			$this->db->query('INSERT INTO loginattempts (ip, resettime, attempt) VALUES (:ip, :resettime, :attempt)');
		
			$this->db->bind(':ip', $ip);
			$this->db->bind(':resettime', $resettime);
			$this->db->bind(':attempt', $attempt);
		
			//Execute function
			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
			
		}
		//If he IP exist then update the table, then increase the login attempt
		else{
			
			$this->db->query('UPDATE loginattempts SET resettime = :resettime, attempt = attempt + 1 WHERE ip = :ip');
			
			$this->db->bind(':ip', $ip);
			$this->db->bind(':resettime', $resettime);
			
			//Execute function
			if($this->db->execute()){
				return true;
			}else{
				return false;
			}
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
	
	
	public function uploadImage($image){
		
		$currenttime = date('Y/m/d H:i:s', time());
		$this->db->query('UPDATE users SET imageurl = :imageurl, changedate = :changedate, checked = 0 WHERE id = :id');
			
		//Bind values
		$this->db->bind(':imageurl', $image);
		$this->db->bind(':id', $_SESSION["user_id"]);
		$this->db->bind(':changedate', $currenttime);

		
		//Execute function
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	
	public function changeWebsite($data){
		
		$currenttime = date('Y/m/d H:i:s', time());
		
		$this->db->query('UPDATE users SET website = :website, changedate = :changedate, checked = 0 WHERE id = :id');
			
		//Bind values
		$this->db->bind(':website', $data['website']);
		$this->db->bind(':id', $_SESSION["user_id"]);
		$this->db->bind(':changedate', $currenttime);

		
		//Execute function
		if($this->db->execute()){
			$_SESSION["website"] = $data['website'];
			return true;
		}else{
			return false;
		}
		
	}
	
	
	public function changePassword($currentpassword){
		
		
		$this->db->query("SELECT * FROM users WHERE id = :id");
		//Bind value
		$this->db->bind(":id", $_SESSION["user_id"]);
		
		$row = $this->db->single();
		
		
		//Check if $row is set, if set then get password, if not then return an empty string
		if(is_object($row)){
			$hashedPassword = $row->password;
		}else{$hashedPassword = "";}
		
		if(password_verify($currentpassword, $hashedPassword)){
			return $row;
		}else{
			return false;
		}
		
		
	}
	
	public function changePasswordAfterValidation($newpassword){
		//If the password match then execute
		$this->db->query("UPDATE users SET password = :password WHERE id = :id");
		$this->db->bind(":password", $newpassword);
		$this->db->bind(":id", $_SESSION["user_id"]);
		$this->db->execute();
	}
	
	
	public function checkIfBanned(){
		
		//First check if user is banned!
		$id = $_SESSION["user_id"];
		$this->db->query("SELECT * FROM users WHERE id = :id AND usertype = :banned");
		$this->db->bind(':id', $id);
		$this->db->bind(':banned', "Banned");
		//if any results are returned then log the user out!
		if(!empty($this->db->resultSet())){
			$this->logout();
			exit();
		}
	}
	
	
	public function commentGame($data){
		
		$date = date('Y/m/d H:i:s', time());
		
		$this->db->query('INSERT INTO commentsgames (user_id, page_key, comment, date) VALUES (:user_id, :page_key, :comment, :date)');
			
		//Bind values
		$this->db->bind(':user_id', $_SESSION["user_id"]);
		$this->db->bind(':page_key', $data["page_key"]);
		$this->db->bind(':comment', $data["comment"]);
		$this->db->bind(':date', $date);

		
		//Execute function
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	
	public function getGameComments($page_key, $start) {
		
		$this->db->query("SELECT * FROM commentsgames JOIN users ON commentsgames.user_id = users.id WHERE users.usertype != :banned AND page_key = :page_key ORDER BY date DESC LIMIT :start, 10");
		
		$this->db->bind(':page_key', $page_key);
		$this->db->bind(':start', $start);
		$this->db->bind(':banned', "Banned");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	public function countGameComments($page_key) {
		
		$this->db->query("SELECT * FROM commentsgames JOIN users ON commentsgames.user_id = users.id WHERE users.usertype != :banned AND page_key = :page_key ORDER BY date DESC");
		
		$this->db->bind(':page_key', $page_key);
		$this->db->bind(':banned', "Banned");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	public function countGameCommentsAll() {
		
		$this->db->query("SELECT * FROM commentsgames JOIN users ON commentsgames.user_id = users.id WHERE users.usertype != :banned ORDER BY date DESC");
		
		$this->db->bind(':banned', "Banned");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	public function countPostCommentsAll() {
		
		$this->db->query("SELECT * FROM commentsposts JOIN users ON commentsposts.user_id = users.id WHERE users.usertype != :banned ORDER BY date DESC");
		
		$this->db->bind(':banned', "Banned");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	public function countAssetCommentsAll() {
		
		$this->db->query("SELECT * FROM commentsassets JOIN users ON commentsassets.user_id = users.id WHERE users.usertype != :banned ORDER BY date DESC");
		
		$this->db->bind(':banned', "Banned");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	//Admin section
	public function banUser($userid) {
	
		$this->db->query("UPDATE users SET usertype = :usertype WHERE id = :id");
		$this->db->bind(":usertype", "Banned");
		$this->db->bind(":id", $userid);
		$this->db->execute();
	
	}
	
	
	public function unbanUser($userid) {
	
		$this->db->query("UPDATE users SET usertype = :usertype WHERE id = :id");
		$this->db->bind(":usertype", "User");
		$this->db->bind(":id", $userid);
		$this->db->execute();
	
	}
	
	
	public function searchUsers($search) {
		$this->db->query("SELECT * FROM users WHERE username LIKE '%" . $search . "%' LIMIT 50");
		//$this->db->bind(":search", $search);
		$result = $this->db->resultSet();
		
		return $result;
		
	}

	public function searchGameComment($search) {
		$this->db->query("SELECT * FROM commentsgames JOIN users ON commentsgames.user_id = users.id WHERE comment LIKE '%" . $search . "%' LIMIT 50");
		//$this->db->bind(":search", $search);
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	public function searchPostComment($search) {
		$this->db->query("SELECT * FROM commentsposts JOIN users ON commentsposts.user_id = users.id WHERE comment LIKE '%" . $search . "%' LIMIT 50");
		//$this->db->bind(":search", $search);
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	public function searchAssetComment($search) {
		$this->db->query("SELECT * FROM commentsassets JOIN users ON commentsassets.user_id = users.id WHERE comment LIKE '%" . $search . "%' LIMIT 50");
		//$this->db->bind(":search", $search);
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	public function searchAllPosts($search) {
		$this->db->query("SELECT * FROM posts WHERE headline LIKE '%" . $search . "%' OR text1 LIKE '%" . $search . "%' OR text2 LIKE '%" . $search . "%' OR text3 LIKE '%" . $search . "%' OR text4 LIKE '%" . $search . "%'  LIMIT 5");
		//$this->db->bind(":search", $search);
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	public function adminGetLatestUserChanges() {
		
		$this->db->query("SELECT * FROM users ORDER BY changedate DESC");
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	public function countGameCommentsAllBannedUsers() {
		
		$this->db->query("SELECT * FROM commentsgames JOIN users ON commentsgames.user_id = users.id WHERE users.usertype = :banned ORDER BY date DESC");
		
		$this->db->bind(':banned', "Banned");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	public function countPostCommentsAllBannedUsers() {
		
		$this->db->query("SELECT * FROM commentsposts JOIN users ON commentsposts.user_id = users.id WHERE users.usertype = :banned ORDER BY date DESC");
		
		$this->db->bind(':banned', "Banned");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	public function countAssetCommentsAllBannedUsers() {
		
		$this->db->query("SELECT * FROM commentsassets JOIN users ON commentsassets.user_id = users.id WHERE users.usertype = :banned ORDER BY date DESC");
		
		$this->db->bind(':banned', "Banned");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	
	public function countAllPosts() {
		
		$this->db->query("SELECT * FROM posts ORDER BY date DESC");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	public function countPostsByCategory($category) {
		
		$this->db->query("SELECT * FROM posts WHERE category = :category ORDER BY date DESC");
		
		$this->db->bind(':category', $category);
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	public function getAllPosts($start) {
		
		$this->db->query("SELECT * FROM posts ORDER BY date DESC LIMIT :start, 5");
		
		$this->db->bind(':start', $start);
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	public function getPostsByCategory($start, $category) {
		
		$this->db->query("SELECT * FROM posts WHERE category = :category ORDER BY date DESC LIMIT :start, 5");
		
		$this->db->bind(':start', $start);
		$this->db->bind(':category', $category);
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	public function searchAllAssets($search) {
		$this->db->query("SELECT * FROM assets WHERE name LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%' OR alt LIKE '%" . $search . "%' LIMIT 15");
		//$this->db->bind(":search", $search);
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	public function countAllAssets() {
		
		$this->db->query("SELECT * FROM assets ORDER BY date DESC");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	public function countAssetsByCategory($category) {
		
		$this->db->query("SELECT * FROM assets WHERE category = :category ORDER BY date DESC");
		
		$this->db->bind(':category', $category);
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	public function getAssetsByCategory($start, $category) {
		
		$this->db->query("SELECT * FROM assets WHERE category = :category ORDER BY date DESC LIMIT :start, 15");
		
		$this->db->bind(':start', $start);
		$this->db->bind(':category', $category);
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	public function getAllAssets($start) {
		
		$this->db->query("SELECT * FROM assets ORDER BY date DESC LIMIT :start, 15");
		
		$this->db->bind(':start', $start);
		$result = $this->db->resultSet();
		
		return $result;
		
	}

	public function updateCountUsersAdmin($i) {

		$this->db->query('UPDATE users SET newusers = :newusers WHERE id = :id');
		$this->db->bind(':id', $_SESSION["user_id"]);
		$this->db->bind(':newusers', $i);
		$this->db->execute();
		
	}
	
	
	public function countUncheckedUsers() {
		
		$this->db->query("SELECT * FROM users WHERE checked = 0");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	public function adminClearLatestUserChanges() {
		
		$this->db->query('UPDATE users SET checked = 1 WHERE checked = 0');
		
		$this->db->execute();
		
	}
	
	
	public function clearGameComments($i) {

		$this->db->query('UPDATE users SET newgamecomments = :newgamecomments WHERE id = :id');
		$this->db->bind(':id', $_SESSION["user_id"]);
		$this->db->bind(':newgamecomments', $i);
		$this->db->execute();
		
	}
	
	public function clearPostComments($i) {

		$this->db->query('UPDATE users SET newpostcomments = :newpostcomments WHERE id = :id');
		$this->db->bind(':id', $_SESSION["user_id"]);
		$this->db->bind(':newpostcomments', $i);
		$this->db->execute();
		
	}
	
	
	public function clearAssetComments($i) {

		$this->db->query('UPDATE users SET newassetcomments = :newassetcomments WHERE id = :id');
		$this->db->bind(':id', $_SESSION["user_id"]);
		$this->db->bind(':newassetcomments', $i);
		$this->db->execute();
		
	}

	
	
}

?>