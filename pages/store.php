<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<title>SFSDB - User: <?php echo $_SESSION['user_name']; ?></title>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/pagination.css">
</head>
<body>

<br />
<center>
<?php
// Define functions class
require('classes/Functions.php');
$functions = new accDBFunctions();
?>
<!-- MENU -->
<strong><span style="font-size: 10px;">Logged in as:</strong> <?php echo '<span style="font-size: 10px">' . $_SESSION['user_name'] ?> <b>[</b><?php echo $functions->GetUserAccSold($_SESSION['user_name']) ?> Sold<b>]</b> | <img src='images/actions/user.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='user.php'>My Profile</a> | <img src='images/actions/add.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='add.php'>Add Steam Account</a> | <img src='images/actions/cart.png' style='vertical-align: middle; margin-bottom: 3px' /> <a href='store.php'>Store</a> | <img src='images/actions/message.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='updatemsg.php'>Set/Disable Message</a> | <img src='images/actions/stats.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='stats.php'>Sale Statistics</a> | <img src='images/actions/out.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='?logout'>Logout</a></span><br />
<!-- END MENU -->
<img src="images/style/login_logo.png" style="margin-left: 25px" />
<b><div class='motd'><div class='motdbackground'><div class='motdinner'><span style='color: white'>Store</span></b><br /><br />
<b>Welcome to the store! Here you can buy cool stuff for your profile and other stuff!</b>
</span>
</div>
<b><!--<div class='motd' style='width: 100%'><div class='motdbackground'><div class='motdinner' style='height: 480px;'><span style='color: white'>Products</span>-->
<?php
require('classes/paginator.php');

// Limit Search Results Per Page
$records_per_page = dnPageLimit;

// Define Pagination Class
$pagination = new Zebra_Pagination();



$MySQL = 'SELECT SQL_CALC_FOUND_ROWS * FROM store LIMIT ' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '';

if (!($result = @mysql_query($MySQL))) 
{

    // stop execution and display error message
    die(mysql_error());

}

// fetch the total number of records in the table
$rows = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows'));

// pass the total number of records to the pagination class
$pagination->records($rows['rows']);

// records per page
$pagination->records_per_page($records_per_page);

?>

<div class='acctable' style='margin-top: 0.5%'>
<table style='width: 100%'>

<tr>
                        
						<td width='180'>
                            Name
                        </td>
                        <td width='150'>
                            Description
                        </td> 
						<td width='10'>
						    Price
						</td>
						<td width='30'>
						    Buy
						</td>
</tr>	

<?php $index = 0?>
<?php while ($row = mysql_fetch_assoc($result)):?>		

<tr <?php echo $index++ % 2 ? ' class="even"' : ''?>>
<?php

if (isset($_GET['update'])){
      $functions->UpdateStatus($row['id']);
}

echo "
                        
						<td width='45px'> " .
                            $row['name'] . "
                        </td>" .
						"<td>" .
						$row['description'] . "
                        <td>" .
                        $row['price'] . "    
                        </td> 
						<td width='45px'>
												<center><button class='loginbutton' style='width: 75px'>Not Enough Credits!</button></center>
												</td>
						</form>
                    </tr>
";?>
<?php endwhile?>

</table>
</div>
<?php
echo "<br /><div class='paginationbar'>";
$pagination->render();
echo "<center>";

echo "<br /><br />";
echo "</center>";
?>
<br />

</div>
</center>
</body>
</html>