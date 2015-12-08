<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>SFSDB - Update Account</title>
	<link rel="stylesheet" href="css/main.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<br />
<?php
require('classes/Functions.php');
// Define functions class
$functions = new accDBFunctions();
?>
<center>
<!-- MENU -->
<strong><span style="font-size: 10px;">Logged in as:</strong> <?php echo '<span style="font-size: 10px">' . $_SESSION['user_name'] ?> <b>[</b><?php echo $functions->GetUserAccSold($_SESSION['user_name']) ?> Sold<b>]</b> | <img src='images/actions/user.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='user.php'>My Profile</a> | <img src='images/actions/add.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='add.php'>Add Steam Account</a> | <img src='images/actions/cart.png' style='vertical-align: middle; margin-bottom: 3px' /> <a href='store.php'>Store</a> | <img src='images/actions/message.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='updatemsg.php'>Set/Disable Message</a> | <img src='images/actions/stats.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='stats.php'>Sale Statistics</a> | <img src='images/actions/out.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='?logout'>Logout</a></span><br />
<!-- END MENU -->
<img src='../images/style/login_logo.png' /><br />
<form action='doupdateacc.php' method='post'>
<input type='text' value='<?php echo $_POST['accname'] ?>' name='username' class="textbox_user" readonly  /><br /><br />
<input type='text' value='<?php echo $functions->GetAccountPassword() ?>' name='password' class="textbox_user" required /><br /><br />
<input type='text' value='<?php echo $functions->GetAccountDescription() ?>'  name='description' class="textbox_user" required /><br /><br />
<input type='submit' value='Update Account' class="loginbutton" />
</form>
<br />
<br />
<a href="index.php">Return To Main Site</a></center>
</center>
</body>
</html>