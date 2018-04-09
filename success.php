<?php
session_start();
require 'config.php';
$uid = $_SESSION['uid'];
$username=$_SESSION['username'];
$item_no = $_GET['item_number'];
$item_transaction = $_GET['tx']; // Paypal transaction ID
$item_price = $_GET['amt']; // Paypal received amount
$item_currency = $_GET['cc']; // Paypal received currency type

//Getting product details
$sql=mysql_query("select product,price,currency from producst where pid='$item_no'");
$row=mysql_fetch_array($sql);
$price=$row['price'];
$currency=$row['currency'];

//Rechecking the product price and currency details
if($item_price==$price && item_currency==$currency)
{

$result = mysql_query("INSERT INTO sales(pid, uid, saledate,transactionid) VALUES('$item_no', '$uid', NOW(),'$item_transaction')");
if($result)
{
echo "<h1>Welcome, $username</h1>";
echo "<h1>Payment Successful</h1>";
}
}
else
{
echo "Payment Failed";
}
?>