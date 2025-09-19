<?php 
    include_once("includes/header.php");
 ?>
<style>
/* General styles for table */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 10px 0;
}

table td, table th {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
}

table th {
    background-color: red
    ;
    font-weight: bold;
}

/* Responsive styles for images */
table img {
    width: 70px;
    height: 50px;
    border-radius: 4px;
}

/* Responsive Styles */
@media only screen and (max-width: 768px) {
    /* Make the table layout more mobile-friendly */
    table {
        width: 100%;
        font-size: 14px;
    }

    table td, table th {
        display: block;
        width: 100%;
        padding: 8px;
    }

    /* Make the "Action" column more readable */
    table td:last-child {
        text-align: center;
    }

    table th {
        padding: 12px;
    }

    /* Image adjustment for small screens */
    table img {
        width: 100px; /* Resize image on small screens */
    }
}

@media only screen and (max-width: 480px) {
    table {
        font-size: 12px;
    }

    table td, table th {
        padding: 5px;
    }

    table img {
        width: 50px; /* Smaller image for very small screens */
        height: auto;
    }
}

/* Centered text styling */
div[align="center"] {
    text-align: center;
    margin: 10px 0;
}

/* Styling for links (PayFess) */
a {
    color: #007BFF;
    text-decoration: none;
}

a:hover {
    color: #0056b3;
    text-decoration: underline;
}
</style>

<div align="center"><?php if (isset($_REQUEST['msg']))
    echo $_REQUEST['msg']; ?></div>

<form action="lib/student.php" name="student_view" id="student_view" method="post">
    <table width="95%" align="center" border="1">
        <tr align="center" class="student_heading">
            <th>ID</th>
            <th>Name</th>
            <th>Father's Name</th>
            <th>Course</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <tbody class="student_view">
            <?php
            global $con;
            $sql = "SELECT * FROM student";
            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
            while ($data = mysqli_fetch_assoc($rs)) {
                $sql2 = "SELECT * FROM fees WHERE st_id='{$data['st_id']}' ORDER BY fs_id DESC LIMIT 1";
                $rs2 = mysqli_query($con, $sql2);
                $data2 = mysqli_fetch_assoc($rs2);     
                ?>
                <tr align="center">
                    <td><?= $data['st_id'] ?></td>
                    <td><?= $data['st_name'] ?></td>
                    <td><?= $data['st_fathername'] ?></td>
                    <td><?= get_single_value("course", "course_id", "course_name", $data['st_course']); ?></td>
                    <td><img src="uploads/<?= $data['st_image'] ?>" height="50" width="70" border="1" /></td>
                    <td>
                        <?php
                        if (isset($data2['balance']) && $data2['balance'] == 0) {
                            $sql = "select * from exam where exam_course = '$data[st_course]'";
                            $rs1 = mysqli_query($con, $sql) or die(mysqli_error($con));
                            if (mysqli_num_rows($rs1))
                                echo 'Paid';
                        } else {
                            echo '<a href="payment.php?st_id=' . $data['st_id'] . '">PayFess</a>';
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <input type="hidden" name="st_id" id="st_id">
    <input type="hidden" name="act" id="act" value="">
</form>
<?php include_once('includes/footer.php'); ?>