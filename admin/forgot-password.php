<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbladmin where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:resetpassword.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>



<!doctype html>
<html lang="en">

    <head>
        <!-- App title -->
        <title>CMS Forgot Password</title>

        <!-- Bootstrap CSS -->
        <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->

        <!-- App CSS -->
        <link href="assets/css/style-login.css" rel="stylesheet" type="text/css" />

        <!-- Modernizr js -->
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="neumorphic neumorphic-card">

            <!-- <div class="account-bg">
                <div class="card-box mb-0"> -->
                    <div class="text-center m-t-20">
                        <!-- <a href="../index.php" class="logo">
                            <i class="zmdi zmdi-group-work icon-c-logo"></i> -->
                            <h1 style="margin-bottom: 30px;">CMS|| Forgot Password</h1>
                        </a>
                    </div>
                    <div class="neumorphic neumorphic-card-box ">
                    <div class="m-t-10 p-20">
                        <div class="row">
                            <!-- <div class="col-12 text-center">
                                <h6 class="text-muted text-uppercase m-b-0 m-t-0">Forgot Password</h6>
                            </div> -->
                        </div>
                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <form class="m-t-20" action="" method="post" name="submit">

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="neumorphic neumorphic-input" type="email" required="" name="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="neumorphic neumorphic-input" type="text" name="contactno" required="" placeholder="Mobile Number">
                                </div>
                            </div>


                            <div class="form-group text-center row m-t-10">
                                <div class="col-12">
                                    <button class="neumorphic neumorphic-button" type="submit" name="submit">Reset</button>
                                </div>
                            </div>
                             <br>

                            <div class="form-group row m-t-30 mb-0">
                                <div class="col-12">
                                    <a href="index.php" class="text-muted neumorphic-button"><i class="fa fa-lock m-r-5"></i> Sign In</a>
                                </div>
                            </div>

                            
                        </form>

                    </div>

                    <div class="clearfix"></div>
                <!-- </div> -->
            </div>
            <!-- end card-box-->

            

        </div>
        <!-- end wrapper page -->


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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>