<?php
include("includes/db.php");
include("includes/functions.php");
	
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0)
{
	remove_product($_REQUEST['pid']);
}
else if($_REQUEST['command']=='clear')
{
	unset($_SESSION['cart']);
}
else if($_REQUEST['command']=='update')
{
	$max=count($_SESSION['cart']);
	for($i=0;$i<$max;$i++)
	{
	 	$pid=$_SESSION['cart'][$i]['productid'];
	 	$q=intval($_REQUEST['product'.$pid]);
	 	if($q>0 && $q<=999)
	 	{
	 		$_SESSION['cart'][$i]['qty']=$q;
	 	}
	 	else
	 	{
	 		$msg='Αποτυχία ενημέρωσης! Η ποσότητα πρέπει να είναι αριθμός μεταξυ 1 και 999.';
	 	}
 	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shopping Cart</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

 	<link rel="stylesheet" href="css/global.css">
 	<link rel="stylesheet" href="http://vmj.gr/c/miltos.min.css" />
 	<link rel="stylesheet" href="http://vmj.gr/c/jquery.mobile.structure-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	
	<script language="javascript">
		function del(pid)
		{
			if(confirm('Do you really mean to delete this item'))
			{
				document.form1.pid.value=pid;
				document.form1.command.value='delete';
				document.form1.submit();
			}
		}
		function clear_cart()
		{
			if(confirm('This will empty your shopping cart, continue?'))
			{
				document.form1.command.value='clear';
				document.form1.submit();
			}
		}
		function update_cart()
		{
			document.form1.command.value='update';
			document.form1.submit();
		}
	</script>
	
	
	
	</style>
	<script type="text/javascript">
	<!--
	//
	function ReadForm (obj1, tst) 
	{ 
	    // Read the user form
	    var i,j,pos;
	    val_total="";val_combo="";		
	
	    for (i=0; i<obj1.length; i++) 
	    {     
	        // run entire form
	        obj = obj1.elements[i];           // a form element
	
	        if (obj.type == "select-one") 
	        {   // just selects
	            if (obj.name == "quantity" ||
	                obj.name == "amount") continue;
		        pos = obj.selectedIndex;        // which option selected
		        val = obj.options[pos].value;   // selected value
		        val_combo = val_combo + "(" + val + ")";
	        }
	    }
		// Now summarize everything we have processed above
		val_total = obj1.product_tmp.value + val_combo;
		obj1.product.value = val_total;
	}
	//-->
	</script>
</head>

<body>

<div data-role="page" data-id="ShoppingPage" data-theme="a">

	<div data-role="header" style="padding-top:5px; border-bottom: 4px solid rgb(245, 240, 240);">
		<a href="Gravity.php" rel="external" data-icon="home" data-iconpos="notext">Home</a>
            	<a href="#" data-role=”button” data-icon="back" data-rel="back" data-iconpos="notext" >Back</a>
            	<h2 align="center" style="white-space:normal;">Your Shopping Cart</h2>
    	</div>	
	<!--End of header-->
	
	<div data-role="content">
	
		<form id="form1" name="form1" method="post">
			<input type="hidden" name="pid" />
			<input type="hidden" name="command" />
									
    			<div align="center">
    				<table data-role="table" id="my-table" cellpadding="1px" cellspacing="1px">
    					<thead>
    					<?
						if(is_array($_SESSION['cart']))
						{
            						echo '<tr align="left" style="background:#999;">
            								<th>Α/Α</th>
            								<th>Ονομα Προιοντος</th>
            								<th>Τιμή</th>
            								<th>Ποσότητα</th>
            								<th>Συν. ποσό</th>
            								<th>Επιλογές</th>
            							</tr>';
							
							$max=count($_SESSION['cart']);
							for($i=0;$i<$max;$i++)
							{
								$pid=$_SESSION['cart'][$i]['productid'];
								$q=$_SESSION['cart'][$i]['qty'];
								$pname=get_product_name($pid);
								if($q==0) continue;
					?>
					</thead>
					<tbody bgcolor="#000000">
            					<tr bgcolor="#000000">
            						<th><?=$i+1?></th>
            						<td><?=$pname?></td>
                    					<td><span class="money">$<?=get_price($pid)?></span></td>
                    					<td><input type="text" name="product<?=$pid?>" value="<?=$q?>" maxlength="3" size="1" data-mini="true" data-inline="true" /></td>                    
                    					<td><span class="money"> $<?=get_price($pid)?></span></td>
                    					<td><a href="javascript:del(<?=$pid?>)">Διαγραφή</a></td>
                    				</tr>
            				<?					
							}
					?>
					<tr bgcolor="#000000" style="font-size:12px">
						<td colspan="4" align="right"><b>Sub Total: </b></td>
						<td><b><span class="money">$<?=get_sub_total()?></span></b></td>
						<td><b></b></td>
					</tr>
					<tr bgcolor="#000000" style="font-size:12px">
						<td colspan="4" align="right"><b>Shipping: </b></td>
						<td><b><span class="money">$<?=get_shipping_cost()?></span></b></td>
						<td><b></b></td>
					</tr>
					<tr bgcolor="#000000" style="font-size:14px">
						<td colspan="4" align="right"><b>Order Total: </b></td>
						<td><b><span class="money">$<?=get_order_total()?></span></b></td>
						<td><b></b></td>
					</tr>
					<tr>
						<td colspan="5">
						</td>
						<td align="left">
						<a href="javascript:update_cart()">Ενημέρωση Κάρτας</a>
							<!--<input type="button" id="hrefButton4" value="Update Cart" onclick="update_cart()" data-mini="true" data-inline="true">-->
						</td>
					</tr>
					<tr>
						<td colspan="5"></td>
						<td align="left"> 
							<a href="javascript:clear_cart()">Καθαρισμός Κάρτας</a>
							<!--<input type="button" value="Clear Cart" onclick="clear_cart()" data-mini="true" data-inline="true">-->
						</td>
					</tr>
					<?
            					}
						else
						{
							echo "<tr bgColor='#000000'>
								<td align='center' colspan='6'>Δεν υπάρχουν προιοντα στο καλάθι σας!</td>
							      </tr>";
						}
					?>
					</tbody>
        			</table>
        		</div>
        		
        		<div align="center" style="color:#f41010; font-size:12px; padding-top:5px;"><?=$msg?></div>
        		
        		<p align="center" >
    				<input type="button" data-inline="true" data-mini="true" data-icon="arrow-l" data-corners="false" value="Continue Shopping" onclick="window.location='collection.php'" />
    				<input type="button" value="Place Order" onclick="window.location='billin.php'" data-mini="true" data-inline="true" data-icon="arrow-r" data-corners="false" data-iconpos="right">
    			</p>
    		</form>
	</div>	<!--End of content-->	

	<div data-theme="a" data-role="footer"  data-position="fixed" style = "border-top: 4px solid rgb(245, 240, 240);">
           	<p align="center"  style=" white-space:normal;"> @2012 Gravity is a registrated brand Designed by the Grafix Design Studio.</br>
            		 All rights reserved by Grafix Design Studio. Read here the Terms &amp;Conditions.</br>
            		 Legal notice,Politics on Protection of information.</p>
 	</div><div style type="text/css">
		
		table
		{
			
			-webkit-border-radius: 8px;
			font-family:Verdana, Geneva, sans-serif; 
			font-size:10px; 
			border: 1px solid #b4b4b4;
		}
	
		table tr td
		{
    			border-bottom: 1px;
    			border-right: 1px solid #ffffff;
    			border-left: 1px solid #ffffff;
    			border-top: 1px solid #ffffff;
    			padding: 10px 10px 10px 10px;
    			
		}
		
		table th
		{
			border-right: 1px solid #ffffff;
			border-left: 1px solid #ffffff;
			border-bottom: 1px;
		}
</div>   <!--End of page-->

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