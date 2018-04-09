<?php
$sDbHost = 'localhost';
$sDbName = 'vmjwebco_shopping';
$sDbUser = 'vmjwebco_root';
$sDbPwd = '147258369';

$dbConn = mysql_connect ($sDbHost, $sDbUser, $sDbPwd) or die ('MySQL connect failed. ' . mysql_error());
mysql_select_db($sDbName,$dbConn) or die('Cannot select database. ' . mysql_error());

function loggedin()
{
	if(isset($_SESSION['username']) || isset($_COOKIE['username']))
	{
		$loggedin = TRUE;
		return $loggedin;
	}
}
?>