<?php
include('connect.php');
include('add.php');
include('update.php');
$select = mysqli_query($conn, "SELECT * from user");
#verialbles
$id = '';
$name = '';
$Phone = '';
$Level = '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="search">
    <form method="POST">
        <input name="search" type="text" placeholder="ابحث عن طالب">
        <input name="submit" type="submit" value="بحث">
    </form>
</div>
    <div class="left_side">
       <form method='POST'>
            <input name='id' type="text" placeholder="ادخل رقم الطالب" required>
            <input name='name' type="text" placeholder="ادخل اسم الطالب" required>
            <input name='phone' type="text" placeholder="ادخل تلفون الطالب" required>
            <input name='level' type="text" placeholder="ادخل مستوى الطالب" required>
            <input name='add' type="Submit" value="تسجيل بيانات الطالب">
           
        </form>
     
    </div>
    <div class="content">
        <table border="1">
            <th>No</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Level</th> 
            <th>Delete</th> 
            <th>Update</th>     
            <tbody>
                <?php 
while ($row = mysqli_fetch_array($select)) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '<td>' . $row['level'] . '</td>';
    echo '<td><form method="post"><input type="hidden" name="idel" value="' . $row['id'] . '"><input name="delet" type="submit" value="حذف"></form></td>';
    echo '<td><form method="post"><input type="hidden" name="idup" value="' . $row['id'] . '"><input name="upd" type="submit" value=" تعديل"></form></td>';
    echo '</tr>';
}
?>
              
            </tbody>

        </table>

    </div>
 
   
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM user WHERE name LIKE '%$search%'";
    $search_result = mysqli_query($conn, $query);
    if (mysqli_num_rows($search_result) > 0) {
        while ($row = mysqli_fetch_array($search_result)) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['phone'] . '</td>';
            echo '<td>' . $row['level'] . '</td>';
            echo '<td><form method="post"><input type="hidden" name="idel" value="' . $row['id'] . '"><input name="delet" type="submit" value="حذف"></form></td>';
            echo '<td><form method="post"><input type="hidden" name="idup" value="' . $row['id'] . '"><input name="upd" type="submit" value="تعديل"></form></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="5">لا توجد نتائج للبحث</td></tr>';
    }
}
?>

<?php

if (isset($_POST['delet'])) {
    $idel = $_POST['idel'];
    $sqls = "DELETE FROM user WHERE id = '$idel'";
    mysqli_query($conn, $sqls);
    header('location: index.php');
}


?>
