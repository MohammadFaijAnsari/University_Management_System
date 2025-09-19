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
#mesh{
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
    <h1 id="mesh">Mesh</h1>
    <div class="container">
        <div class="hostel-box">
            <img src="images/hostel1.jpeg" alt="Hostel 1">
            <div class="description">
                <h3>Mesh 1</h3>
                <p>Our  hostel offers spacious rooms and special lunch, dinner and snack, 24/7 security, and well-maintained facilities. Students can enjoy a peaceful environment for studying and recreational activities.</p>
            </div>
        </div>

        <div class="hostel-box">
            <img src="images/hostel2.jpeg" alt="Hostel 2">
            <div class="description">
                <h3>Mesh 2</h3>
                <p>The  hosteland special lunch, dinner and snack provides a safe and comfortable living space with modern amenities, including Wi-Fi, a mess hall, and study rooms for a balanced lifestyle.</p>
            </div>
        </div>

        <div class="hostel-box">
            <img src="images/hostel3.jpeg" alt="Hostel 3">
            <div class="description">
                <h3>Mesh 3</h3>
                <p>This hostel and special lunch, dinner and snack caters to international students, offering a global living experience with facilities like cultural exchange events and language assistance.</p>
            </div>
        </div>
    </div>
</body>
</html>

<?php
 include("include/footer.php");
?>
