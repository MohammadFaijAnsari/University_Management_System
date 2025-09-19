<?php 
session_start();
include("../includes/db_connect.php");
?>
<?php 
if($_REQUEST['act']=="login"){
    login();
}
if($_REQUEST['act']=="logout"){
    logout();
}
if($_REQUEST['act']=="change_dp"){
    change_dp();
}
if($_REQUEST['act']=="update_pass"){
    update_pass();
}


###### Faculty login
function login(){
    GLOBAL $con;
    print_r($_REQUEST);
    $sql = "select * FROM faculty WHERE f_email='$_REQUEST[f_mail]' AND f_pass='$_REQUEST[f_pass]'";
    $rs = mysqli_query($con,$sql) or die("Query Error");
    if(mysqli_num_rows($rs)){
        $_SESSION['f_email']=$_REQUEST['f_email'];
        header("location:../facu_det.php?f_email=$_REQUEST[f_email]");
     }
    else{
        header("location:../index.php?msg=Please enter valid username or password !!");
    }
}

###### faculty logout
function logout(){
    if(isset($_SESSION['f_email'])){
        $_SESSION['f_email']="";
        session_destroy();
        header("location:../index.php");
    }else{
        header("location:../index.php?msg=Please login first before logout ");
    }
}

##### change dp
function change_dp(){
    GLOBAL $con;
    $f_dp = $_FILES['f_dp']['name'];
    if($f_dp){
        $st_image_arr = explode(".",$f_dp);
        $f_dp = $st_image_arr[0].time().".".$st_image_arr[1];
        move_uploaded_file($_FILES['f_dp']['tmp_name'], "../uploads/".$f_dp);
    }else{
        $f_dp = $_FILES['f_dp']['name'];
    }
    $sql = "UPDATE `faculty` SET `f_dp` = '$f_dp' WHERE `f_id` = '$_REQUEST[f_id]' ";
    $rs = mysqli_query($con,$sql) or die("Query Error");
    if($rs){
        header("location:../facu_det.php?f_id=$_REQUEST[f_id]");
    }else{
        header("location:../facu_det.php?msg=Dp not  Change !!");
    }


}
function update_pass()
{
    global $con;
    // print_r($_REQUEST);
    // die;
    $sql = "update faculty set 
    f_pass='$_REQUEST[f_pass]',fc_pass='$_REQUEST[fc_pass]'where  
    f_email='$_SESSION[faculity_login]'";

    $rs = mysqli_query($con, $sql) or dir("Query Error");
    if ($rs)
    // die;
        header("location:../facu_det.php?msg=Your password changed try to again !!");
}
?>