<?php
session_start();
include("dis_header.php");
include("connect.php");


//auto no code start...
	$res2=mysql_query("select max(pres_bill_id) from pres_bill_master");
	$pbid=0;
	while($r2=mysql_fetch_array($res2))
	{
		$pbid=$r2[0];
	}
	$pbid++;
	//auto no code end...
?>
<script type="text/javascript">
	function validate()
	{
		
		if(form1.seldelboy.value=="0")
		{
			alert("Please Select Delievery Boy");
			form1.seldelboy.focus();
			return false;
		}
		
		
	}
</script>
<?php
if(isset($_POST['btncreate']))
{
	$bid=$_POST['txtbid'];
	$bdate=$_POST['txtbdate'];
	$delbid=$_POST['seldelboy'];
	$presid=$_REQUEST['presid'];
	$disid=$_SESSION['disid'];
	$qur5=mysql_query("select * from prescription_detail where prescription_id='$presid'");
	$q5=mysql_fetch_array($qur5);
	$custid=$q5[2];
	
	
	
	$query="insert into pres_bill_master values('$bid','$bdate','$presid','$disid','$custid','0','$delbid')";
	
	if(mysql_query($query))
	{
		mysql_query("update prescription_detail set status='3' where prescription_id='$presid'");
		echo "<script type='text/javascript'>";
		echo "alert('Prescription Bill Inserted Successfully');";
		echo "window.location.href='distributor_create_bill_med.php?bid=$bid';";
		echo "</script>";
	}
}

?>
		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">MANAGE DELIEVERY BOY</a>
										
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
										<span>Bill ID :</span>
										<input type="text" class="text" name="txtbid" value="<?php echo $pbid; ?>" readonly>
									</div>
									
									<div class="clearfix"> </div>
								</div>
								<div class="contact-form-row2">
									<span>Bill Date :</span>
									<input type="date" class="text" name="txtbdate" value="<?php echo date("Y-m-d"); ?>" readonly>
								</div>
								<div class="contact-form-row">
									<div>
										<span>Select Delievery Boy  :</span>
										
										
										<select name="seldelboy" class="text" >
											<option value="0">--Select Delievery Boy--</option>
										<?php
										$disid=$_SESSION['disid'];
										$qur5=mysql_query("select * from delievery_boy_detail where dis_id='$disid'");
										while($q5=mysql_fetch_array($qur5))
										{
											?>
											<option value="<?php echo $q5[0]; ?>"><?php echo $q5[1]; ?></option>
											<?php
										}
										
										?>
										</select>
									
									</div>
									
									
									<div class="clearfix"> </div>
								</div>
								
							
								<input type="submit" value="CREATE BILL" name="btncreate" onclick="return validate();">
							
							</form>
						</div>
						<!----- contact-form ------>
					</div>
						</div>
						<div class="col-md-6">
							<div class="contact-grids">
						
						<!----- contact-form ------>
						<div class="contact-form">
							
							
								
								<div class="clearfix"> </div>
								
							
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