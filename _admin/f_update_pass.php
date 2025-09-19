<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form action="./lib/f_login.php" method="post" >
<table width="342" height="221" border="1" align="center">
  <tr>
    <td height="57" colspan="2"><div align="center">Faculty Update Password </div></td>
  </tr>
  <tr>
    <td height="69">New Password </td>
    <td>
      <label>
        <input type="text" name="f_pass" id="f_pass" />
        </label>    </td>
  </tr>
  <tr>
    <td height="85">Confirm Password </td>
    <td>
      <label>
      <input type="text" name="fc_pass" id="fc_pass" />
      </label>    </td>
  </tr>
  <tr>
  <td colspan="2">
    <div align="center">
      <input type="submit" value="submit"  >   
      <input name="Reset" type="reset" value="Reset">
      <input type="hidden" name="act" value="update_pass"/>
    </div></td>
  </tr>
</table>

</form>
</body>
</html>
