<?php
 session_start();
?>
<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<center>
  <form name="index" id="index" method="post" action="lib/login.php">
    <style>
       body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      login-form {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 400px;
        text-align: center;
      }
      h1.style1 {
        color: #993300;
        font-size: 24px;
        margin-bottom: 20px;
        font-weight: bold;
      }      
      table {
        /* width: 50%; */
        border-radius: 10px;
        background-color: aqua;
        border: none;
        border-collapse: collapse;
        margin-top: 20px;
      }
      table td {
        border: none;
        padding: 10px;
        font-size: 20px;
      }
      table td.style3 {
        color: rgb(1, 8, 8);
        text-align: left;
      }
      input[type="text"],
      input[type="password"],
      select {
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
      }
      select{
        width: 90%;
      }

      input[type="text"]:focus,
      input[type="password"]:focus,
      select:focus {
        border-color: #993300;
        outline: none;
      }

      
      input[type="submit"] {
        background-color: rgb(40,167,59);
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        width: 45%;
        margin: 10px 10px 0 0;
      }   
      input[type="reset"] {
        background-color:rgb(220,53,69);
        color: rgb(255,255,255);
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        width: 45%;
        margin: 10px 10px 0 0;
      }
      a {
        color: #993300;
        text-decoration: none;
        font-size: 14px;
        display: block;
        margin-top: 10px;
      }      
      input[type="hidden"] {
        display: none;
      } 
      img#captcha-img {
        display: block;
        margin: 10px auto;
        height: 30px;
        width: auto;
        border-radius: 5px;
      }

      /* Styling for Captcha input field */
      input#captcha {
        padding: 10px;
        margin: 5px 0;
        margin-left: 20px;
        width: 200px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        width: 50%;
      }
      

      input#captcha:focus {
        border-color: #993300;
        outline: none;
      }
    </style>
    <table width="400" height="225" border="1">
      <tr>
        <td height="110" colspan="2" align="center">
          <h1 class="style1">University Login Form </h1>
        </td>
      </tr>
      <tr>
        <td width="404" class="style3">Username:</td>
        <td width="371">
          <label>
            <input type="text" name="login_user" id="login_user" required />
          </label>
        </td>
      </tr>
      <tr>
        <td>Password:</td>
        <td><input type="password" name="login_pass" id="login_pass" require>
        </td>
      </tr>
      <tr>
        <td>Login type</td>
        <td>
          <select id="login_type" name="login_type">
            <option type="0">Plz select</option>
            <option type="1">Admin</option>
            <option type="2">Faculity</option>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <img src="captcha.php" alt="" srcset="">
          <a href="index.php">
          <i class="fa-solid fa-rotate-right fa-2x"></i>
          </a>
          <br>  
          Captcha
          <input type="text" name="captcha" id="captcha" placeholder="Captcha"/>
          <label>
            <a href="forget.php"> Forget Password?</a>
            <input type="submit" name="Submit" value="Login" />
          </label>
          <input type="reset" name="Submit2" value="Cancel" />

          <a href="facu_regi.php"> SignIn</a>
        </td>
      </tr>

    </table>
</center>
<input type="hidden" name="act" value="login" />
<input type="hidden" name="act" value="SignIn" />
</form>