<?php
mysql_connect("localhost", "USERNAME", "PASSWORD");
mysql_select_db("DATABASE");
$pagedata = htmlspecialchars(file_get_contents($_POST['url']));
$pagedata = str_replace("'","",$pagedata);
mysql_query("INSERT INTO searchengine VALUES ('','$_POST[url]','$pagedata')");
echo "URL Added.<br><a href='./addurl.php'>Continue...</a>";
?>