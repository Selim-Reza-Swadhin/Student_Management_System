<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
</head>
<body class="bg-info">

<div class="container animate__animated animate__shakeY">
    <br>
    <a class="btn btn-primary pull-right" href="admin/login.php">Login</a>
    <br><br>
    <h1 class="text-center">Welcome to Student Management System</h1>
    <br>

    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="" method="post">
                <table class="table table-bordered">
                    <tr>
                        <td colspan="2" class="text-center">
                            <label  for="">Student Information</label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="choose">Choose Class</label>
                        </td>
                        <td>
                            <select  class="form-control" name="choose" id="choose">
                                <option value="">Select</option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="roll">Roll No.</label>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="roll" id="roll" pattern="[0-9]{6}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"  class="text-center">
                            <input class="btn btn-info" type="submit" name="show_info" value="Show Info">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <br><br>

    <?php
    require_once 'admin/dbconn.php';
    if (isset($_POST['show_info'])){

        $choose = $_POST['choose'];
        $roll = $_POST['roll'];
        $result = mysqli_query($link, "select * from student_info where class = '$choose' and roll = '$roll'");
        if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);?> <!-- single data, so not use while loop-->
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <table class="table table-bordered bg-primary">
                        <tr>
                            <td rowspan="6">
                                <img class="img-thumbnail" style="width: 150px; height: 160px" src="admin/student_image/<?= $row['photo'];?>" alt="no image">
                            </td>
                            <td>Name</td>
                            <td><?= ucwords($row['name']); ?></td>
                        </tr>
                        <tr>
                            <td>Roll</td>
                            <td><?= $row['roll']; ?></td>
                        </tr>
                        <tr>
                            <td>Class</td>
                            <td><?= $row['class']; ?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><?= ucwords($row['city']); ?></td>
                        </tr>
                        <tr>
                            <td>Parent Contact</td>
                            <td><?= $row['p_contact']; ?></td>
                        </tr>
                        <tr>
                            <td>Reg. Date</td>
                            <td><?= date(' h:i:s a Y-M-d', strtotime($row['datetime'])); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
       <?php }else{?>
            <script> alert('Data Not Found.'); </script>
   <?php }} ?>



</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
