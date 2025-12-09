<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cmsaid']==0)) {
  header('location:logout.php');
  } else{
     ?>
<!doctype html>
<html lang="en">

    <head>
        <title>CMS|| Dashboard</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="../plugins/morris/morris.css">

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

        <!-- Begin page -->
        <div id="wrapper">

            <?php include_once('includes/header.php');?>
           <?php include_once('includes/leftbar.php');?>


            <!-- ========== Left Sidebar Start ========== -->
            
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
							<div class="col-xl-12">
								<div class="page-title-box">
                                    <h4 class="page-title float-left">Dashboard</h4>

                                   

                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

<?php $query=mysqli_query($con,"Select * from tblcourier ");
$usercount=mysqli_num_rows($query);
?>
                        <div class="row">
                            <div class="col-md-6 col-xl-3" >
                                <div class="card-box tilebox-one" style="border:solid 2px blue">
                                     <i class="zmdi zmdi-file float-right"></i>
                                    <a class="text-muted text-uppercase m-b-20" href="total-courier.php" target="blank">Total Courier
                                    <h2 ><?php echo $usercount;?></h2></a>
                                    
                                </div>
                            </div>


<?php $query=mysqli_query($con,"Select * from tblcourier where Status is null || Status=''");
$newcount=mysqli_num_rows($query);
?>
               <div class="col-md-6 col-xl-3" >
                                <div class="card-box tilebox-one" style="border:solid 2px red">
                                     <i class="zmdi zmdi-file float-right"></i>
                                    <a class="text-muted text-uppercase m-b-20" href="courier.php" target="blank">New Courier
                                    <h2 ><?php echo $newcount;?></h2></a>
                                    
                                </div>
                            </div>


<?php $query1=mysqli_query($con,"Select * from  tblcourier where Status ='Courier Pickup'");
$pickcount=mysqli_num_rows($query1);
?>
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box tilebox-one" style="border:solid 2px yellow">

                                    <i class="zmdi zmdi-file-text float-right"></i>
                                    <a class="text-muted text-uppercase m-b-20" href="courierpickup.php" target="blank">Total Courier Pickup</a>
                                    <h2><?php echo $pickcount;?></h2>
                                    
                                </div>
                            </div>
<?php $query2=mysqli_query($con,"Select * from  tblcourier where Status ='Shipped'");
$shippedcount=mysqli_num_rows($query2);
?>
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box tilebox-one" style="border:solid 2px black">
                                    <i class="zmdi zmdi-upload float-right"></i>
                                   <a class="text-muted text-uppercase m-b-20" href="shipped.php" target="blank"> Total Shipped</a>
                                    <h2><?php echo $shippedcount;?></h2>

                                </div>
                                </div>

                        </div>


                        <div class="row">


                            <?php $query3=mysqli_query($con,"Select * from  tblcourier where Status ='Intransit'");
$intransitcount=mysqli_num_rows($query3);
?>
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box tilebox-one" style="border:solid 2px #ff6699">
                                    <i class="icon-rocket float-right text-muted"></i>
                                    <a class="text-muted text-uppercase m-b-20" href="intransit.php" target="blank">Instransit Courier <br /><br /></a>
                                    <h2><?php echo $intransitcount;?></h2>
                                </div>
                            </div>
                                                    <?php $query4=mysqli_query($con,"Select * from tblcourier where Status ='Arrived at Destination'");
$arides=mysqli_num_rows($query4);
?>
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box tilebox-one" style="border:solid 2px #00ffff">
                                    <i class="icon-layers float-right text-muted"></i>
                                    <a class="text-muted text-uppercase m-b-20" href="arriveddes.php" target="blank">Total Courier Arrived at destination</a>
                                    <h2 ><?php echo $arides;?></h2>
                                    
                                </div>
                            </div>
<?php $query5=mysqli_query($con,"Select * from  tblcourier where Status ='Out for Delivery'");
$outdelcount=mysqli_num_rows($query5);
?>
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box tilebox-one" style="border:solid 2px #99cc00">
                                    <i class="zmdi zmdi-bike float-right"></i>
                                    <a class="text-muted text-uppercase m-b-20" href="outfordelivery.php" target="blank">Total Courier Out for Delivery</a>
                                    <h2><?php echo $outdelcount;?></h2>
                                    
                                </div>
                            </div>
<?php $query6=mysqli_query($con,"Select * from  tblcourier where Status ='Delivered'");
$deliveredcount=mysqli_num_rows($query6);
?>
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box tilebox-one" style="border:solid 2px green">
                                    <i class="icon-chart float-right text-muted"></i>
                                    <a class="text-muted text-uppercase m-b-20" href="delivered.php" target="blank">Total Delivered Courier <br /><br /></a>
                                    <h2><?php echo $deliveredcount;?></h2>

                                </div>
                                </div>
                        </div>


<?php $qry=mysqli_query($con,"Select * from tblstaff ");
$totalemp=mysqli_num_rows($qry);
?>
                        <div class="row">
                            <div class="col-md-6 col-xl-3" >
                                <div class="card-box tilebox-one" style="border:solid 2px blue">
                                     <i class="zmdi zmdi-accounts float-right"></i>
                                    <a class="text-muted text-uppercase m-b-20" href="manage-staff.php" target="blank">Total Staff/EMP
                                    <h2 ><?php echo $totalemp;?></h2></a>
                                    
                                </div>
                            </div>


<?php $qry1=mysqli_query($con,"Select * from tblbranch");
$totalbranch=mysqli_num_rows($qry1);
?>
      <div class="col-md-6 col-xl-3" >
                                <div class="card-box tilebox-one" style="border:solid 2px #000">
                                     <i class="mdi-office-building float-right"></i>
                                    <a class="text-muted text-uppercase m-b-20" href="manage-staff.php" target="blank">Total Branches
                                    <h2 ><?php echo $totalbranch;?></h2></a>
                                    
                                </div>
                            </div>

<?php $query11=mysqli_query($con,"Select * from tblcomplains");
$totalcomp=mysqli_num_rows($query11);
?>
               <div class="col-md-6 col-xl-3" >
                                <div class="card-box tilebox-one" style="border:solid 2px #0066ff">
                                     <i class="zmdi zmdi-file float-right"></i>
                                    <a class="text-muted text-uppercase m-b-20" href="all-complaints.php" target="blank">Total Complaints
                                    <h2 ><?php echo $totalcomp;?></h2></a>
                                    
                                </div>
                            </div>


<?php $query111=mysqli_query($con,"Select * from tblcontact");
$totalenq=mysqli_num_rows($query111);
?>
               <div class="col-md-6 col-xl-3" >
                                <div class="card-box tilebox-one" style="border:solid 2px #660033">
                                     <i class="zmdi zmdi-file float-right"></i>
                                    <a class="text-muted text-uppercase m-b-20" href="all-enquiry.php" target="blank">Total Enquiry
                                    <h2 ><?php echo $totalenq;?></h2></a>
                                    
                                </div>
                            </div>





                        </div>






                        
                    </div> <!-- container -->

                </div> <!-- content -->



            </div>
           
           <?php include_once('includes/footer.php');?>

        </div>
        <!-- END wrapper -->


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

        <!--Morris Chart-->
		<script src="../plugins/morris/morris.min.js"></script>
		<script src="../plugins/raphael/raphael.min.js"></script>

        <!-- Counter Up  -->
        <script src="../plugins/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.js"></script>

        <!-- Page specific js -->
        <script src="assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        
    </body>
</html>
<?php } ?>