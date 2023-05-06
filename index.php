<?php
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="./assets/css/main.css">
	<title>Chat Application</title>
</head>
<body>
<section class="msger">
  <header class="msger-header">
    <div class="msger-header-title">
      <i class="fas fa-comment-alt"></i> Chat Application
    </div>
    <div class="msger-header-options">
		<?php if(!isset($_SESSION['user'])): ?>
		<?php if(isset($_REQUEST)): ?>
			<a href="signup.php"><span><i class="fa-solid fa-user" style="color: green;"></i></span></a>
		<?php endif; ?>
		<?php endif; ?>
		<?php if(isset($_SESSION['user'])): ?>
			<a href="logout.php"><span><i class="fa-solid fa-right-from-bracket" style="color: green;"></i></span></a>
		<?php endif; ?>
    </div>
  </header>

  <main class="msger-chat" style="border: none; display: flex;flex-direction: column-reverse;">
    
	<div id="chat" >
		<?php if(isset($_SESSION['user'])): ?>
		<?php require 'chat.php'; ?>
		<?php endif; ?>
		<?php if(!isset($_SESSION['user'])): ?>
		<span>Xabarlarni ko'rish uchun ro'yhatdan o'tishingiz shart!</span>
		<?php endif; ?>
	</div>

  </main>

  <form class="msger-inputarea" method="POST" action="insertmsg.php">
    <?php if(isset($_SESSION['user'])): ?>
    <?php if(isset($_REQUEST)): ?>
		<input type="text" class="msger-input" placeholder="Enter your message..." name="message">
		<input type="hidden" name="getid" value='<?=$_GET['id'];?>'>
    	<button type="submit" class="msger-send-btn" name="submit">Send</button>
	<?php endif;?>
	<?php endif;?>
	<?php if(!isset($_SESSION['user'])): ?>
	<?php if(!isset($_REQUEST)): ?>
		<a href="signup.php" class="msger-input btn btn-primary " style="text-decoration: none; color: white; background: blue">Ro'yhatdan o'tish</a>
	<?php endif;?>
	<?php endif;?>
  </form>
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!-- <script>
	let chat = document.querySelector('.msger-chat');
	chat.document.scroll(0, 1);
</script> -->
</html>