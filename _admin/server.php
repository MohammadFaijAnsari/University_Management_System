<?php
if (isset($_GET['st_name'])) {
    $con = mysqli_connect("localhost", "root", "", "university", "3307") or die(mysqli_error($con));

    $txt = $_GET['st_name'];

    $sql = "SELECT * FROM student WHERE st_name = '$txt'";

    $rs = mysqli_query($con, $sql);

    if (mysqli_num_rows($rs))
        echo "<i>Student Already exists</i>";
    else
        echo "<b>Student Not Exists</b>";


    mysqli_close($con);
}
?>