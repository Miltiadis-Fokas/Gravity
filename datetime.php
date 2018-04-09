<?
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
<title>Collection</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/global.css">
 <link rel="stylesheet" href="http://vmj.gr/c/miltos.min.css" />
 <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile.structure-1.2.0.min.css" />
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

print date("\D\a\\t\e\: d/m/y|\T\i\m\e\: H:i ",time());
?>
 <div data-theme="a" data-role="header" style="background-color:black;">

 <h3>
          <p>  Gravity Online </p>
            Store
        </h3>
    <div data-role="content" >
        <a data-role="button" data-inline="true" data-theme="a" href="#page1" >
           <span class="ui-btn-text" style="color: white;">
            Checkout</span>
        </a>
        <a data-role="button" data-inline="true" data-theme="a" href="#page1">
        <span class="ui-btn-text" style="color: white;">
            Login</span>
        </a>
        <a data-role="button" data-inline="true" data-theme="a" href="#page1">
        <span class="ui-btn-text" style="color: white;">
            MyCart</span>
        </a>

</div>
    </div>
    <ul data-role="listview" data-inset="true">
        <li><a href="http://www.vmj.gr/c/f.php" >
            <div class="icons bookIcon"></div>
Gravity            
            </a>
        </li>
        
    </ul>
    <ul data-role="listview" data-inset="true">
        <li><a href="/CheckIn?GUID=b9324e8d-b5d2-4a58-8a72-96be4beac360/" >
            <div class="icons checkinIcon"></div>
            
High  quality on line store            
        </a>
        </li>
        
    </ul>
    
     <div data-role="collapsible-set" class="layout">
		<div data-role="collapsible" data-icon="arrow-r"  data-iconpos="left" data-collapsed="true" data-theme="a" class="nav-home-list">
			<h3>Collection</h3>
            <ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/collection2.php">See full Collection</a></li>
			</ul>
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/01AlwaysSomethingMissing.php">01.Always Something </a></li>
			</ul>
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/02Geometric.php">02.Geometric </a></li>
			</ul>
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/03AndthenWhat.php">03.And then What?</a></li>
			</ul>
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/04Alpha.php">04.Alpha</a></li>
			</ul>
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/05Why.php">05.Why </a></li>
			</ul>
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/06. Two is better than one.php">06. Two is better than one </a></li>
			</ul>
        </div> 
        <ul data-role="listview" data-inset="true">
        <li><a href="/CheckIn?GUID=b9324e8d-b5d2-4a58-8a72-96be4beac360/" >
            <div class="icons checkinIcon"></div>
            
Lookbook 2012-2013        </a>
        </li>
        
    </ul>
    <div data-role="collapsible-set" class="layout">
		<div data-role="collapsible" data-icon="arrow-r"  data-iconpos="left" data-collapsed="true" data-theme="a" class="nav-home-list">
			<h3>Customers</h3>
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/SizzingAndDetails.php">Sizing and details
 </a></li>
			</ul>
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/washcare.php">Wash Care
 </a></li>
			</ul>
<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/f.php">Payment Methods
 </a></li>
			</ul>
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/f.php">Shipping Costs
 </a></li>
			</ul>
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/f.php">Returns Info
 </a></li>
			</ul>	</div>
			 <div data-role="collapsible-set" class="layout">
		<div data-role="collapsible" data-icon="arrow-r"  data-iconpos="left" data-collapsed="true" data-theme="a" class="nav-home-list">
			<h3>US</h3>	
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/f.php">info+contact
 </a></li>
			</ul>		
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/f.php">Press
 </a></li>
			</ul>	</div>	
<div data-role="collapsible-set" class="layout">
		<div data-role="collapsible" data-icon="arrow-r"  data-iconpos="left" data-collapsed="true" data-theme="a" class="nav-home-list">
			<h3>Newsletter</h3>
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/f.php">Your email here
 </a></li>
			</ul>
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/f.php">Subscribe-Unsubscribe
 </a></li>
			</ul>
			<ul data-role="listview" data-inset="true" data-theme="a">
                <li>
<a href="http://www.vmj.gr/c/f.php">RSS FacebookTwitter
 </a></li>
			</ul>	</div>						
</div>
<div data-theme="a" data-role="footer"  data-position="fixed">
           <h4  style=font-size:10px;> @2012 Gravity is a registrated brand Designed by the Grafix Design Studio.</h4>
            <h5  style=font-size:10px;>All rights reserved by Grafix Design Studio. Read here the Terms &amp;Conditions.</h5>
            <h6  style=font-size:10px;> Legal notice,Politics on Protection of information.</h6>
        </h3>
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
</body>
</html>