<?php
 include("include/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .form-group a {
            display: block;
            text-align: right;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s;
        }

        .form-group a:hover {
            color: #0056b3;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 15px;
            }

            h1 {
                font-size: 24px;
            }

            input[type="email"],
            input[type="password"],
            input[type="submit"] {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <input type="submit" id='submit' name='submit' value="Login">
            </div>
            <!-- <div class="form-group">
                <a href="#">Forgot Password?</a>
            </div> -->
        </form>
    </div>
</body>
</html>
<?php
 
 if(isset($_POST['submit'])) {
     $email_new = $_POST['email'];
     $pass_new = $_POST['password'];
     $select = "SELECT * FROM student_signin WHERE stu_email='$email_new'";
     $run = mysqli_query($con, $select);
     if ($run && mysqli_num_rows($run) > 0) {
         $row = mysqli_fetch_assoc($run);
         $email_save = $row['stu_email'];
         $pass_save = $row['stu_pass']; 
         if ($email_new == $email_save && $pass_new==$pass_save) {
             echo "<script>alert('Login Successfully')</script>";
             echo "<script>window.open('index.php','_self')</script>";
         } else {
             echo "<script>alert('Password does not match')</script>";
         }
     } else {
         echo "<script>alert('Email not found')</script>";
     }
 }

 
?>