		<footer>
			<div>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
				<div>
					<ul>
						<li><h4> <?php echo $row['devName']; ?> </h4></li>
						<li><?php echo "<a href='", $row['devLinkedIn'], "\">"; ?>LinkedIn</a></li>
						<li><?php echo "<a href='", $row['devBlog'], "\">"; ?>Blog</a></li>
						<li><?php echo "<a href='", $row['devGit'], "\">"; ?>Git</a></li>
						<li><?php echo "<a href='", $row['devSoftuni'], "\">"; ?>Softuni Profile</a></li>
					</ul>
				</div>
				<?php } ?>
			</div>
		</footer>
    </body>
</html>