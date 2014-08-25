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
    <?php while($rows=mysqli_fetch_assoc($resultCategories)){ ?>
		<forum-category <?php echo' catid="', $rows['cat_id'], '" catname="', $rows['cat_name'],'" description="', $rows['cat_description'],'" onclick="openCategory(this)"'; ?>>
		<div id="posts">
			<paper-button>Thing</paper-button>
		</div>
		</forum-category>
	<?php } ?>
	<div id="postdiv">
		<div id="replydiv">
			
		</div>
	</div>
	<paper-button raisedButton>Post Topic</paper-button>
		<paper-button raisedButton>Post Topic</paper-button>
		<paper-button raisedButton class="colored">Delete topic</paper-button>
		<a href="register.php"><paper-button raisedButton class="colored">Delete topic</paper-button></a>
</section>
<!-- <forum-post <?php echo' postid="', $rows['topic_id'], '" topic="', $rows['topic_subject'],'" views="', $rows['view'],'" replies="', $rows['reply'], '" date="', $rows['datetime'], '" detail="', $rows['detail'], '" onclick="openPost(this)"'; ?>></forum-post> -->