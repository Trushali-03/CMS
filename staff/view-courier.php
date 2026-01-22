<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cmssid']==0)) {
  header('location:logout.php');
  } else{
  
  //Code For Deletion
if($_GET['action']=='delete'){
$trackid=($_GET['ID']);
$cid=$_GET['editid'];
$query=mysqli_query($con,"delete from tblcouriertracking where  RefNumber='$trackid'");  
if($query){
echo "<script>alert('Courier History  deleted successfully.');</script>";
echo "<script> document.location = 'view-courier.php?editid=$cid'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}

}
  ?>



<!doctype html>
<html lang="en">

    <head>
        <title>View Courier</title>

        <!-- DataTables -->
        <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Multi Item Selection examples -->
        <link href="../plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Switchery css -->
        <link href="../plugins/switchery/switchery.min.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- Modernizr js -->
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">
      <div id="wrapper">
        <!-- Begin page -->
       
 <?php include_once('includes/header.php');?>
           <?php include_once('includes/leftbar.php');?>
<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Courier View</h4>
 <?php if($msg){?>                                   
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo $msg;?>
</div>
<?php }?>
 <?php
$cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblcourier where RefNumber='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

    <p><strong>Reference Number:</strong> <?php  echo $row['RefNumber'];?></p>
  <p><strong>Courier Date :</strong> <?php  echo $row['CourierDate'];?></p>
    <div class="row">                                    
<div class="col-6">


      <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">    
      <tr>
        <th style="text-align: center" colspan="2">Sender Details</th>
      </tr>    

   <tr>
    <th>Sender Branch</th>
    <td><?php  echo $row['SenderBranch'];?></td>
  </tr>
  <tr>
    <th>Sender Name</th>
    <td><?php  echo $row['SenderName'];?></td>
  </tr>
  <tr>
    <th>Sender Contact Number</th>
    <td><?php  echo $row['SenderContactnumber'];?></td>
  </tr>
  <tr>
    <th>Sender Address</th>
    <td><?php  echo $row['SenderAddress'];?></td>
  </tr>
  <tr>
    <th>Sender City</th>
    <td><?php  echo $row['SenderCity'];?></td>
  </tr>
  <tr>
    <th>Sender State</th>
    <td><?php  echo $row['SenderState'];?></td>
  </tr>
  <tr>
    <th>Sender Pincode</th>
    <td><?php  echo $row['SenderPincode'];?></td>
  </tr>
  <tr>
    <th>Sender Country</th>
    <td><?php  echo $row['SenderCountry'];?></td>
  </tr>
</table>
</div>
<div class="col-6">
  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
       <tr>
        <th style="text-align: center" colspan="2">Recipient Details</th>
      </tr>  

  <tr>
    <th>Recipient Name</th>
    <td><?php  echo $row['RecipientName'];?></td>
  </tr>
  <tr>
    <th>Recipient Contact Number</th>
    <td><?php  echo $row['RecipientContactnumber'];?></td>
  </tr>
  <tr>
    <th>Recipient Address</th>
    <td><?php  echo $row['RecipientAddress'];?></td>
  </tr>
  <tr>
    <th>Recipient City</th>
    <td><?php  echo $row['RecipientCity'];?></td>
  </tr>
  <tr>
    <th>Recipient State</th>
    <td><?php  echo $row['RecipientState'];?></td>
  </tr>
  <tr>
    <th>Recipient Pincode</th>
    <td><?php  echo $row['RecipientPincode'];?></td>
  </tr>
  <tr>
    <th>Recipient Country</th>
    <td><?php  echo $row['RecipientCountry'];?></td>
  </tr>
</table>
</div></div>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <tr>
    <th colspan="2" style="color:blue; font-size:18px;">Parcel Details</th>
  </tr>
  <tr>
    <th>Courier Description</th>
    <td><?php  echo $row['CourierDes'];?></td>
  </tr>
  <tr>
    <th>Parcel Weight</th>
    <td><?php  echo $row['ParcelWeight'];?></td>
  </tr>
  <tr>
    <th>Parcel Dimension Length</th>
    <td><?php  echo $row['ParcelDimensionlen'];?></td>
  </tr>
  <tr>
    <th>Parcel Dimension Width</th>
    <td><?php  echo $row['ParcelDimensionwidth'];?></td>
  </tr>
  <tr>
    <th>Parcel Dimension Height</th>
    <td><?php  echo $row['ParcelDimensionheight'];?></td>
  </tr>
  <tr>
    <th>Parcel Price</th>
    <td><?php  echo $row['ParcelPrice'];?></td>
  </tr>

  
  

<tr>
    <th>Status</th>
                <td><?php $fstatus=$row['Status'];
if($fstatus==''): ?>
<span class="badge bg-danger float-end">New</span>
<?php elseif($fstatus=='Courier Pickup'):?>
<span class="badge bg-dark float-end">Courier Pickup</span>
<?php elseif($fstatus=='Shipped'):?>
<span class="badge bg-info float-end">Shipped</span>
<?php elseif($fstatus=='In transit'):?>
<span class="badge bg-primary float-end">In transit</span>
<?php elseif($fstatus=='Arrived at Destination'):?>
<span class="badge bg-primary float-end">Arrived at Destination</span>
<?php elseif($fstatus=='Out for Delivery'):?>
<span class="badge bg-primary float-end">Out for Delivery</span>
<?php elseif($fstatus=='Delivered'):?>
<span class="badge bg-success float-end">Delivered</span>
<?php endif;?>
</td>
  </tr>

  </tr>
</table>
<?php } ?>

<?php  
$ret1=mysqli_query($con,"select Status,StatusDate from tblcouriertracking where  RefNumber='$cid' order by StatusDate ASC");
$cnt=1;
 $count=mysqli_num_rows($ret1);
if($count>0){
 ?>

<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="4" >Courier History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($ret1)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
  <td><?php echo $row['Status'];?></td>
  <td><?php  echo $row['StatusDate'];?></td> 
<!-- <td>
     <a href="view-courier.php?action=delete&&ID=<?php echo $row['RefNumber']; ?>&&editid=<?php echo $cid; ?>"  title="Delete this record" onclick="return confirm('Do you really want to delete this record?');" class="btn btn-danger">Delete </a>     
  </td> -->
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php } ?>
            <?php include_once('includes/footer.php');?>

</div>
        

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- Required datatable js -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="../plugins/datatables/jszip.min.js"></script>
        <script src="../plugins/datatables/pdfmake.min.js"></script>
        <script src="../plugins/datatables/vfs_fonts.js"></script>
        <script src="../plugins/datatables/buttons.html5.min.js"></script>
        <script src="../plugins/datatables/buttons.print.min.js"></script>

        <!-- Key Tables -->
        <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>

        <!-- Responsive examples -->
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="../plugins/datatables/dataTables.select.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>

    </body>
</html>
<?php }  ?>
