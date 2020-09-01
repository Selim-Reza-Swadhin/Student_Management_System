<?php
require_once 'dbconn.php';
session_start();
if (!isset($_SESSION['user_username_login'])) {
    header('location:login.php');
    exit();
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management System Admin Panel</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="style.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.js"></script>
    <script>
        $('document').ready(function () {
            $('#datatable').DataTable();
        });
    </script>
</head>
<body class="bg-success">
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">STUDENT MANAGEMENT SYSTEM</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!--                <li><a href=""> <img style="width: 25px;height: 30px;border-radius: 50%; margin-top: -4px" src="images/-->
                <? //= $_SESSION['user_photo_login'];?><!--" alt="no image">&nbsp;&nbsp; Welcome <span style="color: #4cae4c">-->
                <? //= ucwords($_SESSION['user_username_login']); ?><!--</span></a></li>-->
                <li><a href=""> <img style="width: 30px;height: 30px;border-radius: 50%; margin-top: -4px"
                                     src="<?= $_SESSION['user_photo_login']; ?>" alt="no image">&nbsp;&nbsp; Welcome
                        <span style="color: #4cae4c"><?= ucwords($_SESSION['user_username_login']); ?></span></a></li>
                <li><a href="registration.php"><i class="fa fa-user-plus"></i> Add Users</a></li>
                <li><a href="index.php?page=user_profile"><i class="fa fa-user"></i> Profile</a></li>
                <style>
                    li .logout:hover {
                        color: red !important;
                        font-size: 20px;
                    }

                    .faoff {
                        color: red;
                    }
                </style>
                <li><a class="logout" href="logout.php" title="<?= ucwords($_SESSION['user_username_login']); ?>"><i
                                class="fa fa-power-off faoff"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div class="list-group">
                <a class="list-group-item active" href="index.php?page=dashboard"><i class="fab fa-dashcube"></i> Dashboard</a>
                <a class="list-group-item" href="index.php?page=add_student"><i class="fa fa-user-plus"></i> Add Student</a>
                <a class="list-group-item" href="index.php?page=all_students"><i class="fa fa-users"></i> All Students</a>
                <a class="list-group-item" href="index.php?page=all_users"><i class="fa fa-user"></i> All Users</a>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="content">
                <?php //require_once 'dashboard.php';?>
                <?php
                //index.php?page=dashboard here page is variable
                //$_GET[] is url
                   //echo $_GET['page'].'.php';
                   //$page = $_GET['page'].'.php';
                if (isset($_GET['page'])){
                    $page = $_GET['page'].'.php';
                }else{
                    $page = 'dashboard.php';
                    //header('location:dashboard.php');
                    //exit();
                }

                   //require_once $page;
                if (file_exists($page)){
                    require_once $page;
                }else{
                    //echo '<h2 class="text-center text-danger">File Not Found</h2>';
                    require_once '404.php';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<footer class="footer-area">
    <p>Copyright &copy; 2017 - <?= date('Y'); ?> Students Management System. All Rights Are Reserved.</p>
</footer>


</body>
</html>