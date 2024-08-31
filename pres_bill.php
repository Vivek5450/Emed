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
	<table border='1' align="center" width="80%">
		<tr>
			<?php
			if(isset($_REQUEST['bdid']))
			{
				$bid=$bdid;
			}else{
				$bid=$_REQUEST['bid'];
			}
			$res1=mysql_query("select * from pres_bill_master where pres_bill_id='$bid'");
			$r1=mysql_fetch_array($res1);
			$pbid=$r1[0];
			$bdate=$r1[1];
			$presid=$r1[2];
			$disid=$r1[3];
			$customerid=$r1[4];
			$totamt=$r1[5];
			
			$res2=mysql_query("select * from customer_detail where customer_id='$customerid'");
			$r2=mysql_fetch_array($res2);
			$cname=$r2[1];
			$mno=$r2[4];
			
			
			?>
			<td>
			<b>Bill Id: <?php echo $pbid; ?> <br/>
			<b>Bill Date: <?php echo $bdate; ?> 
			</b>
			</td>
			<td>
			<b>Customer Name: <?php echo $cname; ?> <br/>
			<b>Mobile No: <?php echo $mno; ?> 
			</td>
		</tr>
	</table>
	<table border='1' align="center" height="50%" width="80%">
		<tr>
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
		$qur=mysql_query("select * from pres_bill_detail where pres_bill_id='$bid'");
		while($q=mysql_fetch_row($qur))
		{
			echo "<tr>";
			
			echo "<td>$q[1]</td>";
			echo "<td>$q[2]</td>";
			echo "<td>$q[3]</td>";
			$amt=$q[2]*$q[3];
			echo "<td>Rs. $amt /-</td>";
			echo "</tr>";
			$tot=$tot+$amt;
		}
	?>
		<tr>
			<td colspan="3">This is system generated bill, No signature required.<br>
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
	<a href="distributor_view_new_pres.php">BACK</a>
		<?php
		}	
		?>
	
</body>

</html>