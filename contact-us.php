<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Online Tiffin Service System | Contact Page</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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
				<h3>Food Pass</h3>
				<p>Discount/Coupon</p>
			</div>
		</div>
		<div class="contact_top">
			 		<div class="container">
			 			<?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
<!-- changed by purva -->
			 		
					        <div class="col-md-6 company-right wow fadeInLeft" data-wow-delay="0.4s"
							style="background-color: #5BBD50; color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
								

      
	  <div class="company-right">
		<!-- changed by purva -->
		<h3 style="color: #fff; font-size: 24px; margin-bottom: 10px;">Apply Discount Code</h3>
        <p style="color: #fff; font-size: 16px; margin-bottom: 10px;">Enter your coupon code:</p>
        <input type="text" id="couponCode" placeholder="Enter coupon code" style="padding: 10px; width: 100%; border: none; border-radius: 3px; font-size: 16px;">
        <button onclick="applyCoupon()" style="background-color: #fff; color: #5BBD50; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer; font-size: 16px; margin-top: 10px;">Apply Coupon</button>
        <p id="couponMessage" style="color: #fff; font-size: 16px; margin-top: 10px;"></p>

<!--  
					        	<div class="company_addr">
								
									
							     		<h3><?php  echo htmlentities($row->PageTitle);?></h3>
			
										 <address>
            <p><b>Email:</b> 
                <span style="display: inline-block; font-size: 16px;"><?php echo htmlentities($row->Email);?></span>
            </p>
            <p><b>Phone:</b> <?php echo htmlentities($row->MobileNumber);?></p>
            <p><b>Address:</b> <?php echo htmlentities($row->PageDescription);?></p>
        </address>
							   		</div>
									</div>	
									<div class="follow-us">
										<h3>follow us on</h3>
										<a href="#"><i class="facebook"></i></a>
										<a href="#"><i class="twitter"></i></a>
										<a href="#"><i class="google-pluse"></i></a>
									</div>
			
							 -->
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


						// changed by purva
						<script>
    function applyCoupon() {
        const couponCodeInput = document.getElementById('couponCode');
        const couponMessage = document.getElementById('couponMessage');
        const couponCode = couponCodeInput.value;

        // Replace these coupon codes and discounts with your actual ones
        const validCoupons = {
            "FOODIE10": 10, // 10% discount
            "YUMMY20": 20, // 20% discount
            "TASTY30": 30 // 30% discount
        };

        if (validCoupons.hasOwnProperty(couponCode)) {
            const discount = validCoupons[couponCode];
            couponMessage.innerHTML = `Coupon applied successfully! You get a ${discount}% discount on your order.`;
        } else {
            couponMessage.innerHTML = 'Invalid coupon code. Please try again.';
        }

        // Clear the input field
        couponCodeInput.value = '';
    }
</script>
s
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

</body>
</html>