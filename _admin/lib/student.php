<?php include("../includes/db_connect.php"); ?>

<?php

if ($_REQUEST['act'] == "save_student") {
    save_student();
}
if ($_REQUEST["act"] == "delete_student") {
    delete_student();
}
if ($_REQUEST["act"] == "delete_multiple_student") {
    delete_multiple_student();
}

function save_student()
{
    global $con;
    $r = $_REQUEST;


    $qualifications = implode(',', $r['st_qualification']);
    $st_image = $_FILES['st_image']['name'];

    if ($st_image) {
        $st_image_arr = explode('.', $st_image);
        print_r($st_image_arr);
        $st_image = $st_image_arr[0] . time() . "." . $st_image_arr[1];
        move_uploaded_file($_FILES['st_image']['tmp_name'], '../uploads/' . $st_image);
    } else {
        $st_image = $r['st_image'];
    }
    $st_qualification = implode(",", $r['st_qualification']);
    if ($r['st_id']) {
        $sql = "UPDATE student SET st_name = '$r[st_name]',st_fathername='$r[st_fathername]',st_gen='$r[st_gen]',st_phone='$r[st_phone]',
    st_course='$r[st_course]',st_city='$r[st_city]',st_state='$r[st_state]',st_country='$r[st_country]',st_pincode='$r[st_pincode]',
    st_email='$r[st_email]',st_dob='$r[st_dob]',st_doj='$r[st_doj]',st_image='$st_image',st_address='$r[st_address]',st_qualification='$st_qualification',
    st_address2='$r[st_address2]' WHERE st_id='$r[st_id]'";
        $msg = "Record has been Updated.......!!";
       
    } else {
        $sql = "INSERT INTO `student` (`st_name`, `st_fathername`, `st_gen`, `st_phone`, 
    `st_course`, `st_city`, `st_state`, `st_country`, `st_pincode`, `st_email`, `st_dob`, `st_doj`, 
    `st_image`, `st_address`,`st_qualification`, `st_address2`) VALUES ('$r[st_name]', '$r[st_fathername]', '$r[st_gen]',
     '$r[st_phone]', '$r[st_course]', '$r[st_city]', '$r[st_state]', '$r[st_country]', '$r[st_pincode]', '$r[st_email]', 
     '$r[st_dob]', '$r[st_doj]', '$st_image', '$r[st_address]', '$qualifications','$r[st_address2]')";
        
        $msg = "Record has been Saved......!!";
    }
    // echo $sql;
    // die;

    $rs = mysqli_query($con, $sql) or die("Query Error");
    if ($rs)
        header("location:../student_view.php?msg=$msg");
}
// Delete function 
function delete_student()
{
    global $con;
    $sql = "select st_image from student where st_id='$_REQUEST[st_id]'";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($rs);
    if ($data['st_image']) {
        unlink("../uploads/" . $data['st_image']);
    }
    $sql = "delete from student where st_id='$_REQUEST[st_id]'";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($rs)
        header("location:../student_view.php?msg=Record is Deleted...!!");
}

//// function for multiple deleted -----------------------------
function delete_multiple_student()
{
    global $con;
    $st_multi_id = $_REQUEST['st_multi_id'];
    if ($st_multi_id == 0) {
        header(header: "location:../student_view.php?msg=Plz select to continue...!!");

    }
    foreach ($st_multi_id as $st_id) {
        $sql = "select st_image from student where st_id='$st_id'";
        $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
        $data = mysqli_fetch_assoc($rs);
        if ($data['st_image']) {
            unlink("../uploads/" . $data['st_image']);
        }
        $sql = "delete from student where st_id='$st_id'";
        $rs = mysqli_query($con, $sql) or die(mysqli_error($con));

    }
    if ($rs)
        header("location:../student_view.php?msg=Record is Deleted...!!");
}
?>