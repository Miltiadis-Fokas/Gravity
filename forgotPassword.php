<?php
session_start();
// config.php is a file that contains your
// database connection information. This
// tutorial assumes a connection is made from
// this existing file.
include("config.php");

if(loggedin())
{
	header ("Location: fffff2.php");
	exit();
}


if($_POST["submitButton"]=="Ανάκτηση")
{
	$username	=	$_POST["username"];
	$email		=	$_POST["email"];  
	
	if($username)
	{
		if($email)
		{
			if((strlen($email) >= 7) && (strstr($email, "@")) && (strstr($email, ".")) )
			{
				$query = mysql_query("SELECT * FROM users_table WHERE username ='$username'");
				$numrows = mysql_num_rows($query);
				if($numrows == 1)
				{
					$row = mysql_fetch_assoc($query);
					$dbemail = $row['email'];
					
					if($dbemail == $email)
					{
						$pass = rand();
						$pass = md5($pass);
						$pass = substr($pass, 0, 32);
						$password = $pass;
						
						mysql_query("UPDATE users_table SET password ='$password' WHERE username ='$username'");
						
						$query = mysql_query("SELECT * FROM users_table WHERE username ='$username' AND password ='$password'");
						$numrows = mysql_num_rows($query);
						
						if($numrows == 1)
						{
							$webmaster = "Ichousm@hotmail.com";
							$headers = "From : Ichousm<$webmaster>";
							$subject = "Your new password.";
							$message = "Your password has been reset.Your new password is below.\n";
							$message .= "Password : $pass\n";
							
							
							if( mail($email, $subject, $message, $headers ))
							{
								header ("Location: login.php");
								/*echo "Your new password has been sent to your email address!";*/
							}
							else
								$errormsg = "Σφάλμα στην ανάκτηση κωδικου.Προσπαθήστε ξανά";
						}
						else
							header ("Location: forgotPassword.php");
							/*echo "An error occured and the password has not been reset.";*/
					}
					else
						$errormsg = "Λάθος email.";
				}
				else
					$errormsg = "Λάθος όνομα χρήστη.";
			}
			else
				$errormsg = "Το email δεν είναι έγκυρο.";
		}
		else
			$errormsg = "Πρέπει να εισάγετε το email σας.";
	}
	else
		$errormsg = "Πρέπει να εισάγετε το όνομα χρήστη σας.";
}
?>

<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>Forgot Password Form</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="css/global.css">
 	<link rel="stylesheet" href="http://vmj.gr/c/miltos.min.css" />
 	<link rel="stylesheet" href="http://vmj.gr/c/jquery.mobile.structure-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>

</head> 

<body> 

<div data-role="page" id="ForgotPasswordPage" data-theme="a">

	<!-- start header -->
	<div data-role="header" style="padding-top:5px; border-bottom: 4px solid rgb(245, 240, 240);">
		<a href="fffff.php" rel="external" data-icon="home" data-iconpos="notext">Home</a>
            	<a href="#" data-role=”button” data-icon="back" data-rel="back" data-iconpos="notext" >Back</a>
		<h1 style=" white-space:normal;">Ανάκτηση Κωδικού</h1>
	</div>
	<!-- end header -->
    
    	<!-- start content -->
	<div data-role="content" data-inset="true">	
        	<form id="forgotpasswordForm" name="forgotpasswordForm" method="post" action="forgotPassword.php">
        		<fieldset>
        
            			<div data-role="fieldcontain">
					<label for="username">Όνομα χρήστη:</label>
            				<input type="text" name="username" id="username" value="<?=$username?>" placeholder="Όνομα χρήστη" data-theme="c" />
				</div>
            
            			<div data-role="fieldcontain">
                			<label for="email">Email:</label>
                			<input type="text" name="email" id="email" value="" placeholder="Email" data-theme="c"/>
	    			</div>
     
     				<div  align="center" style="color:#f41010; font-size:15px;"><?=$errormsg?></div>
            
            			<div align="right">
                			<input  type="submit" id="submitButton" name="submitButton" value="Ανάκτηση" data-role="button" data-inline="true" data-corners="false" data-theme="b" />
            			</div>
            		</fieldset>
        	</form>
        
	</div>
	<!-- end content -->
</div>
</body>
</html>