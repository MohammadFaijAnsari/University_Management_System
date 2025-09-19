<?php

session_start();
include("../includes/db_connect.php");

if ($_REQUEST['act'] == "save_faculty") {
    save_faculty();
}
if ($_REQUEST['act'] == "change_dp") {
    change_dp();
}

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

function save_faculty()
{
    global $con;
    $R = $_REQUEST;

    $doj = substr($R['f_name'], 0, 4);
    $pas = explode('/', $R['f_doj']);
    $doj = strtoupper($doj);
    $f_pass = $doj . $pas[2];

    $fc_pass = $R['fc_pass'] ? $R['fc_pass'] : $f_pass;  

    $f_dp = $_FILES['f_dp']['name'];

    if ($f_dp) {
        $f_dp_arr = explode('.', $f_dp);
        $f_dp = $f_dp_arr[0] . time() . "." . $f_dp_arr[1];
        move_uploaded_file($_FILES['f_dp']['tmp_name'], '../uploads/' . $f_dp); 
    } else {
        $f_dp = $R['f_dp'];  
    }

    if ($R['f_id']) {
        
        $sql = "UPDATE faculty SET 
            f_name = '$R[f_name]',
            f_gen = '$R[f_gen]',
            f_quali = '$R[f_quali]',
            f_phone = '$R[phone]',
            f_email = '$R[email]',
            f_expe = '$R[experience]',
            f_interst = '$R[f_interst]',
            f_doj = '$R[f_doj]',
            f_degi = '$R[designation]',
            f_stream = '$R[stream]',
            f_que = '$R[f_que]',
            f_pass = '$f_pass', 
            fc_pass = '$fc_pass',  -
            f_ans = '$R[security_answer]',
            f_dp = '$f_dp'  
            WHERE f_id = '$R[f_id]'";
        $msg = "Record has been Updated.......!!";
    } else {
        // Insert query
        $sql = "INSERT INTO faculty (
                f_name, f_gen, f_quali, f_phone, f_email, f_expe, f_interst, f_doj, f_degi, f_stream, f_que, f_pass, fc_pass, f_ans, f_dp,f_act
            ) VALUES (
                '$R[f_name]', '$R[f_gen]', '$R[f_quali]', '$R[phone]', '$R[email]', '$R[experience]', '$R[f_interst]', 
                '$R[f_doj]', '$R[designation]', '$R[stream]', '$R[f_que]', '$f_pass', '$fc_pass', '$R[security_answer]', '$f_dp',0
            )";
        $msg = "Record has been saved successfully!";
    }

  
    $rs = mysqli_query($con, $sql);

    if ($rs) {
        $_SESSION['faculity_login'] = $_REQUEST['email'];
        $_SESSION['faculity_password'] = $f_pass;
        header("Location: ../facu_password.php");
        exit();
    } else {
        die("Error in query: " . mysqli_error($con));
    }
}

// ------------------------------------------------------------------
function change_dp()
{
    global $con;
    $st_image = $_FILES['faculity_image']['name'];

    if ($st_image) {
        $st_image_arr = explode('.', $st_image);
        $st_image = $st_image_arr[0] . time() . "." . $st_image_arr[1];
        move_uploaded_file($_FILES['faculity_image']['tmp_name'], '../uploads/' . $st_image);
    }

 
    $sql = "UPDATE faculty SET f_dp = '$st_image' WHERE f_email = '$_SESSION[faculity_login]'";
    $rs = mysqli_query($con, $sql);
    if ($rs) {
        header("Location: ../facu_det.php");
    } else {
        die("Error in query: " . mysqli_error($con));
    }
};
  



?>

<?php 
///// CODE FOR ACTION 
// Check if the required parameters are set
if (isset($_GET['f_id']) && isset($_GET['f_act'])) {
    $f_id = intval($_GET['f_id']); // Get faculty ID and convert to integer
    $action = intval($_GET['f_act']); // Get the action and convert to integer

    // Validate action value (should be 0 or 1)
    if ($action !== 0 && $action !== 1) {
        die("Invalid action value.");
    }

    // Update the faculty's active status in the database
    $sql = "UPDATE faculty SET f_act = ? WHERE f_id = ?";
    
    // Prepare the statement
    if ($stmt = mysqli_prepare($con, $sql)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ii", $action, $f_id);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Success"; // Optionally return a success message
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($con);

?>