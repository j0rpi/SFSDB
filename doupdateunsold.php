<?php
include('classes/functions.php');

$functions = new accDBFunctions();

// So now we update the steam account
$functions->UpdateStatusUnsold((int)$_POST['update']);

header( "refresh:0; url=index.php" ); 
?>