<?php include("includes/function.php"); ?>

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
            <center>
        <form name="index" id="index" method="post" action="lib/login.php" onsubmit="return validatePassword()">
        <table width="400" height="225" border="1">
            <tr>
                <td height="110" colspan="2" align="center">
                    <h1 class="style1">Password Update</h1>
                </td>
            </tr>
            <tr>
                <td width="404" class="style3">New Password:-</td>
                <td width="371">
                        <input type="password" id="login_pass" name="login_pass" required /> 
                </td>
                <td>
                    <img src="image/invisible.png" alt="" height="30px" width="30px"
                    style="margin-left: 10px; cursor: pointer;" onclick="changeEye(this);" />
                </td>
            </tr>

            <tr>
                <td>Confirm Password:-</td>
                <td>
                    <input type="password" id="login_cpass" name="login_cpass" required />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <label>
                        <input type="submit" name="Submit" value="Update" />
                    </label>
                    <input type="reset" name="Submit2" value="Cancel" />

                </td>

            </tr>
        </table>
        <font type="red" id='requirement'></font>
</center>
<input type="hidden" name="act" value="update_pass" />
</form>
<script>
    function changeEye(obj) {
  let imgName = obj.src.split("/");
  let password = obj.parentElement.previousElementSibling.children[0];
  console.log(password)
  if( password.type == 'password'){
    password.type='text'
  }else{
    password.type='password'
  }
  /* if (imgName[imgName.length - 1] == "invisible.png") {
      obj.src = "images/eye.png";
      password.type = "text";
  } else {
      obj.src = "images/invisible.png";
      password.type = "password";
  } */
}
    function validatePassword() {
        const newPass = document.getElementById("login_pass").value;
        const cnfPass = document.getElementById("login_cpass").value;
        const requirement = document.getElementById("requirement");
        console.log(newPass,cnfPass,requirement)
        let flagNum = false,
            flagCap = false,
            flagSmall = false,
            flagSymbol = false;
        if (newPass.length < 10) {
            requirement.innerText = "Password Must be length 8";
            return false;
        }
        for (i in newPass) {
            let code = newPass.charCodeAt(i);
            if (code >= 97 && code <= 122)
                flagSmall = true;
            if (code >= 65 && code <= 90)
                flagCap = true;
            if (code >= 48 && code <= 57)
                flagNum = true;
            if (code >= 33 && code <= 47 || code >= 58 && code <= 64)
                flagSymbol = true;
        }
        if (!flagSmall) {
            requirement.innerText = "Password must contain At least one Small character";
            return false;
        } else if (!flagCap) {
            requirement.innerText = "Password must contain At least one Upper character";
            return false;
        } else if (!flagNum) {
            requirement.innerText = "Password must contain At least one Number";
            return false
        } else if (!flagSymbol) {
            requirement.innerText = "Password must contain At least one Symbol";
            return false;
        } else if (newPass != cnfPass) {
            requirement.innerText = "Password and Confirm Password Field Must be same";
            return false;
        }

        return true;
    }
</script>