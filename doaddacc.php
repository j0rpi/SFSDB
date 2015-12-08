<?php
include('classes/functions.php');

$functions = new accDBFunctions();

// So now we update the steam account
$functions->AddSteamAccount($_POST['username'], $_POST['password'], $_POST['desc'], $_POST['seller']);

header( "refresh:0; url=index.php" ); 
?>