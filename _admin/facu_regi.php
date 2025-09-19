<?php
error_reporting(false);
include("includes/function.php");
?>
<?php
global $con;
if (isset($_REQUEST['f_id'])) {
  $sql = "select * from faculty where f_id='$_REQUEST[f_id]'";
  $rs = mysqli_query($con, $sql);
  // mysqli_close($con);
  $data = mysqli_fetch_assoc($rs);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty Registration Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/validation.js"></script>
</head>

<body>
  <div class="container my-5">
    <h3 class="text-center mb-4">Faculty Registration Form</h3>

    <div class="card shadow-lg p-4">
      <form id="facultyRegistrationForm" name="facultyRegistrationForm" method="post" action="lib/facu.php">
        <div class="row">
          <div class="col-md-6">
            <!-- Name -->
            <div class="mb-3">
              <label for="f_name" class="form-label">Name</label>
              <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter your name"
                oninput="validate_name(this,event);" value="<?=$data['f_name']?>" required>
            </div>

            <!-- Gender -->
            <div class="mb-3">
              <label class="form-label">Gender</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="f_gen_male" name="f_gen" value="Male" <?php if ($data['f_gen'] == "Male") echo "checked"; ?>>
                <label class="form-check-label" for="f_gen_male">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="f_gen_female" name="f_gen" value="Female" <?php if ($data['f_gen'] == "Female") echo "checked"; ?>>
                <label class="form-check-label" for="f_gen_female">Female</label>
              </div>
            </div>

            <!-- Qualification -->
            <div class="mb-3">
              <label for="f_quali" class="form-label">Qualification</label>
              <select id="f_quali" name="f_quali" class="form-select">
                <?php echo get_dropdown_list("faculty_quali", "f_qua_id", "f_qua_name", $data['f_quali']); ?>
              </select>
            </div>

            <!-- Phone -->
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="tel" class="form-control" name="phone" id="phone" required placeholder="Enter phone number"
                oninput="validate_phone(this,event)" maxlength="10" value="<?=$data['f_phone']?>">
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" required placeholder="Enter email address"
                oninput="validate_email(this,event)" value="<?=$data['f_email']?>" />
            </div>

            <!-- Experience -->
            <div class="mb-3">
              <label for="experience" class="form-label">Experience</label>
              <input type="text" class="form-control" name="experience" id="experience" value="<?=$data['f_expe']?>" />
            </div>

            <!-- Area of Interest -->
            <div class="mb-3">
              <label for="f_interst" class="form-label">Area of Interest</label>
              <select id="f_interst" name="f_interst" class="form-select">
                <?php echo get_dropdown_list("area_of_intrest", "area_id", "area_name", $data['f_interst']); ?>
              </select>
            </div>
          </div>

          <div class="col-md-6">
            <!-- Date of Joining -->
            <div class="mb-3">
              <label for="f_doj" class="form-label">Date of Joining</label>
              <input type="text" class="form-control" id="f_doj" name="f_doj" placeholder="DD/MM/YYYY"
                oninput="valid_date_input(this,event);" value="<?=$data['f_doj']?>" />
            </div>

            <!-- Designation -->
            <div class="mb-3">
              <label for="designation" class="form-label">Designation</label>
              <select id="designation" name="designation" class="form-select">
                <?php echo get_dropdown_list("designation", "de_id", "de_name", $data['f_degi']); ?>
              </select>
            </div>

            <!-- Stream -->
            <div class="mb-3">
              <label for="f_stream" class="form-label">Stream</label>
              <select id="f_stream" name="stream" class="form-select">
                <?php echo get_dropdown_list("stream", "stream_id", "stream_name", $data['f_stream']); ?>
              </select>
            </div>

            <!-- Security Question -->
            <div class="mb-3">
              <label for="f_que" class="form-label">Security Question</label>
              <select name="f_que" id="f_que" class="form-select">
                <?php echo get_dropdown_list("security", "sec_id", "sec_ques", $data['f_que']) ?>
              </select>
            </div>

            <!-- Security Answer -->
            <div class="mb-3">
              <label for="security_answer" class="form-label">Security Answer</label>
              <input type="text" class="form-control" name="security_answer" id="security_answer" value="<?=$data['f_ans']?>" />
            </div>
          </div>
        </div>

        <!-- Submit and Cancel Buttons -->
        <div class="text-center mt-4">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" onclick="resetForm()">Cancel</button>
        </div>

        <input type="hidden" name="act" id="act" value="save_faculty" />
        <input type="hidden" name="f_id" value="<?= $data['f_id'] ?>" />
      </form>
    </div>
  </div>

  <script>
    $(function () {
      $("#f_doj").datepicker({
        changeMonth: true,
        changeYear: true,
        startYear: 1900,
        EndYear: 2000
      });
      $("#f_doj").datepicker({
        changeMonth: true,
        changeYear: true
      });
    });

    function resetForm() {
      document.getElementById("facultyRegistrationForm").reset();
    }
  </script>
</body>

</html>
