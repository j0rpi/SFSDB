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
<b><div class='motd'><div class='motdbackground'><div class='motdinner'><span style='color: white'><?php echo $_SESSION['user_name'] ?> :: Profile</span></b><br /><br />
<img src='<?php echo $functions->GetUserAvatar() ?>' style='width: 128px; height: 128px;' /><br /><span style=''><b>j0rpi [<?php echo $functions->GetUserLevel() ?>]</b><br />
<h1></h1>
<?php



if ((int)$functions->GetUserAccSold($_SESSION['user_name']) == 0)
{
	echo '
	      <b>Rating:</b> 0/0 <img src="images/account/0Star.png" style="width: 48px; height: 12px; vertical-align: middle;margin-bottom:  3px;" />
		 ';
	
}
elseif ((int)$functions->GetUserAccSold($_SESSION['user_name']) == 1 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 2 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 3 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 4)
{
	echo '
	      <b>Rating:</b> 1/5 <img src="images/account/1Star.png" style="width: 48px; height: 12px; vertical-align: middle;margin-bottom:  3px;" />
		 ';
}
elseif ((int)$functions->GetUserAccSold($_SESSION['user_name']) == 5 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 6 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 7 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 8 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 9)
{
	echo '
	      <b>Rating:</b> 2/5 <img src="images/account/2Star.png" style="width: 48px; height: 12px; vertical-align: middle;margin-bottom:  3px;" />
		 ';
}
elseif ((int)$functions->GetUserAccSold($_SESSION['user_name']) == 10 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 11 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 12 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 13 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 14)
{
	echo '
	      <b>Rating:</b> 3/5 <img src="images/account/3Star.png" style="width: 48px; height: 12px; vertical-align: middle;margin-bottom:  3px;" />
		 ';
}
elseif ((int)$functions->GetUserAccSold($_SESSION['user_name']) == 15 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 16 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 17 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 18 || (int)$functions->GetUserAccSold($_SESSION['user_name']) == 19)
{
	echo '
	      <b>Rating:</b> 4/5 <img src="images/account/4Star.png" style="width: 48px; height: 12px; vertical-align: middle;margin-bottom:  3px;" />
		 ';
}
elseif ((int)$functions->GetUserAccSold($_SESSION['user_name']) == 20)
{
	echo '
	      <b>Rating:</b> 5/5 <img src="images/account/5Star.png" style="width: 48px; height: 12px; vertical-align: middle;margin-bottom:  3px;" /><br />
		 ';
}
else
{
	
}


?>
<h1></h1>
<b>Accounts Sold:</b> <?php echo $functions->GetUserAccSold($_SESSION['user_name']) ?>
<h1></h1>

<b>Total Profit: </b>$<?php echo $functions->GetTotalProfitUser($_SESSION['user_name']) ?>
<h1></h1>
<b>Awards: </b><?php echo $functions->GetUserAwards($_SESSION['user_name']) ?>
</span>
<br />
</div>
<b><!--div class='motd' style='width: 100%'><div class='motdbackground'><div class='motdinner' ><span style='color: white'><?php echo $_SESSION['user_name'] ?> :: Selling/Sold</span>-->
<?php
require('classes/paginator.php');

// Limit Search Results Per Page
$records_per_page = dnPageLimit;

// Define Pagination Class
$pagination = new Zebra_Pagination();



$MySQL = 'SELECT SQL_CALC_FOUND_ROWS * FROM accs WHERE seller="' . $_SESSION['user_name'] . '" LIMIT ' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '';

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
<br />
<div class='acctable' style='margin-top: -1.0%'>
<table style='width: 100%'>

<tr>
                        
						<td width='120'>
                            Username
                        </td>
                        <td width='120'>
                            Password
                        </td>
						<td width='300'>
						    Description
						</td>
						<td width='75'>
						    Status
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
                            $row['username'] . "
                        </td>" .
						"<td>" .
						$row['password'] . "
                        <td>" .
                        $row['description'] . "    
                        </td> 
						<td>
						";
						if ($row['status'] == 'Not Sold')
						{
						echo 
						"
						<span style='color: maroon'>" . $row['status'] . "</span><br /><br />
						<form action='doupdatestatus.php' method='post'>
						<input type='image' src='images/actions/mark_payed.png' style='float:left;' title='Mark as sold' name='update' value='" . $row['id'] . "' />
						</form>
						<form action='updateacc.php' method='post'>
						<input type='image' src='images/actions/edit.png' style='float:left; padding-left: 5px;' title='Edit account' name='accname' value='" . $row['username'] . "' />
						</form>
						"; 
						}
						else
						{
						
						echo 
						"
						<span style='color: darkgreen'>" . $row['status'] . " [$" . $row['sellprice'] . "]
                        
						<form action='doupdateunsold.php' method='post'>
						<input type='image' src='images/actions/mark_unsold.png' style='float:left;' title='Mark as unsold' name='update' value='" . $row['id'] . "' />
						</form>
						";
						}
						echo
						"
						<form action='dodelete.php' method='post'>
						<input type='image' src='images/actions/delete.png' style='float:left; padding-left: 5px;' title='Delete from database' name='update' value='" . $row['id'] . "' />
						</form>
						</td>	
                    </tr>
";?>
<?php endwhile?>

</table>
</div>
<!--</div>-->
<?php
echo "<br /><div class='paginationbar'>";
$pagination->render();
echo "<center>";
echo "<br /><span style='font-size: 10px; color: black; '>Showing " .  $records_per_page  . " accounts per page. (set via config.php)</span><br /><br /><br />";
echo "<span style='font-size: 10px; color: #000000'><b>sfsdb0.17_beta - 2015-10-17</b></span>";
echo "<br /><br />";
echo "</center></div>";
?>
<br />

</center>
</body>
</html>