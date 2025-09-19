<?php
error_reporting(false);
include_once('includes/header.php')

?>
<style>
  /* Styling the form container */
  form {
    max-width: 100%;
    margin: 0 auto;
    padding: 10px;
  }

  /* Styling the table */
  table {
    width: 100%;
    border-collapse: collapse;
    margin: 10px 0;
  }

  table td {
    padding: 0px;
    text-align: left;
  }

  /* Heading Style */
  .style1 {
    color: #CC0000;
    font-weight: bold;
    font-size: 36px;
  }

  /* General input and select styling */
  input[type="text"],
  input[type="email"],
  input[type="file"],
  textarea,
  select {
    width: 100%;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
  }

  /* Styling for submit and reset buttons */
  input[type="submit"],
  input[type="reset"] {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #007BFF;
    color: white;
    border: 1px solid #007BFF;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type="submit"]:hover,
  input[type="reset"]:hover {
    background-color: #0056b3;
    border-color: #0056b3;
  }

  /* Styling for textarea */
  textarea {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    /* Allow users to resize the textarea vertically */
  }

  /* Responsive Styles */
  @media only screen and (max-width: 768px) {
    table {
      width: 100%;
    }

    table td {
      display: block;
      width: 100%;
      padding: 10px 0;
    }

    input[type="text"],
    input[type="email"],
    input[type="file"],
    textarea,
    select {
      width: 100%;
      font-size: 14px;
    }

    input[type="submit"],
    input[type="reset"] {
      width: 100%;
      font-size: 14px;
    }

    /* Styling for file input field */
    input[type="file"] {
      padding: 8px;
    }

    /* Specific adjustments for the form title */
    .style1 {
      font-size: 28px;
      /* Smaller font size on smaller screens */
    }
  }

  @media only screen and (max-width: 480px) {
    .style1 {
      font-size: 24px;
      /* Adjust font size further for very small screens */
    }

    input[type="text"],
    input[type="email"],
    input[type="file"],
    textarea,
    select {
      font-size: 12px;
    }

    input[type="submit"],
    input[type="reset"] {
      font-size: 14px;
    }
  }
</style>

<?php
global $con;
if (isset($_REQUEST['st_id'])) {
  $sql = "select * from student where st_id='$_REQUEST[st_id]'";
  $rs = mysqli_query($con, $sql);
  // echo $sql;
  // die;

  $data = mysqli_fetch_assoc($rs);
  // print_r($data);
  // die;

  // mysqli_close($con);

}
?>

<style type="text/css">
  .style1 {
    color: #CC0000;
    font-weight: bold;
    font-size: 36px;
  }
</style>


<!-- onsubmit="return valid_student(this);"-->
<form action="lib/student.php" id="student_add" name="student_add" method="post" onsubmit="return valid_student(event);"
  enctype="multipart/form-data">
  <table width="95%" height="373" border="1">
    <tr>
      <td colspan="4">
        <div align="center" class="style1">Student Registration Form</div>
      </td>
    </tr>
    <tr>
      <td width="148">Enter Name :- </td>
      <td width="282">
        <input type="text" id="st_name" name="st_name" autofocus value="<?= $data['st_name'] ?>"
          placeholder="Enter your name" oninput="validate_name(this,event);" />
      </td>
      <td width="218">Enter Father Name :- </td>
      <td width="301">
        <input type="text" id="st_fathername" name="st_fathername" value="<?= $data['st_fathername'] ?>"
          placeholder="Enter your father's name" oninput="validate_name(this,event);" />
      </td>
    </tr>
    <tr>
      <td>Select Gender :- </td>
      <td>
        <label>
          <input type="radio" id="st_gen" name="st_gen" value="Male" <?php if ($data['st_gen'] == "Male")
                                                                        echo "checked"; ?> />
          Male </label>
        <label>
          <input type="radio" id="st_gen" name="st_gen" value="Female" <?php if ($data['st_gen'] == "Female")
                                                                          echo "checked"; ?> />
          Female </label>
      </td>
      <td>Enter Phone :- </td>
      <td>
        <input type="text" id="st_phone" name="st_phone" value="<?= $data['st_phone'] ?>"
          placeholder="Enter phone number" oninput="validate_phone(this,event)" maxlength="10" />
      </td>
    </tr>
    <tr>
      <td>Select Course :- </td>
      <td>
        <select id="st_course" name="st_course">
          <?php echo get_dropdown_list("course", "course_id", "course_name", $data['st_course']); ?>
        </select>
      </td>
      <td>Select City :- </td>
      <td>
        <select id="st_city" name="st_city">
          <?php echo get_dropdown_list("city", "city_id", "city_name", $data['st_city']); ?>
        </select>
      </td>
    </tr>
    </tr>

    <tr>
      <td>Select State :- </td>
      <td>
        <select id="st_state" name="st_state">
          <?php echo get_dropdown_list("state", "state_id", "state_name", $data['st_state']); ?>
        </select>
      </td>
      <td>Select Country :- </td>
      <td>
        <select id="st_country" name="st_country">
          <?php echo get_dropdown_list("country", "country_id", "country_name", $data['st_country']); ?>

        </select>
      </td>
    </tr>
    <tr>
      <td>Enter Pin Code :- </td>
      <td>
        <input type="text" id="st_pincode" name="st_pincode" value="<?= $data['st_pincode'] ?>"
          placeholder="Enter pin code" oninput="check_pincode(this, event)" />
      </td>
      <td>Enter Email :- </td>
      <td>
        <input type="email" id="st_email" name="st_email" value="<?= $data['st_email'] ?>"
          placeholder="Enter email address" oninput="validate_email(this,event)" />
      </td>
    </tr>
    <tr>
      <td>Enter DOB :- </td>
      <td>
        <input type="text" id="st_dob" name="st_dob" value="<?= $data['st_dob'] ?>" placeholder="DD/MM/YYYY"
          oninput="valid_date_input(this,event);" />
      </td>
      <td>Enter DOJ :- </td>
      <td>
        <input type="text" id="st_doj" name="st_doj" value="<?= $data['st_doj'] ?>" placeholder="DD/MM/YYYY"
          oninput="valid_date_input(this,event);" />
      </td>
    </tr>
    <tr>
      <td height="44">Select Image </td>
      <td>
        <input type="file" id="st_image" name="st_image" />
        <?php if (!empty($data['st_image'])): ?>
          <img src="uploads/<?= $data['st_image'] ?>" width="100" height="100" />
        <?php endif; ?>
      </td>

      <td>Enter Address :- </td>
      <td>
        <textarea name="st_address" id="st_address" placeholder="Enter address"
          oninput="validate_name(this,event);"> <?php echo $data['st_address']; ?> </textarea>
      </td>
    </tr>
    <tr>
      <td colspan="1" height="44">Select Qualification </td>
      <td>

        <?php echo get_checkbox_list("qulification", "qual_id", "qual_name", "st_qualification[]", $data['st_qualification']); ?>
      </td>
      <td>Permanent Address</td>
      <td><textarea name="st_address2" id="st_address2"
          placeholder="Enter permanent address" oninput="validate_name(this,event);"> <?php echo $data['st_address2']; ?></textarea></td>
    </tr>
    <tr>
      <td height="54" colspan="4">
        <div align="center">
          <input type="submit" name="Submit2" value="Submit" />
          <input name="reset2" type="reset" id="reset2" value="Reset" />
        </div>
      </td>
    </tr>
  </table>
  <input type="hidden" name="act" value="save_student" />
  <input type="hidden" name="st_id" value="<?= $data['st_id'] ?>" />


  <input type="hidden" name="st_image" value="<?= $data['st_image'] ?>" />

</form>
<script>
  $(function() {
    $("#st_dob").datepicker({
      changeMonth: true,
      changeYear: true,
      startYear: 1900,
      EndYear: 2000
    });
    $("#st_doj").datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
</script>
<?php include_once('includes/footer.php') ?>