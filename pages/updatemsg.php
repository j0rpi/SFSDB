<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>SFSDB - Update Message</title>
	<link rel="stylesheet" href="css/main.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Include jQuery, this can be omitted if it's already included -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 
    <!-- Include the default theme -->
    <link rel="stylesheet" href="minified/themes/default.min.css" type="text/css" media="all" />
 
    <!-- Include the editors JS -->
    <script type="text/javascript" src="minified/jquery.sceditor.bbcode.min.js"></script>
	
	<script>
$(function() {
	$("textarea").sceditor({
		plugins: "bbcode",
		toolbar: "bold,italic,underline|bulletlist|color|source"
	});
});
</script>
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
<!-- END MENU --><img src='../images/style/login_logo.png' /><br />
<form action='doupdatemsg.php' method='post'>
<input type='text' placeholder='Title' name='title' class="textbox_user"  /><br /><br />
<textarea placeholder='Message' name='message' style='width: 75%; height: 200px;'></textarea><br /><br />
<input type='submit' value='Update Message' class="loginbutton" />
</form>
<br />
<span style='font-size: 12px'>To remove message, leave the textboxes empty, and press the "Update Message" button.</span>
<br />
<br />
<a href="index.php">Return To Main Site</a></center>
</center>
</body>
</html>