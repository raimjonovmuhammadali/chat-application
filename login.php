<?php

require 'db.php';
session_start();
$invalid = '';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    

    $sql = $conn -> prepare("SELECT * FROM users");
    $sql -> execute();
    $user = $sql -> fetchAll();

    foreach($user as $row){
        if($row['username'] == $username){
            if($row['password'] == $password){
                $_SESSION['user'] = $row['username'];
                header("Location: index.php?id=".$row['id']);
            }else{
                $invalid = "Username yoki parol xato!";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets./css/form.css">
    <title>Chat Application | Login Form</title>
</head>
<body style="flex-direction: column;">
    <span style="margin-bottom: 8px; color: white; text-align: left;"><?=$invalid; ?></span><br>
    <form method="POST" action="">
        <div class="form-group">
            <label for="exampleInputEmail1">Ismingiz</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ismingizni kiriting"  name="username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Parol</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Parol yarating"  name="password">
        </div>
        <div class="form-group">
            <a href="signup.php" style="color: white;">Ro'yhatdan o'tish</a>
        </div><br>
        <button type="submit" class="btn btn-primary" name="submit">Kirish</button>
    </form>
</body>
</html>