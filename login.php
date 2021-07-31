<?php 

session_start();

	include("classes/connect.php");
	include("classes/login.php");
 
	$email = "";
	$password = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{


		$login = new Login();
		$result = $login->evaluate($_POST);
		
		if($result != "")
		{

			echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
			echo "<br>The following errors occured:<br><br>";
			echo $result;
			echo "</div>";
		}else
		{

			header("Location: ".ROOT."profile");
			die;
		}
 

		$email = $_POST['email'];
		$password = $_POST['password'];
		

	}
	



	
?>













<html> 

	<head>
		
		<title>MFŞ BOOK</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<link rel="stylesheet" href="login.css">
	
		

	

	<body style="font-family: tahoma;background-color: rgb(50, 108, 233);">

			 
	
 
	<div id="bar2">
			
			<form method="post">
				<div class="yazı">
				Log in to Mybook
</div>
				<br><br>
                 <div class="mail">
				<input name="email" value="" type="text" id="text" placeholder="Email" name="form"><br><br>
</div>
				<input name="password" style="" value="" type="password" name="remember-me" id="text" placeholder="Password"><br><br>

				<input type="submit" id="button" value="Log in">
				<br><br><br>

			</form>
		</div>
	

	</body>


</html>