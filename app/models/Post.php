<?php
class Post {
	
	private $db;
	
	public function __construct() {
		
		$this->db = new Database;
		
	}
	
	
	public function getAllPosts() {
		
		$this->db->query("SELECT * FROM posts ORDER BY date DESC");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	
	public function getLatestPost() {
		
		$this->db->query("SELECT * FROM posts ORDER BY id ASC");
		
		$result = $this->db->resultSet();
		
		return $result;
		
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
	
	
	public function submitPost($data) {
		//Set categoryname
		$setCategory = "";
		if($data["category"] == "general"){$setCategory = "General";}
		if($data["category"] == "3p"){$setCategory = "3P";}
		if($data["category"] == "2020aspaceodyssey"){$setCategory = "2020: A Space Odyssey";}
		if($data["category"] == "paperworld"){$setCategory = "Paper World";}
		
		$currenttime = date('Y/m/d H:i:s', time());
		$this->db->query('INSERT INTO posts (date, headline, headlineimage, text1, image1, alt1, text2, image2, alt2, text3, image3, alt3, text4, category, setcategory) VALUES (:date, :headline, :headlineimage, :text1, :image1, :alt1, :text2, :image2, :alt2, :text3, :image3, :alt3, :text4, :category, :setcategory)');
		
		$this->db->bind(':date', $currenttime);
		$this->db->bind(':headline', $data["headline"]);
		$this->db->bind(':headlineimage', $data["headlineimage"]);
		$this->db->bind(':text1', $data["text1"]);
		$this->db->bind(':image1', $data["image1"]);
		$this->db->bind(':alt1', $data["alt1"]);
		$this->db->bind(':text2', $data["text2"]);
		$this->db->bind(':image2', $data["image2"]);
		$this->db->bind(':alt2', $data["alt2"]);
		$this->db->bind(':text3', $data["text3"]);
		$this->db->bind(':image3', $data["image3"]);
		$this->db->bind(':alt3', $data["alt3"]);
		$this->db->bind(':text4', $data["text4"]);
		$this->db->bind(':category', $data["category"]);
		$this->db->bind(':setcategory', $setCategory);
		
		//Execute function
		if($this->db->execute()){return true;}else{return false;}
		
	}
	
	
	public function getPostComments($page_key, $start) {
		
		$this->db->query("SELECT * FROM commentsposts JOIN users ON commentsposts.user_id = users.id WHERE users.usertype != :banned AND page_key = :page_key ORDER BY date DESC LIMIT :start, 10");
		
		$this->db->bind(':page_key', $page_key);
		$this->db->bind(':start', $start);
		$this->db->bind(':banned', "Banned");
		
		$result = $this->db->resultSet();
		
		return $result;
		
	}
	
	public function countPostComments($page_key) {
		
		$this->db->query("SELECT * FROM commentsposts JOIN users ON commentsposts.user_id = users.id WHERE users.usertype != :banned AND page_key = :page_key ORDER BY date DESC");
		
		$this->db->bind(':page_key', $page_key);
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
	
	
	public function commentPost($data){
		
		//Get the headline from the posts
		$this->db->query("SELECT * FROM posts WHERE id = :id");
		$this->db->bind(':id', $data["id"]);
		$getHeadline = $this->db->single();
		
		$headline = $getHeadline->headline;
		
		$date = date('Y/m/d H:i:s', time());
		
		$this->db->query('INSERT INTO commentsposts (user_id, page_key, comment, headline, date) VALUES (:user_id, :page_key, :comment, :headline, :date)');
			
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
	
	
	public function checkPostExist($id) {
		
		$this->db->query("SELECT * FROM posts WHERE id = :id");
		
		$this->db->bind(':id', $id);
		
		//Check if email is already registered
		if(!empty($this->db->resultSet())){
			return true;
		}else{
			return false;
		}
		
	}
	
	
	
	
}