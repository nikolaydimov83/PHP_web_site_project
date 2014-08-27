<?php 
define("ROOT_URL", 'http://' . $_SERVER['HTTP_HOST'] . '/Forum Sample/');
define("ROOT_PATH", dirname(__FILE__));
$sesstat = session_status();
if (empty($_SESSION) && $sesstat == PHP_SESSION_NONE) {
	session_start();
}
	 ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled</title>
        <script src="res/platform/platform.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <link rel="import" <?php echo 'href="' . ROOT_URL . "res/forum-question/forum-question.html\"";?>>
        <link rel="import" <?php echo 'href="' . ROOT_URL . "res/forum-post/forum-post.html\"";?>>
        <link rel="import" <?php echo 'href="' . ROOT_URL . "res/forum-answer/forum-answer.html\"";?>>
        <link rel="import" <?php echo 'href="' . ROOT_URL . "res/forum-category/forum-category.html\"";?>>
        <link rel="import" <?php echo 'href="' . ROOT_URL . "res/paper-button/paper-button.html\"";?>>
        <link rel="stylesheet" type="text/css" <?php echo 'href="' . ROOT_URL . "styles/topbar.css\""; ?>>
        <link rel="stylesheet" type="text/css" <?php echo 'href="' . ROOT_URL . "styles/footer.css\""; ?>>
        
    </head>
    <body>
		<header>
			<div id="topbar">
			<div id="backbutton"><<</div>
			<div id="topbarcontain">
				<div id="title"><h2 id="titleText"><a <?php echo 'href="' . ROOT_URL . "index.php\""?>>Lorem ipsum dolor sit amet, consectetur.</a></h2></div>
				<div id="userinfo">
					<div id="userdiv"><span>Welcome, <?php if (!empty($_SESSION['user_name'])) {
						echo "<strong>", $_SESSION['user_name'], "</strong>!";?>
						<br>
						<a href= <?php echo '"' . ROOT_URL ."forum/signout.php".'"'?>>Sign Out</a>

						<?php
					}else{
						echo "guest";
						} ?></span></div>

						<br>
						<div id="useractions">
					<?php if (empty($_SESSION['user_name'])){ ?>
					Please
						<a href="./forum/signup.php">Register</a> or
						<a href= <?php echo '"' . ROOT_URL ."forum/signin.php".'"'?>>Login</a>
					<?php } else{ ?>
					<?php } ?>
					</div>
				</div>
				</div>
			</div>
		</header>        
		