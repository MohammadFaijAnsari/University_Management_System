
<?php 
session_start();
if(!isset($_SESSION['login_name'])) {
  header("location:index.php?msg=Plz Login First to Continuee....");
  die;
}
include("db_connect.php");
include("function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <!-- CSS Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="./js/validation.js" defer></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
            font-size: 15px;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #f8f9fa;
            border-bottom: 2px solid #ddd;
            margin-bottom: 20px;
        }

        .navbar a {
            color: navy;
            font-weight: bold;
            text-decoration: none;
        }
        .navbar a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .navbar .navbar-header h3 {
            margin: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="text-decoration: none;">Admin Panel in University</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="student_add.php">Home</a></li>
                <li><a href="student_view.php">Student</a></li>
                <li><a href="student_fees.php">Fees</a></li>
                <li><a href="exam_add.php">Examination</a></li>
                <li><a href="exam_view.php">Exam View</a></li>
                <li><a href="#">About</a></li>
                <li><a href="gallery2.php">Gallery</a></li>
                <li><a href="gallery_view.php">Gallery View</a></li>
                <li><a href="fees&exam_view.php">Fees & Exam View</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="facu_view.php">Faculty</a></li>
                <li><a href="new&notice.php">News & Notice</a></li>
                <li><a href="addmission_new.php">Admission New</a></li>
                <li><a href="lib/login.php?act=logout">Logout</a></li>
            </ul>
        </div>
    </nav>
</body>
</html>
