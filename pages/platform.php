<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<title>SFSDB - Main</title>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/pagination.css">
</head>
<body>
<?php 
require('classes/paginator.php');
require('classes/Functions.php');
include('classes/SBBCodeParser.php');


// Define functions class
$functions = new accDBFunctions();
?>
<center>
<br />
<!-- MENU -->
<strong><span style="font-size: 10px; color: #000000">Logged in as:</strong> <span style='color: #000000'><?php echo '<span style="font-size: 10px">' . $_SESSION['user_name'] ?> <b>[</b><?php echo $functions->GetUserAccSold($_SESSION['user_name']) ?> Sold<b>]</span></b> | <img src='images/actions/user.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a class='menu' href='user.php'>My Profile</a> | <img src='images/actions/add.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a class='menu' href='add.php'>Add Steam Account</a> | <img src='images/actions/cart.png' style='vertical-align: middle; margin-bottom: 3px' /> <a class='menu' href='store.php'>Store</a> | <img src='images/actions/message.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a class='menu' href='updatemsg.php'>Set/Disable Message</a> | <img src='images/actions/stats.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a class='menu' href='stats.php'>Sale Statistics</a> | <img src='images/actions/out.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a class='menu' href='?logout'>Logout</a></span><br />
<!-- END MENU -->

<img src="images/style/login_logo.png" style="margin-left: 25px" />
<b><div class='motd' style='margin-bottom: -1.5%'><div class='motdbackground'><div class='motdinner'><span style='color: white'>Payment Details</span></b><br /><br /><b>j0rpi<br /><br /><div style='width: 50%; background: rgba(0,0,0,0.2); padding: 5px; border-radius: 6px;'>PayPal: stempunksf@gmail.com<br />BTC: 1FuBA8wdSLmEJNo1mR2gDkACfa7c9QXobo</div><br />FallbackeN<br /><br /><div style='width: 50%; background: rgba(0,0,0,0.2); padding: 5px; border-radius: 6px;'>PayPal: puresavage99@gmail.com</b><br /></div></div></div></div><br /><br /><br /><br /><br /><br /><br /><br />
<div style='margin-bottom: 40%'>
<?php
// Message Box
if ($functions->GetMessageBeta() == '')
  {
    echo '';
  }
else
  {
	echo $functions->GetMessageBeta();
  }

echo '</div>';
// Limit Search Results Per Page
$records_per_page = dnPageLimit;

// Define Pagination Class
$pagination = new Zebra_Pagination();



$MySQL = 'SELECT SQL_CALC_FOUND_ROWS * FROM accs WHERE status="Not Sold" LIMIT ' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '';

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

<div class='acctable'>
<table>

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
						<td>
						    Seller
						</td>
						<td
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
						<td>" .
						$row['seller'] . "
						</td>
						<td>
						";
						if ($row['status'] == 'Not Sold')
						{
						echo 
						"
						<span style='color: maroon'>" . $row['status'] . "</span><br /><br />
						<form action='markpayed.php' method='post'>
						<input type='image' src='images/actions/mark_payed.png' style='float:left;' title='Mark as sold' name='update' value='" . $row['username'] . "' />
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
						<span style='color: darkgreen'>" . $row['status'] . "</span>
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
<?php
echo "<br /><div class='paginationbar'>";
$pagination->render();
echo "<span style='font-size: 10px'>Showing " .  $records_per_page  . " accounts per page. (set via config.php)</span></div>";
?>
<br />
<span style='font-size: 10px'><b>sfsdb0.17_beta - 2015-10-17</b></span>
</center>
</body>
</html>