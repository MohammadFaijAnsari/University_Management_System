<?php
include("includes/header.php");
include("includes/db_connect.php");

$student_id = $_GET['student_id'];
$student_course = $_GET['student_course'];
// Fetch subjects based on student_id
$select_student = "SELECT * FROM subject WHERE subject_id='$student_id'";
$run_student = mysqli_query($con, $select_student);
?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }
    form {
        background-color: #ffffff;
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    form h1 {
        text-align: center;
        color: #333;
    }
    label, input {
        display: block;
        width: 100%;
        margin-bottom: 15px;
    }
    input[type="text"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"], input[type="reset"] {
        width: 48%;
        padding: 10px;
        font-size: 16px;
        width: 100%;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        background-color: #5cb85c;
        color: #fff;
        margin-right: 4%;
    }
    input[type="reset"] {
        background-color: #d9534f;
    }
    input[type="submit"]:hover {
        width: 100%;
        background-color: #4cae4c;
    }
    input[type="reset"]:hover {
        width: 100%;
        background-color: #c9302c;
    }
</style>

<form action="" method="post">
    <h1>Marks Add</h1>
    <label for="roll">Roll No:</label>
    <input type="text" name="roll" id="roll" value='<?php echo $student_id; ?>' readonly>

    <label for="course">Course:</label>
    <input type="text" name="course" id="course" value="<?php echo $student_course; ?>" readonly>

    <?php
    while($row =  mysqli_fetch_array($run_student)){
        ?>
        <label for="<?=$row['subject_name']?>"><?=$row['subject_name']?></label>
        <input type="text" name="<?=$row['subject_name']?>" id="<?=$row['subject_name']?>" placeholder="Enter Your Marks for <?=$row['subject_name']?> Subject">
        <?php
    }    
    ?>
    <input type="submit" value="Submit" id="submit" name="submit">
    <input type="reset" value="Cancel" id="cancel" name="cancel">
</form>

<?php
if (isset($_POST['submit'])) {
    $roll_no = $_POST['roll'];
    $course = $_POST['course'];
    $sub_arr = array();
    $num_arr = array();
    foreach($_POST as $key => $value){
        if($key != 'roll' && $key != 'course' && $key != 'submit'){
            array_push($sub_arr,$key);
            array_push($num_arr,$value);
        }
    }
    $subjects = implode(',',$sub_arr);
    $number = implode(',',$num_arr);
    // echo $subjects." ".$number;
    $sql = "INSERT INTO marks (roll_no,course,subject_list,marks_list) VALUES ('$roll_no', '$course', '$subjects','$number');";
    $run=mysqli_query($con,$sql);
    if($run){
        echo "<script>alert('Data Saved')</script>";
    }else{
        echo "<script>alert('Data Not Saved')</script>";
    }
}
?>
<?php
include("includes/footer.php");
?>
