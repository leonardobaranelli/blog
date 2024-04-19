<?php require_once "includes/redirection.php" ?>
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
    <h1>Edit Post</h1>
    <p>
        Edit your post <?=$current_post['title'];?>
    </p>
    
    <form action="actions/save-post.php" method="POST">
        <label for="title">Title:</label>
        <input type="title" name="title" />
        <?php echo isset($_SESSION['post_errors']) ? show_error($_SESSION['post_errors'], 'title') : ''; ?>
        
        <label for="description">Description:</label>
        <textarea name="description"></textarea>
        <?php echo isset($_SESSION['post_errors']) ? show_error($_SESSION['post_errors'], 'description') : ''; ?>

        <label for="Categpry">Categpry:</label>
        <select name="category">
            <?php 
                $categories = get_categories();
                if(!empty($categories)):
                    while($category = mysqli_fetch_assoc($categories)):
                    ?>
                        <option value="<?=$category['id']?>">
                            <?=$category['name']?>
                        </option>
                    <?php
                endwhile;
                endif;             
            ?>    
        </select>
        <?php echo isset($_SESSION['post_errors']) ? show_error($_SESSION['post_errors'], 'category') : ''; ?>

        <input type="submit" value="save" />
    </form>
    <?php clean_errors(); ?>
</div>          

<?php require_once "includes/footer.php" ?>