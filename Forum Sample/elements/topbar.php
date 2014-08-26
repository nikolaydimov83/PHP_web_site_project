<?php 
define("ROOT_URL", 'http://' . $_SERVER['HTTP_HOST'] . '/forom/');
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
        <link rel="import" <?php echo 'href="' . ROOT_URL . "res/forum-question/forum-question.html\""?>>
        <link rel="import" <?php echo 'href="' . ROOT_URL . "res/forum-post/forum-post.html\""?>>
        <link rel="import" <?php echo 'href="' . ROOT_URL . "res/forum-answer/forum-answer.html\""?>>
        <link rel="import" <?php echo 'href="' . ROOT_URL . "res/forum-category/forum-category.html\""?>>
        <link rel="import" <?php echo 'href="' . ROOT_URL . "res/paper-button/paper-button.html\""?>>
        <link rel="stylesheet" href="../styles/footer.css" type="text/css">
        <link rel="stylesheet" href="../styles/signup.css" type="text/css">
        <link rel="stylesheet" href="../styles/signin.css" type="text/css">
        <style>
        body{
        	margin: 0px;
        	font-family: "Open Sans", "Roboto", helvetica, arial, sans-serif;

        }
			#topbar{
				height: 100px;
				width: 100%;
				display: block;
				background-color: #66023C;
				margin-bottom: 20px;
				color:white;
			}
			#title{
				float: left;
				display: inline-block;
				height: 100%;
				font-weight: lighter;
				font-size: 1.5em;
				text-overflow: ellipsis;
				width: 50%;
				overflow: hidden;
			}
			#title a{
				text-decoration: none;
				color:white;
				width: 100%;
				text-overflow: ellipsis;
				overflow: hidden;
				transition: color 0.5s ease;
			}
			#title a:hover{
				color: #FF355E;
				transition: color 0.5s ease;
			}
			forum-answer{
				display: block;
			}
			#topbarcontain *{
				display: inline-block;
			}
			#topbar h2{
				width: 100%;
				margin: 0px;
				margin-top: 20px;
				vertical-align: middle;
				overflow: hidden;
				height: inherit;
				text-overflow: ellipsis;
				white-space: nowrap;
			}
			#userinfo{
				float:right;
				margin-top: 20px;
				margin-right: 5%;
			}
			#userdiv{
				font-size: 1.3em;
			}
			#userdiv a{

				color: #FF355E;
				text-decoration: none;
				padding: 5px;
				font-size: 1em;
				font-weight: bold;

				transition: color 0.4s ease;
			}
			#userdiv a:hover{
				color: white;
				transition: color 0.4s ease;
			}
			#topbarcontain{
				width: 80%;
				display: block;
				margin-left: auto;
				margin-right: auto;
				text-transform: capitalize;
			}
			#backbutton{
				max-height: 100%;
				display: none;
				float:left;
				vertical-align: middle;
				text-align: center;
				padding: 25px;
				font-size: 35px;
				box-shadow: 2px;
				user-select: none;
				--moz-user-select: none;
				-webkit-user-select:none;
			}
			#backbutton:hover{

				background-color: #FF355E;
				transition: background 0.8s ease;
			}
			#activearea{
				width: 80%;
				margin-left: auto;
				margin-right: auto;
				min-height: 100%
			}

			paper-button.colored[raisedButton]{
				background-color: cadetblue;
				color:white;
			}
        </style>
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
		