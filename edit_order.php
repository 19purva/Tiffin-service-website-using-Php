<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if (strlen($_SESSION['otssuid']) == 0) {
    header('location:logout.php');
} else {
    $order_id = $_GET['order_id'];
    $uid = $_SESSION['otssuid'];
    $sql = "SELECT * FROM tblorder WHERE ID=:order_id AND UserID=:uid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    $query->bindParam(':uid', $uid, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    if ($result) {
        // Order details found, display edit form
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Order</title>
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
            <link href="css/bootstrap.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">
            
        </head>
        <body>
        <div class="header">
		
		<?php include_once('includes/header.php');?>
				</div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 mt-5">
                        <h1>Edit Order</h1>
                        <form  align="center" action="update_order.php" method="post">
                            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="text" class="form-control" name="quantity" value="<?php echo $result->Quantity; ?>">
                            </div>
                            <div class="form-group">
                            <label for="from_date">From Date:</label>
<input type="date" name="from_date" value="<?php echo $result->FromDate; ?>"><br></div>
<div class="form-group">
<label for="to_date">To Date:</label>
<input type="date" name="to_date" value="<?php echo $result->ToDate; ?>"><br></div>

                           
<label for="tiffin_id">Select Food Item:</label>
<select name="tiffin_id">
    <?php
    // Retrieve the list of tiffin items from the database
    $tiffin_sql = "SELECT * FROM tbltiffin";
    $tiffin_query = $dbh->prepare($tiffin_sql);
    $tiffin_query->execute();
    $tiffin_results = $tiffin_query->fetchAll(PDO::FETCH_OBJ);

    // Loop through the results and create options for the dropdown menu
    foreach ($tiffin_results as $tiffin) {
        $selected = ($tiffin->ID == $result->TiffinID) ? "selected" : "";
        echo "<option value='$tiffin->ID' $selected>$tiffin->Title</option>";
    }
    ?>
</select><br><br>
<button type="submit" name="submit" class="btn btn-primary">Update Order</button>
                           

                        </form>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        // If the order does not exist or doesn't belong to the user, redirect to a suitable page
        header('location:orders.php'); // You can change this to an appropriate page
    }
}
?>
