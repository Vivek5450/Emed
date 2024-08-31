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
			alert("Please Enter Product Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Alphabets and Digits in Product Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Product Description");
			form1.txtdesc.focus();
			return false;
		}
		
		
		var v=/^[0-9]+$/
		if(form1.txtprice.value=="")
		{
			alert("Please Enter Product Price");
			form1.txtprice.focus();
			return false;
		}else if((parseInt(form1.txtprice.value))<=0)
		{
			alert("Please Enter Product Price More Than 0");
			form1.txtprice.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtprice.value))
			{
				alert("Please Enter Only Digits in Product Price");
				form1.txtprice.focus();
				return false;
			}
		}
		
		var fname=document.getElementById("txtimg").value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtimg").value=="")
		{
			alert("Please Select Product Image");
			return false;
		}else{
			if(!((ext=="png") || (ext=="jpeg") || (ext=="jpg") || (ext=="webp")))
			{
				alert("Please Select Product Image in Proper Format like jpeg,jpg, png or Webp");
				return false;
			}
		}
	}
	
	
	function update_validate()
	{
		var v=/^[a-zA-Z0-9 ]+$/
		if(form1.txtname.value=="")
		{
			alert("Please Enter Product Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!v.test(form1.txtname.value))
			{
				alert("Please Enter Only Alphabets and Digits in Product Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Product Description");
			form1.txtdesc.focus();
			return false;
		}
		
		
		var v=/^[0-9]+$/
		if(form1.txtprice.value=="")
		{
			alert("Please Enter Product Price");
			form1.txtprice.focus();
			return false;
		}else if((parseInt(form1.txtprice.value))<=0)
		{
			alert("Please Enter Product Price More Than 0");
			form1.txtprice.focus();
			return false;
		}
		else{
			if(!v.test(form1.txtprice.value))
			{
				alert("Please Enter Only Digits in Product Price");
				form1.txtprice.focus();
				return false;
			}
		}
		
		var fname=document.getElementById("txtimg").value;
		var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtimg").value!="")
		{			
			if(!((ext=="png") || (ext=="jpeg") || (ext=="jpg") || (ext=="webp")))
			{
				alert("Please Select Product Image in Proper Format like jpeg,jpg, png or Webp");
				return false;
			}
		}
	}
</script>
<?php
if(isset($_POST['btnsave']))
{
	$name=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	$price=$_POST['txtprice'];
	$disid=$_SESSION['disid'];
	//auto no code start...
	$res2=mysql_query("select max(product_id) from product_detail");
	$pid=0;
	while($r2=mysql_fetch_array($res2))
	{
		$pid=$r2[0];
	}
	$pid++;
	//auto no code end...
	
	$tmppath=$_FILES['txtimg']['tmp_name'];
	$imgpath="prod_img/PI".$pid."_".rand(1000,9999).".png";
	
	$query="insert into product_detail values('$pid','$name','$desc','$price','$imgpath','$disid')";
	if(mysql_query($query))
	{
		move_uploaded_file($tmppath,$imgpath);
		echo "<script type='text/javascript'>";
		echo "alert('Product Inserted Successfully');";
		echo "window.location.href='distributor_manage_product.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['upid']))
{
	$pid=$_REQUEST['upid'];
	$res4=mysql_query("select * from product_detail where product_id='$pid'");
	$r4=mysql_fetch_array($res4);
	$name1=$r4[1];
	$desc1=$r4[2];
	$price1=$r4[3];
	$pimg1=$r4[4];
}

if(isset($_POST['btnupdate']))
{
	$name=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	$price=$_POST['txtprice'];
	
	$pid=$_REQUEST['upid'];
	
	if($_FILES['txtimg']['size']>0)
	{
		$tmppath=$_FILES['txtimg']['tmp_name'];
		$imgpath="prod_img/PI".$pid."_".rand(1000,9999).".png";
		$query="update product_detail set product_name='$name',description='$desc',product_price='$price',product_img='$imgpath' where product_id='$pid'";
		move_uploaded_file($tmppath,$imgpath);
	}else{
		$query="update product_detail set product_name='$name',description='$desc',product_price='$price' where product_id='$pid'";
	}
	if(mysql_query($query))
	{
		
		echo "<script type='text/javascript'>";
		echo "alert('Product Updated Successfully');";
		echo "window.location.href='distributor_manage_product.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['dpid']))
{
	$pid=$_REQUEST['dpid'];
	$query="delete from product_detail where product_id='$pid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Product Deleted Successfully');";
		echo "window.location.href='distributor_manage_product.php';";
		echo "</script>";
	}
}
?>
		<!-- team-grids-caption -->
		<div class="team-grids-caption">
								<div class="container">
									<div class="team-grids-caption-left">
										<center>
										<a class="team-btn" href="#">MANAGE PRODUCT</a>
										
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
										<span>Product Name :</span>
										<input type="text" class="text" name="txtname" placeholder="Enter Product Name" value="<?php echo $name1; ?>">
									</div>
									
									<div class="clearfix"> </div>
								</div>
								<div class="contact-form-row2">
									<span>Product Description :</span>
									<textarea name="txtdesc" placeholder="Enter Product Description"><?php echo $desc1; ?></textarea>
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
										<span>Price :</span>
										<input type="number" class="text" name="txtprice" placeholder="Enter Product Price" value="<?php echo $price1; ?>">
									</div>
									
									<div class="clearfix"> </div>
								</div>
								<div class="contact-form-row2">
									<span>Select Product Image :</span>
									<input type="file" class="text" name="txtimg" id="txtimg" >
								</div>
								
								<div class="clearfix"> </div>
							<?php
							if(isset($_REQUEST['upid']))
							{
								?>
								<img src='<?php echo $pimg1; ?>' style="width:150px; height:150px;">
								<input type="submit" value="UPDATE" name="btnupdate" onclick="return update_validate();">
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
						$res1=mysql_query("select * from product_detail where dis_id='$disid'");
						
						if(mysql_num_rows($res1)>0)
						{
							echo "<table class='table table-bordered'>
									<tr>
										<th>PRODUCT ID</th>
										<th>PRODUCT NAME</th>
										<th>DESCRIPTION</th>
										<th>PRICE</th>
										
										<th>PRODUCT IMAGE</th>
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
								echo "<td><a href='$r1[4]' target='_blank'><img src='$r1[4]' style='width:150px; height:150px;'></a></td>";
								
								echo "<td><a href='distributor_manage_product.php?upid=$r1[0]'>UPDATE</a></td>";
								echo "<td><a href='distributor_manage_product.php?dpid=$r1[0]'>DELETE</a></td>";
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