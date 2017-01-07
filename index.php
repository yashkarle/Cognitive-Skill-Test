<?php
session_start();
if(isset($_POST['login']))
{
	$uname = $_POST["username"];
	$upass = $_POST["password"];


	$con = new MongoClient();

	$db = $con->pluto;

	$collection = $db->user;

	$qry = array("username" => $uname,"password" => $upass);
	$result = $collection->findOne($qry);

	if($result['password']==$upass)
	{
		$_SESSION["username"] = $result['username'];
		 header("Location: home.php");		
?>
        <script>alert('Logged in!');</script>
<?php
	}
	else
	{
?>		
		<script>alert('Wrong Details');</script>
<?php
	}
}

function left_out($blank)
{
    $flag = 0;
    foreach($blank as $i)
    {
    	if(empty($i))
       	{
	    	$flag = 1;
       	}
    }
	return $flag;
}	

$names=$un=$em=$pw=$cpw=$success=$log="";
$namerr=$unerr=$emerr=$pwerr=$cpwerr="";
$uflag=0;

$connection=new MongoClient();
$database=$connection->pluto;
$collection=$database->user;

if(isset($_POST['signup']))
{
    if(empty($_POST["name"]))
    {
     	$namerr="Name required";
    }
    else
    {
     	$names=$_POST["name"];
     	if(!preg_match("/^[a-zA-Z ]*$/",$names))
     	{
     		$uflag=1;
     		$namerr="Only white spaces and letters allowed!";
     	}
    }

    if(empty($_POST["uname"]))
    {
     	$unerr="Username required";
    }
  	else
 	{
     	$un=$_POST["uname"];
     	$cursor=$collection->find();
     	foreach($cursor as $document)
    	{
    		if($un==$document["username"])
   			{
   				$uflag=1;
   				$unerr="Username already Taken!";
   			}
    	}
 	}

  	if(empty($_POST["email"]))
  	{
  		$emerr="Email id required";
  	}
  	else
  	{
  		$em=$_POST["email"];
  		if(!filter_var($em, FILTER_VALIDATE_EMAIL))
  		{
  			$uflag=1;
  			$emerr="Invalid email!";
  		}
  	}

  	if(empty($_POST["pwd"]))
  	{
  		$pwerr="Password required";
  	}
  	else
  	{
 	 	$pw=$_POST["pwd"];
  	}

  	if(empty($_POST["cpwd"]))
  	{
  		$cpwerr="Confirm the Password";
  	}
  	else
  	{
  		$cpw=$_POST["cpwd"];
		if(strcmp($pw,$cpw))
		{
			$cpwerr="Passwords don't match!";
			$uflag=1;
		}
 	}
  	$empty = left_out($_POST);
  	if($uflag==0&&$empty==0)
  	{
		$success="Registered Succesfully!";
		$log="Click here to Login!";
  		$collection->insert(array("username"=>"$un","password"=>"$pw","name"=>"$names","email"=>"$em","score"=>0,"score_graph"=>[]));
    
    	$collection2 = $database->userdata;
    	$qry=array("doc_id"=>1);
    	$check=$collection2->findOne($qry);
    	$n=$check['user_reg'];
    	$n++;
    	$collection2->update(array("doc_id"=>1),array('$set'=>array('user_reg'=>$n)));

    	
	}
	else
   	{
     	$entername=$names;
    	$entermail=$em;
     	$enterun=$un;
   	}
}

if(isset($_POST['admin']))
{
	$aname = $_POST["adminname"];
	$apass = $_POST["password"];


	$con = new MongoClient();

	$db = $con->pluto;

	$collection = $db->admin;

	$qry = array("adminname" => $aname,"password" => $apass);
	$result = $collection->findOne($qry);

	if($result['password']==$apass)
	{
		$_SESSION["adminname"] = $result['adminname'];
		 		
?>
        <script>alert('Logged in!');</script>
<?php
header("Location: adminhome.php");
	}
	else
	{
?>		
		<script>alert('Wrong Details');</script>
<?php
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

    .error
	{
		color:#FF0000;
	}
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



	<header class="header">

		<nav class="navbar navbar-custom" role="navigation" style="background-color:#ffffcc;" >

			<div class="container" style="background-color:#ffffcc;">

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
						
                        <li><a href="#login">Login</a></li>
                       
                        <li><a href="#signup">Signup</a></li>
						<li><a href="#aboutus">ABOUT US</a></li>
					
						

						
					</ul>

        </form>
				
				</div>
			<ul class="nav navbar-nav navbar-right">
				<h3>	<li><?php 
					      echo "WELCOME !"; 
						?>
					</li>
				</ul> 
				</h3>
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


	 <section id="login" style="padding:10px; background-color:#ffffcc;">

<h2>LOGIN</h2>

<div class="login" align="left" style="background-color:#ffffff;">
USER
<form action="" method="post">
<ul>
<br>
Username : <input name="username" type="text" required class="text" placeholder=""/>
<br>
<br>
Password : <input name="password" type="password" required class="text" placeholder=""/>
<br>
<br>
<input type="submit" style="background-color:#ccccff;"  value="LOGIN" class="btn" name="login">
</ul>
</form>
</div>


<div class="admin" style="background-color:#ffffff;">
ADMIN
<form action="" method="post">
<ul>
<br>
AdminName : <input name="adminname" type="text" required class="text" placeholder=""/>
<br>
<br>
Password : <input name="password" type="password" required class="text" placeholder=""/>
<br>
<br>
<input type="submit" style="background-color:#ccccff;" value="LOGIN" class="btn" name="admin">
</ul>
</form>

</div>
<div style="background-color:#ffffcc;">
<br>
<br>
<br>
<br><br>
<br><br>
<br><br>
<br>
</div>
	<div style="background-color:#94704d;"	>
	<br>

	</div>	

    

	</section>


			<section id="signup" class="pfblock" style="background-color:#ffffcc;">
		<div class="container" >
			<div class="row" >

				<div class="col-sm-6 col-sm-offset-3" >

					<div class="pfblock-header" >
						<h2 class="pfblock-title">SIGNUP</h2>
						<div class="pfblock-line" style="background-color:#ffffff;"></div>
						<div class="pfblock-subtitle" style="background-color:#ffffff;">
						<div class="signup">
						<form class="col-md-4" method="POST" action="#signup">
  <br>
<div class="form-group">
        <input type="text" class="form-control input-md" placeholder="Name" name="name" value="<?php echo $entername; ?>"><span class="error">* <?php echo $namerr; ?></span>
    </div>

<div class="form-group">
        <input type="text" class="form-control input-md" placeholder="Email ID" name="email" value="<?php echo $entermail; ?>"><span class="error">*<?php echo $emerr; ?></span>
    </div>

    <div class="form-group">
        <input type="text" class="form-control input-md" placeholder="Username" name="uname" value="<?php echo $enterun; ?>"><span class="error">*<?php echo $unerr; ?></span>
    </div>

    <div class="form-group">
        <input type="password" class="form-control input-md" placeholder="Password" name="pwd"><span class="error">*<?php echo $pwerr; ?></span>
    </div>

    <div class="form-group">
        <input type="password" class="form-control input-md" placeholder="Confirm Password" name="cpwd"><span class="error">*<?php echo $cpwerr; ?></span>
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit" value="submit" name="signup" style="background-color:#ccccff;">Sign Up</button>
    </div>
<span style="color:white"></span><?php echo $success;?><a href="#login"><?php echo "$log"; header("location:index.php#signup");?></a>

</form>

</div>
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
				                A simple web application to enhance and nurture cognitive skills and magnifying the abilities of human mind by letting the user to solve the different problems of different categories.
						</div>
					</div>

				</div>

			</div>
            <div class="row">

			
            </div>

					
		</div>
	</section>

	
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
