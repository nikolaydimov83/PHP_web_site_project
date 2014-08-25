<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled</title>
        <script src="res/platform/platform.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <link rel="import" href='res/forum-question/forum-question.html'>
        <link rel="import" href='res/forum-post/forum-post.html'>
        <link rel="import" href='res/forum-answer/forum-answer.html'>
        <link rel="import" href='res/forum-category/forum-category.html'>
        <link rel="import" href='./res/paper-button/paper-button.html'>
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
			#useractions a{

				color: #FF355E;
				text-decoration: none;
				padding: 5px;
				font-size: 1.2em;
				font-weight: bold;

				transition: color 0.4s ease;
			}
			#useractions a:hover{
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
			<div id="topbarcontain">
				<div id="title"><h2 id="titleText">	Lorem ipsum dolor sit amet, consectetur.</h2></div>
				<div id="userinfo">
					<div id="userdiv"><span>Welcome, <?php if (!empty($_SESSION['user'])) {
						echo "<strong>", $_SESSION['user'], "</strong>";
					}else{
						echo "guest";
						} ?>!</span></div>

						<br>
						<div id="useractions">
					<?php if (empty($_SESSION['user'])){ ?>
					Please
						<a href="">Register</a> or
						<a href="">Login</a>
					<?php } else{ ?>
						<button>View</button>
					<?php } ?>
					</div>
				</div>
				</div>
			</div>
		</header>        
		