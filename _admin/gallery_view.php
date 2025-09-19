<?php
 include("includes/header.php");
?>
<div>

</div>
  <div class="row">
     <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
             <h3 class="panel-title">
                View All Images
             </h3>
          </div>
          <div class="panel-body">
             <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" align="center">
                  <thead align="center">
                    
                     <th>Image Id</th>
                     <th>Image Titile</th>
                     <th>Image Image</th>
                     <th>Date</th>
                     <th>Image Delete</th>
                  </thead>
                  <tbody>
                    <?php
                      $select_image="SELECT * FROM gallery ";
                      $run_image=mysqli_query($con,$select_image);
                      while($row_image=mysqli_fetch_array($run_image)){
                         $image_id=$row_image['g_id'];
                         $image_title=$row_image['g_title'];
                         $image_image=$row_image['g_image'];
                         $date=$row_image['date'];
                      
                    ?>
                  </tbody>
                  <tr align="center">
                      <td><?php echo $image_id;?></td>
                      <td><?php echo $image_title;?></td>
                      <td>
                        <img src="Gallery/<?php echo $image_image?>" alt="" srcset="" height="30px" width="50px">
                      </td>
                      <td><?php echo $date; ?></td>
                      <td>
                         <a href="image_delete.php?image_id=<?php echo $image_id?>">
                            <i class="fa fa-trash-o fa-2x"></i>
                         </a>
                      </td>
                      
                  </tr>
                    <?php 
                     }
                    ?>
                </table>
                
             </div>
          </div>
        </div>
     </div>
  </div>
<?php
 include("includes/footer.php");
?>