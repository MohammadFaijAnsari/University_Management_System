<?php include_once("includes/header.php"); ?>
<style>
/* CSS Code */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}
th, td {
    padding: 8px;
    text-align: center;
    border: 1px solid #ddd;
}
td img {
    max-width: 100%;
    height: auto;
}
@media only screen and (max-width: 768px) {
    table, thead, tbody, th, td, tr {
        display: block;
    }
    th {
        background-color: #f4f4f4;
        font-weight: bold;
        text-align: left;
        padding: 5px 10px;
    }
    td {
        text-align: left;
        padding: 10px;
        border: none;
    }
    td::before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        top: 10px;
        font-weight: bold;
    }
}
form {
    margin: 20px auto;
    text-align: center;
}
form input[type="text"] {
    padding: 8px;
    font-size: 16px;
    width: 200px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
form input[type="submit"] {
    padding: 8px 16px;
    font-size: 16px;
    background-color: #007BFF;
    color: white;
    border: 1px solid #007BFF;
    border-radius: 4px;
    cursor: pointer;
}
form input[type="submit"]:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}
</style>

<div align="center">
    <?php if (isset($_REQUEST['msg'])) echo $_REQUEST['msg']; ?>
</div>

<form action="#" method="get">
    Enter to Search: <input type="text" name="st_search" id="st_search" oninput="find_student(this.value);" />
    <input type="submit" value="Search" />
</form>

<form action="lib/student.php" name="student_view" id="student_view" method="post">
    <table width="95%" align="center" border="1">
        <tr>
            <a href="student_add.php">Add Student</a> || 
            <a href="javascript:printOut();">PrintOut</a> || 
            <a href="javascript:delete_multiple_student();">DeleteAll</a>
        </tr>
        <tr align="center" class="student_heading">
            <th><input type="checkbox" name="check_all" id="check_all" onclick="checkAll(this);"></th>
            <th>ID</th>
            <th>Name</th>
            <th>Father's</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Pincode</th>
            <th>Email</th>
            <th>DOB</th>
            <th>DOJ</th>
            <th>Address</th>
            <th>Address2</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <tbody class="student_view">
            <?php
            include_once("includes/db_connect.php"); 
            if (isset($_REQUEST['st_search'])) {
                $search = mysqli_real_escape_string($con, $_REQUEST['st_search']);
                $sql = "SELECT * FROM student WHERE 
                        st_name LIKE '%$search%' OR 
                        st_gen LIKE '%$search%' OR 
                        st_email LIKE '%$search%' 
                        ORDER BY st_name";
            } else {
                $sql = "SELECT * FROM student ORDER BY st_name";
            }
            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
            while ($data = mysqli_fetch_assoc($rs)) {
            ?>
                <tr align="center">
                    <th><input type="checkbox" name="st_multi_id[]" id="st_multi_id[]" value="<?= $data['st_id'] ?>"></th>
                    <td><?= $data['st_id'] ?></td>
                    <td><?= $data['st_name'] ?></td>
                    <td><?= $data['st_fathername'] ?></td>
                    <td><?= $data['st_gen'] ?></td>
                    <td><?= $data['st_phone'] ?></td>
                    <td><?= $data['st_pincode'] ?></td>
                    <td><?= $data['st_email'] ?></td>
                    <td><?= $data['st_dob'] ?></td>
                    <td><?= $data['st_doj'] ?></td>
                    <td><?= $data['st_address'] ?></td>
                    <td><?= $data['st_address2'] ?></td>
                    <td><img src="uploads/<?= $data['st_image'] ?>" height="50" width="70" border="1" /></td>
                    <td>
                        <a href="student_add.php?st_id=<?= $data['st_id'] ?>"><img src="image/edit.png" height="25" width="25"></a>
                        <a href="javascript:delete_student(<?= $data['st_id'] ?>)"><img src="image/delete.png" height="25" width="25"></a>
                        <a href="detailes.php?st_id=<?= $data['st_id'] ?>"><img src="image/details.png" height="25" width="25"></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <input type="hidden" name="st_id" id="st_id">
    <input type="hidden" name="act" id="act">
</form>

<script>
function find_student(searchValue) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `?st_search=${encodeURIComponent(searchValue)}`, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const parser = new DOMParser();
            const doc = parser.parseFromString(xhr.responseText, "text/html");
            const newTableBody = doc.querySelector(".student_view").innerHTML;
            document.querySelector(".student_view").innerHTML = newTableBody;
        }
    };
    xhr.send();
}
</script>

<?php include_once("includes/footer.php"); ?>
