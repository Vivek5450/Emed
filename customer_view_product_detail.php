<?php
session_start();
include("customer_header.php");
include("connect.php");

$pid=$_REQUEST['pid'];
$res1=mysql_query("select * from product_detail where product_id='$pid'");
$r1=mysql_fetch_array($res1);
$pname1=$r1[1];
$desc1=$r1[2];
$price1=$r1[3];
$pimg1=$r1[4];
?>
<script type="text/javascript">
	function validate()
	{
		
		
		var v=/^[0-9]+$/
		if(form1.txtqty.value=="")
		{
			alert("Please Enter Quantity");
			form1.txtqty.focus();
			return false;
		}else if((parseInt(form1.txtqty.value))<=0)
		{
			alert("Please Enter Quantity Greater than 0");
			form1.txtqty.focus();
			return false;
		}else if((parseInt(form1.txtqty.value))>10)
		{
			alert("Please Enter Quantity Less than Equal 10");
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
				
	}
</script>
<?php
if(isset($_POST['btncart']))
{
	$qty=$_POST['txtqty'];
	
	if(isset($_SESSION['cartid']))
	{
		$cartid=$_SESSION['cartid'];
		$query="insert into cart_detail values('$cartid','$pid','$qty','$price1')";
		if(mysql_query($query))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Product Added To Cart Successfully');";
			echo "window.location.href='customer_view_product.php';";
			echo "</script>";
		}
	}else{
		$cdate=date("Y-m-d");
		$custid=$_SESSION['custid'];
		//auto no code start...
		$res2=mysql_query("select max(cart_id) from cart_master");
		$cartid=0;
		while($r2=mysql_fetch_array($res2))
		{
			$cartid=$r2[0];
		}
		$cartid++;
		
		//auto no code end...
		
		$query="insert into cart_master values('$cartid','$cdate','$custid')";
		if(mysql_query($query))
		{
			$_SESSION['cartid']=$cartid;
			mysql_query("insert into cart_detail values('$cartid','$pid','$qty','$price1')");
			echo "<script type='text/javascript'>";
			echo "alert('Product Added To Cart Successfully');";
			echo "window.location.href='customer_view_product.php';";
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
										<a class="team-btn" href="#">PRODUCT DETAIL</a>
										
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
							<center><img src="<?php echo $pimg1; ?>" style="width:100%; height:400px;"></center>
						</div>
						<div class="col-md-6">
							<div class="contact-grids">
						
						<!----- contact-form ------>
						<div class="contact-form">
							<div class="row">
								<div class="col-md-5">
									<h3>Product Name:</h3>
								</div>
								<div class="col-md-7">
									<h3><?php echo $pname1; ?></h3>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<h3>Description:</h3>
								</div>
								<div class="col-md-7">
									<h3><?php echo $desc1; ?></h3>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<h3>Price:</h3>
								</div>
								<div class="col-md-7">
									<h3>&#8377; <?php echo $price1; ?>/-</h3>
								</div>
							</div>
							<form method="post" name="form1">
								<div class="contact-form-row">
									
									<div>
										<span>Quantity In Rapers:</span>
										<input type="number" class="text" name="txtqty" placeholder="Enter Quantity">
									</div>
									
									<div class="clearfix"> </div>
								</div>
								
								<div class="clearfix"> </div>
								
								<input type="submit" value="ADD TO CART" name="btncart" onclick="return validate();">
								
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