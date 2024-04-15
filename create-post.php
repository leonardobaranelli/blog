<?php require_once "includes/redirection.php" ?>
<?php require_once "includes/header.php" ?>
<?php require_once "includes/sidebar.php" ?>

<div id="main">
    <h1>Create Post</h1>   
    
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