<?php
session_start();
include("admin_header.php");
include("connect.php");

if(isset($_POST['btnreport']))
{
	$fdate=date("Y-m-d",strtotime($_POST['txtfdate']));
	$tdate=date("Y-m-d",strtotime($_POST['txttdate']));
}

?>
		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">DATE WISE PRESCRIPTION REPORT</a>
										
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
										<span>Select From Date :</span>
										<input type="date" class="text" name="txtfdate" value="<?php if(isset($fdate)){ echo $fdate; }else{ echo date("Y-m-d"); } ?>">
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
							
							
								<div class="contact-form-row">
									
									<div>
										<span>Select To Date :</span>
										<input type="date" class="text" name="txttdate" value="<?php if(isset($tdate)){ echo $tdate; }else{ echo date("Y-m-d"); } ?>">
									</div>
									
									<div class="clearfix"> </div>
								</div>
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
							$res1=mysql_query("select * from prescription_detail where upload_date>='$fdate' and upload_date<='$tdate'");
						
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
											<th>STATUS</th>
										
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
									
									echo "<td style='color:pink;'>BILL GENERATED</td>";	
										
								
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