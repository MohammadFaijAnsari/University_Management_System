<?php
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
#library{
    text-align: center;
    font-size: 30px;
    height:auto ;
    width: 100%;
    margin-top: 10px;
    background-color: midnightblue;
    color: white;
}
    </style>
</head>
<body>
    <h1 id="library">Library</h1>
    <div class="container">
        <div class="hostel-box">
            <img src="images/library1.jpeg" alt="Hostel 1">
            <div class="description">
                <h3>Library 1</h3>
                <p>The university library provides students and faculty with access to a vast collection of books, journals, digital resources, study spaces, and research support services, fostering academic excellence and intellectual growth.</p>
            </div>
        </div>

        <div class="hostel-box">
            <img src="images/library2.jpeg" alt="Hostel 2">
            <div class="description">
                <h3>Library 2</h3>
                <p>The university library provides students and faculty with access to a vast collection of books, journals, digital resources, study spaces, and research support services, fostering academic excellence and intellectual growth.</p>
            </div>
        </div>

        <div class="hostel-box">
            <img src="images/library3.jpeg" alt="Hostel 3">
            <div class="description">
                <h3>Library 3</h3>
                <p>The university library provides students and faculty with access to a vast collection of books, journals, digital resources, study spaces, and research support services, fostering academic excellence and intellectual growth.</p>
            </div>
        </div>
    </div>
</body>
</html>

<?php
 include("include/footer.php");
?>
