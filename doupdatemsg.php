<?php
include('classes/functions.php');
include('classes/SBBCodeParser.php');

$functions = new accDBFunctions();
$parser = new \SBBCodeParser\Node_Container_Document();

// So now we update the steam account
$functions->UpdateMessage($_POST['title'], $parser->parse($_POST['message'])->get_html());

header( "refresh:0; url=index.php" ); 
?>