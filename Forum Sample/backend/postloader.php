<?php 
	require 'dbloader.php';
	$datget = new DatabaseGetter("forumdb");
	if (!empty($_GET['catid'])) {
		$pid = $_GET['catid'];
		$query = "SELECT * FROM topics WHERE topic_cat='$pid' ORDER BY topic_date DESC";
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