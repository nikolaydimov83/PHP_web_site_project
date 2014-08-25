<?php 
	require 'dbloader.php';
	$datget = new DatabaseGetter("forumdb");
	if (!empty($_GET['getvalues'])) {
		$pid = $_GET['postid'];
		$query = "SELECT * FROM posts WHERE post_topic='$pid' ORDER BY a_datetime DESC";
		$data = $datget->FindData($query);
		while ($row = mysqli_fetch_assoc($data)) {
			$result[] = $row;
		}
	}
	if (isset($result)) {
		$jsonArray = json_encode($result);
		echo "$jsonArray";
	}
 ?>