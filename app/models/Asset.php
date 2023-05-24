<?php
class Asset {
	
	private $db;
	
	public function __construct() {
		
		$this->db = new Database;
		
	}
	
	
	public function getUsers() {
		
		$this->db->query("SELECT * FROM users ORDER BY deletetime DESC");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	public function checkIfBanned(){
		
		//First check if user is banned!
		$id = $_SESSION["user_id"];
		$this->db->query("SELECT * FROM users WHERE id = :id AND usertype = :banned");
		$this->db->bind(':id', $id);
		$this->db->bind(':banned', "Banned");
		//if any results are returned then log the user out!
		if(!empty($this->db->resultSet())){
			unset($_SESSION["user_id"]);
			unset($_SESSION["username"]);
			unset($_SESSION["email"]);
			unset($_SESSION["website"]);
			unset($_SESSION["validated"]);
			unset($_SESSION["usertype"]);
			unset($_SESSION["imageurl"]);
			header("location:" . URLROOT . "/users/login");
			exit();
		}
	}



	public function submitAsset($data) {
		//Set categoryname
		$setCategory = "";
		if($data["category"] == "sprites"){$setCategory = "Sprites";}
		if($data["category"] == "textures"){$setCategory = "Textures";}
		if($data["category"] == "backgrounds"){$setCategory = "Backgrounds";}
		
		$currenttime = date('Y/m/d H:i:s', time());
		$this->db->query('INSERT INTO assets (name, description, url, alt, category, setcategory, date, type, size) VALUES (:name, :description, :image, :alt, :category, :setcategory, :date, :type, :size)');
		
		$this->db->bind(':name', $data["name"]);
		$this->db->bind(':description', $data["description"]);
		$this->db->bind(':image', $data["image"]);
		$this->db->bind(':alt', $data["alt"]);
		$this->db->bind(':category', $data["category"]);
		$this->db->bind(':setcategory', $setCategory);
		$this->db->bind(':date', $currenttime);
		$this->db->bind(':type', $data["type"]);
		$this->db->bind(':size', $data["size"]);
		
		//Execute function
		if($this->db->execute()){return true;}else{return false;}
		
	}
	
	
	
	
	public function checkAssetExist($id) {
		
		$this->db->query("SELECT * FROM assets WHERE id = :id");
		
		$this->db->bind(':id', $id);
		
		//Check if email is already registered
		if(!empty($this->db->resultSet())){
			return true;
		}else{
			return false;
		}
		
	}
	
	
	public function getAssetComments($page_key, $start) {
		
		$this->db->query("SELECT * FROM commentsassets JOIN users ON commentsassets.user_id = users.id WHERE users.usertype != :banned AND page_key = :page_key ORDER BY date DESC LIMIT :start, 10");
		
		$this->db->bind(':page_key', $page_key);
		$this->db->bind(':start', $start);
		$this->db->bind(':banned', "Banned");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	public function countAssetComments($page_key) {
		
		$this->db->query("SELECT * FROM commentsassets JOIN users ON commentsassets.user_id = users.id WHERE users.usertype != :banned AND page_key = :page_key ORDER BY date DESC");
		
		$this->db->bind(':page_key', $page_key);
		$this->db->bind(':banned', "Banned");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	
	public function getAllAssets() {
		
		$this->db->query("SELECT * FROM assets ORDER BY date DESC");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	
	public function getLatestAsset() {
		
		$this->db->query("SELECT * FROM assets ORDER BY id ASC");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	
	public function commentAsset($data){
		
		//Get the headline from the posts
		$this->db->query("SELECT * FROM assets WHERE id = :id");
		$this->db->bind(':id', $data["id"]);
		$getHeadline = $this->db->single();
		
		$headline = $getHeadline->name;
		
		$date = date('Y/m/d H:i:s', time());
		
		$this->db->query('INSERT INTO commentsassets (user_id, page_key, comment, headline, date) VALUES (:user_id, :page_key, :comment, :headline, :date)');
			
		//Bind values
		$this->db->bind(':user_id', $_SESSION["user_id"]);
		$this->db->bind(':page_key', $data["page_key"]);
		$this->db->bind(':comment', $data["comment"]);
		$this->db->bind(':headline', $headline);
		$this->db->bind(':date', $date);

		
		//Execute function
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
		
	}


}