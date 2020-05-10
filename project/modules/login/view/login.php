<div class="loginpage">

    <h1>LOGIN</h1>
    <br>

    <form method="post" name="login_user" id="login_user">
        <table id="tablelogin">
            <tr>
                <td><font size="3">Email: </font></td> <td><input type="text" id="email" name="email" value="<?php echo $_POST['email'] ?>"/></td>
                <td><font color="red">
                    <span id="e_email" class="error">
                        <?php 
                            echo "$check[e_email]";
                        ?>
                    </span>
                </font></td>
            </tr>
            <hr/><br><br>
            <tr>
                <td><font size="3">Password: </font></td> <td><input type="password" id="pass" name="pass"></td>
                <td><font color="red">
                    <span id="e_pass" class="error">
                        <?php 
                            echo "$check[e_pass]";
                        ?>
                    </span>
                </font></td>
            </tr>

            <tr>
                <td><input type="button" name="log_in" id="log_in" value="LOG IN" onclick="validate_login()"/> </td>
            </tr>
            <tr>
                <td><input type="button" name="log_in_google" id="log_in_google" value="GOOGLE""/> </td>
            </tr><tr>
                <td><input type="button" name="log_in_github" id="log_in_github" value="GITHUB""/> </td>
            </tr>

        </table>
    </form>
    Don't remember your password? <a href="?module=login&function=recover_pass">Recover password</a><br>
    Still not registered? <a href="?module=login&function=list_register">Register here</a>


</div>