<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Online Tiffin Service System | About Us Page</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--Animation-->
<script src="js/wow.min.js"></script>
<link href="css/animate.css" rel='stylesheet' type='text/css' />
<script>
	new WOW().init();
</script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
<script src="js/simpleCart.min.js"> </script>	
</head>
<body>
    <!-- header-section-starts -->
	<div class="header">
		
		<?php include_once('includes/header.php');?>
	<!-- header-section-ends -->
	<div class="contact-section-page">
		<div class="contact-head">
		    <div class="container">
				<h3>About Us</h3>
				<p>Home/About Us</p>
			</div>
		</div>
		<div class="contact_top">
			 		<div class="container">
			 			<?php
$sql="SELECT * from tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
			 		<!-- changed by purva -->
 <div >
	<div class="contact-map">
			<!-- <img src="images/unnamed.jpg" width="1000" height="400" /> -->
			<img src="images\feedback1.png" alt="" width="400" height="400" style="display: inline-block; margin-right: 10px;">
			<img src="images\feedback2.png" alt="" width="400" height="400" style="display: inline-block; margin-right: 10px;">
			<img src="images\feedback3.png" alt="" width="400" height="400" style="display: inline-block; margin-right: 10px;">
			<img src="images\feedback4.png" alt="" width="400" height="400" style="display: inline-block; margin-right: 10px; margin-top:10px">
			<img src="images\feedback5.png" alt="" width="400" height="400" style="display:inline-block;margin-top:10px;">
 </div>
      
<div>
					        	<div class="company_ad">
							     		<h3 style=""><?php  echo htmlentities($row->PageTitle);?></h3>
							     		<br />
							     		<span><?php  echo $row->PageDescription;?>.</span>
			      						<a href="http://127.0.0.1:5500/admin/index.html">
											<button class="btn btn-primary btn-lg">Feedback</button>
										</a>
							   		</div>
									</div>	
								
							
							 </div>
						</div> <?php $cnt=$cnt+1;}} ?>
					</div>

	</div>
	<?php include_once('includes/footer.php');?>
	  <script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

</body>
</html>