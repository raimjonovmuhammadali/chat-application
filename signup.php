<?php

require 'db.php';
$uploadfile = "images/";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $avatar = $_FILES['avatar']['name'] ;
    $target_file = "./images/$avatar";
    $targetFileForItem = "images/$avatar";
    
    move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);

    $sql = "INSERT INTO users (username,password,avatar) VALUES (:username, :password, :avatar)";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute([
        "username" => $username,
        "password" => $password,
        "avatar" => $avatar,
    ]);

    header("Location: login.php");
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
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username kiriting" name="username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Parol</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Parol yarating" name="password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Profil uchun rasm</label>
            <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Parol yarating" name="avatar">
        </div>
        <div class="form-group">
            <a href="login.php" style="color: white;">Allaqachon ro'yhatdan o'tganmisiz?</a>
        </div><br>
        <button type="submit" class="btn btn-primary"  name="submit">Ro'yhatdan o'tish</button>
    </form>
</body>
</html>