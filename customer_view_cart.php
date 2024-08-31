<?php
session_start();
include("customer_header.php");
include("connect.php");

if(!isset($_SESSION['cartid']))
{
	echo "<script type='text/javascript'>";
	echo "alert('Please Add Some Product Into Cart');";
	echo "window.location.href='customer_view_product.php';";
	echo "</script>";
}


if(isset($_REQUEST['dpid']))
{
	$pid=$_REQUEST['dpid'];
	$cartid=$_SESSION['cartid'];
	$query="delete from cart_detail where product_id='$pid' and cart_id='$cartid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Product Deleted From Cart');";
		echo "window.location.href='customer_view_cart.php';";
		echo "</script>";
	}
}

if(isset($_POST['btnorder']))
{
	header("Location: placed_order.php");
}
?>
		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">CART DETAIL</a>
										
										<h4><br/>Simplifying Healthcare, Impacting Lives.</h4></center>
										
									</div>
									
									<div class="clearfix"> </div>
								</div>
							</div>
		<!-- team-grids-caption -->

		<div class="contact">
				<div class="container">
					
					<div class="row">
					
				
						<div class="col-md-12">
						<?php
						$cartid=$_SESSION['cartid'];
						$res1=mysql_query("select * from cart_detail where cart_id='$cartid'");
						
						if(mysql_num_rows($res1)>0)
						{
							echo "<table class='table table-bordered'>
									<tr>
										<th>PRODUCT IMAGE</th>
										<th>PRODUCT NAME</th>
										
										<th>QUANTITY</th>
										<th>PRICE</th>
										<th>AMOUNT</th>
										<th>UPDATE</th>
										<th>DELETE</th>
									</tr>";
									$tot=0;
							while($r1=mysql_fetch_array($res1))
							{
								echo "<tr>";
								$res2=mysql_query("select * from product_detail where product_id='$r1[1]'");
								$r2=mysql_fetch_array($res2);
								echo "<td><a href='$r1[4]' target='_blank'><img src='$r2[4]' style='width:150px; height:150px;'></a></td>";
								echo "<td>$r2[1]</td>";
								
								echo "<td>$r1[2]</td>";
								echo "<td>$r1[3]</td>";
								$amt = $r1[2]*$r1[3];
								$tot=$tot+$amt;
								echo "<td>$amt</td>";
								echo "<td><a href='customer_update_qty.php?pid=$r1[1]'>UPDATE</a></td>";
								echo "<td><a href='customer_view_cart.php?dpid=$r1[1]'>DELETE</a></td>";
								echo "</tr>";
							}
							echo "</table>";
							echo "<br/><h3>Total Amount: &#8377; $tot /-</h3>";
							if($tot>0)
							{
							?>
							<div class="contact-form">
								<form method="post" name="form1" >
								
								<div class="clearfix"> </div>
								
								<input type="submit" value="PLACED ORDER" name="btnorder" onclick="return validate();">
								
							</form>
							</div>
							<?php
							}
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