<?php
session_start();
include("dis_header.php");
include("connect.php");



?>
<script type="text/javascript">
	function validate()
	{
		var v=/^[a-zA-Z0-9 ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Medicine Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Character and Digit Medicine Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		var v=/^[0-9]+$/
		if(form1.txtqty.value=="")
		{
			alert("Please Enter Quantity");
			form1.txtqty.focus();
			return false;
		}else if((parseInt(form1.txtqty.value))<=0)
		{
			alert("Please Enter Quantity Greater Than 0");
			form1.txtqty.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtqty.value))
			{
				alert("Please Enter Only Digits in Quantity");
				form1.txtqty.focus();
				return false;
			}
		}
		
		var v=/^[0-9]+$/
		if(form1.txtprice.value=="")
		{
			alert("Please Enter Price");
			form1.txtprice.focus();
			return false;
		}else if((parseInt(form1.txtprice.value))<=0)
		{
			alert("Please Enter Price Greater Than 0");
			form1.txtprice.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtprice.value))
			{
				alert("Please Enter Only Digits in Price");
				form1.txtprice.focus();
				return false;
			}
		}
	}
</script>
<?php
if(isset($_POST['btnadd']))
{
	$bid=$_REQUEST['bid'];
	$name=$_POST['txtname'];
	$qty=$_POST['txtqty'];
	$price=$_POST['txtprice'];
	$amt = $qty*$price;
	$query="insert into pres_bill_detail values('$bid','$name','$qty','$price')";
	//echo $query;
	if(mysql_query($query))
	{
		mysql_query("update pres_bill_master set total_amount = total_amount + $amt where pres_bill_id='$bid'");
		echo "<script type='text/javascript'>";
		echo "alert('Prescription Medicine Inserted Into Bill');";
		echo "window.location.href='distributor_create_bill_med.php?bid=$bid';";
		echo "</script>";
	}
}


if(isset($_REQUEST['mid']))
{
	$mid=$_REQUEST['mid'];
	$bid=$_REQUEST['bid'];
	$res1=mysql_query("select * from pres_bill_detail where pres_bill_id='$bid' and medicine_name='$mid'");
	$r1=mysql_fetch_array($res1);
	$amt=($r1[2]*$r1[3]);
	$query="delete from pres_bill_detail where pres_bill_id='$bid' and medicine_name='$mid'";
	if(mysql_query($query))
	{
		mysql_query("update pres_bill_master set total_amount = total_amount - $amt where pres_bill_id='$bid'");
		echo "<script type='text/javascript'>";
		echo "alert('Prescription Medicine Deleted From Bill');";
		echo "window.location.href='distributor_create_bill_med.php?bid=$bid';";
		echo "</script>";
	}
}


if(isset($_POST['btnbill']))
{
	$bid=$_REQUEST['bid'];
	header("Location: pres_bill.php?bid=$bid");
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
										<span>Medicine Name:</span>
										<input type="text" class="text" name="txtname" >
									</div>
									
									<div class="clearfix"> </div>
								</div>
								<div class="contact-form-row">
									
									<div>
										<span>Quantity:</span>
										<input type="number" class="text" name="txtqty" >
									</div>
									
									<div class="clearfix"> </div>
								</div>
							<div class="contact-form-row">
									
									<div>
										<span>Price:</span>
										<input type="number" class="text" name="txtprice" >
									</div>
									
									<div class="clearfix"> </div>
								</div>
								
							
								<input type="submit" value="ADD MEDICINE" name="btnadd" onclick="return validate();">
								<input type="submit" value="PRINT BILL" name="btnbill" >
							
							</form>
						</div>
						<!----- contact-form ------>
					</div>
						</div>
						<div class="col-md-6">
							<div class="contact-grids">
						
						<!----- contact-form ------>
						<div class="contact-form">
							<?php
							$bid=$_REQUEST['bid'];
							$qur2=mysql_query("select * from pres_bill_detail where pres_bill_id='$bid'");
							if(mysql_num_rows($qur2)>0)
							{
								echo "<table class='table table-bordered'>
										<tr>
											<th>BILL ID</th>
											<th>MEDICINE NAME</th>
											<th>QUANTITY</th>
											<th>PRICE</th>
											<th>AMOUNT</th>
											<th>DELETE</th>
										</tr>";
								while($q2=mysql_fetch_array($qur2))
								{
									echo "<tr>";
									echo "<td>$q2[0]</td>";
									echo "<td>$q2[1]</td>";
									echo "<td>$q2[2]</td>";
									echo "<td>$q2[3]</td>";
									$amt=$q2[2]*$q2[3];
									echo "<td>$amt</td>";
									echo "<td><a href='distributor_create_bill_med.php?bid=$bid&mid=$q2[1]'>DELETE</a></td>";
									echo "</tr>";
								}
								echo "</table>";
							}else{
								echo "<h2>No Medicine Found In Bill</h2>";
							}
							?>
							
								
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