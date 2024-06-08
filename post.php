<?php require_once "includes/connection.php" ?>
<?php require_once "includes/helpers.php" ?>
<?php
    $current_post = get_post($_GET['id']);

    if(!isset($current_post)){
        header("Location: index.php");        
    }
?>
<?php require_once "includes/header.php" ?>
<?php require_once "includes/sidebar.php" ?>

<!--MAIN BOX-->
<div id="main">
    <h1><?=$current_post['title']?></h1>
	
	<a href="category.php?id=<?=$current_post['category_id']?>">
		<h2><?=$current_post['category']?></h2>
	</a>
	<h4><?=$current_post['date']?> | <?=$current_post['user'] ?></h4>
	<p>
		<?=$current_post['description']?>
	</p>
	
	<?php if(isset($_SESSION["user"]) && $_SESSION['user']['id'] == $current_post['user_id']): ?>
		<br/>	
		<a href="edit-post.php?id=<?=$current_post['id']?>" class="_button green-button">Edit post</a>
		<a href="delete-post.php?id=<?=$current_post['id']?>" class="_button">Delete post</a>
	<?php endif; ?>
</div>
<?php require_once "includes/footer.php" ?>