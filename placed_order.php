<?php
session_start();
include("customer_header.php");
include("connect.php");
?>
<script type="text/javascript">
	function validate()
	{
		if(form1.txtadd.value=="")
		{
			alert("Please Enter Delivery Address");
			form1.txtadd.focus();
			return false;
		}
		
		
		
		var v=/^[0-9]+$/
		if(form1.txtmno.value=="")
		{
			alert("Please Enter Delivery Mobile No");
			form1.txtmno.focus();
			return false;
		}else if(form1.txtmno.value.length!=10)
		{
			alert("Please Enter Delivery Mobile No 10 Digit Long");
			form1.txtmno.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtmno.value))
			{
				alert("Please Enter Only Digits in Delivery Mobile No");
				form1.txtmno.focus();
				return false;
			}
		}
		
		if(form1.ptype[0].checked==false)
		{
			if(form1.ptype[1].checked==false)
			{
				alert("Please Select Payment Type");
				return false;
			}
		}
	}
</script>
<?php

if(isset($_POST['btnorder']))
{
	
	$add=$_POST['txtadd'];
	
	$mno=$_POST['txtmno'];
	$ptype=$_POST['ptype'];
	$odate=date("Y-m-d");
	$cartid=$_SESSION['cartid'];
	$custid=$_SESSION['custid'];
	
	$res1=mysql_query("select sum(qty*price) from cart_detail where cart_id='$cartid'");
	$r1=mysql_fetch_array($res1);
	$totamt=$r1[0];
	//auto no code start...
	$res2=mysql_query("select max(order_id) from order_master");
	$oid=0;
	while($r2=mysql_fetch_array($res2))
	{
		$oid=$r2[0];
	}
	$oid++;
		
	//auto no code end...
	
	$query="insert into order_master values('$oid','$odate','$cartid','$custid','$add','$mno','$totamt','$ptype')";
	if(mysql_query($query))
	{
		unset($_SESSION['cartid']);
		if($ptype=="COD")
		{
			echo "<script type='text/javascript'>";
			echo "alert('Order Placed Successfully');";
			echo "window.location.href='customer_view_order.php';";
			echo "</script>";
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('Order Placed Successfully');";
			echo "window.location.href='customer_payment.php?amt=$totamt';";
			echo "</script>";
		}
	}
}
?>
		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">PLACED YOUR ORDER</a>
										
										<h4><br/>Simplifying Healthcare, Impacting Lives.</h4></center>
										
									</div>
									
									<div class="clearfix"> </div>
								</div>
							</div>
		<!-- team-grids-caption -->

		<div class="contact">
				<div class="container">
					
					<div class="row">
						<div class="col-md-6">
						<br/><br/><br/>
						<?php
						$cartid=$_SESSION['cartid'];
						$res1=mysql_query("select * from cart_detail where cart_id='$cartid'");
						
						if(mysql_num_rows($res1)>0)
						{
							echo "<table class='table table-bordered'>
									<tr>
										<th>PRODUCT IMAGE</th>
										<th>PRODUCT NAME</th>
										
										<th>QUANTITY</th>
										<th>PRICE</th>
										<th>AMOUNT</th>
										
									</tr>";
									$tot=0;
							while($r1=mysql_fetch_array($res1))
							{
								echo "<tr>";
								$res2=mysql_query("select * from product_detail where product_id='$r1[1]'");
								$r2=mysql_fetch_array($res2);
								echo "<td><a href='$r1[4]' target='_blank'><img src='$r2[4]' style='width:150px; height:150px;'></a></td>";
								echo "<td>$r2[1]</td>";
								
								echo "<td>$r1[2]</td>";
								echo "<td>$r1[3]</td>";
								$amt = $r1[2]*$r1[3];
								$tot=$tot+$amt;
								echo "<td>$amt</td>";
							
								echo "</tr>";
							}
							echo "</table>";
							echo "<br/><h3>Total Amount: &#8377; $tot /-</h3>";
							
						}else{
							echo "<h2>No New Record Found</h2><br/><br/><br/><br/><br/><br/>";
						}
						?>
						</div>
						<div class="col-md-6">
							<div class="contact-grids">
						
						<!----- contact-form ------>
						<div class="contact-form">
							
							<form method="post" name="form1">
							
								<div class="contact-form-row2">
									<span>Address :</span>
									<textarea name="txtadd" placeholder="Enter Delivery Address"></textarea>
								</div>
								<div class="contact-form-row">
									
									<div>
										<span>Mobile No :</span>
										<input type="text" class="text" name="txtmno" placeholder="Enter Mobile No">
									</div>
								
									<div class="clearfix"> </div>
								</div>
								
								<div class="clearfix"> </div>
								<div class="contact-form-row2">
									<span>Select Payment Type :</span>
									<input type="radio" value="COD" name="ptype"> CASH ON DELIVERY &nbsp;&nbsp;&nbsp;
									<input type="radio" value="ONLINE" name="ptype"> ONLINE PAYMENT
								</div>
								<input type="submit" value="PLACED ORDER" name="btnorder" onclick="return validate();">
							</form>
						</div>
						<!----- contact-form ------>
					</div>
						</div>
					</div>
					<!----- contact-grids ----->		
					
					<!----- contact-grids ----->
				</div>
			</div>
		<!-- /Contact -->
		</div>
		


<?php
include("footer.php");
?>