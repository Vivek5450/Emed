<?php
session_start();
include("customer_header.php");
include("connect.php");

$amt=$_REQUEST['amt'];
?>
<script type="text/javascript">
	function validate()
	{
		if(form1.selctype.value=="0")
		{
			alert("Please Select Card Type");
			form1.selctype.focus();
			return false;
		}
		var v=/^[0-9]+$/;
		if(form1.txtcardno.value=="")
		{
			alert("Please Enter 16 Digit Card No");
			form1.txtcardno.focus();
			return false;
		}else if(form1.txtcardno.value.length!=16){
			alert("Please Enter Your Card No 16 Digit Long");
			form1.txtcardno.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtcardno.value))
			{
				alert("Please Enter Only Digits in Your Card No");
				form1.txtcardno.focus();
				return false;
			}
		}
	
		if(form1.txtcvvno.value=="")
		{
			alert("Please Enter 3 Digit CVV No");
			form1.txtcvvno.focus();
			return false;
		}else if(form1.txtcvvno.value.length!=3){
			alert("Please Enter Your CVV No 3 Digit Long");
			form1.txtcvvno.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtcvvno.value))
			{
				alert("Please Enter Only Digits in Your CVV No");
				form1.txtcvvno.focus();
				return false;
			}
		}
		
		var v=/^[a-zA-Z ]+$/
		if(form1.txtbname.value=="")
		{
			alert("Please Enter Bank Name");
			form1.txtbname.focus();
			return false;
		}else{
			if(!v.test(form1.txtbname.value))
			{
				alert("Please Enter Only Alphabets in Bank Name");
				form1.txtbname.focus();
				return false;
			}
		}
	
		
		if(form1.txtname.value=="")
		{
			alert("Please Enter Card Holder Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Alphabets in Card Holder Name");
				form1.txtname.focus();
				return false;
			}
		}
	
		
	}
</script>
<?php

if(isset($_POST['btnpay']))
{
	$ctype=$_POST['selctype'];
	$cno=$_POST['txtcardno'];
	$cvvno=$_POST['txtcvvno'];
	$name=$_POST['txtname'];
	$bname=$_POST['txtbname'];
	$exdate=$_POST['selexmonth']."-".$_POST['selexyear'];
	$oid=$_REQUEST['oid'];
	$pdate=date("Y-m-d");
	//auto number code begin...
	$qur1=mysql_query("select max(pay_id) from payment");
	$pid=0;
	while($q1=mysql_fetch_array($qur1))
	{
		$pid=$q1[0];
	}
	$pid++;
	//auto number code end....
	$query="insert into payment values('$pid','$pdate','$ctype','$cno','$cvvno','$bname','$name','$exdate','$amt')";
	if(mysql_query($query))
	{
		$pbid=$_REQUEST['pbid'];
		mysql_query("update prescription_detail set status='4' where prescription_id='$pbid'");
		echo "<script type='text/javascript'>";
		echo "alert('Payment Done Successfully');";
		echo "window.location.href='customer_view_order.php';";
		echo "</script>";
	}
}
?>
		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">PAYMENT</a>
										
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
										<span>Select Card Type :</span>
										<select class="text" name="selctype">
											<option value="0">--Select Card Type--</option>
											<option value="DEBIT CARD">DEBIT CARD</option>
											<option value="CREDIT CARD">CREDIT CARD</option>
										</select>
									</div>
									
									<div class="clearfix"> </div>
								</div>
								
								<div class="contact-form-row">
									<div>
										<span>Card No :</span>
										<input type="text" name="txtcardno"  class="text"  placeholder="Your Card No" maxlength="16">
									</div>
									<div>
										<span>CVV No :</span>
										<input type="text" name="txtcvvno"  class="text"  placeholder="Your CVV No" maxlength="3">
									</div>
									<div>
										<span>Bank Name:</span>
										<input type="text" name="txtbname" class="text"  placeholder="Bank Name" >
									</div>
									<div>
										<span>Card Holder Name :</span>
										<input type="text" name="txtname" class="text" placeholder="Card Holder Name" >
									</div>
										
				
									<div class="clearfix"> </div>
								</div>
								<div class="row">
								<div class="col-md-6">
									<div class="contact-form-row">
										<div class="col-md-6">
											<span>Select Expiry Date :</span>
											 <select name="selexmonth" class="text">
						<option value="Jan">JAN</option>
						<option value="Feb">FEB</option>
						<option value="Mar">MAR</option>
						<option value="April">April</option>
						<option value="May">MAY</option>
						<option value="June">JUNE</option>
						<option value="July">JULY</option>
						<option value="Aug">AUG</option>
						<option value="Sep">SEP</option>
						<option value="Oct">OCT</option>
						<option value="Nov">NOV</option>
						<option value="Dec">DEC</option>
					</select>
										</div>
										
				
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="contact-form-row">
										
										<div >
											<span>Select Expiry Year :</span>
											<select name="selexyear" class="text">
						
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
						<option value="2028">2028</option>
						<option value="2029">2029</option>
						<option value="2030">2030</option>
					</select>
										</div>
				
										<div class="clearfix"> </div>
									</div>
								</div>
								</div>
								<div class="clearfix"> </div>
								
								<input type="submit" value="PAY" name="btnpay" onclick="return validate();">
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