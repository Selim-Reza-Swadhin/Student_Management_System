<h1 class="text-primary"><i class="fa fa-user"></i> User Profile <small>My Profile</small>
</h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fab fa-dashcube"></i> Dashboard</a></li>
    <li><i class="fa fa-user"></i> Profile</li>
</ol>

<?php
//echo $_SESSION['user_username_login'];
$session_user = $_SESSION['user_username_login'];
$user_data = mysqli_query($link, "select * from users where username = '$session_user'");
$user_row = mysqli_fetch_assoc($user_data);//single data so no use while loop
?>

<div class="row">
    <div class="col-sm-6">
        <table class="table table-bordered">

            <tr>
                <td>User Id</td>
                <td><?= $user_row['id']; ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?= ucwords($user_row['name']); ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?= ucwords($user_row['username']); ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $user_row['email']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?= ucwords($user_row['status']); ?></td>
            </tr>
            <tr>
                <td>Signup Date</td>
                <td><?= $user_row['date_time']; ?></td>
            </tr>
        </table>
        <a class="btn btn-primary pull-right" href="">Edit Profile</a>

    </div>
    <div class="col-sm-6">
        <a href="">
            <img class="img-thumbnail" width="150" height="170" src="<?= $user_row['photo'];?>" alt="">
        </a>
        <br>
        <br>
        <?php
        if (isset($_POST['upload'])){
            //print_r($_FILES);
            //var_dump($_FILES);
            //$photo = $_FILES['pic']['name'];
            //echo $photo;
            $photo = explode('.', $_FILES['pic']['name']);
            //var_dump($photo);
            $photo_e = end($photo);
            //echo $photo;
            //$photo_name = $username.'.'.$photo_e;
            //$session_user = $_SESSION['user_username_login'];
            //$photo_name = $session_user.'.'.$photo_e;//if not send folder
            $photo_name = 'users_images/'.$session_user.'.'.$photo_e;//if send folder
            //echo $photo_name;
            $update_photo = "UPDATE users 
                             SET
                             photo = '$photo_name'
                             WHERE username = '$session_user'";
           $update_run = mysqli_query($link, $update_photo);
           if ($update_run){
               //move_uploaded_file($_FILES['pic']['tmp_name'], 'users_images/'.$photo_name);//if not send folder
               move_uploaded_file($_FILES['pic']['tmp_name'], $photo_name);//if send folder
           }
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="pic">Profile Picture</label>
            <input type="file" name="pic" id="pic" required>
            <br>
            <input class="btn btn-sm btn-info" type="submit" name="upload" value="Upload Photo">
        </form>
    </div>
</div>
