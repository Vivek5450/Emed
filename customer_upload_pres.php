<?php
session_start();
include("customer_header.php");
include("connect.php");
?>
<script type="text/javascript">
	function validate()
	{
		
		
		if(form1.txtadd.value=="")
		{
			alert("Please Enter Delievery Address");
			form1.txtadd.focus();
			return false;
		}
		
		if(form1.selcity.value=="0")
		{
			alert("Please Select City Name");
			form1.selcity.focus();
			return false;
		}
		
		var v=/^[0-9]+$/
		if(form1.txtmno.value=="")
		{
			alert("Please Enter Delievery Mobile No");
			form1.txtmno.focus();
			return false;
		}else if(form1.txtmno.value.length!=10)
		{
			alert("Please Enter Delievery Mobile No 10 Digit Long");
			form1.txtmno.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtmno.value))
			{
				alert("Please Enter Only Digits in Delievery Mobile No");
				form1.txtmno.focus();
				return false;
			}
		}
		
		
		var fname=document.getElementById("txtfile").value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtfile").value=="")
		{
			alert("Please Select Prescription Image");
			return false;
		}else{
			if(!((ext=="png") || (ext=="jpeg") || (ext=="jpg") || (ext=="webp")))
			{
				alert("Please Select Prescription Image in Proper Format like jpeg,jpg, png or Webp");
				return false;
			}
		}
	}
</script>
<?php

if(isset($_POST['btnupload']))
{
	
	$add=$_POST['txtadd'];
	$city=$_POST['selcity'];
	$mno=$_POST['txtmno'];
	$custid=$_SESSION['custid'];
	$udate=date("Y-m-d");
	
	
	
	//auto no code start...
	$res2=mysql_query("select max(prescription_id) from prescription_detail");
	$presid=0;
	while($r2=mysql_fetch_array($res2))
	{
		$presid=$r2[0];
	}
	$presid++;
		
	//auto no code end...
	$tpath=$_FILES['txtfile']['tmp_name'];
	$imgpath="pres_img/PI".$presid.".png";
	$query="insert into prescription_detail values('$presid','$udate','$custid','$add','$city','$mno','$imgpath','0')";
	if(mysql_query($query))
	{
		move_uploaded_file($tpath,$imgpath);
		echo "<script type='text/javascript'>";
		echo "alert('Prescription Uploaded Successfully');";
		echo "window.location.href='customer_view_pres_status.php';";
		echo "</script>";
	
	}
}
?>
		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">UPLOAD PRESCRIPTION</a>
										
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
						<br/><br/><br/>
						<img src="images/regis2.gif" style="width:100%; height:600px;">
						</div>
						<div class="col-md-6">
							<div class="contact-grids">
						
						<!----- contact-form ------>
						<div class="contact-form">
							
							<form method="post" name="form1" enctype="multipart/form-data">
								
								<div class="contact-form-row2">
									<span>Delievery Address :</span>
									<textarea name="txtadd" placeholder="Enter Delievery Address"></textarea>
								</div>
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
											<option value="<?php echo $q5[0]; ?>"><?php echo $q5[0]; ?></option>
											<?php
										}
										
										?>
										</select>
									</div>
									<div>
										<span>Delievery Mobile No :</span>
										<input type="text" class="text" name="txtmno" placeholder="Enter Mobile No">
									</div>
									
									<div class="clearfix"> </div>
								</div>
								<div class="contact-form-row2">
									<span>Select Prescription Image :</span>
									
									<input type="file" name="txtfile" id="txtfile"/>
								</div>
								<div class="clearfix"> </div>
								
								<input type="submit" value="UPLOAD PRESCRIPTION" name="btnupload" onclick="return validate();">
							</form>
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