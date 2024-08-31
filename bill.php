<?php
include("connect.php");
?>
<html>
<head>
</head>
<body onload="window.print();">
	
	<table border='1' align="center" width="80%">
		<tr>
			<td colspan="2" align="center"><img src="images/logo1.png" style="width:228px; height:100px;" alt="" />
		<br/>
			2nd Floor Mega Mart, <br/>
			M.G. Road, <br/>
			Dharampur: 396050 <br/>
			Gujarat
			</td>	
		</tr>
	</table>
	<table border='1' align="center" height="50%" width="80%">
		<tr>
			<td>MEDICINE IMAGE</td>
			<td>MEDICINE NAME</td>
			<td>QUANTITY</td>
			<td>PRICE</td>
			<td>AMOUNT</td>
		</tr>
	<?php
		$tot=0;
		if(isset($_REQUEST['bdid']))
		{
			$bid=$_REQUEST['bdid'];
		}else if(isset($_REQUEST['bddid']))
		{
			//$iid=$_REQUEST['idid'];
		}else {
			$bid=$_REQUEST['bid'];
		
		}	
		$qur=mysql_query("select c.cart_id,c.product_id,p.product_name,c.qty,c.price,p.product_img from cart_detail c,product_detail p where c.product_id=p.product_id and c.cart_id=(select cart_id from order_master where order_id=(select order_id from bill_detail where bill_id='$bid'))");
		while($q=mysql_fetch_row($qur))
		{
			echo "<tr>";
			echo "<td><img src='$q[5]' style='width:100px; height:100px;'></td>";
			echo "<td>$q[2]</td>";
			echo "<td>$q[3]</td>";
			echo "<td>$q[4]</td>";
			$amt=$q[3]*$q[4];
			echo "<td>Rs. $amt /-</td>";
			echo "</tr>";
			$tot=$tot+$amt;
		}
	?>
		<tr>
			<td colspan="4">This is system generated bill, No signature required.<br>
			</td>
			<td >Total Amount Rs. <?php echo $tot; ?>/-</td>
		</tr>
	</table>
	<?php
	if(isset($_REQUEST['bdid']))
		{
	?>

		<?php
			
			
		}else if(isset($_REQUEST['bddid']))
		{
			?>
		
			<?php
		}else{
		?>
	<a href="distributor_view_new_order.php">BACK</a>
		<?php
		}	
		?>
	
</body>

</html>