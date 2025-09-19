<?php
 include("include/db_connect.php");
 include("include/header.php");
?>
<style>
#title {
        background-color: navy;
        color: white;
        font-size: 30px;
        padding: 15px 0;
        margin: 0;
        text-align: center;
    } 
.gallery-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); 
    gap: 20px; 
    padding: 20px;
}

/* Card styling */
.gallery-item {
    border: 1px solid #ddd;  
    border-radius: 8px;  
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);  
    overflow: hidden;
    transition: transform 0.3s ease-in-out;  
}

.gallery-item:hover {
    transform: scale(1.05);  
}

/* Image styling */
.card-img-top {
    width: 100%;
    height: 200px;  
    object-fit: cover;  
}

/* Card body with title styling */
.card-body {
    padding: 15px;
    text-align: center;
}

.card-title {
    font-size: 1.2em;
    font-weight: bold;
    color: #333;
    margin-top: 10px;
    text-transform: capitalize;
}

</style>
<section class="gallery">
  <h1 id="title">Gallery</h1>
  <div class="gallery-container">
      <?php
        if(isset($_GET['Image_title'])){
            $image_title = $_GET['Image_title'];
            $select_image = "SELECT * FROM gallery WHERE g_title='$image_title'";
            $run_image = mysqli_query($con, $select_image);
            while($row_image = mysqli_fetch_array($run_image)){
                $image_src = './_admin/Gallery/' . $row_image['g_image'];
                $image_title = $row_image['g_title'];
                
                echo "
                <div class='gallery-item card'>
                    <img src='$image_src' alt='$image_title' class='img-fluid card-img-top'>
                    <div class='card-body'>
                        <h5 class='card-title'>$image_title</h5>
                    </div>
                </div>
                ";
            }
        }
      ?>
  </div>
</section>

<?php
 include("include/footer.php");
?>
