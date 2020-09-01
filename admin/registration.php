<?php
require_once './dbconn.php';
session_start();

if(isset($_POST['registration'])){
    //print_r($_POST);
    //var_dump($_POST);
    //var_dump($_FILES);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    //$photo = $_FILES['photo']['name'];
    //echo $photo;
    $photo = explode('.', $_FILES['photo']['name']);
    //var_dump($photo);
    $photo = end($photo);
    //echo $photo;
    //$photo_name = $username.'.'.$photo;
    $photo_name = 'users_images/'.$username.'.'.$photo;
    //echo $photo_name;

    $input_array = array();
    //print_r($input_array);
    if(empty($name)){
        $input_array['name'] = 'The Name field is required.';
    }
    //print_r($input_array);
    if(empty($email)){
        $input_array['email'] = 'The Email field is required.';
    }
    if(empty($username)){
        $input_array['username'] = 'The Username field is required.';
    }
    if(empty($password)){
        $input_array['password'] = 'The Password field is required.';
    }
    if(empty($c_password)){
        $input_array['c_password'] = 'The Confirm password field is required.';
    }
    //var_dump($input_array);
    //echo count($input_array);

   /* if (count($input_array) == 0){
        echo 'yes';
    }else{
        echo 'no';
    }*/
    if (count($input_array) == 0){
        $query = "SELECT * FROM users WHERE email = '$email'";
        $email_check = mysqli_query($link, $query);
        //print_r($email_check);
        //var_dump($email_check);

        if (mysqli_num_rows($email_check) == 0){
            //echo 'yes';
            $query = "SELECT * FROM users WHERE username = '$username'";
            $username_check = mysqli_query($link, $query);
            if (mysqli_num_rows($username_check) == 0){
                //echo 'yes';
                if (strlen($username) > 7){
                    //echo 'yes';
                    if (strlen($password) > 7){
                        //echo 'yes';
                        if ($password === $c_password){
                            //echo 'yes';
                            $password = md5($password);
                            $query = "INSERT INTO users(name, email, username, password, photo, status) 
VALUES('$name', '$email', '$username', '$password', '$photo_name', 'inactive')";
                            $result = mysqli_query($link, $query);
                            if ($result){
                                $_SESSION['data_insert_success'] = "Data Insert Success";
                                //move_uploaded_file($_FILES['photo']['tmp_name'], 'users_images/'.$photo_name);
                                move_uploaded_file($_FILES['photo']['tmp_name'], $photo_name);
                                header('location:registration.php');
                                exit();
                            }else{
                                $_SESSION['data_insert_error'] = "Data Insert Not Success";
                            }

                        }else{
                            //echo 'no';
                            $password_match_error = 'Your Password not match.';
                        }

                    }else{
                        //echo 'no';
                        $password_len_error = 'This Password must be 8 characters or upper.';
                    }

                }else{
                    //echo 'no';
                    $username_len_error = 'This Username must be 8 characters or upper.';
                }

            }else{
                //echo 'no';
                $username_error = 'This Username already exists.';
            }

        }else{
            //echo 'no';
            $email_error = 'This Email address already exists.';
        }
    }


}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Registration Form</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: #222; color: #fff">

<div class="container animate__animated animate__shakeX">
    <h1 class="text-center">Student Management System</h1>
    <br>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <h2 class="text-center">User Registration Form</h2>
            <br>
                <?php if (isset($_SESSION['data_insert_success'])){ echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';} ?>
                <?php if (isset($_SESSION['data_insert_error'])){ echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';} ?>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label" for="name">Name</label>
<!--                            <input type="text" class="form-control" name="name" id="name">-->
                            <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($name)){echo $name;} ?>">
                        </div>
                        <label class="error">
                           <?php
                           if (isset($input_array['name'])){
                               echo $input_array['name'];
                           }
                           ?>
                        </label>

                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php if(isset($email)){echo $email;} ?>">
                        </div>
                        <label class="error">
                            <?php
                            if (isset($input_array['email'])){
                                echo $input_array['email'];
                            }
                            ?>
                        </label>
                        <label class="error">
                            <?php
                            if (isset($email_error)){
                                echo $email_error;
                            }
                            ?>
                        </label>

                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?php if(isset($username)){echo $username;} ?>">
                        </div>
                        <label class="error">
                            <?php
                            if (isset($input_array['username'])){
                                echo $input_array['username'];
                            }
                            ?>
                        </label>
                        <label class="error">
                            <?php
                            if (isset($username_error)){
                                echo $username_error;
                            }
                            ?>
                        </label>
                        <label class="error">
                            <?php
                            if (isset($username_len_error)){
                                echo $username_len_error;
                            }
                            ?>
                        </label>

                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password" value="<?php if(isset($password)){echo $password;} ?>">
                        </div>
                        <label class="error">
                            <?php
                            if (isset($input_array['password'])){
                                echo $input_array['password'];
                            }
                            ?>
                        </label>
                        <label class="error">
                            <?php
                            if (isset($password_len_error)){
                                echo $password_len_error;
                            }
                            ?>
                        </label>

                        <div class="form-group">
                            <label class="control-label" for="c_password">Confirm Password</label>
                            <input type="text" class="form-control" name="c_password" id="c_password" value="<?php if(isset($c_password)){echo $c_password;} ?>">
                        </div>
                        <label class="error">
                            <?php
                            if (isset($input_array['c_password'])){
                                echo $input_array['c_password'];
                            }
                            ?>
                        </label>
                        <label class="error">
                            <?php
                            if (isset($password_match_error)){
                                echo $password_match_error;
                            }
                            ?>
                        </label>

                        <div class="form-group">
                            <label class="control-label" for="photo">Photo</label>
                            <input type="file" class="form-control" name="photo" id="photo">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="sub"></label>
                            <input type="submit" class="form-control btn btn-info" name="registration" value="Registration" id="sub">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <br>
    <p class="text-center">If You have an account ? then please <a href="login.php">Login</a></p>
    <hr style="background: red;">
    <footer>
        <p class="text-center">Copyright &copy; 2017 - <?= date('Y'); ?> All Rights Reserved.</p>
    </footer>
</div>

<script src="../js/bootstrap.min.js"></script>
</body>
</html>


