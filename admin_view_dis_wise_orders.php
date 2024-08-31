<?php
session_start();
include("admin_header.php");
include("connect.php");


?>

		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">CUSTOMER VIEW ORDER DETAIL REPORT</a>
										
										
										
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
						$disid=$_REQUEST['disid'];
						$res1=mysql_query("select * from order_master where customer_id in (select customer_id from customer_detail where city = (select city from distributor_regis where dis_id='$disid'))");
						
						if(mysql_num_rows($res1)>0)
						{
							echo "<table class='table table-bordered'>
									<tr>
										<th>ORDER ID</th>
										<th>ORDER DATE</th>
										<th>CART ID</th>
										<th>DELIVERY ADDRESS</th>
										<th>MOBILE NO</th>
										<th>TOTAL AMOUNT</th>
										<th>PAYMENT TYPE</th>
										<th>VIEW ORDER DETAIL</th>
									</tr>";
							while($r1=mysql_fetch_array($res1))
							{
								echo "<tr>";
								echo "<td>$r1[0]</td>";
								echo "<td>$r1[1]</td>";
								echo "<td>$r1[2]</td>";
								echo "<td>$r1[4]</td>";
								echo "<td>$r1[5]</td>";
								echo "<td>$r1[6]</td>";
								echo "<td>$r1[7]</td>";
								
								
								echo "<td><a href='admin_view_order_detail.php?cartid=$r1[2]'>ORDER DETAIL</a></td>";
								
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