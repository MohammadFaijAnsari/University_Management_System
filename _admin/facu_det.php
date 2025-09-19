<?php
session_start();
include("includes/db_connect.php");
include("includes/function.php");

($_SESSION['faculity_login']);
// die;
if (isset($_REQUEST)) {
    global $con;


    $sql = " select  * from faculty where f_email = '" . $_SESSION['faculity_login'] . "' ";
    $rs = mysqli_query($con, $sql);


    $data =  mysqli_fetch_assoc($rs);
    // print_r($data);
    // die;
}
?>

<form id="faculty_details" name="faculty_details" method="post" action="lib/facu.php">
    <div align="center">
        <table width="808" height="302" border="1">
            <tr>
                <td height="80" colspan="3">
                    <h3 align="center">Faculty Details</h3>

                </td>
                <td width="185">
                    <a href="update_f_img.php">
                        <img src="uploads/<?= $data['f_dp']; ?>" width="95%" height="20%" align="middle" />
                    </a>
                </td>

            </tr>
            <tr>
                <td width="172">Name :-</td>
                <td width="216">
                    <?= $data['f_name']; ?> </td>
                <td width="207">Gender:-</td>

                <td><?= $data['f_gen']; ?></td>

            </tr>
            <tr>
                <td width="172">Qualification :-</td>
                <td width="216"> <?php echo get_single_value("faculty_quali", "f_qua_id", "f_qua_name", $data['f_quali']); ?>
                </td>
                <td>Phone :-</td>
                <td width="216"><?= $data['f_phone']; ?></td>
            </tr>
            <tr>
                <td>Email :-</td>
                <td width="216"><?= $data['f_email']; ?></td>
                <td>Experience :-</td>
                <td width="216"><?= $data['f_expe']; ?></td>
            </tr>
            <tr>
                <td>Age of Interest :-</td>
                <td width="216"> <?php echo get_single_value("area_of_intrest", "area_id", "area_name", $data['f_interst']); ?>
                </td>
                <td>DOJ :-</td>
                <td width="216"><?= $data['f_doj']; ?></td>
            </tr>
            <tr>
                <td>Designation :-</td>
                <td width="216"> <?php echo get_single_value("designation", "de_id", "de_name", $data['f_degi']); ?>
                </td>
                <td>Stream :-</td>
                <td width="216"> <?php echo get_single_value("stream", "stream_id", "stream_name", $data['f_stream']); ?>
                </td>
            </tr>
            <tr>
                <td>Security Question :-</td>
                <td width="216"> <?php echo get_single_value("security", "sec_id", "sec_ques", $data['f_que']) ?>
                </td>
                <td>Security Answer :-</td>
                <td width="216"><?= $data['f_ans']; ?></td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    <a href="facu_regi.php?f_id=<?= $data['f_id'] ?>">
                        <button type="button">Edit Profile</button>
                    </a>
                    <input type="submit" value="update password" formaction="f_update_pass.php" />
                    <a href="lib/f_login.php?act=logout">
                        <button type="button">Logout</button>
                    </a>

                </td>

            </tr>
        </table>
    </div>
</form>