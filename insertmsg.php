<?php
require 'db.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

	$message = $_POST['message'];
	$user = $_SESSION['user'];
	$getid = $_POST['getid'];

	$sql = $conn -> prepare("SELECT * FROM users");
	$sql -> execute();
	$user = $sql -> fetchAll();

	$avatar = '';
	foreach($user as $row){
		if($_SESSION['user'] == $row['username']){
			$username = $row['username'];
		}
		if($getid == $row['id']){
			$avatar = $row['avatar'];
		}
	}
	$stmt = $conn -> prepare("INSERT INTO chat_info(name, msg, user_id, avatar) VALUES (:name, :msg, :user_id, :avatar)");
	
	$stmt -> execute([
		'name' => $username,
		'msg' => $message,
		'user_id' => $getid,
		'avatar' => $avatar,
	]);

	header("Location: index.php?id=$getid");
	
}
?>