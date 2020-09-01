<h1 class="text-primary"><i class="fa fa-users"></i> All Users <small>All Users</small>
</h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fab fa-dashcube"></i> Dashboard</a></li>
    <li><i class="fa fa-users"></i> all users</li>
</ol>
<div class="table-responsive">
    <table id="datatable" class="table table-bordered table-hover bg-info text-center">
        <thead>
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Username</th>
            <th class="text-center">Photo</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $db_users = "select * from users";
        $result = mysqli_query($link, $db_users);
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td class="mt-1"><?= $row['id']; ?></td>
                <td><?= ucwords($row['name']); ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['username']; ?></td>
                <td>
                    <img style="width: 70px;height: 60px;" src="<?= $row['photo']; ?>" alt="no image">
<!--                    <img style="width: 70px;height: 60px;" src="users_images/--><?//= $row['photo']; ?><!--" alt="no image">-->
                </td>
                <td><?= $row['status']; ?></td>
                <td>
                    <a class="btn btn-xs btn-warning" href=""><i class="fa fa-pencil-alt"></i> Edit</a> ||
<!--                    <a class="btn btn-xs btn-danger" href="delete_student.php?id=--><?//= $row["id']; ?><!--"><i class="fa fa-trash"></i> Delete</a>-->
                    <a class="btn btn-xs btn-danger" href=""><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
