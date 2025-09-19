<?php
include("include/header.php");
include("include/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Hostels</title>
    <link rel="stylesheet" href="styles.css">
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
    <h1 id="hostel">Admission Related News</h1>
    
    <div class="container">
        <?php
        $select_addmission_data = "SELECT * FROM addmission_new";
        $run_admission_data = mysqli_query($con, $select_addmission_data);

        // Check if there are any rows returned
        if (mysqli_num_rows($run_admission_data) > 0) {
            while ($row_admission_data = mysqli_fetch_array($run_admission_data)) {
                $c_image = $row_admission_data['c_image'];
                $c_title = $row_admission_data['c_title'];
                $c_desc = $row_admission_data['c_desc'];
                $c_dur = $row_admission_data['c_dur'];
                $c_fees = $row_admission_data['c_fees'];
        ?>
            <div class="hostel-box">
                <img src="./_admin/uploads/<?php echo $c_image; ?>" alt="Hostel 1">
                <div class="description">
                    <h3><?php echo $c_title; ?></h3>
                    <p><strong>Description:&nbsp;</strong><?php echo $c_desc; ?></p>
                    <p><strong>Duration:&nbsp;</strong><?php echo $c_dur; ?></p>
                    <p><strong>Fees:&nbsp;</strong><?php echo $c_fees; ?></p>
                </div>
            </div>
        <?php
            }
        } else {
            echo "<p>No admission data available.</p>";
        }
        ?>
    </div>

</body>

</html>

<?php
include("include/footer.php");
?>
