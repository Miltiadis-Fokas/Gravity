<?php
session_start();						//Before you can store user information in your PHP session, you must first start up the 		                                        //session.Note: The session_start() function must appear BEFORE the <html> tag:The code 	                                        //above will register the user's session with the server, allow you to start saving user                                        //information, and assign a UID for that user's session.

session_destroy();						//session_destroy() will reset your session and you will lose all your stored session data.

setcookie("username", "", time()-7200);

header ("Location: Gravity.php");


if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass']))		//The isset() function checks if the "cookname" variable has 		                                                                    //already been set.
{
	setcookie("cookname", "", time()-60*60*24*100, "/");
	setcookie("cookpass", "", time()-60*60*24*100, "/");
}
header ("Location: login.php");
?>