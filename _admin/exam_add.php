<?php include_once("includes/header.php") ?>
<style>
/* General styles for the table */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background-color: #fff;
}

table td, table th {
    padding: 0px;
    text-align: center;
    border: 1px solid #ddd;
}

table th {
    background-color: #f2f2f2;
}

/* Heading styles */
.edit {
    font-size: 30px;
    color: red;
    text-align: center;
}

/* Input and Textarea Styling */
input[type="text"], input[type="date"], textarea, select {
    width: 100%;
    padding: 8px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

/* Button Styling */
input[type="submit"] {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
   
}

input[type="submit"]:hover {
    background-color: #45a049;
}

a input[type="submit"] {
    background-color: #f44336;
}

a input[type="submit"]:hover {
    background-color: #d32f2f;
}

/* Form Styling */
form {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
}

/* Responsive Styles */
@media only screen and (max-width: 768px) {
    /* Stack form fields vertically */
    table {
        width: 100%;
    }

    table td, table th {
        display: block;
        width: 100%;
        padding: 10px;
    }

    /* Make form inputs and buttons full width on smaller screens */
    input[type="text"], input[type="date"], textarea, select {
        width: 100%;
    }

    /* Adjust button sizes on smaller screens */
    input[type="submit"] {
        width: 100%;
        font-size: 16px;
        padding: 12px;
    }
}

@media only screen and (max-width: 480px) {
    /* Adjust font size for smaller devices */
    .edit {
        font-size: 24px;
    }

    /* Adjust input field size and padding for very small screens */
    input[type="text"], input[type="date"], textarea, select {
        font-size: 14px;
        padding: 8px;
    }

    input[type="submit"] {
        font-size: 14px;
        padding: 12px;
    }
}

/* Styling for the radio buttons */
input[type="radio"] {
    margin-right: 10px;
}

/* Styling for the text area */
textarea {
    height: 100px;
}
</style>

<?php
global $con;
if (isset($_REQUEST['exam_id'])) {
  $sql = "select * from exam where exam_id='$_REQUEST[exam_id]'";
  $r = mysqli_query($con, $sql) or die(mysqli_error($con));
  $data = mysqli_fetch_array($r);
}
?>
<style type="text/css">
    .style1 {
        color: #F0F0F0;
    }
</style>

<form id="exam_form" name="exam_form" method="post" action="lib/exam.php">
    <table width="500" border="1" align="center">
        <tr>
        <td colspan="2" class="edit" align="center" style="color: red; font-size: 30px;">Exam Add</td>

        </tr>
        <tr>
            <td width="166">Exam Title:</td>
            <td><select name="exam_title" id="exam_title" >
            <?php echo get_dropdown_list("exam_title", "title_id", "title_name",0); ?>

                </select>
            </td>
        </tr>
        <tr>
            <td>Exam Course:</td>
            <td>
                <select id="exam_course" name="exam_course">
                    <?php echo get_dropdown_list("course", "course_id", "course_name", $data['exam_course']); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Exam Subject:</td>
            <td class="style1">
                <select id="exam_subject" name="exam_subject">
                <?php echo get_dropdown_list("subtable", "sub_id", "sub_name", $data['exam_subject']); ?>

                </select>
            </td>
        </tr>
        <tr>
            <td>Exam Timing:</td>
            <td>
                <label>
                    <input name="exam_shift" id="exam_shift" type="radio"value="Morning (10:00 AM to 01:00 PM)" required /> Morning (10 AM - 1 PM)<br>
                    <input name="exam_shift" id="exam_shift" type="radio"value="Evening (02:00 PM to 05:00 PM)" required /> Evening (02 AM - 5 PM)
                </label>
                
            </td>
        </tr>
        <tr>
            <td>Exam Date:</td>
            <td><input type="date" name="exam_date" id="exam_date"/></td>
        </tr>

        <tr>
            <td>Exam Description:</td>
            <td>
            <textarea name="exam_decription" id="exam_decription" required></textarea>
            </td>
        </tr>
        
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="Submit" value="Save" />
                <a href="exam_view.php">
                <input type="submit" name="Submit2" value="Cancel" />
            </td>
        </tr>
    </table>
    <input type="hidden" name="act" value="exam_add">
</form>
<?php include_once('includes/footer.php') ?>