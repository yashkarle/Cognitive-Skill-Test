<?php
session_start();
?>
<!DOCTYPE html>
<head  >
	<link href="assets/css/quest.css" rel="stylesheet">
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
	<link href="assets/css/simple-line-icons.css" rel="stylesheet" media="screen">	
	  <script src="assets/js/modernizr.custom.js"></script>

</head>

<body background="TWHXaQ1.jpg" onload="starttimer()" >

<header class="header" style="background-color:#94704d;" >

		<nav class="navbar navbar-custom" role="navigation">

			<div class="container" >

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
                        <li><a href="home.php#category">QUIT</a></li>

						
                        <!--<li><a href="home.php#portfolio">CATEGORIES</a></li>
                        <li><a href="home.php#contact">HOW IT WORKS</a></li>
						<li><a href="home.php#testimonials">ABOUT</a></li>-->
						
					</ul>
				
				</div>
                     
			  </div><!-- .container -->
<p id="output" style="font-size:25px; text-align:right; margin-right:80px;"></p>
		</nav>


	</header>

	<!-- Navigation end -->
    <h3>
    	

<div>

        
<script>

var time=200;

function starttimer()
{
	if(time>0)
	{  
		setTimeout(function()
		{
    		time--;
 			var mins=Math.floor(time/10/60);
			var secs=Math.floor((time/10)%60);
   			var tenths=time%10; 
   			document.getElementById("output").innerHTML=mins+":" + secs + ":" + tenths;
			starttimer();
		},100);
		<?php $_SESSION['time']=time;?>
	}
	else
	{
		window.location="result.php";
	}
}

</script>

<p id="time1" ></p>

</div>
    	
<?php
    	
    		$m=new MongoClient();
    		$db=$m->pluto;
    		$coll=$db->categories;
    		$colluser=$db->user;
    		$questuser=array('username'=>$_SESSION['username']);
			//$p=
			//echo $_POST['cat_id'];
			//echo $p;
			$cid=$_POST['but'];
			//echo "cid".$cid;
    		$quest= array('cat_id'=>$cid);
    		$cursor=$coll->find($quest);
    		//$cursoruser=$colluser->findone($questuser);
    		//$generate=array();
    		$nos=range(0,8);
        	shuffle($nos);



       		foreach ($cursor as $post) 
    		{
    			
                
     
    			$n=$post['questions'];
    		
					?>

		<div>
    	<form method="post" action="result.php">

       <br>
       <br>
       <br>
		<?php $array=$n[$nos[0]];
    		  echo "Q.1)   ".$array['quest_text']." ";
    	?>
    	<br>
        <input class="rad" type="radio" name="1" id="1A" value="A" />
		<label for="1A">A) 
		<?php echo $array['opt1']; ?>
		<!--<input type="number" value="<?php echo $d+1;?>" name="quescount" hidden></input>
		<input type="number" value="99" name="condition" hidden></input>-->
		</label>
		<!--</div>-->
    	 <!--<div>-->
    	<br>
        <input type="radio" name="1" id="1B" value="B" />
        <label for="1B">B) 
    	<?php echo $array['opt2']; ?>
		</label>
    	<!--</div>-->
    	<!--<div>-->
    	<br>
        <input type="radio" name="1" id="1C" value="C" />
        <label for="1C">C)  			
		<?php echo $array['opt3']; ?>
		</label>
    	<!--</div>-->
    	<!--<div>-->
    	<br>
        <input type="radio" name="1" id="1D" value="D" />
        <label for="1D">D) 
    	<?php echo $array['opt4']; ?>
    	</label>
    	<input type="hidden" name="ans1" id="ans1" value=<?php echo $nos[0];?>>
    	<br>
    	<br>
		<?php $array=$n[$nos[1]];
    		  echo "Q.2)   ".$array['quest_text']." ";
    	?>
    	<br>
        <input class="rad" type="radio" name="2" id="2A" value="A" />
		<label for="2A">A) 
		<?php echo $array['opt1']; ?>
		<!--<input type="number" value="<?php echo $d+1;?>" name="quescount" hidden></input>
		<input type="number" value="99" name="condition" hidden></input>-->
		</label>
		<!--</div>-->
    	 <!--<div>-->
    	<br>
        <input type="radio" name="2" id="2B" value="B" />
        <label for="2B">B) 
    	<?php echo $array['opt2']; ?>
		</label>
    	<!--</div>-->
    	<!--<div>-->
    	<br>
        <input type="radio" name="2" id="2C" value="C" />
        <label for="2C">C)  			
		<?php echo $array['opt3']; ?>
		</label>
    	<!--</div>-->
    	<!--<div>-->
    	<br>
        <input type="radio" name="2" id="2D" value="D" />
        <label for="2D">D) 
    	<?php echo $array['opt4']; ?>
    	</label>
    	<input type="hidden" name="ans2" id="ans2" value=<?php echo $nos[1];?>>

    	<br>
    	<br>
		<?php $array=$n[$nos[2]];
    		  echo "Q.3)   ".$array['quest_text']." ";
    	?>
    	<br>
        <input class="rad" type="radio" name="3" id="3A" value="A" />
		<label for="3A">A) 
		<?php echo $array['opt1']; ?>
		<!--<input type="number" value="<?php echo $d+1;?>" name="quescount" hidden></input>
		<input type="number" value="99" name="condition" hidden></input>-->
		</label>
		<!--</div>-->
    	 <!--<div>-->
    	<br>
        <input type="radio" name="3" id="3B" value="B" />
        <label for="3B">B) 
    	<?php echo $array['opt2']; ?>
		</label>
    	<!--</div>-->
    	<!--<div>-->
    	<br>
        <input type="radio" name="3" id="3C" value="C" />
        <label for="3C">C)  			
		<?php echo $array['opt3']; ?>
		</label>
    	<!--</div>-->
    	<!--<div>-->
    	<br>
        <input type="radio" name="3" id="3D" value="D" />
        <label for="3D">D) 
    	<?php echo $array['opt4']; ?>
    	</label>
    	<input type="hidden" name="ans3" id="ans3" value=<?php echo $nos[2];?>>

    	<br>
    	<br>
		<?php $array=$n[$nos[3]];
    		  echo "Q.4)   ".$array['quest_text']." ";
    	?>
    	<br>
        <input class="rad" type="radio" name="4" id="4A" value="A" />
		<label for="4A">A) 
		<?php echo $array['opt1']; ?>
		<!--<input type="number" value="<?php echo $d+1;?>" name="quescount" hidden></input>
		<input type="number" value="99" name="condition" hidden></input>-->
		</label>
		<!--</div>-->
    	 <!--<div>-->
    	<br>
        <input type="radio" name="4" id="4B" value="B" />
        <label for="4B">B) 
    	<?php echo $array['opt2']; ?>
		</label>
    	<!--</div>-->
    	<!--<div>-->
    	<br>
        <input type="radio" name="4" id="4C" value="C" />
        <label for="4C">C)  			
		<?php echo $array['opt3']; ?>
		</label>
    	<!--</div>-->
    	<!--<div>-->
    	<br>
        <input type="radio" name="4" id="4D" value="D" />
        <label for="4D">D) 
    	<?php echo $array['opt4']; ?>
    	</label>
    	<input type="hidden" name="ans4" id="ans4" value=<?php echo $nos[3];?>>

    	<br>
    	<br>
		<?php $array=$n[$nos[4]];
    		  echo "Q.5)   ".$array['quest_text']." ";
    	?>
    	<br>
        <input class="rad" type="radio" name="5" id="5A" value="A" />
		<label for="5A">A) 
		<?php echo $array['opt1']; ?>
		<!--<input type="number" value="<?php echo $d+1;?>" name="quescount" hidden></input>
		<input type="number" value="99" name="condition" hidden></input>-->
		</label>
		<!--</div>-->
    	 <!--<div>-->
    	<br>
        <input type="radio" name="5" id="5B" value="B" />
        <label for="5B">B) 
    	<?php echo $array['opt2']; ?>
		</label>
    	<!--</div>-->
    	<!--<div>-->
    	<br>
        <input type="radio" name="5" id="5C" value="C" />
        <label for="5C">C)  			
		<?php echo $array['opt3']; ?>
		</label>
    	<!--</div>-->
    	<!--<div>-->
    	<br>
        <input type="radio" name="5" id="5D" value="D" />
        <label for="5D">D) 
    	<?php echo $array['opt4']; ?>
    	</label>
    	<input type="hidden" name="ans5" id="ans5" value=<?php echo $nos[5];?>>


    	<br>
    	<!--<input type="hidden" name="ans" id="ans" value=<?php echo $j;?>>--> 
    	<input name="but" type="hidden" value=<?php echo $_POST['but'];?>>
    	<input id="gobutton" type="submit" value="SUBMIT" class="btn" name="answer">

		</form>
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

	<?php
}
	?> 



    
