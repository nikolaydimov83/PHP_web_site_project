<?php
mysql_connect("localhost", "USERNAME", "PASSWORD");
mysql_select_db("test");

$sql = mysql_query("SELECT * FROM searchengine WHERE pagecontent LIKE '%$_GET[term]%' LIMIT 0,$_GET[results]");
while($ser = mysql_fetch_array($sql)) { echo "<h2><a href='$ser[pageurl]'>$ser[pageurl]</a></h2>"; }

?>
<hr>
<a href="./index.php">Go Back</a>
