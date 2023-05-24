<?php
//Load the model and the view
class Controller{
	
	protected function model($model){
		//Require model file
		require_once "../app/models/" . $model . ".php";
		//Instantiate model
		return new $model();
	}
	
	//Load the view and check for the file
	protected function view($view , $data = []){
		//Check if file exists, if so then it will be required!
		if(file_exists("../app/views/" . $view . ".php")){
			
			require_once "../app/views/" . $view . ".php";
			
		}else{
			die("View does not exist.");
		}
		
	}
	
}
?>