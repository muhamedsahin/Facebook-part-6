<?php 

	include("classes/autoload.php");
	$image_class = new Image();

	$ERROR = "";

	$login = new Login();
	$user_data = $login->check_login($_SESSION['mybook_userid']);
 
 	$USER = $user_data;
 	
 	if(isset($URL[1]) && is_numeric($URL[1])){

	 	$profile = new Profile();
	 	$profile_data = $profile->get_profile($URL[1]);

	 	if(is_array($profile_data)){
	 		$user_data = $profile_data[0];
	 	}

 	}
	 
	$msg_class = new Messages();

  	//new message//check if thread already exists
  	if(isset($URL[1]) && $URL[1] == "new"){

  		$old_thread = $msg_class->read($URL[2]);
  		if(is_array($old_thread)){

  			//redirect the user
  			header("Location: ".ROOT."messages/read/". $URL[2]);
			die;
  		}
  	}

	//if a message was posted
	if($ERROR == "" && $_SERVER['REQUEST_METHOD'] == "POST"){
 
		$user_class = new User();
		if(is_array($user_class->get_user($URL[2]))){

			$ERROR = $msg_class->send($_POST,$_FILES,$URL[2]);

			header("Location: ".ROOT."messages/read/". $URL[2]);
			die;
		}else{
			$ERROR = "The requested user could not be found!";
		}

		
	}

?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Messages | Mybook</title>
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

 		#message_left{

 			padding: 4px;
 			font-size: 13px;
 			display: flex;
 			margin: 8px;
 			width: 60%;
 			float: left;
 			border-radius: 10px;
 		}

 		#message_right{

 			padding: 4px;
 			font-size: 13px;
 			display: flex;
 			margin: 8px;
 			width: 60%;
 			float: right;
 			border-radius: 10px;
 			
 		}

 		#message_thread{

 			padding: 4px;
 			font-size: 13px;
 			display: flex;
 			margin: 8px;
   			border-radius: 10px;
			   background:  #292c358a;
 		}

	</style>
<style type="text/css">
body {
    margin: 0%;
    padding: 0%;
}

#blue_bar {
    padding: 0%;
    margin-top: -1.50%;
    height: 50px;
    width: 100%;
    background-color: #405d9b;
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

    width: 150px;
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
    color: white;
    padding: 4px;
    font-size: 14px;
    border-radius: 2px;
    width: 50px;
    cursor: pointer;
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
</style>
<style>
body
{
    background-color: #222324;
}
#blue_bar
{
    background-color: #222324;
    background-color: rgb(48, 45, 45);
}
</style>
<style>
body
{
    background: rgb(50, 108, 233);
    text-decoration:none;
}
#blue_bar
{
    
    background-color: #222324;
    background-color: rgb(255, 255, 255);
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

    width: 150px;
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
    color: white;
    padding: 4px;
    font-size: 14px;
    border-radius: 2px;
    width: 50px;
    cursor: pointer;
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
</style>
<style>
body
{
    background-color: #212529;
    text-decoration:none;
}
#blue_bar
{
	background:  #292c358a;
    text-decoration: none;
    border-color:black;
    border:2px;
}
#message_thread
{
	
	background:  #292c358a;
}
.basbe
{
	box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
}
.basbe:hover
{
	box-shadow: inset 0px 1px 5px 3px rgba(0,0,0,0.12);
}
#search_boxx {

border-radius: 5px;
border: none;
padding: 0px;
font-size: 14px;
background-repeat: no-repeat;
background-position: right;

}
#post_button
{
	background-color: rgb(255, 255, 255);
			color: rgb(50, 108, 233);
			border-radius: 50px;
}
.youbar
{
	display:flex;
	width: 30px;
	
}
</style>

	<body style="font-family: tahoma; text-decoration:none;">

		<br>
		<?php include("header.php"); ?>

    <div class="youbar">
</div>


		<!--cover area-->
		<div style="width: 800px;margin:auto;min-height: 400px;">
		 
			<!--below cover area-->
			<div style="display: flex;">	

				<!--posts area-->
 				<div style="min-height: 400px;flex:2.5;padding: 20px;padding-right: 0px;">
 					
 					<div style="  margin-top: 20px; margin-bottom: 20px; text-decoration: none;background:  #292c358a;border-radius:20px 20px 20px 20px / 20px 20px 20px 20px;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12); background-color:#292c358a; color:white;">

  						<form method="post" style='    text-align:center;' enctype="multipart/form-data">
 							
  								<?php

 									if($ERROR != ""){

								 		echo $ERROR;
								 	}else{

								 		if(isset($URL[1]) && $URL[1] == "read"){

 								 			echo "Chatting with:<br><br>";
	  										if(isset($URL[2]) && is_numeric($URL[2])){
								 			
 								 				$data = $msg_class->read($URL[2]);
	  											
	  											$user = new User();
		 										$FRIEND_ROW = $user->get_user($URL[2]);

		 										include "user.php";

		 										echo "<a href='".ROOT."messages'>";
		 										echo '<input id="post_button" type="button" style="width:auto;cursor:pointer;margin:4px;" value="All Messages">';
		 										echo "</a>";

		 										if(is_array($data)){
			 										echo "<a href='".ROOT."delete/thread/". $data[0]['msgid'] ."'>";
			 										echo '<input id="post_button" type="button" style="width:auto;cursor:pointer;margin:4px;" value="Delete Thread">';
			 										echo "</a>";
			 									}


		 										echo '
 		 										<div>';
 		 											$user = new User();

 		 											if(is_array($data)){
	 		 											foreach ($data as $MESSAGE) {
	 		 												# code...
	  		 												//show($MESSAGE);
			 												$ROW_USER = $user->get_user($MESSAGE['sender']);

			 												if(i_own_content($MESSAGE)){
	 		 													include "message_right.php";
	 		 												}else{

	  		 													include "message_left.php";
			 												}
	 		 											}
 		 											}

		 										echo '
		 										</div>';

		 										echo '
		 										<div style=" padding: 10px;background:  #292c358a;">

 								 						<textarea name="message" style="outline:0;background:  #292c358a;border-radius:10px;color:white;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);" placeholder="Write your message here"></textarea>
								 						<input type="file" name="file" >
								 						<input id="post_button" type="submit" value="Send">
								 						<br>
 							 						
							 					</div>

							 					';

	  										}else{

	  											echo "That user could not be found<br><br>";
	  										}

								 		}else
								 		if(isset($URL[1]) && $URL[1] == "new"){

	  										echo "Start New Message with:<br><br>";
	  										if(isset($URL[2]) && is_numeric($URL[2])){
	  											
	  											$user = new User();
		 										$FRIEND_ROW = $user->get_user($URL[2]);

		 										include "user.php";

		 										echo '
		 										<div style=" padding: 10px;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12); background-color:#292c358a; color:white;">

 								 						<textarea name="message" placeholder="Write your message here"></textarea>
								 						<input type="file" name="file" >
 								 						<input id="post_button" type="submit" value="Send">
								 						<br>
 							 						
							 					</div>

							 					';

	  										}else{

	  											echo "That user could not be found<br><br>";
	  										}
	  										

								 		}else{

	  										echo "Messages<br><br>";
		  									$data = $msg_class->read_threads();
		  									$user = new User();
		  									$me = esc($_SESSION['mybook_userid']);

		  									if(is_array($data)){
			  									foreach ($data as $MESSAGE) {
			  										# code...
			  										$myid = ($MESSAGE['sender'] == $me) ? $MESSAGE['receiver'] : $MESSAGE['sender'];

			 										$ROW_USER = $user->get_user($myid);

			  										include("thread.php");
			  									}
		  									}else{
		  										echo "You have no messages!";
		  									}

		  									echo "<br style='clear:both;'>";
								 		}

										
 									}
 								?>
  							
	 						
	 						<br>
 						</form>
 					</div>
  

 				</div>
			</div>

		</div>

	</body>
</html>