<?php
error_reporting(false);
include_once("includes/header.php") ?>
<?php
if (isset($_REQUEST['st_id'])) {
    global $con;
    $id = $_REQUEST['st_id'];

    $sql = "select * FROM student join course on student.st_course = course.course_id WHERE st_id='$id'";
    $rs = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($rs);

    $sql2 = "select * from fees where st_id='$id' order by fs_id desc limit 1";
    $rs2 = mysqli_query($con, $sql2);
    if (mysqli_num_rows($rs2) > 0) {
        $data2 = mysqli_fetch_assoc($rs2);
    }
    $paid_amt = last_value($data2['amount']);
    echo $paid_amt;
}
?>
<div align="center">
    <form action="lib/fees.php" method="post" id="p1" name="p1">
        <table width="46%" height="370" border="1">
            <tr>
                <td colspan="2">
                    <div align="center">Fess Edit</div>
                </td>
            </tr>
            <tr>
                <td width="49%">
                    Id :- </td>
                <td width="51%"><input type="text" id="st_id" name="st_id" readonly value="<?= $data['st_id'] ?>" />
                </td>
            </tr>
            <tr>
                <td>Name :- </td>
                <td><input type="text" id="name" name="name" readonly value="<?= $data['st_name'] ?>" /></td>
            </tr>
            <tr>
                <td>Father :- </td>
                <td><input type="text" id="father" name="father" readonly value="<?= $data['st_fathername'] ?>" /></td>
            </tr>
            <tr>
                <td>Course :- </td>
                <td><input type="text" id="course" name="course" readonly
                        value="<?= get_single_value("course", "course_id", "course_name", $data['st_course']); ?>" />
                </td>
            </tr>
            <tr>
                <td>Total Fess :- </td>
                <td><input type="text" id="total_fees" name="total_fees" value="<?= $data['course_fess'] ?>" /></td>
            </tr>
            <tr>
                <td>Paid Amount :- </td>
                <td><input type="text" name="paid_amount" id="paid_amount" readonly
                        value="<?php if (isset($data2))
                            echo $data2['total_fee'] - ($data2['balance'] + $paid_amt);
                        else
                            echo 0; ?>">
                </td>
            </tr>

            <tr>
                <td>Balance :- </td>
                <td><label>
                        <input type="text" id="balance" name="balance"
                            value="<?php if (isset($data2))
                                echo $data2['balance']+$paid_amt;
                            else
                                echo $data['course_fess']; ?> "
                            readonly />
                    </label></td>
            </tr>
            <tr>
                <td>Enter Amount :- </td>
                <td><label>
                        <input type="text" id="amount" name="amount" oninput="setBalance();" maxlength="5"
                            oninput="validate_phone(this,event)" placeholder="0" required value="<?=$paid_amt?>"/>
                    </label></td>
            </tr>
            <tr>
                <td>Date :- </td>
                <td>
                    <input type="text" id="date" name="date" readonly value="<?= date("d/m/Y"); ?>"></label>
                </td>
            </tr>
            <tr>
                <td>Description :- </td>
                <td>
                    <textarea name="description" id="description"  required><?= last_value($data2['discription']); ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2"><label>
                        <div align="center">
                            <input type="submit" name="Submit" value="Pay" />
                            <a href="student_fees.php">
                                <input type="submit" name="Submit2" value="Cancel" />
                            </a>

                        </div>
                    </label></td>
            </tr>
        </table>
        <input type="hidden" name="act" value="edit_student_fees" />
        <input type="hidden" name="st_id" value="<?= $data['st_id'] ?>" />
    </form>
</div>

<?php include_once('includes/footer.php') ?>