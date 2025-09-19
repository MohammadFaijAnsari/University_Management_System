<?php include_once("includes/header.php");?>
<style>
    /* General Styles */
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td {
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
        padding: 8px;
    }

    /* Responsive Table Styles */
    @media screen and (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }
        thead {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        tr {
            border: 1px solid #ccc;
            margin-bottom: 15px;
            padding: 10px;
        }
        td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
        }
        td:before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            font-weight: bold;
        }
    }

    /* Optional: Button styling for the Print button */
    input[type="button"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        cursor: pointer;
    }
    input[type="button"]:hover {
        background-color: #45a049;
    }
</style>

<?php
if (isset($_REQUEST['st_id'])) {
    global $con;
    $id = $_REQUEST['st_id'];

    $sql = "select * FROM student WHERE st_id='$id'";
    $rs = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($rs);
   
    $balance = "";
    $sql = "SELECT balance FROM fees WHERE st_id='$id'";
    $rs = mysqli_query($con,$sql);
    if(mysqli_num_rows($rs))
        $balance = mysqli_fetch_assoc($rs)['balance'];


}
?>


<table width="95%" border="1">
    <tr>
        
        <td colspan="4">
            <div align="center"><font color="red" size="+2">Student Detailes</font> </div>
            <center>
                        <?php
                        if ($balance == 0) {
                            $sql = "select * from exam where exam_course = '$data[st_course]'";
                            $rs1 = mysqli_query($con, $sql) or die(mysqli_error($con));
                            if( mysqli_num_rows($rs1) )
                                echo '<a href="admit_card.php?st_id=' . $data['st_id'] . '">AdmitCard</a>';
                            else
                                echo "<p>Admit Card Not Available</p>";
                        } else {
                            echo '<a href="payment.php?st_id=' . $data['st_id'] . '">PayFess</a>';
                        }
                        ?>
                     </center>
        </td>
    </tr>
    <tr>
        <td width="302">Name:-</td>
        <td width="223"><?= $data['st_name']; ?></td>
        <td width="211">Father Name :- </td>
        <td width="194"><?= $data['st_fathername']; ?></td>
    </tr>
    <tr>
        <td>Gender:-</td>
        <td><?= $data['st_gen']; ?></td>
        <td>Phone:-</td>
        <td><?= $data['st_phone']; ?></td>
    </tr>
    <tr>
        <td>Course:-</td>
        <td><?=get_single_value("course", "course_id", "course_name", $data['st_course'] );?></td>
        <td>City:-</td>
        <td><?= get_single_value("city", "city_id", "city_name",$data['st_city']); ?></td>
    </tr>
    <tr>
        <td>State:-</td>
        <td><?= get_single_value("state", "state_id", "state_name",$data['st_state']); ?></td>
        <td>Country:-</td>
        <td><?= get_single_value("country", "country_id", "country_name",$data['st_country']); ?></td>
    </tr>
    <tr>
        <td>PinCode:-</td>
        <td><?= $data['st_pincode']; ?></td>
        <td>Email:-</td>
        <td><?= $data['st_email']; ?></td>
    </tr>
    <tr>
        <td>DOB:-</td>
        <td><?= $data['st_dob']; ?></td>
        <td>DOJ:-</td>
        <td><?= $data['st_doj']; ?></td>
    </tr>
    <tr>
        <td>Image:-</td>
        <td><img src="uploads/<?= $data['st_image']; ?>" alt="Image Not Found" height="50px" width="100px" border="1"></td>
        <td>Address1:-</td>
        <td><?= $data['st_address']; ?></td>
    </tr>
    <tr>
        <td>Qualification:-</td>
        <td><?=get_multi_value("qulification", "qual_id", "qual_name", $data['st_qualification']); ?></td>
        <td>Address2:-</td>
        <td><?= $data['st_address2']; ?></td>
    </tr>
    <tr>
        <td colspan="4">
            <label>
                <div align="center">
                    <input type="button" value="Print" onclick="javascript:printOut();" />
                </div>
            </label>

        </td>
    </tr>
</table>
<?php include_once('includes/footer.php') ?>