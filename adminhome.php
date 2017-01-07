<?php
session_start();


if(isset($_POST['add']))
{
	$catid=$_POST["category"];
	$quest = $_POST["quest"];
	$opt1 = $_POST["opt1"];
	$opt2 = $_POST["opt2"];
	$opt3 = $_POST["opt3"];
	$opt4 = $_POST["opt4"];
	$ans  = $_POST["ans"];


	// connect to mongodb
   	$con = new MongoClient();
	if($con)
	{ 
		//connecting to database
		$database=$con->pluto;
		//echo "Database 'pluto' selected";
		//connect to specific collection
		$collection=$database->categories;
		//echo "Collection category Selected succsessfully";
		$cat= array('cat_id'=>$catid);
    		$cursor=$collection->find($cat);
    		

       		foreach ($cursor as $post) 
    		{
    		$n=$post['questions'];
              	
} 
$count=$post['count'];
$new_count=$count+1;


		$new_quest = array(
			"quest_text"=>$quest,
			"quest_id"=>$new_count,
			"opt1"=>$opt1,
			"opt2"=>$opt2,
			"opt3"=>$opt3,
			"opt4"=>$opt4,
			"ans"=>$ans
			);

		$collection->update(array("cat_id"=>$catid),array('$push'=>array("questions"=>$new_quest)));
		$collection->update(array("cat_id"=>$catid),array('$set'=>array('count'=>$new_count)));
		?>
			<script type="text/javascript">  alert('Question added succsessfully!'); </script>
		<?php
	
}
	else
	{
		die("Database are not connected");
	}
}

if(isset($_POST['delete']))
{
	$catid=$_POST["category1"];
 //	$questid = $_POST["questid"];
    $questid1 = (is_numeric($_POST['questid']) ? (int)$_POST['questid'] : 0);
	// connect to mongodb
   	$con = new MongoClient();
	if($con)
	{ 
		//connecting to database
		$database=$con->pluto;
		//echo "Database 'pluto' selected";
		//connect to specific collection
		$collection=$database->categories;
		//echo "Collection category Selected succsessfully";
		$cat= array('cat_id'=>$catid);
    		$cursor=$collection->find($cat);
    		

       		foreach ($cursor as $post) 
    		{
    			$n=$post['questions'];
            } 
		$count=$post['count'];
		$new_count=$count-1;

		$last_quest=$n[$count];

		//$collection->update(array("cat_id"=>$catid,"questions"=>$last_quest),array('$set'=>array('quest_id'=>$questid1)));
		$collection->update(array("cat_id"=>$catid),array('$pull'=>array("questions"=>array("quest_id"=>$questid1))));
		//$collection->update(array("cat_id"=>$catid),array('$push'=>array("questions"=>$last_quest)));
		//$collection->update(array("cat_id"=>$catid),array('$pull'=>array("questions"=>array("quest_id"=>$new_count))));
		$collection->update(array("cat_id"=>$catid),array('$set'=>array('count'=>$new_count)));
			?>
			<script type="text/javascript">  alert('Question deleted succsessfully!'); </script>
		<?php
	
}
	else
	{
		die("Database are not connected");
	}
}

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
<body>



	<div id="preloader">
		<div id="status"></div>
	</div>



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
						<li><a href="leaderboard.php">Leaderboard</a></li>
						
                        <li><a href="#login">USER DATA</a></li>
                       
                        <li><a href="#add">ADD Question</a></li>
                        <li><a href="#delete">DELETE Question</a></li>

					
						
<li><a href="logout.php">logout</a></li>
						
					</ul>

        </form>
				
				</div>
			<ul class="nav navbar-nav navbar-right">
					<h4><li><?php 
					      echo "WELCOME ".$_SESSION["adminname"]."!"; 
						?>
					</li>
					</h4>
				</ul> 

			</div>

			

		</nav>

	</header>


	<section id="home" class="pfblock-image screen-height">
        <div class="home-overlay"></div>
		<div class="intro">
			<div class="start"><h1>WELCOME!</h1>
			<br><h1>COGNITIVE SKILLS ANALYTICS</h1></div>
		</div>

     
	</section>


	 <section id="login" style="padding:10px;">

			<h2>Users currently registered : <?php

					$con = new MongoClient();
					$database=$con->pluto;
			$collection2 = $database->userdata;
			$qry=array("doc_id"=>1);
			$check=$collection2->findOne($qry);

            $n=$check['user_reg'];
           	
            echo $n;

			?></h2>
			
			<h2>Users deleted their Account : <?php 
			$con = new MongoClient();
			$database=$con->pluto;
			$collection3 = $database->userdata;
			$qry=array("doc_id"=>1);
			$check=$collection3->findOne($qry);
			$d=$check['user_del'];
			echo $d;

			?></h2>

    

	</section>


			<section id="add" class="pfblock">
		<div class="container">
			<div class="row">

				<div class="col-sm-6 col-sm-offset-3">

					<div class="pfblock-header">
						<h2 class="pfblock-title">ADD Questions</h2>
						<div class="pfblock-line"></div>
						<div class="pfblock-subtitle">
						<div class="signup">
						<form method="post" onsubmit="return validateForm();">
<ul>
<br>
Select Category : <select name="category">
<option value="1">Memory</option>
<option value="2">Problem Solving</option>	
<option value="3">Reasoning</option>		
</select>
<br>
<br>
Question : <input type="text" name="quest" required class="text" style="align=center">
<br>
<br>
Option 1 :     <input type="text" name="opt1" required class="text" style="text-align=center">
<br>
<br>
Option 2 :     <input type="text" name="opt2" required class="text" style="text-align=center">
<br>
<br>
Option 3 :     <input type="text" name="opt3" required class="text" style="text-align=center">
<br>
<br>
Option 4 :     <input type="text" name="opt4" required class="text" style="text-align=center">
<br>
<br>
Answer : <select name="ans">
<option value="A">A</option>
<option value="B">B</option>	
<option value="C">C</option>
<option value="D">D</option>		
</select>
<br>
<br>
<input type="submit" name="add" value="ADD" class="btn">
</ul>
</form>
</div>
							</div>
					</div>

				</div>

				</div>
				</div>
				</section>
    

			<section id="delete" class="pfblock">
		<div class="container">
			<div class="row">

				<div class="col-sm-6 col-sm-offset-3">

					<div class="pfblock-header">
						<h2 class="pfblock-title">DELETE Questions</h2>
						<div class="pfblock-line"></div>
						<div class="pfblock-subtitle">
						<div class="signup">
						<form method="post" onsubmit="return validateForm();">
<ul>
<br>
Select Category : <select name="category1">
<option value="1">Memory</option>
<option value="2">Problem Solving</option>	
<option value="3">Reasoning</option>		
</select>
<br>
<br>
Question id: <input type="number" name="questid" required class="text" style="align=center">
<br>
<br>
<input type="submit" name="delete" value="DELETE" class="btn">
</ul>
</form>
</div>
							</div>
					</div>

				</div>

				</div>
				</div>
				</section>




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
</html>
