<?php 




class accDBFunctions
{
	
	function AddSteamAccount($user, $pass, $desc, $seller) 
   {
	   $conn = new mysqli('localhost', 'root', '', 'darknetstore');
	   $sql = "INSERT INTO accs (username, password, description, seller, status) VALUES ('" . $user .  "', '" . $pass ."', '" . $desc . "', '" . $seller . "', 'Not Sold')";
       
	   if($conn->query($sql) == TRUE) 
	   {

	   }
	   else
	   {
		   echo "Could not update account status. Did something fuck up?";
	   }
    }
	
	function DeleteAccount($id) 
   {
	   $conn = new mysqli('localhost', 'root', '', 'darknetstore');
	   $sql = "DELETE FROM accs WHERE id='" . $id . "';";
       
	   if($conn->query($sql) == TRUE) 
	   {

	   }
	   else
	   {
		   echo "Could not delete account. Did something fuck up?";
	   }
    }
	
	function UpdateStatus($id, $price) 
   {
	   $conn = new mysqli('localhost', 'root', '', 'darknetstore');
	   $sql = "UPDATE accs SET status='Sold', sellprice='" . $price . "', hidden='yes' WHERE username='" . $id . "';";
       
	   if($conn->query($sql) == TRUE) 
	   {

	   }
	   else
	   {
		   echo "Could not update account status. Did something fuck up?";
	   }
    }
	
	function UpdateStatusUnsold($id) 
   {
	   $conn = new mysqli('localhost', 'root', '', 'darknetstore');
	   $sql = "UPDATE accs SET status='Not Sold' WHERE id='" . $id . "';";
       
	   if($conn->query($sql) == TRUE) 
	   {

	   }
	   else
	   {
		   echo "Could not update account status. Did something fuck up?";
	   }
    }
	
	function UpdateAccount($username, $password, $description) 
   {
	   $conn = new mysqli('localhost', 'root', '', 'darknetstore');
	   $sql = "UPDATE accs SET password='{$password}', description='{$description}' WHERE username='{$username}';";
       
	   if($conn->query($sql) == TRUE) 
	   {

	   }
	   else
	   {
		   echo "Could not update account. Did something fuck up?";
	   }
    }
	
	function UpdateMessage($title, $message) 
   {
	   $conn = new mysqli('localhost', 'root', '', 'darknetstore');
	   
	   if ($message == '') 
	   {
		   $sql = "UPDATE messagebox SET title='', message='' WHERE id='2';";
       }
	   else
	   {
		   $sql = "UPDATE messagebox SET title='<b><div class=\'motd\'><div class=\'motdbackground\'><div class=\'motdinner\'><span style=\'color: white\'>" . $title . "</span></b>', message='<br /><br /><b>" . $message . "</b></div></div></div><br /><br />' WHERE id='2';";
	   }
	   
	   if($conn->query($sql) == TRUE) 
	   {

	   }
	   else
	   {
		   echo "Could not update message.";
	   }
    }
	
	function GetMessage() 
   {
	   $conn = mysql_connect('localhost', 'root', '');
   
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
   
		$sql = 'SELECT * FROM messagebox WHERE themessage="message"';
		mysql_select_db('darknetstore');
		$retval = mysql_query( $sql, $conn );
   
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
   
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			
			echo $row['title'] . $row['message'];
		}
    }
	
	function GetMessageBeta() 
   {
	   $conn = mysql_connect('localhost', 'root', '');
   
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
   
		$sql = 'SELECT * FROM messagebox WHERE themessage="messagebeta"';
		mysql_select_db('darknetstore');
		$retval = mysql_query( $sql, $conn );
		
		// Define BB COde shit
        
   
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
   
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			
			echo $row['title'] . $row['message'];
		}
    }
	
	function GetMessageTitle() 
   {
	   $conn = mysql_connect('localhost', 'root', '');
   
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
   
		$sql = 'SELECT * FROM messagebox WHERE themessage="messagebeta"';
		mysql_select_db('darknetstore');
		$retval = mysql_query( $sql, $conn );
   
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
   
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			
			echo $row['title'];
		}
    }
	
	function GetMessageMessage() 
   {
	   $conn = mysql_connect('localhost', 'root', '');
   
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
   
		$sql = 'SELECT * FROM messagebox WHERE themessage="messagebeta"';
		mysql_select_db('darknetstore');
		$retval = mysql_query( $sql, $conn );
   
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
   
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			
			echo $row['message'];
		}
    }
	
	function GetAccountName() 
   {
	   $conn = mysql_connect('localhost', 'root', '');
   
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
   
		$sql = 'SELECT * FROM accs WHERE username="' . $_POST['accname'] . '"';
		mysql_select_db('darknetstore');
		$retval = mysql_query( $sql, $conn );
   
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
   
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			
			echo $row['username'];
		}
    }
	
	function GetAccountPassword() 
   {
	   $conn = mysql_connect('localhost', 'root', '');
   
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
   
		$sql = 'SELECT * FROM accs WHERE username="' . $_POST['accname'] . '"';
		mysql_select_db('darknetstore');
		$retval = mysql_query( $sql, $conn );
   
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
   
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			
			echo $row['password'];
		}
    }
	
	function GetAccountDescription() 
   {
	   $conn = mysql_connect('localhost', 'root', '');
   
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
   
		$sql = 'SELECT * FROM accs WHERE username="' . $_POST['accname'] . '"';
		mysql_select_db('darknetstore');
		$retval = mysql_query( $sql, $conn );
   
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
   
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			
			echo $row['description'];
		}
    }
	
	
	
	function GetUserAvatar() 
   {
	   $conn = mysql_connect('localhost', 'root', '');
   
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
   
		$sql = 'SELECT * FROM dn_users WHERE user_name="' . $_SESSION['user_name'] . '"';
		mysql_select_db('darknetstore');
		$retval = mysql_query( $sql, $conn );
   
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
   
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			
			echo $row['user_avatar'];
		}
    }
	
	function GetUserAwards($user) 
   {
	   $conn = mysql_connect('localhost', 'root', '');
   
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
   
		$sql = 'SELECT * FROM items WHERE owner="' . $user . '"';
		mysql_select_db('darknetstore');
		$retval = mysql_query( $sql, $conn );
   
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
   
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			
			echo $row['image'];
		}
    }
	
	function GetUserLevel() 
   {
	   $conn = mysql_connect('localhost', 'root', '');
   
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
   
		$sql = 'SELECT * FROM dn_users WHERE user_name="' . $_SESSION['user_name'] . '"';
		mysql_select_db('darknetstore');
		$retval = mysql_query( $sql, $conn );
   
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
   
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			
			echo $row['user_level'];
		}
    }
	
	function GetTotalProfit() 
   {
	   $conn = mysql_connect('localhost', 'root', '');
   
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
   
		$sql = 'SELECT SUM(sellprice) AS profit FROM accs';
		mysql_select_db('darknetstore');
		$retval = mysql_query( $sql, $conn );
   
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
   
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			
			echo $row['profit'];
		}
    }
	
	function GetTotalProfitUser($user) 
   {
	   $conn = mysql_connect('localhost', 'root', '');
   
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
   
		$sql = 'SELECT SUM(sellprice) AS profituser FROM accs WHERE seller="' . $user . '"';
		mysql_select_db('darknetstore');
		$retval = mysql_query( $sql, $conn );
   
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
   
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			
			return $row['profituser'];
		}
    }
	
	function GetUserAccSold($user) 
   {
	   $conn = mysql_connect('localhost', 'root', '');
   
		if(! $conn )
		{
			die('Could not connect: ' . mysql_error());
		}
   
		$sql = 'SELECT COUNT(*) AS total_count FROM accs WHERE seller="' . $user . '" AND status="Sold"';
		mysql_select_db('darknetstore');
		$retval = mysql_query( $sql, $conn );
   
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
   
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
			
			if($row['username'] = $user)
			{
			return $row['total_count'];
			}
			else
			{
				
			}
		}
    }
}
