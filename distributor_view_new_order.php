<?php
session_start();
include("dis_header.php");
include("connect.php");


if(isset($_REQUEST['oid']))
{
	$oid=$_REQUEST['oid'];
	$bdate=date("Y-m-d");
	$res5=mysql_query("select * from order_master where order_id='$oid'");
	$r5=mysql_fetch_array($res5);
	$cartid=$r5[2];
	$customerid=$r5[3];
	$totamt=$r5[6];
	
	//auto no code start...
	$res2=mysql_query("select max(bill_id) from bill_detail");
	$bid=0;
	while($r2=mysql_fetch_array($res2))
	{
		$bid=$r2[0];
	}
	$bid++;
	//auto no code end...
	
	
	
	$query="insert into bill_detail values('$bid','$bdate','$oid','$customerid','$cartid','$totamt')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Bill Generated Successfully');";
		echo "window.location.href='bill.php?bid=$bid';";
		echo "</script>";
	}
}
?>
		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">ORDER DETAIL</a>
										
										<h4><br/>Simplifying Healthcare, Impacting Lives.</h4></center>
										
									</div>
									
									<div class="clearfix"> </div>
								</div>
							</div>
		<!-- team-grids-caption -->

		<div class="contact">
				<div class="container">
					
					<div class="row">
					
						<div class="col-md-12">
						<?php
						$disid=$_SESSION['disid'];
						$res1=mysql_query("select * from order_master where customer_id in (select customer_id from customer_detail where city = (select city from distributor_regis where dis_id='$disid')) and order_id not in(select order_id from bill_detail)");
						
						if(mysql_num_rows($res1)>0)
						{
							echo "<table class='table table-bordered'>
									<tr>
										<th>ORDER ID</th>
										<th>ORDER DATE</th>
										<th>CART ID</th>
										<th>CUSTOMER NAME</th>
										<th>DELIVERY ADDRESS</th>
										<th>MOBILE NO</th>
										<th>TOTAL AMOUNT</th>
										<th>PAYMENT TYPE</th>
										<th>VIEW ORDER DETAIL</th>
										<th>GENERATE BILL</th>
									</tr>";
							while($r1=mysql_fetch_array($res1))
							{
								echo "<tr>";
								echo "<td>$r1[0]</td>";
								echo "<td>$r1[1]</td>";
								echo "<td>$r1[2]</td>";
								$res2=mysql_query("select * from customer_detail where customer_id='$r1[3]'");
								$r2=mysql_fetch_array($res2);
								echo "<td>$r2[1]</td>";
								echo "<td>$r1[4]</td>";
								echo "<td>$r1[5]</td>";
								echo "<td>$r1[6]</td>";
								echo "<td>$r1[7]</td>";
								
								
								echo "<td><a href='distributor_view_order_detail.php?cartid=$r1[2]'>ORDER DETAIL</a></td>";
								echo "<td><a href='distributor_view_new_order.php?oid=$r1[0]'>GENERATE BILL</a></td>";
								
								echo "</tr>";
							}
							echo "</table>";
						}else{
							echo "<h2>No New Record Found</h2><br/><br/><br/><br/><br/><br/>";
						}
						?>
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