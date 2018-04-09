<?
session_start();
include("includes/db.php");

	function get_product_name($pid){
		$result=mysql_query("select name from products where serial=$pid");
		$row=mysql_fetch_array($result);
		return $row['name'];
	}
	function get_price($pid){
		$result=mysql_query("select price from products where serial=$pid");
		$row=mysql_fetch_array($result);
		return $row['price'];
	}
	function remove_product($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_sub_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	
	function get_shipping_cost()
	{
		$shipcost = 0;
		if(get_sub_total()>0 && get_sub_total()<101)
			$shipcost = 4;
		else if(get_sub_total()>=101 && get_sub_total()<200)
			$shipcost = 7;
		else if(get_sub_total()>=201)
			$shipcost = 8;
		else 
			$shipcost = 0;
			
		return $shipcost;
	}
	
	function get_order_total()
	{
		$order_total = get_sub_total() + get_shipping_cost();
		return $order_total;
	}
	
	function addtocart($pid,$q){
		if($pid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($pid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['productid']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
		}
	}
	function product_exists($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}

?>