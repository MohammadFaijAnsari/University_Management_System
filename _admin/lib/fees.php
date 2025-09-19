<?php 
    include("../includes/db_connect.php");
    include("../includes/function.php");
?>

<?php
if ($_REQUEST['act'] == "student_fees") {
    student_fees();
}

if ($_REQUEST['act'] == "delete_student_fees") {
    delete_student_fees();
    // echo "hello funcion call";
}
if ($_REQUEST['act'] == "edit_student_fees") {
    edit_student_fees();
}
function student_fees()
{
    global $con;
    $r = $_REQUEST;
    print_r($r);
    $sql = "SELECT * FROM fees WHERE st_id='$r[st_id]'";
    $rs = mysqli_query($con,$sql);
    if(mysqli_num_rows($rs)){
        $data = mysqli_fetch_assoc($rs);
        $new_balance = $r['balance'];
        $new_amount = $data['amount'] . ',' . $r['amount'];
        $new_date = $data['date'] . ',' . $r['date'];
        $new_description = $data['discription'] . ',' . $r['description'];
        $sql = "UPDATE fees SET balance = '$new_balance', amount = '$new_amount' , date = '$new_date' , discription = '$new_description' WHERE st_id='$r[st_id]'";
        // echo $sql;
        // die;

    }else{
        $sql="INSERT INTO fees (st_id,name, father, course, total_fee,amount, balance,date, discription) 
      VALUES ( '$r[st_id]', '$r[name]', '$r[father]', '$r[course]', '$r[total_fees]','$r[amount]',  '$r[balance]', '$r[date]', '$r[description]')";    

    }

    
 
    $rs = mysqli_query($con, $sql) or die("Query Error");

   
    if ($rs) {
        header("location:../fees_pad.php");
    } else {
        echo "Error in inserting fees record!";
    }
}
function delete_student_fees()
{
    global $con;
    print_r($_REQUEST);
   $sql1 = "delete from fees where fs_id='$_REQUEST[fs_id]'";
    echo $sql1;
    //die;
    $rs = mysqli_query($con, $sql1) or die(mysqli_error($con));
   if ($rs)
       header("location:../fees_pad.php?msg=Record is Deleted...!!");
}

function edit_student_fees(){
    GLOBAL $con;
    $r = $_REQUEST;
    $sql = "SELECT * FROM fees WHERE st_id='$r[st_id]'";
    $rs = mysqli_query($con,$sql);
    if(mysqli_num_rows($rs)){
        $data = mysqli_fetch_assoc($rs);
        $new_balance = $r['balance'];
        if( remove_last_value($data['amount']) == ""){
            $new_amount = $r['amount'];
            $new_date = $r['date'];
            $new_description = $r['description'];
        }else{
            $new_amount = remove_last_value($data['amount']) . ',' . $r['amount'];
            $new_date = remove_last_value($data['date']) . ',' . $r['date'];
            $new_description = remove_last_value($data['discription']) . ',' . $r['description'];            
        }
        $sql = "UPDATE fees SET balance = '$new_balance', amount = '$new_amount' , date = '$new_date' , discription = '$new_description' WHERE st_id='$r[st_id]'";

    }
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
   if ($rs)
       header("location:../fees_pad.php?msg=Record is Deleted...!!");

}
function exam_update(){
    $r = $_REQUEST;
    GLOBAL $con;
    $sql = "UPDATE exam SET exam_title = '$r[title]', exam_course = '$r[course]',exam_subject = '$r[subject]',exam_shift = '$r[shift]',exam_date = '$r[exam_date]',exam_description = '$r[description]' WHERE exam_id = '$r[id]'";
    $rs = mysqli_query($con,$sql);
    if($rs){
        header("Location: ../exam_view.php?msg=Record is Updated!!");
    }

}

?>
