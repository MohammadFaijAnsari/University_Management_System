<?php  include("includes/function.php");?>
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
                <td height="110" colspan="2" align="center">
                    <h1 class="style1">Password Recovery Form</h1>
                </td>
            </tr>
            <tr>
                <td width="404" class="style3">Username:-</td>
                <td width="371">
                    <label>
                        <input type="text" name="login_user" id="login_user" />
                    </label>
                </td>
            </tr>
            <tr>
                <td>Security Question:-</td>
                <td>
                    <select name="sec_ques" id="sec_ques">
                        <?php echo get_dropdown_list("security", "sec_id", "sec_ques", 0) ?>
                    </select>
            </tr>
            <tr>
                <td>Security Answer:-</td>
                <td>
                    <input type="text" name="sec_ans"  required />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <label>
                        <input type="submit" name="Submit" value="Rcover" />
                    </label>
                    <input type="reset" name="Submit2" value="Cancel" />

                </td>

            </tr>
        </table>
</center>
<input type="hidden" name="act" value="recover_pass" />
</form>