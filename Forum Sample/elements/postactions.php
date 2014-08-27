<?php session_start() ?>
<?php if (isset($_SESSION['user_level'])): ?>
	<?php if ($_SESSION['user_level'] == 2): ?>
		<!-- <paper-button raisedbutton class="actionbutton right red">Sticky Post</paper-button> -->
		<!-- <paper-button raisedbutton class="actionbutton right class="colored blue"">Mark as Important</paper-button> -->
		<!-- <paper-button raisedbutton class="actionbutton right class="colored blue"">Archive</paper-button> -->
		<paper-button raisedbutton class="actionbutton left red">Ban</paper-button>
		<paper-button raisedbutton class="actionbutton left class="colored blue"">Delete</paper-button>
		<paper-button raisedbutton class="actionbutton right">Report</paper-button>
		<paper-button raisedbutton class="actionbutton left">Edit</paper-button>
		<paper-button raisedbutton class="actionbutton left" onclick="getReplyForm()">Reply</paper-button>
	<?php endif ?>
	<?php if ($_SESSION['user_level'] == 1): ?>
		<!-- <paper-button raisedbutton class="actionbutton right class="colored blue"">Mark as Important</paper-button> -->
		<!-- <paper-button raisedbutton class="actionbutton right class="colored blue"">Archive</paper-button> -->
		<paper-button raisedbutton class="actionbutton left class="colored blue"">Delete</paper-button>
		<paper-button raisedbutton class="actionbutton left class="colored blue"">Edit</paper-button>
		<paper-button raisedbutton class="actionbutton right">Report</paper-button>
		<paper-button raisedbutton class="actionbutton left" onclick="getReplyForm()">Reply</paper-button>
	<?php endif ?>
	<?php if ($_SESSION['user_level'] == 0): ?>
		<?php if ($_GET['topic_by'] == $_SESSION['user_id']): ?>
			<paper-button raisedbutton class="actionbutton left class="colored blue"">Edit</paper-button>
			<paper-button raisedbutton class="actionbutton left class="colored blue"">Delete</paper-button>
		<?php endif ?>
		<paper-button raisedbutton class="actionbutton right">Report</paper-button>
		<paper-button raisedbutton class="actionbutton left" onclick="getReplyForm()">Reply</paper-button>
	<?php endif ?>
<?php endif ?>