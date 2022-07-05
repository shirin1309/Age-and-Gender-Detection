<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GAD</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
      body {
             background-image: url("ag.jpg");
             
             
          }
          h1 { color:#E9DCC9; font-family: "Great Vibes", cursive; font-size: 165px; line-height: 160px; font-weight: normal; margin-bottom: 0px; margin-top: 40px; text-align: center; text-shadow: 0 1px 1px #fff; }
          input[type=button], input[type=submit], input[type=reset] {
                                                           background-color:  #4CAF50;
                                                           border: none;
                                                           color: white;
                                                           padding: 16px 32px;
                                                           text-decoration: none;
                                                           margin: 4px 2px;
                                                           cursor: pointer;
                                                          }
         /* .bts{
            background-image: url("gad.jpg");
            background-repeat: no-repeat;
            background-size: 500px 1500px;
           
          }*/
          .bts::after {
  content: "";
  background: url("gad.jpg");
  opacity: 0.5;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;   
}
button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  
}
button:hover{
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
#header {
  background-color: #5C4033;
}
          </style>

  <!-- =======================================================
  * Template Name: Vesperr - v4.7.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html">AGENDER - The Curiosity</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
       <!-- <ul>
          <li><a class="getstarted scrollto" href="index.php">Sign Out</a></li>
        </ul>-->
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
<br><br><br><br>

  <main id="main" style="min-height:640px;">

   
    <section id="contact" class="contact">
      <div class="container">
         <div class="bts">
        <div class="section-title" data-aos="fade-up">
          <h2>Upload</h2>
        </div>

        <div class="row justify-content-center">

          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <form action="" method="POST" enctype="multipart/form-data">
				<input type="file" name="f1">
				<input type="submit" name="submit" value="Upload"><br><br>
			</form>
          </div>

        </div>
		<div class="row justify-content-center">

          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <form action="" method="POST" enctype="multipart/form-data">
				<button type="submit" name="start" >start webcam</button>
			</form>
          </div>

        </div>
        </div>
		
	<?php
  ini_set('max_execution_time', 300);

		if(isset($_POST['submit']))
			{
				
				move_uploaded_file($_FILES['f1']['tmp_name'],"input/test.jpg");
				$img=$_FILES['f1']['name'];
				
				$python = `python test_image.py`;
				
				echo "<script>alert('Successfully Trained')
						window.location='output.php';
					  </script>";
			
			}   
			
		elseif(isset($_POST['start']))
			{
				
				
				$python = `python test_webcam.py`;
				
			
				
			
			}   
	?>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>