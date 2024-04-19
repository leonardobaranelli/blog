<?php require_once "includes/connection.php" ?>
<?php require_once "includes/helpers.php" ?>
<?php
    $current_category = get_category($_GET['id']);
    if(!isset($current_category)){
        header("Location: index.php");        
    }
    ?>
<?php require_once "includes/header.php" ?>
<?php require_once "includes/sidebar.php" ?>


<!--MAIN BOX-->
<div id="main">    

    <h1>Post of <?=$current_category['name']?></h1>

    <?php 
        $posts = get_posts(null, $_GET['id']);        
        if(!empty($posts) && mysqli_num_rows($posts) >= 1):
            while($post = mysqli_fetch_assoc($posts)):
                ?>
                <article class="post">
                    <a href="post.php?id=<?=$post['id']?>">
                        <h2><?=$post['title']?></h2>
                        <span class="date"><?=$post['category'].' | '.$post['date']?></span>
                        <p>
                            <?= substr($post['description'], 0, 180)."..." ?>
                        </p>
                    </a>    
                </article>    
                <?php
            endwhile;
        else:
    ?>
        <div class="alert">This category is empty</div>    
    <?php endif; ?>    
</div>
<?php require_once "includes/footer.php" ?>