<?php
include("include/db_connect.php");
include("include/header.php");
?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

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
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        padding: 20px;
        width: 200%;
        margin: 0 auto;
        max-width: 1200px;
    }


    .gallery-item {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        width: 80%;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
    }

    .gallery-item img {
        height: 200px;
        width: 100%;
        /* Make the width 100% for responsive images */
        object-fit: cover;
        display: block;
    }

    .gallery-item p {
        background-color: navy;
        color: white;
        font-size: 16px;
        margin: 0;
        padding: 10px;
        text-align: center;
    }

    .gallery-item:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .text-right {
        background-color: navy;

    }

    .text-right a {
        color: white;
    }
</style>

<section class="gallery">
    <h1 id="title">Gallery</h1>
    <div class="gallery-container">
        <?php
        $select_gallery = "SELECT g_id, g_title, g_image FROM gallery WHERE g_id IN (SELECT MIN(g_id) FROM gallery GROUP BY g_title)";
        $run_gallery = mysqli_query($con, $select_gallery);
        while ($row_gallery = mysqli_fetch_array($run_gallery)) {
            $image_id = $row_gallery['g_id'];
            $image_title = $row_gallery['g_title'];
            $image_image = $row_gallery['g_image'];
           //   Image Count Title Wise
            $image_count = "SELECT COUNT(*) AS count FROM gallery WHERE g_title = '$image_title'";
            $run_count = mysqli_query($con, $image_count);
            $count_result = mysqli_fetch_array($run_count);
            $image_count = $count_result['count'];

            echo "
                <div class='gallery-item'>
                    <img src='./_admin/Gallery/$image_image' alt='$image_title' class='img-fluid' >
                        <p class=''>$image_title ($image_count Images)
                           <div class='text-right'>
                               <a href='all_image.php?Image_title=$image_title' style='font-size:15px'>
                                    View All Images <i class='fa fa-arrow-circle-right'></i>
                               </a>
                           </div>
                    </p>
                </div>
               ";
        }
        ?>
    </div>

</section>

<?php
include("include/footer.php");
?>