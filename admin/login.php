<?php
require_once './dbconn.php';
session_start();
if (isset($_SESSION['user_username_login'])){
    header('location:index.php');
    exit();
}

if (isset($_POST['login'])){
    //print_r($_POST);
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM users WHERE username = '$username'";
    $username_check = mysqli_query($link, $query);
    if (mysqli_num_rows($username_check) > 0){
        //echo 'yes';
        $row = mysqli_fetch_assoc($username_check);
        //print_r($row);
        //print_r($row['photo']);
        //exit();
        if ($row['password'] == $password){
            //echo 'yes';
            if ($row['status'] === 'active'){
                //echo 'yes';
                //$_SESSION['user_username_login'] = $username;
                $_SESSION['user_username_login'] = $row['username'];
                $_SESSION['user_photo_login'] = $row['photo'];
                header('location:index.php');
            }else{
                //echo 'no';
                $status_not_active = "Your status is not active.";
            }
        }else{
           //echo 'no';
            $password_not_found = "This password is not found.";
        }
    }else{
        //echo 'no';
        $username_not_found = "This username is not found.";
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
    <title>Student Management System</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
</head>
<body style="background: #222; color: #fff">

<div class="container animate__animated animate__shakeX">
    <h1 class="text-center">Student Management System</h1>
    <br>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <h2 class="text-center">Admin Login Form</h2>
            <form action="" method="post">
                <div>
                    <label for="name">Username </label>
                    <input type="text" class="form-control" name="username" id="name" placeholder="Enter Username" required  value="<?php if (isset($username)){echo $username;} ?>">
                </div>
                <br>
                <div>
                    <label for="pass">Password </label>
                    <input type="text" class="form-control" name="password" id="pass" placeholder="Enter Password" required value="<?php if (isset($password)){echo $password;} ?>">
                </div>
                <br>
                <div>
                    <input type="submit" class="btn btn-info pull-right" name="login" value="Login">
                </div>
                <a href="registration.php">Back</a>
            </form>
            <br>
        <?php
        if (isset($username_not_found)){
            echo '<div class="alert alert-danger">'.$username_not_found.'</div>';
        }
        if (isset($password_not_found)){
            echo '<div class="alert alert-danger">'.$password_not_found.'</div>';
        }
        if (isset($status_not_active)){
            echo '<div class="alert alert-danger">'.$status_not_active.'</div>';
        }
        ?>
    </div>
    </div>
</div>

<script src="../js/bootstrap.min.js"></script>
</body>
</html>


