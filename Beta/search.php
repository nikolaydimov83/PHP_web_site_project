<?php

$link = mysqli_connect("localhost", "", "","forumdb") or
    die("Could not connect: " . mysql_error());

$searchExp=$_GET['term'];
$numberResults=$_GET['results'];
$sql1 = mysqli_query($link,"SELECT * FROM searchengine WHERE pagecontent LIKE '%$searchExp%'");

while($ser = mysqli_fetch_assoc($sql1)){
	 echo "<h2><a href='$ser[pageurl]'>$ser[pageurl]</a></h2>"; 
}

?>


	<a href="./index.php">Go Back</a>
