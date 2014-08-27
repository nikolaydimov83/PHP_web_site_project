<?php
include 'dbloader.php';
$dbget = new DatabaseGetter('forumdb');
// $replyCount = ' SELECT IFNULL(COUNT(id), 0) AS total FROM topic_reply GROUP BY topic_id';
$query = 'SELECT * FROM topics ORDER BY topic_id ASC';
$result = $dbget->FindData($query);
while ($rows = mysqli_fetch_assoc($result)) {
	$query = "SELECT post_topic FROM posts ORDER BY post_id DESC";
	$innerResult = $dbget->FindData($query);
	$replyCount = 0;
	$currentID = $rows['topic_id'];
	while ($innerrows = mysqli_fetch_assoc($innerResult)) {
		echo "i'm inside!";
		if ($currentID == $innerrows['post_topic']) {
			$replyCount++;
		}
	}
	$query = "UPDATE topics SET topic_replies='$replyCount' WHERE topic_id='$currentID'";
	$dbget->FindData($query);
}
 ?>