<?php
//all connection index.php page
//require_once 'dbconn.php';
?>
<h1 class="text-primary"><i class="fa fa-pencil-alt"></i> Update Student <small>Update student</small>
</h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fab fa-dashcube"></i> Dashboard</a></li>
    <li><a href="index.php?page=all_students"><i class="fab fa-users"></i> All Students</a></li>
    <li><i class="fa fa-pencil-alt"></i> update student</li>
</ol>

<?php
//edit student info
$id = base64_decode($_GET['id']);
//echo $id;
$query = "Select * from student_info where id ='$id'";
$db_data = mysqli_query($link, $query);
//print_r($db_data);
$db_row = mysqli_fetch_assoc($db_data);
//print_r($db_row);
//exit();

//update student info
if (isset($_POST['update-student'])){
    //print_r($_POST);
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $city = $_POST['city'];
    $p_contact = $_POST['p_contact'];


    $update_query = "UPDATE student_info
                     SET 
                     name ='$name',
                     roll ='$roll',
                     class ='$class',
                     city ='$city',
                     p_contact ='$p_contact' 
                     WHERE id = '$id'";
    $result = mysqli_query($link, $update_query);

    if ($result){
       header('location:index.php?page=all_students');
        
    }


}
?>



<div class="row">
    <div class="col-sm-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name : </label>
                <input class="form-control" type="text" name="name" id="name" required value="<?= $db_row['name'];?>">
            </div>
            <div class="form-group">
                <label for="roll">Roll : </label>
                <input class="form-control" type="text" name="roll" id="roll" required pattern="[0-9]{6}" value="<?= $db_row['roll'];?>">
            </div>
            <div class="form-group">
                <label for="class">Class : </label>
                <select class="form-control" name="class" id="class" required>
                    <option value="">Select Class</option>
                    <option <?= $db_row['class'] == '1st' ? 'selected=""' : '';?> value="1st">1st</option>
                    <option <?= $db_row['class'] == '2nd' ? 'selected=""' : '';?> value="2nd">2nd</option>
                    <option <?= $db_row['class'] == '3rd' ? 'selected=""' : '';?> value="3rd">3rd</option>
                    <option <?= $db_row['class'] == '4th' ? 'selected=""' : '';?> value="4th">4th</option>
                    <option <?= $db_row['class'] == '5th' ? 'selected=""' : '';?> value="5th">5th</option>
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
                    <option <?= $db_row['city'] == 'Dhaka' ? 'selected=""' : '';?> value="Dhaka">Dhaka</option>
                    <option <?= $db_row['city'] == 'Rajshahi' ? 'selected=""' : '';?> value="Rajshahi">Rajshahi</option>
                    <option <?= $db_row['city'] == 'Rongpur' ? 'selected=""' : '';?> value="Rongpur">Rongpur</option>
                    <option <?= $db_row['city'] == 'Khulna' ? 'selected=""' : '';?> value="Khulna">Khulna</option>
                    <option <?= $db_row['city'] == 'Sylhet' ? 'selected=""' : '';?> value="Sylhet">Sylhet</option>
                    <option <?= $db_row['city'] == 'Chitagong' ? 'selected=""' : '';?> value="Chitagong">Chitagong</option>
                    <option <?= $db_row['city'] == 'Monmonsing' ? 'selected=""' : '';?> value="Monmonsing">Monmonsing</option>
                    <option <?= $db_row['city'] == 'Barisal' ? 'selected=""' : '';?> value="Barisal">Barisal</option>
                    <option <?= $db_row['city'] == 'Faridpur' ? 'selected=""' : '';?> value="Faridpur">Faridpur</option>
                    <option <?= $db_row['city'] == 'Comilla' ? 'selected=""' : '';?> value="Comilla">Comilla</option>
                </select>
            </div>
            <div class="form-group">
                <label for="p_contact">Parent Contact : </label>
                <input class="form-control" type="text" name="p_contact" id="p_contact" required pattern="01[1|3|5|6|7|8|9][0-9]{8}" value="<?= $db_row['p_contact'];?>">
            </div>
            <div class="form-group">
                <label for="update-student"></label>
                <input class="form-control btn-primary" type="submit" name="update-student" id="update-student" value="Update Student">
            </div>
        </form>
    </div>
</div>
