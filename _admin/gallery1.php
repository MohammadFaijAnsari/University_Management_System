<?php include_once("includes/header.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Lightbox Gallery</title>
    <link rel="stylesheet" href="./plugins/Lightbox/lightbox/css/lightbox.css" type="text/css" media="screen"/>
    <script src="./plugins/Lightbox/lightbox/js/prototype.js" type="text/javascript"></script>
    <script src="./plugins/Lightbox/lightbox/js/scriptaculous.js?load=effects" type="text/javascript"></script>
    <script src="./plugins/Lightbox/lightbox/js/lightbox.js" type="text/javascript"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        center {
            display: block;
            padding: 20px;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        /* Each image link */
        .gallery a {
            display: block;
            width: 100%;
            max-width: 120px; /* Image width for larger screens */
        }

        /* Image styling */
        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .gallery img:hover {
            transform: scale(1.1); /* Scale image slightly when hovered */
        }

        /* Responsive design for mobile and smaller screens */
        @media only screen and (max-width: 768px) {
            .gallery a {
                max-width: 100px; /* Slightly smaller images for tablets */
            }
        }

        @media only screen and (max-width: 480px) {
            .gallery a {
                max-width: 80px; /* Smaller images for mobile phones */
            }

            .gallery img {
                border-radius: 5px;
            }
        }
    </style>
</head>
<body>

<center>
    <div class="gallery">
        <a href="./plugins/Lightbox/images/bw1.jpg" rel="lightbox[a]">
            <img src="./plugins/Lightbox/images/bw1.jpg" height="100" width="100" alt="Image 1">
        </a>
        <a href="./plugins/Lightbox/images/bw2.jpg" rel="lightbox[a]">
            <img src="./plugins/Lightbox/images/bw2.jpg" height="100" width="100" alt="Image 2">
        </a>
        <a href="./plugins/Lightbox/images/bw3.jpg" rel="lightbox[a]">
            <img src="./plugins/Lightbox/images/bw3.jpg" height="100" width="100" alt="Image 3">
        </a>
        <a href="./plugins/Lightbox/images/Creek.jpg" rel="lightbox[a]">
            <img src="./plugins/Lightbox/images/Creek.jpg" height="100" width="100" alt="Image 4">
        </a>
        <a href="./plugins/Lightbox/images/lights3.jpg" rel="lightbox[b]">
            <img src="./plugins/Lightbox/images/lights3.jpg" height="100" width="100" alt="Image 5">
        </a>
        <a href="./plugins/Lightbox/images/Desert Landscape.jpg" rel="lightbox[b]">
            <img src="./plugins/Lightbox/images/Desert Landscape.jpg" height="100" width="100" alt="Image 6">
        </a>
        <a href="./plugins/Lightbox/images/lights2.jpg" rel="lightbox[b]">
            <img src="./plugins/Lightbox/images/lights2.jpg" height="100" width="100" alt="Image 7">
        </a>
    </div>
</center>

</body>
</html>
<?php include_once('includes/footer.php') ?>