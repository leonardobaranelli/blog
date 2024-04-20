<?php require_once "includes/redirection.php" ?>
<?php require_once "includes/header.php" ?>
<?php require_once "includes/sidebar.php" ?>

<div id="main">
    <h1>My profile</h1>    
    
    <?php if(isset($_SESSION['completed'])): ?>
        <div class="alert alert-success">
            <?php $_SESSION['completed']?>
        </div>
    <?php elseif(isset($_SESSION['errors']['general'])): ?>        
        <div class="alert alert-error">
            <?php $_SESSION['errors']['general']?>
        </div>
    <?php endif; ?>
    
    <form action="actions/update-user.php" method="POST">
        <label form="name">Name</label>
        <input type="text" name="name" value="<?=$_SESSION['user']['name']; ?>"/>
        <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'name') : ''; ?>
        
        <label form="last_name">Last name</label>
        <input type="text" name="last_name" value="<?=$_SESSION['user']['last_name']; ?>"/>
        <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'last_name') : ''; ?>
        
        <label form="email">Email</label>
        <input type="email" name="email" value="<?=$_SESSION['user']['email']; ?>"/>
        <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'email') : ''; ?>

        <input type="submit" name="submit" value="Update" />
    </form>
    <?php clean_errors(); ?>
</div>          

<?php require_once "includes/footer.php" ?>
