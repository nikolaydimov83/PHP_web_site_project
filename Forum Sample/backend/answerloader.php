<?php 
	require 'dbloader.php';
	$datget = new DatabaseGetter("forumdb");
	if (!empty($_GET['getvalues'])) {
		$pid = $_GET['postid'];
		$query = "SELECT * FROM posts WHERE post_topic='$pid' ORDER BY post_date DESC";
		$data = $datget->FindData($query);
		while ($row = mysqli_fetch_assoc($data)) {
			$result[] = $row;
		}
		foreach ($result as $key => $value) {
			$wantedValue = $value['post_by'];
			$query = "SELECT * FROM users WHERE user_id='$wantedValue'";
			$data = $datget->FindData($query);
			$quickres = mysqli_fetch_assoc($data);
			$value['post_by'] = $quickres['user_name'];
		}
	}
	if (isset($result)) {
		$jsonArray = json_encode($result);
		echo "$jsonArray";
	}
 ?>