<?php require_once 'connection.php'; ?>
<?php require_once "helpers.php"; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Video Games Blog</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
    </head>
    <body>
        <header id="header">
            <div id="logo">
                <a href="index.php">
                    Video Games Blog
                </a>
            </div>        

            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Start</a>
                    </li>
                    <?php
                        $categories = get_categories();
                        if(!empty($categories)):
                            while($category = mysqli_fetch_assoc($categories)): 
                    ?>                    
                        <li>
                            <a href="category.php?id=<?=$category['id']?>"><?=$category['name']?></a>                            
                        </li>
                    <?php
                            endwhile;
                        endif;
                    ?>

                    <li>
                        <a href="about-me.php">About me</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </nav>
            <div class="clearfix" ></div>
        </header>
        <div id="container">