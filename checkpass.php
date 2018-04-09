<?php
session_start();
include("config.php");

$username	=	$_POST["username"];
$email		=	$_POST["email"];  

if($username && $email)
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
			$password = md5(md5("qwerty".$pass."qwerty"));
			
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
					echo "An error has occured and your email has not sent. ";
			}
			else
				header ("Location: forgotPassword.php");
				/*echo "An error occured and the password has not been reset.";*/
		}
		else
			header ("Location: forgotPassword.php");
			/*echo "An error occured and the password has not been reset.";*/
	
	}
	else
		header ("Location: forgotPassword.php");
		/*echo "An error occured and the password has not been reset.";*/
}
else
{
	header ("Location: forgotPassword.php");
	/*die("Please insert your username and email...");*/
	exit();
}

?>