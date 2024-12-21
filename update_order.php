<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if (strlen($_SESSION['otssuid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $order_id = $_POST['order_id'];
        $quantity = $_POST['quantity'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
        $tiffin_id = $_POST['tiffin_id']; // New line to get the selected tiffin ID

        $sql = "UPDATE tblorder SET Quantity=:quantity, FromDate=:from_date, ToDate=:to_date, TiffinID=:tiffin_id WHERE ID=:order_id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $query->bindParam(':from_date', $from_date, PDO::PARAM_STR);
        $query->bindParam(':to_date', $to_date, PDO::PARAM_STR);
        $query->bindParam(':tiffin_id', $tiffin_id, PDO::PARAM_INT); // Bind the tiffin ID
        $query->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $query->execute();

        if ($query) {
            // Handle success
            header('location:order_updated.php'); // Redirect to a success page
        } else {
            // Handle failure
            echo "Error updating order. Please try again.";
        }
    }
}
?>
