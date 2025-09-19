<?php
include("include/db_connect.php");
include("include/header.php");
?>
<style>
    body,
    html {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .container {
        display: flex;
        justify-content: space-between;
        align-items: stretch;
        padding: 20px;
        gap: 20px;
        flex-wrap: wrap;
    }

    .hostel-box {
        background-color: white;
        border-radius: 8px;
        width: 30%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .hostel-box:hover {
        transform: scale(1.05);
    }

    .hostel-box img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .description {
        padding: 20px;
        text-align: center;
    }

    .description h3 {
        margin: 0 0 10px;
        font-size: 1.5rem;
        color: #333;
    }

    .description p {
        font-size: 16px;
        color: #555;
        line-height: 1.5;
    }

    /* Responsiveness for smaller screens */
    @media (max-width: 768px) {
        .hostel-box {
            width: 45%;
        }
    }

    @media (max-width: 480px) {
        .hostel-box {
            width: 100%;
        }
    }

    #hostel {
        text-align: center;
        font-size: 30px;
        height: auto;
        width: 100%;
        margin-top: 10px;
        background-color: midnightblue;
        color: white;
    }
</style>
</head>

<body>
    <h1 id="hostel">Holiday</h1>
    <?php
     $get_data="SELECT * FROM news_notice";
     $run_data=mysqli_query($con,$get_data);
     while($row_data=mysqli_fetch_array($run_data)){
         $new_id[]=$row_data['new_id'];
         $new_title[]=$row_data['new_title'];
         $new_desc[]=$row_data['new_desc'];
         $new_datetime[]=$row_data['new_datetime'];
         $new_image[]=$row_data['new_image'];
     } 
    ?>
    <div class="container">
        <?php
         for($i=0;$i<count($new_id);$i++){
            $image="./_admin/uploads/" . $new_image[$i];
        ?>
        <div class="hostel-box">
            <img src="<?php echo $image;?>" alt="Hostel 1">
            <div class="description">
                <p><strong>Holiday Title:</strong><?php echo $new_title[$i];?></p>
                <p><strong>Holiday Description:</strong><?php echo $new_desc[$i];?></p>
                <p><strong>Holiday Date:</strong><?php echo $new_datetime[$i];?></p>
                
            </div>
        </div>
        <?php } ?>
    </div>
    
</body>

</html>

<?php
include("include/footer.php");
?>