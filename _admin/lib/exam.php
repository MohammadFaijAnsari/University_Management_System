<?php
include("../includes/db_connect.php");
include("../includes/function.php");

   
    
?>

<?php
if (isset($_REQUEST['act'])) {
    $_REQUEST['act']();
}


function exam_add()
{
    $r = $_REQUEST;
    global $con;

    $sql = "INSERT INTO exam (exam_id, exam_title, exam_course, exam_subject, exam_shift, exam_date,exam_decription) 
    VALUES (NULL, '$r[exam_title]', '$r[exam_course]', '$r[exam_subject]', '$r[exam_shift]', '$r[exam_date]', '$r[exam_decription]')";

    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($rs) {
        header("location:../exam_view.php");
    }
}
function delete_exam()
{
    $exam_id = $_REQUEST['exam_id'];
    global $con;
    $sql = "delete  from exam where exam_id='$_REQUEST[exam_id]'";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($rs)
        header("location:../exam_view.php?msg=Record is Deleted...!!");

}

function exam_update(){
    $r = $_REQUEST;
    GLOBAL $con;
    print_r($_REQUEST);
    $sql = "UPDATE exam SET exam_title = '$r[exam_title]', exam_course = '$r[subtable]',exam_subject = '$r[exam_subject]',exam_shift = '$r[exam_shift]',exam_date = '$r[exam_date]',exam_decription = '$r[exam_decription]' WHERE exam_id = '$r[exam_id]'";
    print_r($sql);
    // die;
    $rs = mysqli_query($con,$sql);
    if($rs){
        header("Location: ../exam_view.php?msg=Record is Updated............!!");
    }

}



if (isset($_REQUEST['act']) && $_REQUEST['act'] == "admitcard") {
    admitcard();
}

function admitcard() {
    global $con;
    $r = $_REQUEST;

    $qualifications = implode(',', $r['st_qualification']);
    $st_image = $_FILES['st_image']['name'];

    if ($st_image) {
        $st_image_arr = explode('.', $st_image);
        $st_image = $st_image_arr[0] . time() . "." . end($st_image_arr);
        move_uploaded_file($_FILES['st_image']['tmp_name'], '../uploads/' . $st_image);
    }

    
    $sql = "INSERT INTO `student` (`st_name`, `st_fathername`, `st_gen`, `st_course`, `st_dob`, `st_image`) 
            VALUES ('$r[st_name]', '$r[st_fathername]', '$r[st_gen]', '$r[st_course]', '$r[st_dob]', '$st_image')";

  
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));

    if ($rs) {
        header("Location: ../admit_card.php?msg=admit id ready");
        exit(); 
    }
}

?>