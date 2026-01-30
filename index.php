<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
    if(isset($_POST['submit']))
  {

$name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $message=$_POST['message'];
 $query=mysqli_query($con,"insert into tblcontact(Name,MobileNumber,Email,Message) value('$name','$phone','$email','$message')");

    if ($query) {
    echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>

<!doctype html>
<html lang="en">

  <head>
    <title>Courier Management System|| Home Page</title>
   
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
     <style>
      /* =========================
   HERO CAROUSEL BASE CSS
========================= */

/* =========================
   HERO CAROUSEL / SLIDES
========================= */

.ftco-blocks-cover-1 {
  position: relative;
  overflow: hidden;
  height:80vh;
}

/* Owl Carousel height fix */
.hero-carousel,
.hero-carousel .owl-stage-outer,
.hero-carousel .owl-stage,
.hero-carousel .owl-item,
.hero-carousel .slide {
  height: 100vh;
}

.hero-carousel .slide {
  background-size: cover;
  background-position: center;
  /* background-repeat: no-repeat; */
  width: 100%;
  position:relative;
}

/* Transparent overlay */
.hero-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.3);
  z-index: 1;
}

/* Hero content */
.hero-content {
  position: absolute;
  top: 50%; left: 50%; 
  transform: translate(-50%, -50%); 
  z-index: 2; 
  width: 100%;
  /* inset: 0;
  z-index: 2; */
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Text box */
.text-overlay {
  background: rgba(255, 255, 255, 0.2); /* semi-transparent white */ 
  backdrop-filter: blur(10px); 
  -webkit-backdrop-filter: blur(10px); /* Safari support */ 
  padding: 30px 40px; 
  border-radius: 12px;
   color: #000; 
   text-align: center; 
   max-width: 600px;
    width: 90%;
  /* background: rgba(8, 8, 8, 0.2);
  backdrop-filter: blur(10px);
  padding: 35px;
  border-radius: 10px;
  text-align: center;
  max-width: 650px; */
}

.text-overlay h1 {
  color: #fff;
  font-weight: bold;
  margin-bottom: 25px;
}

/* Track form */
.text-overlay .form-control {
  height: 55px;
  width: 320px;
}

.text-overlay .btn {
  height: 55px;
  font-weight: bold;
}

/* =========================
   SERVICE IMAGES
========================= */

.ftco-service-image-1 {
  margin-top: -60px;
}

.ftco-service-image-1 img {
  transition: .3s;
}

.ftco-service-image-1 img:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 40px rgba(0,0,0,.3);
}

@media (min-width: 768px) {
  .ftco-service-image-1 .service:hover img {
    top: -5px;
    box-shadow: 0 10px 50px -10px rgba(0, 0, 0, 0.3);
  }
}


     </style>
    <link rel="stylesheet" href="css/style.css">


  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>


 <?php include_once('includes/header.php');?>

 

  <div class="ftco-blocks-cover-1">

  <div class="owl-carousel hero-carousel">

    <div class="slide" style="background-image:url('images/slide 1.jpg');">
      <div class="hero-overlay"></div>
    </div>

    <div class="slide" style="background-image:url('images/slide 2.png');">
      <div class="hero-overlay"></div>
    </div>

    <div class="slide" style="background-image:url('images/slide 3.jpg');">
      <div class="hero-overlay"></div>
    </div>

    <div class="slide" style="background-image:url('images/slide 4.jpg');">
      <div class="hero-overlay"></div>
    </div>

  </div>

  <!-- HERO TEXT & TRACK -->
  <div class="hero-content">
    <div class="text-overlay">
      <h1>Choose Your Quality Delivery of Your Cargo</h1>

      <form>
        <div class="form-group d-flex justify-content-center">
          <input type="text" class="form-control"
                 placeholder="Enter your tracking number">
          <button class="btn btn-info ml-3">
            Track Now
          </button>
        </div>
      </form>
    </div>
  </div>
  
</div>

<!-- ================= SERVICES ================= -->

<div class="ftco-service-image-1 pb-5">
  <div class="container">
    <div class="owl-carousel owl-all">

      <div class="service text-center">
        <img src="images\IMG-20260107-WA0015.jpg" class="img-fluid">
        <h3 class="text-info"><b>Sea Freight</b></h3>
        <p class="text-black">Dependable ocean shipping solutions tailored for bulk and heavy cargo, combining cost-efficiency with secure handling to ensure smooth delivery across international waters.</p>
      </div>

      <div class="service text-center">
        <img src="images\aeroplane.jpg" class="img-fluid">
        <h3 class="text-info"><b>Air Freight</b></h3>
        <p class="text-black">Swift and reliable air transport designed for time-sensitive shipments, offering global reach and guaranteed efficiency to keep your business moving.</p>
      </div>

      <div class="service text-center">
        <img src="images/cargo_delivery_small.jpg" class="img-fluid">
        <h3 class="text-info"><b>Package Forwarding</b></h3>
        <p class="text-black">Seamless forwarding services that connect your local purchases to worldwide destinations, providing convenience, speed, and peace of mind every step of the way.</p>
      </div>

    </div>
  </div>
</div>

      <div class="site-section" id="about-section">

        <div class="container">
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
              <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                <?php
$query=mysqli_query($con,"select * from tblpage where PageType='aboutus'");
while ($row=mysqli_fetch_array($query)) {
?>
                <h2 class="text-info"><b><?php echo $row['PageTitle'];?></b></h2>
                <p><?php echo $row['PageDescription'];?>.</p>
              </div><?php } ?>
               <img src="images\IMG-20260120-WA0017.jpg" alt="Image" class="img-fluid">
            </div>
          </div>
        </div>

      </div>


<div class="site-section" id="branch-section">
        <div class="container">
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
              <!-- <div class="block-heading-1" data-aos="fade-up" data-aos-delay=""> -->
                <h2 class="text-info"><span class="text-info-emphasis"><b>Our Branch</b></h2>
                <p class="text-black">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <!-- </div> -->
            </div>
          </div>
          <div class="owl-carousel owl-all">
           <?php
$query=mysqli_query($con,"select * from tblbranch");
while ($row=mysqli_fetch_array($query)) {

?>
            <div class="block-team-member-1 text-center rounded h-100" >
              <figure>
                <img src="images\IMG-20251217-WA0001.jpg" style="border: solid 1px #000" alt="Image" class="img-fluid rounded-circle">
              </figure>
              <h3 class="font-size-20 text-black"><?php echo $row['BranchName'];?></h3>
              <span class="d-block font-grey-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Branch Name</span>
              <p class="text-black"><strong>Contact Number: </strong><?php echo $row['BranchContactnumber'];?></p>
              <p class="text-black"><strong>Email ID: </strong><?php echo $row['BranchEmail'];?></p>
              <p class="text-black"><strong>Address: </strong><?php echo $row['BranchAddress'];?></p>
              <p class="text-black"><strong>City: </strong><?php echo $row['BranchCity'];?></p>
               <p class="text-black"><strong>State: </strong><?php echo $row['BranchState']."-".$row['BranchPincode'];?></p>
                <p class="text-black"><strong>Country: </strong><?php echo $row['BranchCountry'];?></p>
            
            </div><?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
            <!-- <div class="block-heading-1"> -->
              <span>Get In Touch</span>
              <h2  class="text-info"><span class="text-info-emphasis"><b>Contact Us</b></h2>
            <!-- </div> -->
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="100">
            <form action="#" method="post">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" class="text-black" name="name" required="true" placeholder="Enter Your Name">
                </div>
                <div class="col-md-6">
                  <input type="text" class="text-black" placeholder="Mobile Number" name="phone" required="true" maxlength="10" pattern="[0-9]+">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="text-black" placeholder="Email address" name="email" required="true">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="message" required="true" id="" class="text-black" placeholder="Write your message." cols="60" rows="10"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" name="submit" class="btn btn-block " value="Send Message"  style="background-color:  #0cb0d1; color: black; border: 2px solid black !important; padding: 10px 20px; font-weight: bold;margin-left: 20px;">
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-white p-3 p-md-5">
             <h3 class="text-black mb-4">Contact Info</h3>
              <ul class="list-unstyled footer-link"><?php
$query=mysqli_query($con,"select * from tblpage where PageType='contactus'");
while ($row=mysqli_fetch_array($query)) {

?>
                <li class="d-block mb-3">
                  <span class="d-block text-black">Address:</span>
                  <span><?php echo $row['PageDescription'];?></span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+<?php  echo htmlentities ($row['MobileNumber']);?></span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span><?php  echo htmlentities($row['Email']);?></span></li>
              <?php } ?></ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>  
<script src="js/bootstrap.min.js"></script>  
<script src="js/owl.carousel.min.js"></script>  
<script src="js/aos.js"></script>  

<script>
$(document).ready(function(){
  $('.hero-carousel').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    animateOut: 'fadeOut'
  });
});
</script>
<?php include_once('includes/footer.php');?>

    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>
    <script>
$(document).ready(function(){
  $('.hero-carousel').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    animateOut: 'fadeOut'
  });
});
</script>
    <script src="js/main.js"></script>


  </body>

</html>
