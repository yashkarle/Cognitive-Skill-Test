

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
    

    <style>
   	 .signup
    {
    	
    	border: 1px solid #000; 
    	 
   	 	text-align: center;
   		font-family: Helveica, sans-serif;
   		font-size: 13px;
   		border-radius: 8px;
   		-moz-border-radius: 10px;
   		-webkit-border-radius: 10px ; 
    }

    .login
    {
  
    	display:inline-block; 
    	border: 1px solid #000; 
    	width:620px; 
    	margin-top: 10px;
   	 	margin-right: 35px; text-align: center;
   		font-family: Helveica, sans-serif;
   		font-size: 13px;
   		border-radius: 8px;
   		-moz-border-radius: 10px;
   		-webkit-border-radius: 10px ; 

    }  



    </style> 
</head>
<body bgcolor="red">



	<div id="preloader" style="background-color:#ffffcc;">
		<div id="status" style="background-color:#ffffcc;"></div>
	</div>



	<header class="header">

		<nav class="navbar navbar-custom" role="navigation">

			<div class="container" style="background-color:#ccccff;">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="home.php">Pluto</a>
				</div>

				<div class="collapse navbar-collapse" id="custom-collapse" style="background-color:#ffffcc;">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="home.php">HOME</a></li>
						<li><a href="#lb">Leaderboard</a></li>
						
              
                       
					
						
<li><a href="logout.php">logout</a></li>
						
					</ul>

        </form>
				
				</div>
			<ul class="nav navbar-nav navbar-right">
					<h4><li><?php 
					      echo "WELL DONE!"; 
						?>
					</li>
					</h4>
				</ul> 

			</div>

			

		</nav>

	</header>


	

	 <section id="lb" style="padding:10px; background-color:#ffffcc; ">
<div style="background-color:#ffffcc;">
			<h2>LEADERBOARD : 
			<br>
			<br>
			<table border="10" align="center">
			<tr><td>Username  </td><td>Name  </td><td>Score  </td></tr></table>
			<br>
<?php 
session_start();

$m=new MongoClient();
$db=$m->pluto;
$colluser=$db->user;

$cursor = $colluser->find();
$cursor->sort(array('score'=>-1));
$cursor->limit(10);
$i=1;
while ($cursor->hasNext()) : $document = $cursor->getNext();
?>
<table border="5" align="center">
<tr>
<td><?php echo $i;?></td>
<td><?php echo $document['username'] ; ?></td>
<td><?php echo $document['name'];?></td>
<td><?php echo $document['score'];?></td>
</tr></table>
<?php
echo "<hr/>";
$i++;
endwhile;

?>

			</h2>

    
</div>
	</section>


			

			
	<div class="scroll-up" >
		<a href="#home"><i class="fa fa-angle-up"></i></a>
	</div>
    

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
