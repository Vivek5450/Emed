<?php
session_start();
include("admin_header.php");
include("connect.php");

if(isset($_POST['btnreport']))
{
	$city1=$_POST['selcity'];
}

?>
		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">CITY WISE PRESCRIPTION REPORT</a>
										
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
						<div class="contact-grids">
						
						<!----- contact-form ------>
						<div class="contact-form">
							
							<form method="post" name="form1" enctype="multipart/form-data">
								<div class="contact-form-row">
									
									<div>
										<span>Select City :</span>
										<select name="selcity" class="text" >
											<option value="0">--Select City--</option>
										<?php
										$qur5=mysql_query("select distinct(city) from distributor_regis where status='1'");
										while($q5=mysql_fetch_array($qur5))
										{
											?>
											<option value="<?php echo $q5[0]; ?>" <?php if($city1==$q5[0]){ echo "selected='selected'"; }?>><?php echo $q5[0]; ?></option>
											<?php
										}
										
										?>
										</select>
									</div>
									
									<div class="clearfix"> </div>
								</div>
								
								
							
						</div>
						<!----- contact-form ------>
					</div>
						</div>
						<div class="col-md-6">
							<div class="contact-grids">
						
						<!----- contact-form ------>
						<div class="contact-form">
							
							
								<Br/>
								<div class="clearfix"> </div>
								
							
								<input type="submit" value="REPORTS" name="btnreport" >
							
							</form>
						</div>
						<!----- contact-form ------>
					</div>
						</div>
						<div class="col-md-12">
						<?php
						if(isset($_POST['btnreport']))
						{
						$res1=mysql_query("select * from prescription_detail where city='$city1'");
						
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
						}
						
						?>
						</div>
					</div>
					<!----- contact-grids ----->		
					
					
				</div>
			</div>
		<!-- /Contact -->
		</div>
		


<?php
include("footer.php");
?>