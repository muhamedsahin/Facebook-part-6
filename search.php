<?php 

	include("classes/autoload.php");

	$login = new Login();
	$user_data = $login->check_login($_SESSION['mybook_userid']);
	
	if(isset($_GET['find'])){

		$find = addslashes($_GET['find']);

		$sql = "select * from users where first_name like '%$find%' || last_name like '%$find%' limit 30";
		$DB = new Database();
		$results = $DB->read($sql);


	}
 
?>

<!DOCTYPE html>
	<html>
	<head>
		<title>People who like | Mybook</title>
	</head>

	<style type="text/css">
		
		#blue_bar{

			height: 50px;
			background-color: #405d9b;
			color: #d9dfeb;

		}

		#search_box{

			width: 400px;
			height: 20px;
			border-radius: 5px;
			border:none;
			padding: 4px;
			font-size: 14px;
			background-image: url(search.png);
			background-repeat: no-repeat;
			background-position: right;

		}

		#profile_pic{

			width: 150px;
			border-radius: 50%;
			border:solid 2px white;
		}

		#menu_buttons{

			width: 100px;
			display: inline-block;
			margin:2px;
		}

		#friends_img{

			width: 75px;
			float: left;
			margin:8px;

		}

		#friends_bar{

			min-height: 400px;
			margin-top: 20px;
			padding: 8px;
			text-align: center;
			font-size: 20px;
			color: #405d9b;
		}

		#friends{

		 	clear: both;
		 	font-size: 12px;
		 	font-weight: bold;
		 	color: #405d9b;
		}

		textarea{

			width: 100%;
			border:none;
			font-family: tahoma;
			font-size: 14px;
			height: 60px;

		}

		#post_button{

			float: right;
			background-color: #405d9b;
			border:none;
			color: white;
			padding: 4px;
			font-size: 14px;
			border-radius: 2px;
			width: 50px;
		}
 
 		#post_bar{

 			margin-top: 20px;
 			background-color: white;
 			padding: 10px;
 		}

 		#post{

 			padding: 4px;
 			font-size: 13px;
 			display: flex;
 			margin-bottom: 20px;
 		}

	</style>
<style>
body
{
    background: #f2f3f7;
    text-decoration:none;
}
#blue_bar
{
 background:  #292c358a;
    text-decoration: none;
    border-color:black;
    border:2px;
}
</style>
<style type="text/css">
body {
    margin: 0%;
    padding: 0%;
   
}

#blue_bar {
    padding: 0%;
    margin-top: -1.30%;
    height: 50px;
    width: 100%;
    
    color: #d9dfeb;

}

#search_box {

    width: 400px;
    height: 20px;
    border-radius: 5px;
    border: none;
    padding: 4px;
    font-size: 14px;
    background-image: url(search.png);
    background-repeat: no-repeat;
    background-position: right;

}

#profile_pic {

    width: 60px;
    border-radius: 50%;
    border: solid 2px white;
}

#menu_buttons {

    width: 100px;
    display: inline-block;
    margin: 2px;
}

#friends_img {

    width: 75px;
    float: left;
    margin: 8px;

}

#friends_bar {

    min-height: 400px;
    margin-top: 20px;
    padding: 8px;
    text-align: center;
    font-size: 20px;
    color: #405d9b;
}

#friends {

    clear: both;
    font-size: 12px;
    font-weight: bold;
    color: #405d9b;
}

textarea {

    width: 100%;
    border: none;
    font-family: tahoma;
    font-size: 14px;
    height: 60px;

}

#post_button {

    float: right;
    background-color: #405d9b;
    border: none;
    
    padding: 4px;
    font-size: 14px;
   
    cursor: pointer;
    
			width: 43%;
			height: 6%;
			border-radius: 50px;
			font-weight: bold;
			border:none;
			background-color: rgb(50, 108, 233);
			color: white;
}
#post_button:hover {

float: right;
background-color: #405d9b;
border: none;

padding: 4px;
font-size: 14px;

cursor: pointer;

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
#post_bar {

    margin-top: 20px;
    background-color: white;
    padding: 10px;
}

#post {

    padding: 4px;
    font-size: 13px;
    display: flex;
    margin-bottom: 20px;
}
b
{
    position: relative;
    display: inline-block;
    padding: 10px 30px;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 2px;
    color: #5a84a2;
    font-size: 18px;
    border-radius: 40px;
    box-shadow: -2px -2px 8px rgba(255, 255, 255, 1),
    -2px -2px 12px rgba(255, 255, 255, 0.5),
    inset 2px 2px 4px rgba(255, 255, 255, 0.1),
    2px 2px 8px rgba(0, 0, 0, 0.15);
}
b:hover
{
    box-shadow: inset -2px -2px 8px rgba(255, 255, 255, 1),
    inset -2px -2px 12px rgba(255, 255, 255, 0.5),
    inset 2px 2px 4px rgba(255, 255, 255, 0.1),
    inset 2px 2px 8px rgba(0, 0, 0, 0.15);  
}
b:hover span
{
    display: inline-block;
    transform: scale(0.98);
}
#search_boxx {

border-radius: 5px;
border: none;
padding: 0px;
font-size: 14px;
background-repeat: no-repeat;
background-position: right;

}
</style>
<link rel="stylesheet" type="text/css" href="post.css">
	<body style="font-family: tahoma;  background-color: #212529;color:white;">

		<br>
		<?php include("header.php"); ?>

		<!--cover area-->
		<div style="width: 800px;margin:auto;min-height: 400px;">
		 
			<!--below cover area-->
			<div style="display: flex;">	

				<!--posts area-->
 				<div style="min-height: 400px;flex:2.5;padding: 20px;padding-right: 0px;">
 					
 					<div style="    border-radius:20px 20px 20px 20px / 20px 20px 20px 20px;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);padding: 10px;background-color: #212529;">

  					 <?php 

  					 		$User = new User();
  					 		$image_class = new Image();

  					 		if(is_array($results)){

  					 			foreach ($results as $row) {
  					 				# code...
  					 				$FRIEND_ROW = $User->get_user($row['userid']);
 									
 									if($row['type'] == "profile"){
 										include("user.php");
 									}elseif($row['type'] == "group"){
 										include("group.inc.php");
 									}
 					 			}
  					 		}else{

  					 			echo "no results were found";
  					 		}

  					 ?>

  					 <br style="clear: both;">
 					</div>
  

 				</div>
			</div>

		</div>

	</body>
</html>