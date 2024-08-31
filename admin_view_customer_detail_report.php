<?php
include("admin_header.php");
include("connect.php");


if(isset($_REQUEST['vdid']))
{
	$disid=$_REQUEST['vdid'];
	$query="update distributor_regis set status='1' where dis_id='$disid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Distributor Verified Successfully');";
		echo "window.location.href='admin_verify_distributor.php';";
		echo "</script>";
	}
}


if(isset($_REQUEST['nvdid']))
{
	$disid=$_REQUEST['nvdid'];
	$query="update distributor_regis set status='2' where dis_id='$disid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Distributor Not Verified Successfully');";
		echo "window.location.href='admin_verify_distributor.php';";
		echo "</script>";
	}
}
?>

		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">CUSTOMER DETAIL REPORT</a>
										
										
										
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
						$res1=mysql_query("select * from customer_detail");
						
						if(mysql_num_rows($res1)>0)
						{
							echo "<table class='table table-bordered'>
									<tr>
										<th>CUSTOMER ID</th>
										<th>CUSTOMER NAME</th>
										<th>ADDRESS</th>
										<th>CITY</th>
										<th>MOBILE NO</th>
										<th>GENDER</th>
										<th>EMAIL ID</th>
										
										
										<th>VIEW PRESCRIPTION</th>
										<th>VIEW ORDERS</th>
									</tr>";
							while($r1=mysql_fetch_array($res1))
							{
								echo "<tr>";
								echo "<td>$r1[0]</td>";
								echo "<td>$r1[1]</td>";
								echo "<td>$r1[2]</td>";
								echo "<td>$r1[3]</td>";
								echo "<td>$r1[4]</td>";
								echo "<td>$r1[5]</td>";
								echo "<td>$r1[6]</td>";
								
								echo "<td><a href='admin_view_customer_wise_prescription.php?cid=$r1[0]'>VIEW PRESCRIPTION</a></td>";
								echo "<td><a href='admin_view_customer_wise_order.php?cid=$r1[0]'>VIEW ORDERS</a></td>";
								echo "</tr>";
							}
							echo "</table>";
						}else{
							echo "<h2>No New Record Found</h2><br/><br/><br/><br/><br/><br/>";
						}
						?>
						</div>
						<div class="col-md-6">
						
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