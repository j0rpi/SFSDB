<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<title>SFSDB - Login</title>
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<center>
<div id="clouds">
	<div class="cloud x1"></div>
	<!-- Time for multiple clouds to dance around -->
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div>
<div class="logincontainer">
<div class="loginbox">
<?php
if (isset($login)) {
    if ($login->errors) 
    {
        foreach ($login->errors as $error) 
        {
            echo "<div class='loginmsgbox' style='background: darkred'><span class='color:white'>" . $error . "</div>";
        }
    }
    if ($login->messages) 
    {
        foreach ($login->messages as $message)
        {
            echo "<div class='loginmsgbox' style='background: darkgreen'><span class='color:white'>" . $message . "</div>";
        }
    }
}
?>
<br />
<img src="images/style/login_logo.png" style="width: 250px" />
<br />
<br />
<br />
<form method="post" action="index.php"  name="loginform">
<input class="textbox_user" id="user_name" name="user_name" type="text" placeholder="Username" required /><br /><br />
<input class="textbox_password" id="user_password" name="user_password" type="password" placeholder="Password" required /><br /><br />
<input class="loginbutton" id="login" name="login" type="submit" value="Login" width="200" /><br /><br /><br />
</form>
</div>
<br />
<br />
<span style='font-size: 10px; font-family: verdana'><b>sfsdb0.17_beta - 2015-10-17</b></span>
<br />
<span style='font-size: 10px; font-family: verdana'><b>Warning: Site might be unstable, unavailable and/or be non-functional.</b></span>
</div>
</center>
</body>
</html>