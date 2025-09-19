<?php
 include("includes/db_connect.php");
  if(isset($_GET['image_id'])){
    $image_id=$_GET['image_id'];
    $delete_image="DELETE FROM gallery WHERE g_id='$image_id' ";
    $run_image=mysqli_query($con,$delete_image);
    if($run_image){
        header("Location:gallery_view.php");
    }else{
        echo "<script>alert('Image Was Not Deleted')</script>";
    }
  }
?>