<?php
    if(isset($_POST)){
        require_once "includes/connection.php";    

        $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
        $last_name = isset($_POST['last_name']) ? mysqli_real_escape_string($db, $_POST['last_name']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

        $errors = array();

        if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
            $name_validate = true;
        }else{
            $name_validate = false;
            $errors['name'] = 'The name is not valid';
        }

        if(!empty($last_name) && !is_numeric($last_name) && !preg_match("/[0-9]/", $last_name)){
            $last_name_validate = true;
        }else{
            $last_name_validate = false;
            $errors['last_name'] = 'The last name is not valid';
        }

        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_validate = true;
        }else{
            $email_validate = false;
            $errors['email'] = 'The email is not valid';
        }

        if(!empty($password)){
            $password_validate = true;
        }else{
            $password_validate = false;
            $errors['password'] = 'The password is empty';
        }    

        $save_user = false;

        if(count($errors) == 0){
            $save_user = true;        
            $password_safe = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

            $sql = "INSERT INTO users VALUES(null, '$name', '$last_name', '$email', '$password_safe', CURDATE());";
            $save = mysqli_query($db, $sql);

            if($save){
                $_SESSION['completed'] = "User registered successfully";
            }else{
                $_SESSION['completed']['general'] = "Falied to save user";
            }

        }else{
            $_SESSION['errors'] = $errors;
        }
    }
    
    header('Location: index.php');
?>