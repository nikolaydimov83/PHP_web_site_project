<section id="activearea">
<?php
    $getter;
    $getter = new DatabaseGetter("forumdb");

    $categoryQuery = "SELECT * FROM categories ORDER BY cat_id DESC";
    $resultCategories = $getter->FindData($categoryQuery);

    // $postQuery = "SELECT * FROM topics WHERE topic_cat='$selectedcat' ORDER BY topic_id DESC";
    // $resultPosts = $getter->FindData($postQuery); 
?>

	<script src="elements/js/Postopener.js"></script>
    <!-- // Start looping posts with polymer -->
   	<div id="catdiv">
    <?php while($rows=mysqli_fetch_assoc($resultCategories)){ ?>
		<forum-category <?php echo' catid="', $rows['cat_id'], '" catname="', $rows['cat_name'],'" description="', $rows['cat_description'],'" onclick="openCategory(this)"'; ?>></forum-category>
	<?php } ?>
	</div>
	<div id="postdiv">
		
	</div>
	<div id="replydiv">
	</div>

	<div id="answerdiv">
	</div>
		<a href= <?php echo '"' . ROOT_URL . "forum/create_topic.php\""; ?>><paper-button raisedButton class="colored">Create Topic</paper-button></a>
		<?php if (!empty($_SESSION['user_level'])):  
			if ($_SESSION['user_level'] == 1) : ?>
				<a href= <?php echo '"' . ROOT_URL . "forum/create_cat.php\"";?>><paper-button raisedButton class="red colored">Create Category</paper-button></a>
		<?php endif; endif ?>
</section>
	