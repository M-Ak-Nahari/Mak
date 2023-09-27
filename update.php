<?php
if (isset($_POST['upd'])) {
    $idup = $_POST['idup'];
    $select = mysqli_query($conn, "SELECT * from user WHERE id='$idup'");
    $row = mysqli_fetch_array($select);
    $name = $row['name'];
    $phone = $row['phone'];
    $level = $row['level'];
    echo '<form method="post"><input type="hidden" name="idup" value="' . $idup . '">
    <input name="name" type="text" value="'.$name.'" placeholder="ادخل اسم الطالب" required>
    <input name="phone" type="number" value="'.$phone.'" placeholder="ادخل تلفون الطالب" required>
    <input name="level" type="number" value="'.$level.'" placeholder="ادخل مستوى الطالب" required>
    <input name="update" type="submit" value="تعديل"></form>';

}
if (isset($_POST['update'])) {
    $idup = $_POST['idup'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $level = $_POST['level'];
    $sql = "UPDATE user SET  name ='$name', phone ='$phone', level ='$level' WHERE id=$idup";
    mysqli_query($conn, $sql);
    header('location: index.php');
}

?>