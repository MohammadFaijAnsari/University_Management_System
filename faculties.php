<?php
 include("include/db_connect.php");
 include("include/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Hostels</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        
body, html {
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
#hostel{
    text-align: center;
    font-size: 30px;
    height:auto ;
    width: 100%;
    margin-top: 10px;
    background-color: midnightblue;
    color: white;
}
#image{
    width: 90%;
    height: 50%;
}
    </style>
</head>
<body>
    <<h1 id="hostel">Faculties</h1>

<!-- Select Approved Faculties Start -->
<?php
    $select_fac = "SELECT * FROM faculty WHERE f_act=1";
    $run_fac = mysqli_query($con,$select_fac);
    while ($row_fac = mysqli_fetch_array($run_fac)) {
        $f_id[] = $row_fac['f_id'];
        $f_name[] = $row_fac['f_name'];
        $f_gen[] = $row_fac['f_gen'];
        $f_phone[] = $row_fac['f_phone'];
        $f_email[] = $row_fac['f_email'];
        $f_expe[] = $row_fac['f_expe'];
        $f_quali=$row_fac['f_quali'];
        $f_img[] = $row_fac['f_dp']; 
    }
?>
<!-- Select Approved Faculties End-->

<div class="container">
    <?php 
      for ($i = 0; $i <count($f_id); $i++) {
        $image_path = "./_admin/uploads/" . $f_img[$i];
    ?>
        <div class="hostel-box">
            <img src="<?php echo $image_path; ?>" alt="Faculty Image" id="image">
            <div class="description">
                <h3>Name:<?php echo $f_name[$i]; ?></h3>
                <p><strong>Gender:</strong> <?php echo $f_gen[$i]; ?></p>
                <!-- <p><strong>Qualification:</strong></p> -->
                <p><strong>Experiance:</strong> <?php echo $f_expe[$i]. " Year";?></p>
                <p><strong>Phone:</strong> <?php echo $f_phone[$i]; ?></p>
                <p><strong>Email:</strong> <?php echo $f_email[$i]; ?></p>
                
            </div>
        </div>
    <?php
    }
    ?>
</div>
</body>
</html>
<?php
 include("include/footer.php");
?>
