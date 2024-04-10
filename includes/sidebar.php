<aside id="sidebar">

    <?php if(isset($_SESSION['user'])): ?>
        <div id="login" class="block-aside">
            <?= 'Welcome '.$_SESSION['user']['name'].' '.$_SESSION['user']['last_name']; ?>                        
            <a href="logout.php" class="_button green-button">Create post</a>
            <a href="logout.php" class="_button ">Create category</a>
            <a href="logout.php" class="_button orange-button">My profile</a>
            <a href="logout.php" class="_button red-button">Logout</a>
        </div>
    <?php endif; ?>        
   
    <?php if(!isset($_SESSION['user'])): ?>
    <div id="login" class="block-aside">
        <h3>Sign in</h3>

        <?php if(isset($_SESSION['error_login'])): ?>        
            <div class="alert error-alert">
                <?php echo $_SESSION['error_login'] ?>                        
            </div>
        <?php endif; ?>    

        <form action="login.php" method="POST">
            <label form="email">Email</label>
            <input type="email" name="email" />

            <label form="password">Password</label>
            <input type="password" name="password" />

            <input type="submit" value="Log In" />
        </form>
    </div>
    
    <div id="register" class="block-aside">

        <h3>Sign up</h3>
        <?php if(isset($_SESSION['completed'])): ?>
            <div class="alert alert-success">
                <?php $_SESSION['completed']?>
            </div>
        <?php elseif(isset($_SESSION['errors']['general'])): ?>        
            <div class="alert alert-error">
                <?php $_SESSION['errors']['general']?>
            </div>
        <?php endif; ?>
        
        <form action="register.php" method="POST">
            <label form="name">Name</label>
            <input type="text" name="name" />
            <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'name') : ''; ?>
            
            <label form="last_name">Last name</label>
            <input type="text" name="last_name" />
            <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'last_name') : ''; ?>
            
            <label form="email">Email</label>
            <input type="email" name="email" />
            <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'email') : ''; ?>

            <label form="password">Password</label>
            <input type="password" name="password" />
            <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'password') : ''; ?>

            <input type="submit" name="submit" value="Register" />
        </form>
        <?php clean_errors(); ?>
    </div>
    <?php endif; ?>
</aside>