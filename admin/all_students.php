<h1 class="text-primary"><i class="fa fa-users"></i> All Students <small>All Students</small>
</h1>
<ol class="breadcrumb">
    <li class="active"><a href="index.php?page=dashboard"><i class="fab fa-dashcube"></i> Dashboard</a></li>
    <li><i class="fa fa-users"></i> all students</li>
</ol>
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
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $db_student_info = "select * from student_info";
        $result = mysqli_query($link, $db_student_info);
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td class="mt-1"><?= $row['id']; ?></td>
                <td><?= ucwords($row['name']); ?></td>
                <td><?= $row['roll']; ?></td>
                <td><?= $row['class']; ?></td>
                <td><?= ucwords($row['city']); ?></td>
                <td><?= $row['p_contact']; ?></td>
                <td>
                    <img style="width: 70px;height: 60px;" src="student_image/<?= $row['photo']; ?>" alt="no image">
                    <!--                <img style="width: 70px;height: 60px;" src="--><?//= $row['photo']; ?><!--" alt="no image">-->
                </td>
                <td>
                    <a class="btn btn-xs btn-warning" href="index.php?page=update_student&id=<?= base64_encode($row['id']); ?>"><i class="fa fa-pencil-alt"></i> Edit</a> ||
<!--                    <a class="btn btn-xs btn-danger" href="delete_student.php?id=--><?//= $row["id']; ?><!--"><i class="fa fa-trash"></i> Delete</a>-->
                    <a class="btn btn-xs btn-danger" href="delete_student.php?id=<?= base64_encode($row['id']); ?>"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
