<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
include('includes/dbconnection.php');

if (!isset($_GET['tracking_id'])) {
    echo "Invalid QR";
    exit;
}

$tracking_id = mysqli_real_escape_string($con, $_GET['tracking_id']);

// Fetch current status
$sql = "SELECT Status FROM  tblcourier WHERE RefNumber='$tracking_id'";
$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) == 0) {
    echo "Parcel not found";
    exit;
}

$row = mysqli_fetch_assoc($res);
$current_status = $row['Status'];

// decide next status
if ($current_status === NULL || $current_status === "") {
    $new_status = "Picked Up";
} elseif ($current_status === "Picked Up") {
    $new_status = "Shipped";
} elseif ($current_status === "Shipped") {
    $new_status = "In transit";
} elseif ($current_status === "In transit") {
    $new_status = "Arrived at destination";
} elseif ($current_status === "Arrived at destination") {
    $new_status = "Out for Delivery";
}elseif ($current_status === "Out for Delivery") {
    $new_status = "Delivered";
} else {
    echo "Parcel already delivered";
    exit;
}

$update = "UPDATE tblcourier
           SET Status='$new_status'
           WHERE RefNumber='$tracking_id'";
mysqli_query($con, "INSERT INTO tblcouriertracking (RefNumber, Status)
    VALUES ('$tracking_id', '$new_status')
");
if (mysqli_query($con, $update)) {
    echo "Status updated to: $new_status";
} else {
    echo "Database error";
}
?>