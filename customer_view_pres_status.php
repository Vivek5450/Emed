<?php
session_start();
include("customer_header.php");
include("connect.php");



?>

		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">VIEW PRESCRIPTION DETAIL</a>
										
										
										
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
						$custid=$_SESSION['custid'];
						$res1=mysql_query("select * from prescription_detail where customer_id='$custid'");
						
						if(mysql_num_rows($res1)>0)
						{
							echo "<table class='table table-bordered'>
									<tr>
										<th>PRESCRIPTION ID</th>
										<th>UPLOAD DATE</th>
										<th>DELIEVERY ADDRESS</th>
										<th>CITY</th>
										<th>MOBILE NO</th>
										
										<th>PRESCRIPTION IMAGE</th>
										<th>PRESCRIPTION STATUS</th>
										
									</tr>";
							while($r1=mysql_fetch_array($res1))
							{
								echo "<tr>";
								echo "<td>$r1[0]</td>";
								echo "<td>$r1[1]</td>";
								
								echo "<td>$r1[3]</td>";
								echo "<td>$r1[4]</td>";
								echo "<td>$r1[5]</td>";
								
								echo "<td><a href='$r1[6]' target='_blank'><img src='$r1[6]' style='width:150px; height:150px;'></a></td>";
								if($r1[7]=="0")
								{
									echo "<td style='color:blue;'>NEW UPLOADED</td>";
								}else if($r1[7]=="1")
								{
									echo "<td style='color:green;'>VERIFIED </td>";
								}else if($r1[7]=="2")
								{
									echo "<td style='color:red;'>NOT AVAILABLE </td>";
								}else if($r1[7]=="3")
								{
									$res2=mysql_query("select * from pres_bill_master where prescription_id='$r1[0]'");
									if(mysql_num_rows($res2)>0)
									{
										$r2=mysql_fetch_array($res2);
										$amt=$r2[5];
										echo "<td><a href='customer_payment.php?amt=$amt&pbid=$r2[2]'>CLICK HERE TO PAY BILL</a></td>";	
										
									}
									
								}else if($r1[7]=="4")
								{
									echo "<td style='color:green;'>PAID </td>";
								}
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