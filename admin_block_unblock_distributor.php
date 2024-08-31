<?php
include("admin_header.php");
include("connect.php");


if(isset($_REQUEST['bdid']))
{
	$disid=$_REQUEST['bdid'];
	$query="update distributor_regis set status='3' where dis_id='$disid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Distributor Blocked Successfully');";
		echo "window.location.href='admin_block_unblock_distributor.php';";
		echo "</script>";
	}
}


if(isset($_REQUEST['ubdid']))
{
	$disid=$_REQUEST['ubdid'];
	$query="update distributor_regis set status='1' where dis_id='$disid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Distributor Unblocked Successfully');";
		echo "window.location.href='admin_block_unblock_distributor.php';";
		echo "</script>";
	}
}
?>

		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">VERIFY DISTRIBUTOR</a>
										
										
										
									</div>
									
									<div class="clearfix"> </div>
								</div>
							</div>
		<!-- team-grids-caption -->

		<div class="contact">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-12">
						<?php
						$res1=mysql_query("select * from distributor_regis where status in ('1','3')");
						
						if(mysql_num_rows($res1)>0)
						{
							echo "<table class='table table-bordered'>
									<tr>
										<th>DISTRIBUTOR ID</th>
										<th>DISTRIBUTOR NAME</th>
										<th>ADDRESS</th>
										<th>CITY</th>
										<th>MOBILE NO</th>
										<th>EMAIL ID</th>
										<th>PHARMACY NAME</th>
										<th>LICENSE IMAGE</th>
										<th>DISTRIBUTOR STATUS</th>
										<th>BLOCK/UNBLOCK</th>
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
								echo "<td>$r1[7]</td>";
								echo "<td><a href='$r1[8]' target='_blank'><img src='$r1[8]' style='width:150px; height:150px;'></a></td>";
								if($r1[9]=="1")
								{
									echo "<td style='color:green;'>UNBLOCK</td>";
									echo "<td><a href='admin_block_unblock_distributor.php?bdid=$r1[0]'>BLOCK USER</a></td>";
								
								}else{
									echo "<td style='color:red;'>BLOCK</td>";
									echo "<td><a href='admin_block_unblock_distributor.php?ubdid=$r1[0]'>UNBLOCK USER</a></td>";
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