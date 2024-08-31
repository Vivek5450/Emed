<?php
session_start();
include("dis_header.php");
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
										<a class="team-btn" href="#">DATE WISE ORDER REPORT</a>
										
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
							$disid=$_SESSION['disid'];
						$res1=mysql_query("select * from order_master where order_date>='$fdate' and order_date<='$tdate' and customer_id in (select customer_id from customer_detail where city = (select city from distributor_regis where dis_id='$disid'))");
						
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
								
								
								echo "<td><a href='distributor_view_order_detail.php?cartid=$r1[2]'>ORDER DETAIL</a></td>";
								
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