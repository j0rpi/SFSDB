<?php
include('classes/functions.php');

$functions = new accDBFunctions();

// So now we update the steam account
$functions->UpdateAccount($_POST['username'], $_POST['password'], $_POST['description']);

header( "refresh:0; url=index.php" ); 
?>