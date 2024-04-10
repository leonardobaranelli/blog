<?php
    function show_error($errors, $field){
        $alert = '';
        if(isset($errors[$field]) && !empty($field)){
            $alert = "<div class='alert alert-error'>".$errors[$field]."</div>";
        }

        return $alert;
    }
   
    function clean_errors(){
        $deleted = false;        
      
        if(isset($_SESSION['errors'])){
            $_SESSION['errors'] = null;
            $deleted = true;
        }

        if(isset($_SESSION['post_errors'])){
            $_SESSION['post_errors'] = null;
            $deleted = true;
        }

        if(isset($_SESSION['completed'])){
            $_SESSION['completed'] = null;
            $deleted = true;
        }

        return $deleted;
    }

    function get_categories(){
        global $db;

        $sql = 'SELECT * FROM categories ORDER BY id ASC;';
        $categories = mysqli_query($db, $sql);              

        $result = array();
        if($categories && mysqli_num_rows($categories) >= 1){
            $result = $categories;
        }

        return $result;
    }
  
    function get_category($id){
        global $db;

        $sql = "SELECT * FROM categories WHERE id = $id;";
        $categories = mysqli_query($db, $sql);
        
        $result = array();
        if($categories && mysqli_num_rows($categories) >= 1){
            $result = mysqli_fetch_assoc($categories);
        }
        
        return $result;
    }

    function get_latest_posts(){
        global $db;
        
        $sql = "SELECT p.*, c.* FROM posts p ".
               "INNER JOIN categories c ON p.category_id = c.id ".
               "ORDER BY p.id DESC LIMIT 4;";
        $posts = mysqli_query($db, $sql);

        $result = array();
        if($posts && mysqli_num_rows($posts) >= 1){
            $result = $posts;
        }

        return $result;
    }

    function get_post($id){
        global $db;

        $sql = "SELECT p.*, c.name AS 'category', CONCAT(u.name, ' ', u.last_name) AS user ".
               "FROM posts p ".
               "INNER JOIN categories c ON p.category_id = c.id ".
               "INNER JOIN users u ON p.user_id = u.id ".
               "WHERE p.id = $id;";
        $post = mysqli_query($db, $sql);
        
        $result = array();
        if($post && mysqli_num_rows($post) >= 1){
            $result = mysqli_fetch_assoc($post);
        }
        
        return $result;
    }
?>

