<!DOCTYPE HTML>
<html>
	<head>
		<title>E-Medicines </title>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<script src="js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
   		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
   		 <!-- webfonts -->
   		 <link href='http://fonts.googleapis.com/css?family=Arimo:400,700' rel='stylesheet' type='text/css'>
   		  <!-- webfonts -->
		    <script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $(function() {
        // this will get the full URL at the address bar
        var url = window.location.href;
		
        // passes on every "a" tag
        $(".top-nav .abc ul li a").each(function() {
            // checks if its the same on the address bar
			if (url == (this.href)) {
				$(this).closest("li").addClass("active");
				//for making parent of submenu active
				//$(this).closest("li").parent().parent().addClass("active");
			}
			
        });
    });        
</script>
	</head>
	<body>
		<!-- container -->
			<!-- header -->
			<div class="header">
				<div class="container"><!-- logo -->
					<div class="logo">
						<a href="#"><img src="images/logo1.png" style="width:200px; height:50px;" title="medicalpluse" /></a>
					</div>
					<!-- logo -->
					<!-- top-nav -->
					<div class="top-nav">
						<div class="abc">
						<span class="menu"> </span>
						<ul>
							<li ><a href="admin_verify_distributor.php">Verify Distributor</a></li>
							
							<li><a href="admin_block_unblock_distributor.php">Block/Unblock Distributor</a></li>
							
							<li class="dropdown">
							<a href="#" data-toggle="dropdown" aria-expanded="true">Reports</a>
							<ul class="dropdown-menu">
								<li>
									<a href="admin_view_customer_detail_report.php">Customer Detail Report</a>
								</li>
								<li>
									<a href="admin_view_distributor_report.php">Distributor Detail Report</a>
								</li>
								<li>
									<a href="admin_view_date_wise_pres_report.php">Date Wise Prescription Report</a>
								</li>
								<li>
									<a href="admin_view_date_wise_order_report.php">Date Wise Order Report</a>
								</li>
								<li>
									<a href="admin_view_city_wise_prescription_report.php">City Wise Prescription Report</a>
								</li>
								<li>
									<a href="admin_view_city_wise_order_report.php">City Wise Order Report</a>
								</li>
								
								
							</ul>
						</li>
							<li><a href="logout.php">Logout</a></li>
							
						</ul>
						</div>
					</div>
					<!-- top-nav -->
					<!-- script-for-nav -->
					<script>
						$(document).ready(function(){
							$("span.menu").click(function(){
								$(".top-nav ul").slideToggle(300);
							});
						});
					</script>
					<!-- script-for-nav -->
					<div class="clearfix"> </div>
			  </div>
			</div>
			<!-- /header -->
		</div>