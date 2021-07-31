<?php 

	include("classes/connect.php");
	include("classes/signup.php");

	$first_name = "";
	$last_name = "";
	$gender = "";
	$email = "";

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{


		$signup = new Signup();
		$result = $signup->evaluate($_POST);
		
		if($result != "")
		{

			echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
			echo "<br>The following errors occured:<br><br>";
			echo $result;
			echo "</div>";
		}else
		{

			header("Location:" . ROOT ."login");
			die;
		}
 

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];

	}


	

?>

<html> 

	<head>
		
		<title>Mybook | Signup</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>


<link rel="stylesheet" href="signup.css">
<style>
body
		{
			background-color: rgb(50, 108, 233);
		}
		#bar{
			
			width:50%;
			height: 00%;
			background-color: rgb(50, 108, 233);
			color: #d9dfeb;
			margin-top: 0%;
			margin-bottom: 0%;
			margin-left: 0%;
			margin-right: 0%;
			padding-left: 0%;
			padding-top: 0%;
			padding-bottom: 0%;
			padding-right: 0%;
		}
        .yazı
		{
			padding-left: 10%;
			margin-top: -1%;
			margin-bottom: 0%;
			margin-left: 0%;
			margin-right: 0%;
			
			padding-top: 0%;
			padding-bottom: 0%;
			padding-right: 0%;
			color: #ffffff;
			font-size: 270%;
		}
		#signup_button{

			background-color: rgb(50, 108, 233);
			color: #ffffff;
			width: 12%;
			text-align: center;
			padding:4px;
			border-radius: 50px;
			float:right;
			border-style: solid;
			border-width: 1px;
			border-color: #ffffff;
			margin-right: 8%;
		}
        #signup_button:hover{

			background-color: rgb(255, 255, 255);
			color: rgb(50, 108, 233);
			width: 12%;
			text-align: center;
			padding:4px;
			border-radius: 50px;
			float:right;
			border-style: solid;
			border-width: 1px;
			border-color: #ffffff;
		}
		#bar2{

			background-color: white;
			width:50%;
			height: 112%;
			margin-top: 0%;
			margin-left: 674px;
			margin-right: 10%;
			padding-top: -7%;
			
			text-align: center;
			font-weight: bold;
          
			
		}
		#bar2 .yazı{

			background-color: rgba(255, 255, 255, 0);
			color: rgb(50, 108, 233);
			
		}
		#text{

			width: 43%;
			height: 6%;
			border-radius: 4px;
			border:solid 1px rgb(255, 255, 255);
			padding: 4px;
			font-size: 14px;
			color: rgb(50, 108, 233);
		}

		#button{

			width: 43%;
			height: 6%;
			border-radius: 50px;
			font-weight: bold;
			border:none;
			background-color: rgb(50, 108, 233);
			color: white;
		}
		#button:hover{

			background-color: rgb(255, 255, 255);
			color: rgb(50, 108, 233);
			width: 43%;
			height: 6%;
			text-align: center;
			border-radius: 50px;
			
			border-style: solid;
			border-width: 1px;
			border-color: rgb(50, 108, 233);
		}
        img
		{
			background-color: rgba(0, 255, 255, 0);
			
		}
		#bar .hello img{
			background-color: rgba(0, 255, 255, 0);
			width: 96%;
			
		}
		#bar .hello .f span{
			
			color: rgb(50, 108, 233);
			font-size: 360%;
			margin-left: 35%;
			
		}
		#bar .hello .f
		{
			background-color: rgb(255, 255, 255);
			height: auto;
			width: 11%;
			border-radius: 50%;
			margin-left: 0%;
			margin-right: 0%;
			margin-top: 0%;
			margin-bottom: 0%;
			padding: 0%;
		}
		#bar2 .mail input
		{
			background-color: rgba(255, 255, 255, 0);
			
		}
		#bar2 .mail input:hover
		{
			background-color: rgba(255, 255, 255, 0);
			border-color: rgb(50, 108, 233);
		}  
		.resim img
		{
			background-color: rgba(255, 255, 255, 0);
			width: 100%;
			padding: 0%;
			margin: 0%;
		} 
		@media only screen and (min-width: 150px) and (max-width: 1169px) {
			#bar2{
			    margin-top: 50%;
				margin-left: 0%;
				width:100%;
				height: 100%;
				margin-bottom: 0%;
				margin-right: 0%;
				padding: 0%;
				
			}
			#bar{
			    
				width:100%;
				height: 70%;
				margin-bottom: 0%;
				margin-right: 0%;
				padding: 0%;
				
			}
		}
		</style>
	<body style="font-family: tahoma;">
		
		<div id="bar">

		<div class="yazı">Mybook</div>
			<a href="login.php">
			<div id="signup_button">Log in</div>
			</a>
			<div class="hello">
				<div class="f">
			   <span>f</span>
</div>
			<img src="http://localhost/fesbook%20mf%C5%9F/hellomfs.png" alt="Örnek Resim"/>
		</div>
		<div class="resim">
			<img src="http://localhost/fesbook%20mf%C5%9F/mfsfacebook.png" alt="Örnek Resim"/>
</div>
		</div>
		

		<div id="bar2">
			
		<div class="yazı">Sign up to Mybook </diV>

			<form method="post" action="">

				<input value="<?php echo $first_name ?>" name="first_name" type="text" id="text" placeholder="First name"><br><br>
				<input value="<?php echo $last_name ?>" name="last_name" type="text" id="text" placeholder="Last name"><br><br>

				<span style="font-weight: normal;">Gender:</span><br>
				<select id="text" name="gender">
					
					<option><?php echo $gender ?></option>
					<option>Male</option>
					<option>Female</option>

				</select>
				<br><br>
				<input value="<?php echo $email ?>" name="email" type="text" id="text" placeholder="Email"><br><br>
				
				<input name="password" type="password" id="text" placeholder="Password"><br><br>
				<input name="password2" type="password" id="text" placeholder="Retype Password"><br><br>

				<input type="submit" id="button" value="Sign up">
				<br><br><br>

			</form>

		</div>

	</body>


</html>