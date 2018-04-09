<?
session_start();

	include("includes/db.php");
	include("includes/functions.php");
	
	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		addtocart($pid,1);
		header("location:shoppingcart.php");
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>04Alpha</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/global.css">
 	<link rel="stylesheet" href="http://vmj.gr/c/miltos.min.css" />
 	<link rel="stylesheet" href="http://vmj.gr/c/jquery.mobile.structure-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="main.js"></script>
<script language="javascript">
	function addtocart(pid){
		document.form1.productid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
	}
</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script src="js/slides.min.jquery.js"></script>
	<script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
	
</head>


   
<div data-role="page" data-id="ShoppingPage" data-theme="a">
<?php
			date_default_timezone_set('Europe/Athens');
			print date("\D\a\\t\e: d/m/y|\T\i\m\e: H:i ",time());
		?>
 <div data-theme="a" data-role="header" style="background-color:black;">
 		<a href="Gravity.php" rel="external" data-icon="home" data-iconpos="notext">Home</a>
            	<a href="#" data-role=”button” data-icon="back" data-rel="back" data-iconpos="notext" >Back</a>
            	
        
       
            		<div class="ui-btn-center" style="white-space:normal; font-size: 20px;height:55px;">
            			<h2 align="center">Gravity Online Store</h2>
            		</div>
            		
    <div data-role="navbar" style="padding-top:-1px;" >
                		<ul>
                    			<li><a href="shoppingcart.php">CheckOut</a></li>
                    			<li><a href="shoppingcart.php">My Cart (<?=count($_SESSION['cart'])?>) </a></li>
                    			                    			<li><a href="login.php">Login</a></li>

                   			<li><select id="currencies" name="currencies" data-mini="true" data-inline="true" data-corners="false">
  						<option value="USD" selected="selected">USD</option>
    						<option value="EUR">EUR</option>
   						<option value="GBP">GBP</option>
  					    </select>
  					</li>
                		</ul>
            		</div>
               	</div>
<form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>
<div align="center" style="background-color:black;"><div>



	<table border="0" cellpadding="0px" font-size:10px; width=10%>
		<?
			$result=mysql_query("select * from 04Alpha");
			while($row=mysql_fetch_array($result)){
		?>
    	<tr>
        	<td><div id="container">
		<div id='slider3' class='swipe' style='width:250px'>
  <ul>
    <li style='display:block'><img src="img/alpha.jpg " width="230" height="300">

    </li>
    <li style='display:block'><img src="img/alpha.jpg" width="230"height="300">


    </li>
    
  </ul>
</div>
<a href='#' onclick='slider3.prev();return false;'data-role="button" data-inline="true">prev</a> 
<a href='#' onclick='slider3.next();return false;'data-role="button" data-inline="true"style="
    left: 66px;">next</a>
<br><br>
</div>
</div>

			</div>
			
		</div>
             	<b><?=$row['name']?></b><br />
            		<?=$row['description']?><br />
            		<div>
            		<h1>Availability</h1>

<h2>Small</h2>
___

<h3>Medium</h3>
_____ 

<h4>Large</h4> 
_______ 

<h5>X-Large </h5>
_________ 

<h6>Request reprint of your size</h6>
    </div>  
            		
                 <h1 id="price">  <span style="font-size: medium;">Price <span class="money">
                    	$<?=$row['price']?></span></span>
                    	<div>Size : <select name="variation1" onchange="ReadForm (this.form, false);"><option value="Small">Small</option><option value="Medium">Medium</option><option value="Large">Large</option><option value="X-Large">X-Large</option></select></div>
                    <input type="button" value="Add to Cart" onclick="addtocart(<?=$row['serial']?>)" />
			</td>
		</tr>
        <tr><td colspan="2">
        <? } ?>
    </table></h1>
</div>
<div data-theme="a" data-role="footer"  data-position="fixed" style = "border-top: 4px solid rgb(245, 240, 240);">
           		<p align="center"  style=" white-space:normal;"> @2012 Gravity is a registrated brand Designed by the Grafix Design Studio.</br>
            		 All rights reserved by Grafix Design Studio. Read here the Terms &amp;Conditions.</br>
            		 Legal notice,Politics on Protection of information.</p>
        	</div>
<script src="http://vmj.gr/c/currencies.js" type="text/javascript"></script>
<script src="http://vmj.gr/c/jquery.currencies.min.js?0" type="text/javascript"></script>




<script>

	Currency.format = 'money_with_currency_format';

	var shopCurrency = 'USD';
	var cookieCurrency = Currency.cookie.read();

	jQuery('span.money').each(function() {
		jQuery(this).attr('data-currency-USD', jQuery(this).html());
	});

// If there's no cookie.
	if (cookieCurrency == null) {
	  Currency.currentCurrency = shopCurrency;
	}
// If the cookie value does not correspond to any value in the currency dropdown.
	else if (jQuery('[name=currencies]').size() && jQuery('[name=currencies] option[value=' + cookieCurrency + ']').size() === 0) {
	  Currency.currentCurrency = shopCurrency;
	  Currency.cookie.write(shopCurrency);
	}
	else if (cookieCurrency === shopCurrency) {
	  Currency.currentCurrency = shopCurrency;
	}
	else {
	  Currency.convertAll(shopCurrency, cookieCurrency);
	}

	jQuery('[name=currencies]').val(Currency.currentCurrency).change(function() {
	  var newCurrency = jQuery(this).val();
	  Currency.convertAll(Currency.currentCurrency, newCurrency);
	  jQuery('.selected-currency').text(Currency.currentCurrency);
	});

	var original_selectCallback = window.selectCallback;
	var selectCallback = function(variant, selector) {
	  original_selectCallback(variant, selector);
	  Currency.convertAll(shopCurrency, jQuery('[name=currencies]').val());
	  jQuery('.selected-currency').text(Currency.currentCurrency);
	};

	jQuery('.selected-currency').text(Currency.currentCurrency);

</script>
<script src='swipe.js'></script>
<script>
new Swipe(document.getElementById('slider'));
new Swipe(document.getElementById('slider2'));
var slider3 = new Swipe(document.getElementById('slider3'));
var slider4 = new Swipe(document.getElementById('slider4'));
</script>
<script>

window.mySwipe = new Swipe(
  document.getElementById('slider3')
);
</script>
</body>
</html>