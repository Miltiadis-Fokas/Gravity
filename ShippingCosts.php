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
<title>Shipping&Costs</title>

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
                    			<li><a href="shoppingcart.php">My Cart</a></li>
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
        
            
            <h2 style="font-size:170%;">Shipping Costs.</h2>
             
			<div class="ui-grid-a">
            	<div class="ui-block-a">
                	<p style="
    color: rgb(143, 140, 140);
">
                    	The shipping costs added to your total                        
                        will depent on your zone.
                    </p>
                </div>
                <div class="ui-block-b">
                	<p><img src="images/plain1-241x300.jpg" width="140" height="330" ></p>
                </div>
                
       </div>
       
       <div data-role="collapsible-set">
       		<div data-role="collapsible">
				<h3>Zone 1-Greece</h3>
                <p>
                	Ordinary Mail-2 to 3 working days
					Shipping 1 tee costs 4 €/5.5 $/3.7£
					MRW (URGENT)-1 working day
					Shipping 1 tee cost 7e/9.6$/6.7£
                </p>
            </div>
            <div data-role="collapsible">
				<h3>Zone 2-Europe</h3>
                <p>
                	Ordinary Mail-4 to 5 working days
					Shipping 1 tee costs 7 €/9.6 $/6.7£
					MRW (URGENT)-2 to 4 working day
					Shipping 1 tee cost 38 €/52$/54.4
                </p>
            </div>
            <div data-role="collapsible">
				<h3>Zone 3-Overseas</h3>
                <p>
                	Ordinary Mail-6 to 8 working days
					Shipping 1 tee costs 8 €/11 $/7.3£
					MRW (URGENT)-3 to 5 working day
					Shipping 1 tee cost 60 €/82$/54.4£
                </p>
            </div>
            <div data-theme="a" data-role="footer"  data-position="fixed" style = "border-top: 4px solid rgb(245, 240, 240);">
           		<p align="center"  style=" white-space:normal;"> @2012 Gravity is a registrated brand Designed by the Grafix Design Studio.</br>
            		 All rights reserved by Grafix Design Studio. Read here the Terms &amp;Conditions.</br>
            		 Legal notice,Politics on Protection of information.</p>
        	</div>
       </div>
        
</div>
</body>
</html>