<?php
include_once("includes/header.php");
?>
<style>
/* General styling for the table */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background-color: #fff;
}

table td, table th {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #f2f2f2;
}

/* Link Styling */
a {
    text-decoration: none;
    color: #0066cc;
    padding: 5px;
}

a:hover {
    color: #ff9900;
}

/* Button for print out */
a[href="javascript:printOut();"] {
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border-radius: 4px;
    cursor: pointer;
}

a[href="javascript:printOut();"]:hover {
    background-color: #45a049;
}

/* Responsive styles */
@media only screen and (max-width: 768px) {
    /* Stack table cells vertically on smaller screens */
    table {
        width: 100%;
    }

    table td, table th {
        display: block;
        width: 100%;
        padding: 10px;
    }

    /* Adjust image size for icons */
    img {
        width: 20px;
        height: 20px;
    }

    /* Make action links (Edit/Delete) block for easy clicking */
    td a {
        display: block;
        margin-bottom: 5px;
    }

    /* Ensure print out button is easy to click */
    a[href="javascript:printOut();"] {
        width: 100%;
        text-align: center;
        padding: 15px;
    }
}

@media only screen and (max-width: 480px) {
    /* Adjust font size for smaller screens */
    table td, table th {
        font-size: 12px;
    }

    /* Adjust action icons for smaller devices */
    img {
        width: 15px;
        height: 15px;
    }

    /* Make print button more prominent */
    a[href="javascript:printOut();"] {
        font-size: 16px;
        padding: 12px;
    }
}

/* Styling for table header */
.student_heading th {
    font-size: 14px;
    font-weight: bold;
    background-color: #f2f2f2;
    color: #333;
}

/* Styling for the 'action' column (Edit/Delete) */
.student_view td a {
    margin-right: 10px;
}
</style>


<form action="lib/exam.php" name="exam_view" id="exam_view" method="post">
    <table width="95%" align="center" border="1">
        <tr><a href="javascript:printOut();">printOut</a></tr>

        <tr align="center" class="student_heading">
            <th>ID</th>
            <th>Exam Title</th>
            <th>Exam Course</th>
            <th>Exam Subject</th>
            <th>Exam Shift</th>
            <th>Exam Date</th>
            <th>Exam Description</th>
            <th>Action</th>


        </tr>
        <tbody class="student_view">

            <?php
            $sql = "SELECT * FROM exam";
            $rs = mysqli_query($con, $sql);
            if (mysqli_num_rows($rs)) {
                while ($data = mysqli_fetch_assoc($rs)) {
                    ?>
                    <tr align="center">
                        <td><?= $data['exam_id'] ?></td>
                        <td><?= get_single_value("exam_title", "title_id", "title_name",$data['exam_title']); ?></td>
                        <td><?= get_single_value('course','course_id','course_name',$data['exam_course']);?></td>
                        <td><?=get_single_value("subtable", "sub_id", "sub_name", $data['exam_subject']); ?></td>
                        <td><?= $data['exam_shift'] ?></td>
                        <td><?= $data['exam_date'] ?></td>
                        <td><?= $data['exam_decription'] ?></td>
                        <td><a href="exam_edit.php?exam_id=<?= $data['exam_id'] ?>"><img src="image/edit.png" hight="25"
                                    width="25"></a>
                            <a href="javascript:delete_exam(<?= $data['exam_id'] ?>)"><img src="image/delete.png" hight="25"
                                    width="25"></a>
                           
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>

        </tbody>
    </table>
    <input type="hidden" name="exam_id" id="exam_id">
    <input type="hidden" name="act" id="act">
</form>
<?php include_once('includes/footer.php') ?>