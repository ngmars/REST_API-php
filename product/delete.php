<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");

//include database and object files
// include database and object files
include_once '../config/database.php';
include_once '../objects/posts.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$posts = new posts($db);

//Get the raw posted data
$data = json_decode(file_get_contents("php://input"));

//Set ID to update 

$posts->id = $data->id;


//delete post 
if($posts->delete()){
	echo json_encode(array('message'=> ' Post Deleted '));

}else{
	echo json_encode(array('message'=> ' Post not Deleted '));
}