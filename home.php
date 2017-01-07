<?php 
session_start();
 
?> 


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>PLUTO</title>

	<!-- CSS -->
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
	<link href="assets/css/simple-line-icons.css" rel="stylesheet" media="screen">
	<link href="assets/css/animate.css" rel="stylesheet">
     
	<!-- Custom styles CSS -->
	<link href="assets/css/style.css" rel="stylesheet" media="screen">
    
    <script src="assets/js/modernizr.custom.js"></script>
       
</head>
<body>

	<!-- Preloader -->

	<div id="preloader">
		<div id="status"></div>
	</div>

	<!-- Navigation start -->

	<header class="header">

		<nav class="navbar navbar-custom" role="navigation">

			<div class="container">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="home.php">Pluto</a>
				</div>

				<div class="collapse navbar-collapse" id="custom-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#home">HOME</a></li>
						
                        <li><a href="#category">CATEGORIES</a></li>
						<li><a href="leaderboard.php">Leaderboard</a></li>
                        <li><a href="#hiw">HOW IT WORKS</a></li>
						<li><a href="#aboutus">ABOUT US</a></li>
						<li><a href="logout.php">logout</a></li>
						

						
					</ul>

        </form>
				
				</div>
                    

                <ul class="nav navbar-nav navbar-right">
					<li><?php 
					echo 'Welcome'.' '.$_SESSION["username"].'!'; 
						?>
					</li>
				</ul> 
			

			</div><!-- .container -->

		</nav>

	</header>

	<!-- Navigation end -->
	<!-- Home start -->

	<section id="home" class="pfblock-image screen-height">
        <div class="home-overlay"></div>
		<div class="intro">
			<div class="start"><h1>WELCOME!</h1>
			<br><h1>COGNITIVE SKILLS ANALYTICS</h1></div>
		</div>

 
	</section>

            
            <section id="category">
            <div class="row" style="background-color:#ffffcc;">
                <h2 class="pfblock-title">CATEGORIES</h2>
                <div class="col-xs-12 col-sm-4 col-md-4">

                    
                    <div class="grid wow zoomIn">
                        <figure class="effect-bubba">
                            <img src="assets/images/item-1.jpg" alt="img01" />
                            <figcaption>
                                <h2>Category <span>One</span></h2>
                                <h2><span>MEMORY</span></h2>

                    <form method="post" action="quest.php">            
                    <input type='hidden' name='but'  value='1'>
                  <input type='submit' name='Release' class='button' onclick=hello(); value='CLICK AND PLAY!'>
                  </form>

         
                            </figcaption>			
                        </figure>
                                             
                    </div>
                    
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
            
                    <div class="grid wow zoomIn">
                        <figure class="effect-bubba">
                            <img src="assets/images/item-2.jpg" alt="img01"/>
                            <figcaption>
                                <h2>Category<span>Two</span></h2>
                                <h2><span>PROBLEM SOLVING</span></h2>

                    <form method="post" action="quest.php">            
                    <input type='hidden' name='but'  value='2'>
                  <input type='submit' name='Release' class='button' onclick=hello(); value='CLICK AND PLAY!'>
                  </form>
                            </figcaption>			
                        </figure>
                    </div>
                    
                </div>
                
                <div class="col-xs-12 col-sm-4 col-md-4">
            
                    <div class="grid wow zoomIn">
                        <figure class="effect-bubba">
                            <img src="assets/images/item-3.jpg" alt="img01"/>
                            <figcaption>
                                <h2>Category <span>Three</span></h2>
                                <h2><span>REASONING</span></h2>



                    <form method="post" action="quest.php">            
                    <input type='hidden' name='but'  value='3'>
                  <input type='submit' name='Release' class='button' onclick=hello(); value='CLICK AND PLAY!'>
                  </form>
                            </figcaption>			
                        </figure>
                        <br>
                    </div>
                    <br>



                </div>
                
    
	</section>

	<div style="background-color:#ffffcc;">

   <br>
   <br>
   <br>
   <br>
  </div>
			<section id="hiw" class="pfblock" style="background-color:#94704d;">
		<div class="container" style="background-color:#ffffcc;">
			<div class="row">

				<div class="col-sm-6 col-sm-offset-3">

					<div class="pfblock-header">
						<h2 class="pfblock-title">HOW IT WORKS...</h2>
					<div class="pfblock-line"></div>
						<div class="pfblock-subtitle">
						   A simple test is given to the user according his category of interest.Based on the performance,graphical analysis of his progress is shown to the user helping him to enhance cognitive skills.
							</div>
					</div>

				</div>
    
    
    <!-- Skills end -->

	<!-- CallToAction start -->

	

	<!-- CallToAction end -->

	<!-- Testimonials start -->

	<section id="aboutus" class="pfblock">

	<div class="container"> 
            
            <div class="row">

				<div class="col-sm-6 col-sm-offset-3">

					<div class="pfblock-header wow fadeInUp">
						<h2 class="pfblock-title">ABOUT</h2>
						<div class="pfblock-line"></div>
						<div class="pfblock-subtitle">
				                A simple web application to enhance and nurture cognitive skills and magnifying the abilities of human mind by letting the user to solve the different problems of different categories.
						</div>
					</div>

				</div>

			</div><!-- .row -->

            <div class="row">

			

            </div><!-- .row -->

					
		</div><!-- .row -->
	</section>

	
		</div><!-- .container -->
	</section>

	<!-- Contact end -->

	<!-- Footer start -->

	<footer id="footer">
		<div class="container">
			<div class="row">

				<div class="col-sm-12">

			    <h3><a href="delete.php"> DELETE ACCOUNT</a></h3>

					
                    
				</div>

			</div><!-- .row -->
		</div><!-- .container -->
	</footer>

	<!-- Footer end -->

	<!-- Scroll to top -->

	<div class="scroll-up">
		<a href="#home"><i class="fa fa-angle-up"></i></a>
	</div>
    
    <!-- Scroll to top end-->

	<!-- Javascript files -->

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.parallax-1.1.3.js"></script>
	<script src="assets/js/imagesloaded.pkgd.js"></script>
	<script src="assets/js/jquery.sticky.js"></script>
	<script src="assets/js/smoothscroll.js"></script>
	<script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.easypiechart.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.cbpQTRotator.js"></script>
	<script src="assets/js/custom.js"></script>

</body>
</html>
