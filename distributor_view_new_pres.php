<?php
session_start();
include("dis_header.php");
include("connect.php");

if(isset($_REQUEST['vpid']))
{
	$presid=$_REQUEST['vpid'];
	$query="update prescription_detail set status='1' where prescription_id='$presid'";
	if(mysql_query($query))
	{
		
		echo "<script type='text/javascript'>";
		echo "alert('Prescription Verified Successfully');";
		echo "window.location.href='distributor_select_del_boy.php?presid=$presid';";
		echo "</script>";
	}
}
if(isset($_REQUEST['nvpid']))
{
	$presid=$_REQUEST['nvpid'];
	$query="update prescription_detail set status='2' where prescription_id='$presid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Prescription Not Verified Successfully');";
		echo "window.location.href='distributor_view_new_pres.php';";
		echo "</script>";
	}
}
?>

		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">VIEW NEW PRESCRIPTION DETAIL</a>
										
										
										
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
						$res1=mysql_query("select * from prescription_detail where status='0' and city=(select city from distributor_regis where dis_id='$disid')");
						
						if(mysql_num_rows($res1)>0)
						{
							echo "<table class='table table-bordered'>
									<tr>
										<th>PRESCRIPTION ID</th>
										<th>UPLOAD DATE</th>
										<th>CUSTOMER NAME</th>
										<th>DELIEVERY ADDRESS</th>
										<th>CITY</th>
										<th>MOBILE NO</th>
										
										<th>PRESCRIPTION IMAGE</th>
										<th>VERIFY</th>
										<th>NOT VERIFY</th>
									</tr>";
							while($r1=mysql_fetch_array($res1))
							{
								echo "<tr>";
								echo "<td>$r1[0]</td>";
								echo "<td>$r1[1]</td>";
								$res2=mysql_query("select * from customer_detail where customer_id='$r1[2]'");
								$r2=mysql_fetch_array($res2);
								echo "<td>$r2[1]</td>";
								echo "<td>$r1[3]</td>";
								echo "<td>$r1[4]</td>";
								echo "<td>$r1[5]</td>";
								
								echo "<td><a href='$r1[6]' target='_blank'><img src='$r1[6]' style='width:150px; height:150px;'></a></td>";
									echo "<td><a href='distributor_view_new_pres.php?vpid=$r1[0]'>VERIFY</a></td>";
								echo "<td><a href='distributor_view_new_pres.php?nvpid=$r1[0]'>NOT VERIFY</a></td>";
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