<?php
session_start();
include("header.php");
include("connect.php");

if(isset($_POST['btnregis']))
{
	header("Location: customer_registration.php");
}

if(isset($_POST['btndregis']))
{
	header("Location: distributor_registration.php");
}

if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	$res1=mysql_query("select * from admin_detail where email_id='$email' and pwd='$pwd'");
	if(mysql_num_rows($res1)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Admin Login Successfully');";
		echo "window.location.href='admin_verify_distributor.php';";
		echo "</script>";
	}else{
		$res2=mysql_query("select * from distributor_regis where email_id='$email' and pwd='$pwd'");
		if(mysql_num_rows($res2)>0)
		{
			$r2=mysql_fetch_array($res2);
			if($r2[9]=="0")
			{
				echo "<script type='text/javascript'>";
				echo "alert('Wait 24 Hours After Registration For Verification');";
				echo "window.location.href='login.php';";
				echo "</script>";
			}else if($r2[9]=="1")
			{
				$_SESSION['disid']=$r2[0];
				echo "<script type='text/javascript'>";
				echo "alert('Distributor Login Successfully');";
				echo "window.location.href='distributor_manage_product.php';";
				echo "</script>";
			}else if($r2[9]=="2")
			{
				echo "<script type='text/javascript'>";
				echo "alert('Distributor Not Verified By Admin Please Contact Our Admin');";
				echo "window.location.href='contact.php';";
				echo "</script>";
			}else if($r2[9]=="3")
			{
				echo "<script type='text/javascript'>";
				echo "alert('Distributor Blocked By Admin Please Contact Our Admin');";
				echo "window.location.href='contact.php';";
				echo "</script>";
			}
		}else{
			$res3=mysql_query("select * from customer_detail where email_id='$email' and pwd='$pwd'");
			if(mysql_num_rows($res3)>0)
			{
				$r3=mysql_fetch_array($res3);
				$_SESSION['custid']=$r3[0];
				echo "<script type='text/javascript'>";
				echo "alert('Customer Login Successfully');";
				echo "window.location.href='customer_upload_pres.php';";
				echo "</script>";
			}else{
				echo "<script type='text/javascript'>";
				echo "alert('Check Your Email ID Or Password');";
				echo "window.location.href='login.php';";
				echo "</script>";
			}
		}
	}
}
?>

		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">LOGIN</a>
										
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
							<center><img src="images/log1.gif" style="width:100%; height:300px;"></center>
						</div>
						<div class="col-md-6">
							<div class="contact-grids">
						
						<!----- contact-form ------>
						<div class="contact-form">
							
							<form method="post">
								<div class="contact-form-row">
									
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
								
								<input type="submit" value="LOGIN" name="btnlogin">
								<input type="submit" value="NEW CUSTOMER CLICK HERE" name="btnregis">
								<input type="submit" value="NEW DISTRIBUTOR CLICK HERE" name="btndregis">
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