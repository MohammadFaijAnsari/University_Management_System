<?php
 include("includes/header.php");
 include("includes/db_connect.php");
?>
<center>
<table colspan='1' border="1" >
    <thead>
        <tr>
            <th>Student_Id</th>
            <th>Student Name</th>
            <th>Father Name</th>
            <th>Student Course</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody align="center">
        <?php
          $fees_paid="SELECT * FROM fees WHERE balance=0";
          $run_paid=mysqli_query($con,$fees_paid);
          while($row_paid=mysqli_fetch_array($run_paid)){
            $st_id=$row_paid['st_id'];
            $st_name=$row_paid['name'];
            $st_father=$row_paid['father'];
            $st_course=$row_paid['course'];
          
        ?>
        <tr>
            <td><?php echo $st_id;?></td>
            <td><?php echo $st_name;?></td>
            <td><?php echo $st_father;?></td>
            <td><?php echo $st_course;?></td>
            <td>
                <?php
                  echo "<a href='add_marks.php?student_id=$st_id&&student_course=$st_course'>Add Marks</a>";
                ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</center>
<?php
 include("includes/footer.php");
?>