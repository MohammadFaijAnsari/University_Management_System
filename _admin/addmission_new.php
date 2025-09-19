<?php
 include("includes/header.php");
 include("includes/db_connect.php");
?>
    <style>
        body {
            background-color: #f7f7f7;
        }

        .container {
            max-width: 650px;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            margin-top: 50px;
        }

        h3 {
            text-align: center;
            margin-bottom: 40px;
            color: #007bff;
            font-size: 28px; 
            font-weight: bold;
        }

        .form-group label {
            font-weight: bold;
            color: #495057;
            font-size: 18px; /* Increased label font size */
        }

        .form-control {
            font-size: 18px; /* Increased font size for input fields */
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            box-shadow: none;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px 30px;
            font-size: 18px; /* Increased button font size */
            font-weight: bold;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-group textarea {
            resize: vertical;
            font-size: 18px;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ced4da;
        }

        .form-group input[type="file"] {
            padding: 12px;
        }

        
    </style>
<body>
    <div class="container">
        <h3>Course Details Form</h3>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="courseTitle">Course</label>
                <input type="text" class="form-control" id="c_title" name='c_title' placeholder="Enter Course Title" required>
            </div>
        
            <div class="form-group">
                <label for="courseDescription">Course Description</label>
                <textarea class="form-control" id="c_desc" name='c_desc' rows="4" placeholder="Enter Course Description" required></textarea>
            </div>

            <div class="form-group">
                <label for="courseDuration">Course Duration</label>
                <input type="text" class="form-control" id="c_dur" name='c_dur' placeholder="Enter Course Duration (e.g., 3 months)" required>
            </div>

            <div class="form-group">
                <label for="courseFees">Course Fees</label>
                <input type="text" class="form-control" id="c_fees" name='c_fees' placeholder="Enter Course Fees" required>
            </div>
 
            <div class="form-group">
                <label for="courseImage">Course Related Image</label>
                <input type="file" name="c_image" id="c_image" required class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="submit" name="submit">Submit</button>
        </form>
        <?php
         if(isset($_POST['submit'])){
            $c_title = $_POST['c_title'];
            $c_course_desc = $_POST['c_desc'];
            $c_course_dur = $_POST['c_dur'];
            $c_fees = $_POST['c_fees'];
            $c_image = $_FILES['c_image']['name'];
            $c_tmp_name = $_FILES['c_image']['tmp_name'];

            $img = explode('.', $c_image);
            $u_image = $img[0] . time() . '.' . $img[1];

            if(move_uploaded_file($c_tmp_name, "uploads/" . $u_image)){
                $insert = "INSERT INTO addmission_new(c_title, c_desc, c_dur, c_fees, c_image) 
                           VALUES('$c_title', '$c_course_desc', '$c_course_dur', '$c_fees', '$u_image')";
                $run = mysqli_query($con, $insert);
                if($run){
                    echo "<script>alert('Data Saved Successfully')</script>";
                } else {
                    echo "<script>alert('Data Save Failed')</script>";                    
                }
            }
         }
        ?>
    </div>
</body>
</html>
<?php
 include("includes/footer.php");
?>
