<?php session_start() ?>
<?php if (isset($_GET['reply'])): ?>
	<?php if (!empty($_SESSION['user_id'])): ?>
		<section id="post">
			<form method="post">
				<textarea name="replycontent" id="replytext" cols="30" rows="10"></textarea>
			</form>	
			<paper-button raisedbutton class="colored" onclick="sendReply()">Post</paper-button>
		</section>
	<?php else :?>
		<div id="warning">
			You must be <a <?php echo 'href="' . ROOT_URL . 'forum/signin.php"'; ?> class="fancy">logged in</a> to continue!
		</div>
	<?php endif; ?>
<?php endif; ?>