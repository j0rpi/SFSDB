<?php
// Stempunk & Fallbacken Account Database Config

define('dnDBHost', 'localhost');
define('dnDBUser', 'root');
define('dnDBPass', '');
define('dnDBName', 'darknetstore');
define("dnMotd", "<b><span style='color: white'>Read this Daniel</span></b><br /><br /><b>Items are marked as sold/unsold to test the design. They are still mine ;)</b>");

// How many accounts to show per page
define("dnPageLimit", 10);

// Finally, connect to fucking database.
mysql_connect(dnDBHost, dnDBUser, dnDBPass, dnDBName) or die('Error connecting to database: '.mysql_error());mysql_select_db(dnDBName) or die(mysql_error());
?>