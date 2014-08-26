<?php
    require 'dbloader.php';
    $getter;
    $getter = new DatabaseGetter("forumdb");

    $categoryQuery = "SELECT * FROM categories ORDER BY cat_id DESC";
    $resultCategories = $getter->FindData($categoryQuery);

    // $postQuery = "SELECT * FROM topics WHERE topic_cat='$selectedcat' ORDER BY topic_id DESC";
    // $resultPosts = $getter->FindData($postQuery); 
?>
    <?php while($rows=mysqli_fetch_assoc($resultCategories)){ ?>
		<forum-category <?php echo' catid="', $rows['cat_id'], '" catname="', $rows['cat_name'],'" description="', $rows['cat_description'],'" onclick="openCategory(this)"'; ?>></forum-category>
	<?php } ?>