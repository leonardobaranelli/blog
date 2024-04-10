<?php require_once "includes/header.php" ?>
<?php require_once "includes/sidebar.php" ?>

<!--MAIN BOX-->
<div id="main">
    <h1>Latest posts</h1>

    <?php 
        $posts = get_latest_posts();
        if(!empty($posts)):
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
        endif;
    ?>
    <div id="see-all">
        <a href="posts.php">See all the posts</a>
    </div>          
</div>
<?php require_once "includes/footer.php" ?>