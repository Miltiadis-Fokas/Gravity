<?php
session_start();
include("config.php");

if($_POST["submitButton"]=="Σύνδεση")
{
	$username	=	$_POST["username"];
	$password	=	md5($_POST["password"]);
	//$//time 	= 	time(); 							// Gets the current server time															  
	$check 		= 	$_POST["rememberMe"]; 						// Checks if the remember me button was ticked  


		if($username && $password)
		{
			$login = mysql_query("select * from users_table where username='$username'") or die(mysql_error());
			while($row = mysql_fetch_assoc($login))
			{
				$db_password = 	$row['password'];
				if($password == $db_password)
					$loginok = TRUE;
				else
					$loginok = FALSE;
					
				if($loginok == TRUE)
				{
					if($check == "on")
						setcookie("username", $username, time()+7200);
					else if($check == "")
						$_SESSION['username'] = $username;
						
					header ("Location: fffff2.php");
					exit();
				}
				else
					header ("Location: login.php");
					/*die("Incorrect username/password.");*/
			}
		}
		else
			$errormsg = "Πρέπει να εισάγετε το όνομα σας.";
			header ("Location: login.php");
			die("Please enter a username and a password");
			exit();
	

$ress=mysql_query("select * from user where user='$username'") or die(mysql_error());
$rows=mysql_fetch_array($ress);

if(($rows["user"]==$username)&&($rows["password"]==$password))
{
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	if(isset($check))								//if(isset($_POST['rememberMe'])) ORIGINAL
	{
		setcookie("cookname", $_SESSION['username'], time()+60*60*24*100, "/");
		setcookie("cookpass", $_SESSION['password'], time()+60*60*24*100, "/");
	}

	header ("Location: welcome.php");
	exit;

}
else
{ 
	//echo "wrong username or password";
	header("location: registration.php");
	exit;
}
}
?>