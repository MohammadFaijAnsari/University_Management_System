<?php
 include("include/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ6H2uN/vhdsMXa7K0lP6YIcsZL2y6V5OqJYwP7KKMEhGzqVIMbtjK6QtxUy" crossorigin="anonymous">
<!-- Sweet alet CDN Link -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap Bundle JS (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0Wo8YoL33gL6tQ2Wzrt5yyfF0OiyLcdmMzdZPcxVXnx8QxmB" crossorigin="anonymous"></script>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .registration-container {
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
      margin: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 24px;
      color: #333;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #333;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    input[type="password"] {
      font-family: 'Arial', sans-serif;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }

    .footer-text {
      text-align: center;
      margin-top: 20px;
    }

    .footer-text a {
      color: #007bff;
      text-decoration: none;
    }

    .footer-text a:hover {
      text-decoration: underline;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .registration-container {
        padding: 30px;
      }

      input, button {
        font-size: 14px;
      }

      h2 {
        font-size: 20px;
      }
    }

    @media (max-width: 480px) {
      .registration-container {
        padding: 20px;
      }

      input, button {
        font-size: 12px;
      }

      h2 {
        font-size: 18px;
      }
    }
  </style>
</head>
<body>
  <div class="registration-container">
    <form action="#" method="POST">
      <h2>Student Registration</h2>
      
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" placeholder="Enter your full name" required>

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>

      <label for="address">Address</label>
      <input type="text" id="address" name="address" placeholder="Enter your address" required>

      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>

      <button type="submit" id="submit" name="submit">Register</button>
    </form>
  </div>

</body>
</html>
<?php
   if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    
    $insert_data="INSERT INTO student_signin(stu_name,stu_email,stu_address,stu_phone,stu_pass) VALUES ('$name','$email','$address','$phone','$password') ";
     $run_data=mysqli_query($con,$insert_data);
     if($run_data) {
      // echo "<script> Swal.fire({ text: 'Registration Sucessfully',icon: 'success'});</script>";
      echo "<script>window.open('student_login.php','_self')</script>";
    }
   }
?>