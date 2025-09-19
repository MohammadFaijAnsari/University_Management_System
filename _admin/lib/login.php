<?php
session_start();
include("../includes/db_connect.php");
?>
<?php
if (isset($_REQUEST['act'])) {
    print_r($_REQUEST['act']);
    // die;
    $_REQUEST['act']();
}
// Student save function
function SignIn()
{
    global $con;
    if ($_SESSION['captcha'] == $_POST['captcha']) {
        if ($_REQUEST['login_type'] == "Admin") {
            $sql = "select * from login where login_user='$_REQUEST[login_user]' and
                   login_pass='$_REQUEST[login_pass]'";
            $rs = mysqli_query($con, $sql) or dir("Query Error");
            if (mysqli_num_rows($rs)) {
                $_SESSION['login_name'] = $_REQUEST['login_user'];
                header("location:../student_view.php?msg=Login Success!!");
            } else
                header("location:../index.php?msg=Plz Try Again Incorrect Username or Password !!");
        }
    }else{
        header("Location:../index.php?msg=Captcha Does Not Match");
    }
}
function logout()
{
    if (isset($_SESSION['login_name'])) {
        $_SESSION['login_name'] = "";
        session_destroy();
        header("location:../index.php?msg=Login Success!!");
    } else {
        header("location:../login.php?msg=Plz login first to logout");
    }
    # code...

}
// Recovery Password-----------------
function recover_pass()
{
    global $con;
    // print_r($_REQUEST);
    // die;
    $sql = "select * from login where login_user='$_REQUEST[login_user]' and
   sec_ques='$_REQUEST[sec_ques]'and sec_ans='$_REQUEST[sec_ans]'";
    $rs = mysqli_query($con, $sql) or dir("Query Error");
    if (mysqli_num_rows($rs)) {
        $_SESSION['login_recovery_name'] = $_REQUEST['login_user'];
        header("location:../update_pass.php?msg=Plz change your password!!");
    } else
        header("location:../forget.php?msg=Plz Try Again Incorrect cridential !!");
}

//Update Password----------------------
function update_pass()
{
    global $con;
    // print_r($_REQUEST);
    // die;
    $sql = "update login set 
    login_pass='$_REQUEST[login_pass]',login_cpass='$_REQUEST[login_cpass]'where  
    login_user='$_SESSION[login_recovery_name]'";

    $rs = mysqli_query($con, $sql) or dir("Query Error");
    if ($rs)
        header("location:../index.php?msg=Your password changed try to agin !!");
}
?>