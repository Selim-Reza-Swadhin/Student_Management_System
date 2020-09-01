
<h1 class="text-primary"><i class="fab fa-dashcube"></i> Dashboard <small>Statistics Overview</small>
</h1>
<ol class="breadcrumb">
    <li class="active"><i class="fab fa-dashcube"></i> Dashboard</li>
</ol>

<?php
//total student count
$count_student = mysqli_query($link, "select * from student_info");
//print_r($count_student);
$total_student = mysqli_num_rows($count_student);
//echo $total_student;

//total users count
$count_users = mysqli_query($link, "select * from users");
//print_r($count_users);
$total_users = mysqli_num_rows($count_users);
//echo $total_users;
?>

<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9">
                        <div class="pull-right" style="font-size: 45px;"><?= $total_student;?></div>
                        <div class="clearfix"></div>
                        <div class="pull-right">All Students</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=all_students">
                <div class="panel-footer">
                    <span class="pull-left">View All Students</span>
                    <span class="pull-right">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9">
                        <div class="pull-right" style="font-size: 45px;"><?= $total_users;?></div>
                        <div class="clearfix"></div>
                        <div class="pull-right">Users</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=all_users">
                <div class="panel-footer">
                    <span class="pull-left">View All Users</span>
                    <span class="pull-right">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9">
                        <div class="pull-right" style="font-size: 45px;"><?= $total_student;?></div>
                        <div class="clearfix"></div>
                        <div class="pull-right">All Students</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=all_students">
                <div class="panel-footer">
                    <span class="pull-left">All Student</span>
                    <span class="pull-right">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<hr>
<h3>New Student</h3>
<div class="table-responsive">
    <table id="datatable" class="table table-bordered table-hover bg-info text-center">
        <thead>
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Name</th>
            <th class="text-center">Roll</th>
            <th class="text-center">Class</th>
            <th class="text-center">City</th>
            <th class="text-center">Contact</th>
            <th class="text-center">Photo</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $db_student_info = "select * from student_info";
        $result = mysqli_query($link, $db_student_info);
        while ($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= ucwords($row['name']); ?></td>
            <td><?= $row['roll']; ?></td>
            <td><?= $row['class']; ?></td>
            <td><?= ucwords($row['city']); ?></td>
            <td><?= $row['p_contact']; ?></td>
            <td>
                <img style="width: 70px;height: 60px;" src="student_image/<?= $row['photo']; ?>" alt="no image">
<!--                <img style="width: 70px;height: 60px;" src="--><?//= $row['photo']; ?><!--" alt="no image">-->
            </td>
        </tr>
        <?php }?>
        </tbody>
    </table>
</div>
