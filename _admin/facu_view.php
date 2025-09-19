<?php include_once("includes/header.php") ?>

<div align="center">
    <?php if (isset($_REQUEST['msg']))
        echo $_REQUEST['msg']; ?>
</div>
<?php
//// CODE FOR ACTION 
if (isset($_GET['f_id']) && isset($_GET['f_act'])) {
    $f_id = intval($_GET['f_id']);
    $action = intval($_GET['f_act']);

    if ($action !== 0 && $action !== 1) {
        die("Invalid action value.");
    }

    $sql = "UPDATE faculty SET action = ? WHERE f_id = ?";
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, "ii", $f_act, $f_id);
        if (mysqli_stmt_execute($stmt)) {
            echo "Success";
        }
    }
}
?>
<center>
<form action="#" method="get">
    Enter to Search:<input type="text" name="st_search" />
    <input type="submit" value="Search" />
</form>
</center>

<form action="lib/facu.php" name="facu_view" id="facu_view" method="post">
    <table width="95%" align="center" border="1">
        <tr>
            <center>
                <a href="facu_regi.php">Faculty Add</a>||
                <a href="javascript:printOut();">printOut</a>||
                <a href="javascript:delete_multiple_student();">DeleteAll</a></tr>
                <br>
            </center>    
        <tr align="center" class="student_heading" >
            <th><input type="checkbox" name="check_all" id="check_all" oninput="checkAll(this);"></th>
            <th>F_ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Qualification</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Experience</th>
            <th>Intrest</th>
            <th>DOJ</th>
            <th>Digination</th>
            <th>Stream</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <tbody class="student_view">
            <?php
            global $con;
            if (isset($_REQUEST['st_search'])) {
                $sql = "select * from faculty where f_name like '$_REQUEST[st_search]%' or f_email like '$_REQUEST[st_search]%' or 
            '$_REQUEST[st_search]%'";
            } else {
                $sql = "select * from faculty order by f_name";
            }
            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
            while ($data = mysqli_fetch_assoc($rs)) {
                $src = ($data['f_act'] == 0) ? './image/deactive.jpg' : './image/active.jpg';
            ?>
                <tr align="center">

                    <th><input type="checkbox" name="st_multi_id[]" id="st_multi_id[]" value="<?= $data['f_id'] ?>"></th>
                    <td><?= $data['f_id'] ?></td>
                    <td><?= $data['f_name'] ?></td>
                    <td><?= $data['f_gen'] ?></td>
                    <td><?php echo get_single_value("faculty_quali", "f_qua_id", "f_qua_name", $data['f_quali']); ?>
                    </td>
                    <td><?= $data['f_phone'] ?></td>

                    <td><?= $data['f_email'] ?></td>
                    <td><?= $data['f_expe']."Year" ?></td>
                    <td><?php echo get_single_value("subject", "s_id", "subject_name", $data['f_interst']); ?>
                    </td>

                    <td><?= $data['f_doj'] ?></td>
                    <td><?php echo get_single_value("designation", "de_id", "de_name", $data['f_degi']); ?>
                    </td>
                    <td><?php echo get_single_value("stream", "stream_id", "stream_name", $data['f_stream']); ?>
                    </td>
                    <td><img src="uploads/<?= $data['f_dp'] ?>" hight="50" width="70" border="1" /></td>
                    <td>
                     <img id="actImg<?=$data['f_id']?>"  src="<?=$src?>" height="30" width="30" 
                     onclick="active(<?=$data['f_id']?>, <?=$data['f_act']?>)" />
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <input type="hidden" name="f_id" id="f_id">
    <input type="hidden" name="act" id="act">
</form>
<script>
function active(f_id, c_act) {
    var n_act = (c_act == 0) ? 1 : 0; 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var img = document.getElementById("actImg" + f_id);
            img.src = (n_act == 1) ? './image/active.jpg' : './image/deactive.jpg';
        }
    };
    xmlhttp.open("GET", "lib/facu.php?f_id=" + f_id + "&f_act=" + n_act, true);
    xmlhttp.send();
}
</script>

<?php include_once('includes/footer.php') ?>