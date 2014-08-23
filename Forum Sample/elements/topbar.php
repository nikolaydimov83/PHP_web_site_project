<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled</title>
        <script src="res/platform/platform.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="import" href="res/forum-post/forum-post.html">
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
				display: inline-block;
				height: 100%;
				width: 50%;
				text-align: center;
				font-weight: lighter;
				font-size: 1.5em;
			}
			#topbar *{
				display: inline-block;
			}
			#userinfo{
				margin-left: 20%;
			}
        </style>
    </head>
    <body>
		<header>
			<div id="topbar">
				<div id="title"><h2>PHP Forum Teamwork</h2></div>
				<div id="userinfo">
					<div id="userdiv"><span>Welcome, <?php if (!empty($_SESSION['user'])) {
						echo $_SESSION['user'];
					}else{
						echo "guest";
						} ?>!</span></div>
						<br>
					<paper-button></paper-button>
					<paper-button></paper-button>

					<button>Register</button>
					<button>Login</button>
				</div>
			</div>
		</header>        


