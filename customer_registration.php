<?php
include("header.php");
include("connect.php");
?>
<script type="text/javascript">
	function validate()
	{
		var v=/^[a-zA-Z ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Alphabets in Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtadd.value=="")
		{
			alert("Please Enter Address");
			form1.txtadd.focus();
			return false;
		}
		
		if(form1.txtcity.value=="")
		{
			alert("Please Enter City Name");
			form1.txtcity.focus();
			return false;
		}else{
			if(!v.test(form1.txtcity.value))
			{
				alert("Please Enter Only Alphabets in City Name");
				form1.txtcity.focus();
				return false;
			}
		}
		
		var v=/^[0-9]+$/
		if(form1.txtmno.value=="")
		{
			alert("Please Enter Mobile No");
			form1.txtmno.focus();
			return false;
		}else if(form1.txtmno.value.length!=10)
		{
			alert("Please Enter Mobile No 10 Digit Long");
			form1.txtmno.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtmno.value))
			{
				alert("Please Enter Only Digits in Mobile No");
				form1.txtmno.focus();
				return false;
			}
		}
		
		
		var v=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})+$/
		if(form1.txtemail.value=="")
		{
			alert("Please Enter Email Id");
			form1.txtemail.focus();
			return false;
		}else{
			if(!v.test(form1.txtemail.value))
			{
				alert("Please Enter Valid Email ID");
				form1.txtemail.focus();
				return false;
			}
		}
		
		if(form1.txtpwd.value=="")
		{
			alert("Please Enter Password");
			form1.txtpwd.focus();
			return false;
		}else if(form1.txtpwd.value.length<6)
		{
			alert("Please Enter Password More than 6 Character");
			form1.txtpwd.focus();
			return false;
		}else if(form1.txtpwd.value.length>10)
		{
			alert("Please Enter Password Less than 10 Character");
			form1.txtpwd.focus();
			return false;
		}
		
		if(form1.gender[0].checked==false)	
		{
			if(form1.gender[1].checked==false)	
			{
				alert("Please Select Gender");
				return false;
			}
		}
	}
</script>
<?php

if(isset($_POST['btnregis']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	$gender=$_POST['gender'];
	
	$res1=mysql_query("select * from customer_detail where email_id='$email'");
	if(mysql_num_rows($res1)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Email Id Already Exist');";
		echo "window.location.href='customer_registration.php';";
		echo "</script>";
	}else{
		//auto no code start...
		$res2=mysql_query("select max(customer_id) from customer_detail");
		$custid=0;
		while($r2=mysql_fetch_array($res2))
		{
			$custid=$r2[0];
		}
		$custid++;
		
		//auto no code end...
		
		$query="insert into customer_detail values('$custid','$name','$add','$city','$mno','$gender','$email','$pwd')";
		if(mysql_query($query))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Registration Done');";
			echo "window.location.href='login.php';";
			echo "</script>";
		}
	}
}
?>
		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">REGISTRATION</a>
										
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
							
							<form method="post" name="form1">
								<div class="contact-form-row">
									
									<div>
										<span>Name :</span>
										<input type="text" class="text" name="txtname" placeholder="Enter Name">
									</div>
									
									<div class="clearfix"> </div>
								</div>
								<div class="contact-form-row2">
									<span>Address :</span>
									<textarea name="txtadd" placeholder="Enter Address"></textarea>
								</div>
								<div class="contact-form-row">
									<div>
										<span>City :</span>
										<input type="text" class="text" name="txtcity" placeholder="Enter City">
									</div>
									<div>
										<span>Mobile No :</span>
										<input type="text" class="text" name="txtmno" placeholder="Enter Mobile No">
									</div>
									<div>
										<span>Email :</span>
										<input type="email" class="text" name="txtemail" placeholder="Enter Email ID">
									</div>
									<div>
										<span>Password :</span>
										<input type="password" class="text" name="txtpwd" placeholder="Enter Password">
									</div>
									<div class="clearfix"> </div>
								</div>
								
								<div class="clearfix"> </div>
								<div class="contact-form-row2">
									<span>Select Gender :</span>
									<input type="radio" value="MALE" name="gender"> MALE
									<input type="radio" value="FEMALE" name="gender"> FEMALE
								</div>
								<input type="submit" value="REGISTER" name="btnregis" onclick="return validate();">
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