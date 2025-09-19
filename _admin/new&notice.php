<?php
 include("includes/db_connect.php");
 include("includes/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Form</title>
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

    .btn-submit {
      width: 30%;
      padding: 12px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s;
    }
    #cancel{
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
    }

  </style>
</head>
<body>

  <div class="container">
    <h1>New & Notice</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" placeholder="Enter title">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea id="desc" name="desc"  placeholder="Enter description"></textarea>
      </div>
      <div class="form-group">
        <label for="datetime">Date and Time</label>
        <input type="datetime-local" id="datetime" name="datetime">
      </div>
      <div class="form-group">
        <label for="file">Upload Image/Document</label>
        <input type="file" id="file" name="file" accept=".jpg, .jpeg, .png, .pdf, .docx, .txt" >
      </div>
      <button type="submit" class="btn-submit" id="submit" name="submit">Submit</button>
      &nbsp;
      <button type="submit" class="btn-submit" id="cancel" name="cancel">Cancel</button>
    </form>
  </div>
  <!-- Apply Php store the Database -->
   <?php
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $datetime=$_POST['datetime'];
        $file=$_FILES['file']['name'];
        $img=explode(".",$file);
        $file=$img[0].time().".".$file;
        $file_tmp=$_FILES['file']['tmp_name'];
  
        move_uploaded_file($file_tmp,"uploads/$file");
        
        $insert_new="INSERT INTO news_notice(new_title,new_desc,new_datetime,new_image) VALUES('$title','$desc','$datetime','$file')";
        $run_new=mysqli_query($con,$insert_new);
        if($run_new){
            echo "<script>alert('News Deatils Saved Sucessfully')</script>";
        }else{
            echo "<script>alert('News Deatils Saved Unsucessfully')</script>";
        }
    }

   ?>
</body>
</html>

<?php
 include("includes/footer.php");
?>