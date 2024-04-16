<?php require_once "includes/redirection.php" ?>
<?php require_once "includes/header.php" ?>
<?php require_once "includes/sidebar.php" ?>

<div id="main">
    <h1>Create category</h1>
    <p>
        Add new categories in order to the users can use them to create their posts.
    </p>

    <form action="actions/save-category.php" method="POST">
        <label for="name">Name of the category: </label>
        <input type="text" name="name" />

        <input type="submit" value="save" />
    </form>

</div>          

<?php require_once "includes/footer.php" ?>