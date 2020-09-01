<?php
require_once 'dbconn.php';
//echo $_GET['id'];
//echo base64_decode($_GET['id']);
$id = base64_decode($_GET['id']);
$query = "DELETE FROM student_info WHERE id = '$id'";
$result = mysqli_query($link, $query);
header('location:index.php?page=all_students');
exit();
