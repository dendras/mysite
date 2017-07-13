<?php
    include_once 'include/class.user.php';
    $user = new User();
     if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $ustatus=0;
        $register = $user->reg_user($fullname, $uname,$upass, $uemail,$ustatus);
        if ($register) {
            // Registration Success
            echo 'Registration  successful <a href="index.php">Click here</a> to login';
        } else {
            // Registration Failed
            echo 'Registration failed. Email or Username already exits please try again';
        }
    }
?>
<!DOCTYPE HTML >
<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
		<style>
            #container{width:400px; margin: 0 auto;}
		</style>
  </head>    
        <body>
        <div id="container">
            <h1>Registration Here</h1>
            <form action="" method="post" name="reg">
                <table>
                    <tr>
                        <th>Full Name:</th>
                        <td><input type="text" name="fullname" required></td>
                    </tr>
                    <tr>
                        <th>User Name:</th>
                        <td><input type="text" name="uname" required></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><input type="text" name="uemail" required></td>
                    </tr>
                    <tr>
                        <th>Password:</th>
                        <td><input type="password" name="upass" required></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submit" value="Register" ></td></tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><a href="index.php">Already registered! Click Here!</a></td>
                    </tr>           
                </table>    </form>  </div> </body>
</html>
