


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
    #login
    {

    }

    .login
    {
  border: 1px solid #000;
    	
   	 	text-align: center;
   	

    }  
    .admin
    {
    	display:inline-block;  
    	border: 1px solid #000;
    	width:620px;  
    	margin-top: 10px;
	 position:absolute;
    text-align: center;
   font-family: Helvetica, sans-serif;
   font-size: 13px;
   border-radius: 8px;
   -moz-border-radius: 10px;
   -webkit-border-radius: 10px;
    }
    </style> 
</head>
<body>



	<div id="preloader">
		<div id="status"></div>
	</div>



	<header class="header" style="background-color:#94704d;">

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
						<li><a href="home.php">HOME</a></li>
						<li><a href="#home">Test Analysis</a></li>

						
                        <li><a href="#login">Your Performance</a></li>
                        
                       
                        <li><a href="home.php#category">Play Again!</a></li>
						
						

						
					</ul>

        </form>
				
				</div>
			<ul class="nav navbar-nav navbar-right">
					<h3><li><?php 
					      echo "WELL DONE!"; 
						?>
					</li></h3>
				</ul> 

			</div>

			

		</nav>

	</header>


	<section id="home" class="pfblock-image screen-height">
        <div class="home-overlay"></div>
		<div class="intro">
			<div class="">
			<h1>ANALYSIS</h1>

<?php
session_start();
if ($_SESSION['time']==0) 
{
	$scr=0;
}

$m=new MongoClient();
$db=$m->pluto;
$coll=$db->categories;
$colluser=$db->user;
$questuser=array('username'=>$_SESSION['username']);
$cursoruser=$colluser->findone($questuser);

$cid=$_POST['but'];
$quest= array('cat_id'=>$cid);
$cursor=$coll->find($quest);
foreach($cursor as $post)
{

//print_r($_POST)
$scr=0;
$n=$post['questions'];

$ans=$_POST['ans1'];


$array=$n[$ans];
//echo "1".$array['quest_text']."</br>";
if($array['ans']==$_POST['1'])
{
   $scr=$scr+10;
//   echo "your answer was right"."</br>";
}
else
{
//	echo "your answer was wrong"."</br>";
//	echo "Correct answer".$array['ans'];
}
$ans=$_POST['ans2'];
$array=$n[$ans];
//echo "2".$array['quest_text']."</br>";

if($array['ans']==$_POST['2'])
{
   $scr=$scr+10;
  // echo "your answer was right"."</br>";
}
else
{
	//echo "your answer was wrong"."</br>";
	//echo "Correct answer".$array['ans'];

}

$ans=$_POST['ans3'];
$array=$n[$ans];
//echo "3".$array['quest_text']."</br>";

if($array['ans']==$_POST['3'])
{
   $scr=$scr+10;
  // echo "your answer was right"."</br>";
}
else
{
	//echo "your answer was wrong"."</br>";
	//echo "Correct answer".$array['ans'];

}

$ans=$_POST['ans4'];
$array=$n[$ans];
//echo "4".$array['quest_text']."</br>";

if($array['ans']==$_POST['4'])
{
   $scr=$scr+10;
  // echo "your answer was right"."</br>";
}
else
{
	//echo "your answer was wrong"."</br>";
	//echo "Correct answer".$array['ans'];

}

$ans=$_POST['ans5'];
$array=$n[$ans];
//echo "5".$array['quest_text']."</br>";

if($array['ans']==$_POST['5'])
{
   $scr=$scr+10;
  // echo "your answer was right"."</br>";
}
else
{
	//echo "your answer was wrong"."</br>";
	//echo "Correct answer".$array['ans'];
}

}
//echo $scr;
$k=$cursoruser['score']+$scr;
//echo $k;
$colluser->update(array('username'=>$_SESSION['username']),array('$set'=>array('score'=>$k)));
$colluser->update(array('username'=>$_SESSION['username']),array('$set'=>array('current_score'=>$scr)));
?>



		<ul type="none"><h2><li>	<?php 
$questuser=array('username'=>$_SESSION['username']);
$cursoruser=$colluser->findone($questuser);

echo "Your Total Score is :".$cursoruser['score']."</br>";
echo "Your Score for this test is :".$cursoruser['current_score'];
?></li></h2></ul>

<?php
//$colluser->update(array('username'=>$_SESSION['username']),array('$set'=>array('counter'=>0)));
//$filter=array('username'=>$_SESSION['username']);
$colluser->update(array('username'=>$_SESSION['username']),array('$push'=>array('score_graph'=>$cursoruser['current_score'])));
$colluser->update(array('username'=>$_SESSION['username']),array('$set'=>array('current_score'=>0)));
?>


			</div>
		</div>

     
	</section>


	 <section id="login" style="padding:10px;">

<h2>YOUR PERFORMANCE</h2>

<div class="login">
<?php
echo "Your last 5 scores in this category :"."</br>"."</br>";
?>
<img src="graph.php">
</div>

			

    

	</section>


			<!--<section id="signup" class="pfblock">
		<div class="container">
			<div class="row">

				<div class="col-sm-6 col-sm-offset-3">

					<div class="pfblock-header">
						<h2 class="pfblock-title">Test Analysis</h2>
						<div class="pfblock-line"></div>
						<div class="pfblock-subtitle">

							</div>
					</div>

				</div>

				</div>
				</div>
				</section>
    


	<section id="aboutus" class="pfblock">

	<div class="container"> 
            
            <div class="row">

				<div class="col-sm-6 col-sm-offset-3">

					<div class="pfblock-header wow fadeInUp">
						<h2 class="pfblock-title">ABOUT US</h2>
						<div class="pfblock-line"></div>
						<div class="pfblock-subtitle">



						</div>
					</div>

				</div>

			</div> .row

            <div class="row">

			
            </div>.row 

					
		</div>.row
	</section>

	-->



	<div class="scroll-up">
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