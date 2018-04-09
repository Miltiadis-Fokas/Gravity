<?php
session_start();
// config.php is a file that contains your
// database connection information. 
include("config.php");

if(loggedin())
{
	header ("Location: fffff2.php");
	exit();
}


if($_POST["submitButton"]=="Σύνδεση")
{
	$username	=	$_POST["username"];
	$password	=	$_POST["password"];
	//$//time 	= 	time(); 						// Gets the current server time															  
	$check 		= 	$_POST["rememberMe"]; 					// Checks if the remember me button was ticked  

	if($username)
	{
		if($password)
		{
			$password = md5($password);
			
			$login = mysql_query("select * from users_table where username='$username'") or die(mysql_error());
			$numrows = mysql_num_rows($login);
			
			if($numrows == 1)
			{
				$row = mysql_fetch_assoc($login);
				$db_password = 	$row['password'];
					
				if($password == $db_password)
				{
					if($check == "on")
					{
						setcookie("username", $username, time()+7200);
						$username="";
						$password="";
						header ("Location: fffff2.php");
						exit();
					}
					else if($check == "")
					{
						$_SESSION["username"] = $username;
						$username="";
						$password="";
						header ("Location: fffff2.php");
						exit();
					}
				}
				else
					$errormsg = "Λάθος συνθηματικό.";
			}
			else
				$errormsg = "Λάθος όνομα χρήστη.";
		}
		else
			$errormsg = "Πρέπει να εισάγετε το συνθηματικό σας.";
	}
	else
		$errormsg = "Πρέπει να εισάγετε το όνομα χρήστη σας.";
		/*header ("Location: login.php");
		die("Please enter a username and a password");
		exit();*/
}
?>

<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>Log In Form</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="css/global.css">
 	<link rel="stylesheet" href="http://vmj.gr/c/miltos.min.css" />
 	<link rel="stylesheet" href="http://vmj.gr/c/jquery.mobile.structure-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

</head> 

<body> 

<div data-role="page" id="loginPage" data-theme="a">

	<!-- start header -->
	<div data-role="header" style="padding-top:5px; border-bottom: 4px solid rgb(245, 240, 240);">
		<a href="Gravity.php" rel="external" data-icon="home" data-iconpos="notext">Home</a>
            	<a href="#" data-role=”button” data-icon="back" data-rel="back" data-iconpos="notext" >Back</a>
		<h1>Σύνδεση</h1>
	</div>
	<!-- end header -->
    
    <!-- start content -->
	<div data-role="content" data-inset="true">	
        	<form id="loginForm" name="loginForm" method="post" action="login.php" >
        		<fieldset>
        			<div data-role="fieldcontain">
			    		<label for="username">Όνομα χρήστη:</label>
            				<input type="text" name="username" id="username" value="<?=$username?>" placeholder="Όνομα χρήστη" data-theme="c"  />
				</div>
            
            			<div data-role="fieldcontain">
                			<label for="password">Συνθηματικό:</label>
                			<input type="password" name="password" id="password" value="" placeholder="Συνθηματικό" data-theme="c" />
	    			</div>
            
            			<div  align="center" style="color:#f41010; font-size:15px;"><?=$errormsg?></div>
            
            			<div data-role="fieldcontain" >
            				<div align = "left" >
            					<input type="checkbox" name="rememberMe" id="rememberMe" value="on" data-inline="true" data-mini="true" />
            					<label for = "rememberMe" style = "width: 139px;">Απομνημόνευση.</label>
            				</div>
            			</div>
            			<div align="right">
                			<input  type="submit" id="submitButton" name="submitButton" value="Σύνδεση" data-role="button" data-inline="true" data-corners="false" data-theme="b" />
            			</div>
            
            			<hr />
            			<div>Δεν έχετε λογαριασμό? : <a href="registration.php" style="color:rgb(11, 165, 252);">Εγγραφή.</a></div>
            			<div><a href="forgotPassword.php" style="color:rgb(11, 165, 252);">Χάσατε το συνθηματικό σας?</a></div>
            		</fieldset>
        	</form>
	</div>
	<!-- end content -->
</div>

</body>
</html>