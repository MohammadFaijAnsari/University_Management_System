<?php
// error_reporting(false);
include("includes/db_connect.php");
include("includes/header.php");
?>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        width: 600px;
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-size: 16px;
        color: #555;
        display: block;
        margin-bottom: 8px;
    }

    input[type="text"],
    textarea,
    input[type="datetime-local"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    input[type="file"] {
        border: none;
    }

    .btn-container {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .btn-submit {
        padding: 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
        width: 48%;
    }

    #cancel {
        background-color: red;
    }

    .btn-submit:hover {
        background-color: #45a049;
    }

    /* Responsive Design */
    @media (max-width: 600px) {
        .container {
            padding: 15px;
        }

        h1 {
            font-size: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"],
        textarea,
        input[type="datetime-local"],
        input[type="file"],
        .btn-submit {
            font-size: 14px;
        }

        .btn-container {
            flex-direction: column;
        }
    }
</style>

<body>

  <div class="container">
    <h1>Add Uploads</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="g_title" name="g_title" placeholder="Enter title">
      </div>
      <div class="form-group">
        <label for="file">Upload Image/Document</label>
        <input type="file" id="g_image[]" name="g_image[]"  accept=".jpg, .jpeg, .png, .pdf, .docx, .txt" multiple>
      </div>
      <div class="form-group btn-container">
        <button type="submit" class="btn-submit" id="submit" name="submit">Submit</button>
        <button type="submit" class="btn-submit" id="cancel" name="cancel">Cancel</button>
      </div>
    </form>
  </div>

  <!-- Apply Php store the Database -->
  <?php
    error_reporting(false);
    $total_files = count($_FILES['g_image']['name']); 
    if(isset($_POST['submit'])) {
        $g_title = $_POST['g_title'];
        $c_date = date('d/m/y');

        for($i = 0; $i < $total_files; $i++) {  
            $g_image = $_FILES['g_image']['name'][$i];
            $g_tmp = $_FILES['g_image']['tmp_name'][$i];

            $img = explode('.', $g_image);
            $unique_image_name = $img[0] . time() . '.' . $img[1];

            if (move_uploaded_file($g_tmp, "Gallery/" . $unique_image_name)) {
                $g_insert = "INSERT INTO gallery (g_title, g_image, date) VALUES ('$g_title', '$unique_image_name', '$c_date')";
                $run_insert = mysqli_query($con, $g_insert);      
                if ($run_insert) {
                    // echo "<script>alert('Gallery Image Uploaded Successfully');</script>";
                } else {
                    echo "<script>alert('Gallery Image Upload Failed');</script>";
                }
            }
        }
    }
  ?>

</body>
</html>

<?php
include("includes/footer.php");
?>
