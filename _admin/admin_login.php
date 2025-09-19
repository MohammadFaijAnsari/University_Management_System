<center>
  <form name="index" id="index" method="post" action="lib/login.php">

    <style type="text/css">
      <!--
      .style1 {
        color: #993300
      }

      .style2 {
        color: rgb(10, 12, 12)
      }

      .style3 {
        color: rgb(1, 8, 8)
      }
      -->
    </style>
    <table width="400" height="225" border="1">
    <tr>
              <td colspan="4">
                <h3 align="center">Genrate user & Password </h3>                </td>
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
        <td><input type="password" name="login_pass" id="login_pass" required <img src="image/invisible.png" alt=""
            height="30px" width="30px" style="margin-left: 10px; cursor: pointer;" onclick="changeEye(this);" /></td>
      </tr>
      
      <tr>
        <td colspan="2" align="center">
          <label>
            <input type="submit" name="chgeDp" value="Change DP" />
          </label>
          <input type="submit" name="skip" value="Skip" />
        </td>
      </tr>

    </table>
</center>
<input type="hidden" name="act" value="login" />
</form>