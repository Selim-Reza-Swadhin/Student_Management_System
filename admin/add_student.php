<?php
//all connection index.php page
//require_once 'dbconn.php';
?>
<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small>Add new student</small>
</h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fab fa-dashcube"></i> Dashboard</a></li>
    <li><i class="fa fa-user-plus"></i> add student</li>
</ol>

<!--add student php code-->
<?php
if (isset($_POST['add-student'])){
    //print_r($_POST);
    //print_r($_FILES);
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $city = $_POST['city'];
    $p_contact = $_POST['p_contact'];

    //$picture = $_FILES['photo']['name'];
    //echo $picture;
    $picture = explode('.', $_FILES['photo']['name']);
    //echo $picture; //not working
    //print_r($picture);
    $picture_ext = end($picture);
    //print_r($picture_ext);
    //echo $picture_ext;
    $picture_name = $roll.'.'.$picture_ext;
    //print_r($picture_name);

    //$query = "INSERT INTO student_info(name, roll, class, city, p_contact, photo, datetime) VALUES ('$name', '$roll', '$class', '$city', '$p_contact', '$picture_name', NOW())";
    $query = "INSERT INTO student_info(name, roll, class, city, p_contact, photo) VALUES ('$name', '$roll', '$class', '$city', '$p_contact', '$picture_name')";
    $result = mysqli_query($link, $query);

    if ($result){
        $success = "Data insert success";
        move_uploaded_file($_FILES['photo']['tmp_name'], 'student_image/'.$picture_name);
      }else{
        $error = "Data insert not success";
    }
}
?>


<div class="row">
    <?php if (isset($success))echo '<p class="alert alert-success col-sm-8">'.$success.'</p>';?>
    <?php if (isset($error))echo '<p class="alert alert-warning col-sm-8">'.$error.'</p>';?>
</div>
<div class="row">
    <div class="col-sm-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name : </label>
                <input class="form-control" type="text" name="name" id="name" required placeholder="Student name..">
            </div>
            <div class="form-group">
                <label for="roll">Roll : </label>
                <input class="form-control" type="text" name="roll" id="roll" required pattern="[0-9]{6}" placeholder="Student roll..">
            </div>
            <div class="form-group">
                <label for="class">Class : </label>
                <select class="form-control" name="class" id="class" required>
                    <option value="">Select Class</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                </select>
            </div>
           <!-- <div class="form-group">
                <label for="city">City : </label>
                <input class="form-control" type="text" name="city" id="city" required placeholder="Student city..">
            </div>-->

            <div class="form-group">
                <label for="city">City : </label>
                <select class="form-control" name="city" id="city" required>
                    <option value="">Select City</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Rongpur">Rongpur</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Chitagong">Chitagong</option>
                    <option value="Monmonsing">Monmonsing</option>
                    <option value="Barisal">Barisal</option>
                    <option value="Faridpur">Faridpur</option>
                    <option value="Kumilla">Kumilla</option>
                </select>
            </div>
            <div class="form-group">
                <label for="p_contact">Parent Contact : </label>
                <input class="form-control" type="text" name="p_contact" id="p_contact" required pattern="01[1|3|5|6|7|8|9][0-9]{8}" placeholder="Student parent phone..">
            </div>
            <div class="form-group">
                <label for="photo">Student Photo : </label>
                <input class="form-control" type="file" name="photo" id="photo" required>
            </div>
            <div class="form-group">
                <label for="add-student"></label>
                <input class="form-control btn-primary" type="submit" name="add-student" id="add-student" value="Add Student">
            </div>
        </form>
    </div>
</div>
