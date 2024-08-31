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
			if(url == ("http://localhost/Project%202022/bca/valsad/E-Med/"))
			{
				url = url +"index.php";
				if (url == (this.href)) {
					$(this).closest("li").addClass("active");
				
					//for making parent of submenu active
					//$(this).closest("li").parent().parent().addClass("active");
				}
			}else{
				if (url == (this.href)) {
					$(this).closest("li").addClass("active");
				
					//for making parent of submenu active
					//$(this).closest("li").parent().parent().addClass("active");
				}
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
							<li ><a href="index.php">Home</a></li>
							
							
							<li><a href="login.php">Login</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="contact.php">Contact</a></li>
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