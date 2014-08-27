<?php 
	include 'dbloader.php';

	$dbget = new DatabaseGetter('forumdb');
	$viewedTopicID = $_POST['viewedTopicID'];

	// $replyCount = ' SELECT IFNULL(COUNT(id), 0) AS total FROM topic_reply GROUP BY topic_id';
	$query = "SELECT topic_views FROM topics WHERE topic_id=$viewedTopicID";
	$results = $dbget->FindData($query);
	$row = mysqli_fetch_assoc($results);
	$views = $row['topic_views'];
	$views += 1;
	$query = "UPDATE topics SET topic_views='$views' WHERE topic_id=$viewedTopicID";	
	$dbget->FindData($query);
 ?>