<?php

if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $Phone = $_POST['phone'];
    $Level = $_POST['level'];
    $sqls = "INSERT INTO user VALUE ($id,'$name','$Phone','$Level')";
    mysqli_query($conn, $sqls);
    header('location: index.php');
}
?>