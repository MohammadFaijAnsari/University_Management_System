<?php
error_reporting(false);
include("includes/db_connect.php");
?>

<?php
session_start();

if (isset($_SESSION["faculity_login"])) {
    $username = $_SESSION['faculity_login'];
    $password = $_SESSION['faculity_password'];
    echo $username;
    echo  $password;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty Password Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container my-5">
    <h1 class="text-center mb-4">Faculty Password Form</h1>

    <form name="index" id="index" method="post" action="lib/login.php">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card p-4">
            <div class="card-body">
              <div class="mb-3">
                <label for="f_login" class="form-label">Username:</label>
                <input type="text" class="form-control" name="f_login" id="f_login" value="<?= $username ?>" />
              </div>

              <div class="mb-3">
                <label for="f_pass" class="form-label">Password:</label>
                <input type="text" class="form-control" name="f_pass" id="f_pass" value="<?= $password ?>" />
              </div>

              <div class="mb-3">
                <label for="fc_pass" class="form-label">Confirm Password:</label>
                <input type="text" class="form-control" name="fc_pass" id="fc_pass" value="<?= $password ?>" />
              </div>

              <div class="d-flex justify-content-between">
                <button type="submit" name="submit" class="btn btn-primary" formaction="facu_img.php">Upload DP</button>
                <button type="submit" name="skip" class="btn btn-secondary" formaction="facu_det.php">Skip</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!-- Optional: Add Bootstrap JS (if needed) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
