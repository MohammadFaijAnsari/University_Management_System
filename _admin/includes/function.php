<?php include("db_connect.php"); ?>
<?php
// function for dynamic dropdown
function get_dropdown_list($table, $col_id, $col_name, $sel)
{
    global $con;
    $sql = "select * from  $table order by $col_id";
    $option_list = "<option value='0'> Please Select</option>";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    while ($data = mysqli_fetch_assoc($rs)) {
        if ($data[$col_id] == $sel)
            $option_list .= "<option value='$data[$col_id]' selected>$data[$col_name]</option>";
        else
            $option_list .= "<option value='$data[$col_id]'>$data[$col_name]</option>";
    }

    return $option_list;
}
// function for checkbox---------------------------
function get_checkbox_list($table, $col_id, $col_name, $name, $sel)
{
    global $con;
    $sql = "select * from $table";
    $check_list = "";
    $sel = explode(",", $sel);
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    while ($data = mysqli_fetch_assoc($rs)) {
        if (in_array($data[$col_id], $sel)) {
            $check_list .= "<input type='checkbox'name='$name'class='$name'onclick='st_check(this);' value='$data[$col_id]' checked>$data[$col_name]";
        } else {
            $check_list .= "<input type='checkbox'name='$name'class='$name'onclick='st_check(this);' value='$data[$col_id]'>$data[$col_name]";
        }
    }
    return $check_list;
}
// function for single value------------------------
function get_single_value($table, $col_id, $col_name, $sel)
{
    global $con;
    $sql = "select $col_name from $table where $col_id=$sel";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($rs);
    return $data[$col_name];
}
// function for multi value------------------------
function get_multi_value($table, $col_id, $col_name, $sel)
{
    global $con;
    $sql = "select $col_name from $table where $col_id in ($sel)";
    $multi_value = "";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    while ($data = mysqli_fetch_assoc($rs)) {

        $multi_value .= $data[$col_name] . ",";
    }
    return $multi_value;
}

/// To get last value from the comma seprated string
function last_value($s){
    if(strpbrk($s,',') == "")
        return $s;
    $temp = explode(",",$s);
    $last_value = $temp[count($temp)-1];
    return $last_value;
}
// To remove the last comma seprated value form a string
function remove_last_value($s){
    if(strpbrk($s,',') == "")
        return "";
    $temp = explode(",",$s);
    $sliced_value = array_slice($temp,0,count($temp)-1);
    $sliced_value = implode(',',$sliced_value);
    return $sliced_value;
}
?>