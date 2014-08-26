<?php 
	include ('dbloader.php');
	if (!empty($_GET['getname'])) {
		$toget = $_GET['threadID'];
		$getter = new DatabaseGetter("forumdb");
		$query = "SELECT * FROM users WHERE user_id='$toget' ORDER BY user_id DESC";
		$result = $getter->FindData($query);

		$row = mysqli_fetch_assoc($result);

		echo $row['user_name'];
	}
 ?>