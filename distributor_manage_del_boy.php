<?php
session_start();
include("dis_header.php");
include("connect.php");
?>
<script type="text/javascript">
	function validate()
	{
		var v=/^[a-zA-Z ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Delievery Boy Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Alphabets in Delievery Boy Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtadd.value=="")
		{
			alert("Please Enter Delievery Boy Address");
			form1.txtadd.focus();
			return false;
		}
		
		if(form1.txtcity.value=="")
		{
			alert("Please Enter Delievery Boy City Name");
			form1.txtcity.focus();
			return false;
		}else{
			if(!v.test(form1.txtcity.value))
			{
				alert("Please Enter Only Alphabets in Delievery Boy City Name");
				form1.txtcity.focus();
				return false;
			}
		}
		
		var v=/^[0-9]+$/
		if(form1.txtmno.value=="")
		{
			alert("Please Enter Delievery Boy Mobile No");
			form1.txtmno.focus();
			return false;
		}else if(form1.txtmno.value.length!=10)
		{
			alert("Please Enter Delievery Boy Mobile No 10 Digit Long");
			form1.txtmno.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtmno.value))
			{
				alert("Please Enter Only Digits in Delievery Boy Mobile No");
				form1.txtmno.focus();
				return false;
			}
		}
		
		
		var v=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})+$/
		if(form1.txtemail.value=="")
		{
			alert("Please Enter Delievery Boy Email Id");
			form1.txtemail.focus();
			return false;
		}else{
			if(!v.test(form1.txtemail.value))
			{
				alert("Please Enter Valid Delievery Boy Email ID");
				form1.txtemail.focus();
				return false;
			}
		}
		
		if(form1.gender[0].checked==false)	
		{
			if(form1.gender[1].checked==false)	
			{
				alert("Please Select Delievery Boy Gender");
				return false;
			}
		}
	}
</script>
<?php
if(isset($_POST['btnsave']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	$gender=$_POST['gender'];
	$disid=$_SESSION['disid'];
	//auto no code start...
	$res2=mysql_query("select max(del_id) from delievery_boy_detail");
	$delid=0;
	while($r2=mysql_fetch_array($res2))
	{
		$delid=$r2[0];
	}
	$delid++;
	//auto no code end...
	
	
	
	$query="insert into delievery_boy_detail values('$delid','$name','$add','$city','$mno','$email','$gender','$disid')";
	//echo $query;
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Delievery Boy Record Inserted Successfully');";
		echo "window.location.href='distributor_manage_del_boy.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['udbid']))
{
	$delid=$_REQUEST['udbid'];
	$res4=mysql_query("select * from delievery_boy_detail where del_id='$delid'");
	$r4=mysql_fetch_array($res4);
	$name1=$r4[1];
	$add1=$r4[2];
	$city1=$r4[3];
	$mno1=$r4[4];
	$email1=$r4[5];
	$gender1=$r4[6];
}

if(isset($_POST['btnupdate']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	$gender=$_POST['gender'];
	$delid=$_REQUEST['udbid'];
	
	
	$query="update delievery_boy_detail set del_name='$name',address='$add',city='$city',mobile_no='$mno',email_id='$email',gender='$gender' where del_id='$delid'";
	
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Delievery Boy Record Updated Successfully');";
		echo "window.location.href='distributor_manage_del_boy.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['ddbid']))
{
	$delid=$_REQUEST['ddbid'];
	$query="delete from delievery_boy_detail where del_id='$delid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Delievery Boy Reocrd Deleted Successfully');";
		echo "window.location.href='distributor_manage_del_boy.php';";
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
										<span>Name :</span>
										<input type="text" class="text" name="txtname" placeholder="Enter Name" value="<?php echo $name1; ?>">
									</div>
									
									<div class="clearfix"> </div>
								</div>
								<div class="contact-form-row2">
									<span>Address :</span>
									<textarea name="txtadd" placeholder="Enter Address"><?php echo $add1; ?></textarea>
								</div>
								<div class="contact-form-row">
									<div>
										<span>City :</span>
										<input type="text" class="text" name="txtcity" placeholder="Enter City" value="<?php echo $city1; ?>">
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
										<span>Mobile No :</span>
										<input type="text" class="text" name="txtmno" placeholder="Enter Mobile No" value="<?php echo $mno1; ?>">
									</div>
									<div>
										<span>Email :</span>
										<input type="email" class="text" name="txtemail" placeholder="Enter Email ID" value="<?php echo $email1; ?>">
									</div>
									
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
								<div class="contact-form-row2">
									<span>Select Gender :</span>
									<input type="radio" value="MALE" name="gender" <?php if($gender1=="MALE"){ echo "checked"; } ?>> MALE
									<input type="radio" value="FEMALE" name="gender" <?php if($gender1=="FEMALE"){ echo "checked"; } ?>> FEMALE
								</div>
							<?php
							if(isset($_REQUEST['udbid']))
							{
								?>
								
								<input type="submit" value="UPDATE" name="btnupdate" onclick="return validate();">
								<?php
							}else{
							?>
								<input type="submit" value="SAVE" name="btnsave" onclick="return validate();">
							<?php
							}
							?>
							</form>
						</div>
						<!----- contact-form ------>
					</div>
						</div>
						<div class="col-md-12">
						<?php
						$disid=$_SESSION['disid'];
						$res1=mysql_query("select * from delievery_boy_detail where dis_id='$disid'");
						
						if(mysql_num_rows($res1)>0)
						{
							echo "<table class='table table-bordered'>
									<tr>
										<th>DELIEVERY BOY ID</th>
										<th>DELIEVERY BOY NAME</th>
										<th>ADDRESS</th>
										<th>CITY</th>
										
										<th>MOBILE NO</th>
										<th>EMAIL ID</th>
										<th>GENDER</th>
										<th>UPDATE</th>
										<th>DELETE</th>
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
								
								echo "<td><a href='distributor_manage_del_boy.php?udbid=$r1[0]'>UPDATE</a></td>";
								echo "<td><a href='distributor_manage_del_boy.php?ddbid=$r1[0]'>DELETE</a></td>";
								echo "</tr>";
							}
							echo "</table>";
						}else{
							echo "<h2>No New Record Found</h2><br/><br/><br/><br/><br/><br/>";
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