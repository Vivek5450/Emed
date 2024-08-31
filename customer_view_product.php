<?php
session_start();
include("customer_header.php");
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
		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">PRODUCT DETAIL</a>
										
										<h4><br/>Simplifying Healthcare, Impacting Lives.</h4></center>
										
									</div>
									
									<div class="clearfix"> </div>
								</div>
							</div>
		<!-- team-grids-caption -->

	<div class="team">
						<div class="container">
							<div class="team-head text-center">
								<h3>PRODUCTS</h3>
							</div>
							<!-- team-grids -->
							<div class="team-grids">
							<?php
							$custid=$_SESSION['custid'];
							$res1=mysql_query("select * from product_detail where dis_id=(select dis_id from distributor_regis where city=(select city from customer_detail where customer_id='$custid'))");
							if(mysql_num_rows($res1)>0)
							{
								while($r1=mysql_fetch_array($res1))
								{
							?>
								
								<div class="col-md-4">
									<div class="team-grid">
										<div class="team-people">
											<div class="team-people-pic">
												<img src="<?php echo $r1[4]; ?>" style="width:350px; height:350px;" title="name">
											</div>
											<div class="team-people-info">
												<h3><a href="customer_view_product_detail.php?pid=<?php echo $r1[0]; ?>" style="color:#FFFFFF;"><?php echo $r1[1]; ?></a></h3>
												<p>Price: <?php echo $r1[3]; ?> /-</p>
											</div>
										</div>
									</div>
								</div>
							<?php
								}
							}else{
								echo "<h2>No Product Found</h2>";
							}
							?>	
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
		<!-- team -->
		


<?php
include("footer.php");
?>