<?php include_once("includes/header.php") ?>
<div align="center"><?php if (isset($_REQUEST['msg']))
    echo $_REQUEST['msg']; ?></div>

<form action="lib/fees.php" name="student_view" id="student_view" method="post">
    <table width="95%" align="center" border="1">
        <tr><a href="javascript:printOut();">printOut</a></tr>

        <tr align="center" class="student_heading">
            <th>Fees ID</th>
            <th>ID</th>
            <th>Name</th>
            <th>Father's</th>
            <th>Course</th>
            <th>Total Fees</th>
            <th>Paid Amount</th>
            <th>Balance</th>
            <th>Date</th>
            <th>Decription</th>
            <th>Action</th>
        </tr>
        <tbody class="student_view">
            <?php
            global $con;
            $paid_fees_stu_id = array();
            $sql = "select * from fees order by fs_id desc";
            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
            while ($data = mysqli_fetch_assoc($rs)) {
                if ($data['balance'] == 0) {
                    array_push($paid_fees_stu_id, $data['st_id']);
                }
                ?>
                <tr align="center">
                    <td><?= $data['fs_id'] ?></td>
                    <td><?= $data['st_id'] ?></td>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['father'] ?></td>
                    <td><?= $data['course'] ?></td>
                    <td><?= $data['total_fee'] ?></td>
                    <td><?= last_value($data['amount']) ?></td>
                    <td><?= $data['balance'] ?></td>
                    <td><?=last_value($data['date']) ?></td>
                    <td><?= last_value($data['discription']) ?></td>
                    <td>
                    <a href="payment_edit.php?st_id=<?=$data['st_id']?>"><img src="image/edit.png" hight="25"width="25"></a>
                        <?php
                        if (in_array($data['st_id'], $paid_fees_stu_id))
                            echo "Fees Submitted";
                        else {
                            ?>
                            <a href="payment.php?st_id=<?= $data['st_id'] ?>"><img src="image/payment.png" hight="25"width="25"></a>
                        <?php } ?>
                        <a href="javascript:delete_student_fees(<?= $data['fs_id'] ?>);"><img src="image/delete.png" hight="25"width="25"></a>

                </tr>
            <?php } ?>
        </tbody>
    </table>
    <input type="hidden" name="fs_id" id="fs_id">
    <input type="hidden" name="act" id="act">
</form>
<?php include_once('includes/footer.php') ?>