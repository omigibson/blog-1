<?php
session_start();

require 'database.php';
require 'header.php';

$statement = $pdo->prepare("SELECT * FROM posts
INNER JOIN users ON posts.userID = users.id");
$statement->execute();
$blog = $statement ->fetchALL(PDO::FETCH_ASSOC);
?>
<div class="wrapper">
	<div class="posts">
		
		<img src="img/watch3.jpeg" width="800px" alt="glasses">
		
		<?php
			foreach($blog as $blogpost) { ?>
			<div class="blogpost">
			
				<div class="blogpost__image"></div>
				
				<div class="blogpost__text">
					<div class="blogpost__text--meta">
						<a href="single_post.php"><h2><?= $blogpost['title'] ?></h2></a>
						<small>
							By <?=  $blogpost['username'] ?> in
								<?= $blogpost['category'] ?> 
								<?= $blogpost['created'] ?>
						</small>
					</div>
					<div class="blogpost__text--bodytext">
						<p><?= $blogpost['post'] ?></p>
					</div>
				</div>
			</div>
		<?php } ?>
	</div> <!-- close .posts -->
</div> <!--wrapper-->

<?php
	require 'footer.php';
?>