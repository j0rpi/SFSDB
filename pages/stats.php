<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include('classes/Functions.php');
include('classes/pData.class');  
include('classes/pChart.class');
// Define functions class
$functions = new accDBFunctions();
?>

<head>
    <title>SFSDB - Statistics</title>
	<link rel="stylesheet" href="css/main.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<br />
<center>
<!-- MENU -->
<strong><span style="font-size: 10px;">Logged in as:</strong> <?php echo '<span style="font-size: 10px">' . $_SESSION['user_name'] ?> <b>[</b><?php echo $functions->GetUserAccSold($_SESSION['user_name']) ?> Sold<b>]</b> | <img src='images/actions/user.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='user.php'>My Profile</a> | <img src='images/actions/add.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='add.php'>Add Steam Account</a> | <img src='images/actions/cart.png' style='vertical-align: middle; margin-bottom: 3px' /> <a href='store.php'>Store</a> | <img src='images/actions/message.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='updatemsg.php'>Set/Disable Message</a> | <img src='images/actions/stats.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='stats.php'>Sale Statistics</a> | <img src='images/actions/out.png' style="vertical-align: middle; margin-bottom: 3px;" /> <a href='?logout'>Logout</a></span><br />
<!-- END MENU -->
<img src='../images/style/login_logo.png' />
<br>
<br>
<?php
         
       $accs = mysql_query("SELECT * FROM accs") or die(mysql_error());
	   $sold = mysql_query("SELECT * FROM accs WHERE status='Sold'") or die(mysql_error());
	   
	   
		// Account Pie  
       $DataSet = new pData;  
       $DataSet->AddPoint(array(mysql_num_rows($accs), mysql_num_rows($sold)),"Serie1");  
       $DataSet->AddPoint(array("Unsold", "Sold"),"Serie2");  
       $DataSet->AddAllSeries();  
       $DataSet->SetAbsciseLabelSerie("Serie2");  
       $Test = new pChart(300,200);   
       $Test->drawFilledRoundedRectangle(7,7,293,193,5,240,240,240);  
       $Test->drawRoundedRectangle(5,5,295,195,5,0,0,0);  
       $Test->drawFilledCircle(121,101,75,255,255,255);  
       $Test->setFontProperties("arial.ttf",8);  
       $Test->drawBasicPieGraph($DataSet->GetData(),$DataSet->GetDataDescription(),120,100,70,PIE_PERCENTAGE,255,255,218);  
       $Test->drawPieLegend(200,15,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250);  
       $Test->Render("accs.png");  
	   
	   // Profit Pie 
       $DataSet2 = new pData;  
       $DataSet2->AddPoint(array($functions->GetTotalProfitUser("j0rpi"), $functions->GetTotalProfitUser("fallbacken")),"Serie3");  
       $DataSet2->AddPoint(array("$" . $functions->GetTotalProfitUser("j0rpi"), "$" . $functions->GetTotalProfitUser("fallbacken")),"Serie2");  
       $DataSet2->AddAllSeries();  
       $DataSet2->SetAbsciseLabelSerie("Serie2");  
       $Test2 = new pChart(300,200);   
       $Test2->drawFilledRoundedRectangle(7,7,293,193,5,240,240,240);  
       $Test2->drawRoundedRectangle(5,5,295,195,5,0,0,0);  
       $Test2->drawFilledCircle(121,101,75,255,255,255);  
       $Test2->setFontProperties("arial.ttf",8);  
       $Test2->drawBasicPieGraph($DataSet2->GetData(),$DataSet2->GetDataDescription(),120,100,70,PIE_LABELS,255,255,218);  
       $Test2->drawPieLegend(200,15,$DataSet2->GetData(),$DataSet2->GetDataDescription(),250,250,250);  
       $Test2->Render("users.png");
        
		echo "<font style='font-family: Helvetica'>";
		echo "<img src='stats.png' />";
		echo "<br /><img src='users.png' /><br /><br /><br />";
		echo "Right now, we have <b>" . mysql_num_rows($accs) . "</b> Steam accounts in the database, where <b>" . mysql_num_rows($sold) . "</b> has been sold.</br >";
		echo "We have also made a total of <b>$";
		echo $functions->GetTotalProfit() . " </b> profit, where j0rpi has made <b>$" . $functions->GetTotalProfitUser("j0rpi") . "</b>, and FallbackeN has made <b>$" . $functions->GetTotalProfitUser('fallbacken') . "</b>";
		echo "</font>";
 
?>

</table>
</div>
<br>
<br>
<a href="index.php">Return To Main Site</a></center>
</center>
</body>
</html>