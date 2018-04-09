<?php
session_start();
// config.php is a file that contains your
// database connection information. This
// tutorial assumes a connection is made from
// this existing file.
include("config.php");


if($_POST["Submit"]=="Δημιουργία")
{
	$name		=	$_POST["text_name"];
	$email		=	$_POST["text_email"];
	$user		=	$_POST["text_user"];
	$password	=	$_POST["text_pass"];
	$repass		=	$_POST["text_repass"];
	   
	   
	if($name)
	{ 
		if($email)
		{
			if($user)
			{
				if($password)
				{
					if($repass)
					{
						if($password === $repass)
						{
							if((strlen($email) >= 7) && (strstr($email, "@")) && (strstr($email, ".")) )
							{
								$query = mysql_query("SELECT * FROM users_table WHERE username ='$user'");
								$numrows = mysql_num_rows($query);
							    
								if($numrows == 0)
								{
									$query = mysql_query("SELECT * FROM users_table WHERE email ='$email'");
									$numrows = mysql_num_rows($query);
									if($numrows == 0)
									{
							    		
										/*$_SESSION["username"]=$_POST["text_name"];*/
										//echo $_SESSION["username"];
										//exit;
										
										$str="insert into users_table(name,email,username,password)values 
										('".$name."','".$email."',           
										'".$user."','".md5($password)."')";
								
										//echo $str;
										//exit;
										mysql_query($str);
										header ("Location: login.php");
										exit();
									}
									else
										$error_msg = "Το email χρησιμοποιείται ήδη.";
								}
								else
									
									$error_msg = "Το όνομα χρήστη χρησιμοποιείται ήδη.";
							}
							else
								$error_msg = "Το email δεν είναι έγκυρο.";
						}
						else
							$error_msg = "Αποτυχία επιβεβαίωσης συνθηματικού.";
					}
					else
						$error_msg = "Πρέπει να επιβεβαιώσετε το συνθηματικό σας.";
				}
				else
					$error_msg = "Πρέπει να εισάγετε το συνθηματικό σας.";
			}
			else
				$error_msg = "Πρέπει να εισάγετε το όνομα χρήστη σας.";
		}
		else
			$error_msg = "Πρέπει να εισάγετε το email σας.";
	}
	else
		$error_msg = "Πρέπει να εισάγετε το όνομα σας.";	
}
?>

<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="css/global.css">
 	<link rel="stylesheet" href="http://vmj.gr/c/miltos.min.css" />
 	<link rel="stylesheet" href="http://vmj.gr/c/jquery.mobile.structure-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="main.js"></script>
        
        /*<script language="javascript" type="text/javascript">
    		function validate()
    		{
    			if(document.getElementById("text_name").value=="")
    		{
        		alert("Please Enter Your Name");
        		document.getElementById("text_name").focus();
        		return false;
    		}

    	if(!(isNaN(document.registration.text_name.value)))
    	{
			alert("Name has character only!");
			return false;
    	} 

		var emailPat=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/
		var emailid=document.getElementById("text_email").value;
		var matchArray = emailid.match(emailPat);

    	if (matchArray == null)
		{
			alert("Your email address seems incorrect. Please try again.");
			document.getElementById("text_email").focus();
			return false;
		}

		if(document.getElementById("text_user").value=="")
		{
			alert("Please Enter User Name");
			document.getElementById("text_user").focus();
			return false;
		}

		if(document.getElementById("text_pass").value=="")
		{
			alert("Please Enter Your Password");
			document.getElementById("text_pass").focus();
			return false;
		}

		if(document.getElementById("text_repass").value=="")
		{
			alert("Please ReEnter Your Password");
			document.getElementById("text_repass").focus();
			return false;
		}
    
		if(document.getElementById("text_repass").value!="")
		{
			  if(document.getElementById("text_repass").value != document.getElementById("text_pass").value)
			  {
				   alert("Confirm Password doesn't match!");
				   document.getElementById("text_repass").focus();
				   return false;
			  }
    	}
    return true;
	}
</script>*/
        
</head>
   
<body>
        
<div data-role="page" id="registerPage" data-theme="a">

	<!-- start header -->
	<div data-role="header" style="padding-top:5px; border-bottom: 4px solid rgb(245, 240, 240);">
		<a href="Gravity.php" rel="external" data-icon="home" data-iconpos="notext">Home</a>
            	<a href="#" data-role=”button” data-icon="back" data-rel="back" data-iconpos="notext" >Back</a>
		<h1 style=" white-space:normal;">Δημιουργία νέου χρήστη</h1>
		
	</div>
	<!-- end header -->
    
    	<!-- start content -->
	<div data-role="content" data-inset="true">	
	
        <form  name="registration" action="registration.php" method="post" >
        	<fieldset>
        		<div data-role="fieldcontain">
				<label for="text_name">Πλήρες όνομα:</label>
	            		<input type="text" name="text_name" id="text_name" value="<?=$name?>" placeholder="Πλήρες όνομα" data-theme="c" />
 			</div>
	            
	            	<div data-role="fieldcontain">
 				<label for="text_email">Email:</label>
	            		<input type="email" name="text_email" id="text_email" value="<?=$email?>" placeholder="Email" data-theme="c" />
 			</div>
	        
	            	<div data-role="fieldcontain">
			 	<label for="text_user">Όνομα χρήστη:</label>
	            		<input type="text" name="text_user" id="text_user" value="<?=$user?>" placeholder="Όνομα χρήστη" data-theme="c" />
			</div>
	            
	            	<div data-role="fieldcontain">
	                	<label for="text_pass">Συνθηματικό:</label>
	                	<input type="password" name="text_pass" id="text_pass" value="<?=$password?>" placeholder="Συνθηματικό" data-theme="c"/>
		 	</div>
	            
	            	<div data-role="fieldcontain">
	                	<label for="text_repass">Επιβεβαίωση:</label>
	                	<input type="password" name="text_repass" id="text_repass" value="<?=$repass?>" placeholder="Επιβεβαίωση" data-theme="c"/>
		 	</div>
	            	
	            	<div  align="center" style="color:#f41010; font-size:15px;"><?=$error_msg?></div>
	            
	            	<div align="right">
	                	<input  type="submit" id="Submit" name="Submit" value="Δημιουργία" data-role="button" data-inline="true" data-corners="false" data-theme="b" />
	            	</div>
 		</fieldset>
        </form>
        
	</div>
	<!-- end content -->

</div>
</body>
</html> 