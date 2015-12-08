<?php
include('classes/functions.php');

$functions = new accDBFunctions();

// So now we update the steam account
$functions->UpdateStatus($_POST['username'], $_POST['sellvalue']);

header( "refresh:0; url=index.php" ); 
?>