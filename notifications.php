<?php 

	include("classes/autoload.php");

	$login = new Login();
	$user_data = $login->check_login($_SESSION['mybook_userid']);
 
 	$USER = $user_data;
 	
 	if(isset($_GET['id']) && is_numeric($_GET['id'])){

	 	$profile = new Profile();
	 	$profile_data = $profile->get_profile($_GET['id']);

	 	if(is_array($profile_data)){
	 		$user_data = $profile_data[0];
	 	}

 	}
	
	$Post = new Post();
	$User = new User();
 	$image_class = new Image();

?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Notifications | Mybook</title>
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

 		#notification{

 			height: 40px;
 			background-color: #eee;
 			color:#666;
 			border: 1px solid #aaa;
 			margin: 6px;
 			
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
	background: rgb(50, 108, 233);
	text-decoration:none;
}
#blue_bar
{
    background-color: #222324;
    background-color: rgb(255, 255, 255);
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
#search_boxx {

border-radius: 5px;
border: none;
padding: 0px;
font-size: 14px;
background-repeat: no-repeat;
background-position: right;

}
</style>
	<body style="font-family: tahoma; ">

		<br>
		<?php include("header.php"); ?>

		<!--cover area-->
		<div style="width: 800px;margin:auto;min-height: 400px;">
		 
			<!--below cover area-->
			<div style="display: flex;">	

				<!--posts area-->
 				<div style="min-height: 400px;flex:2.5;padding: 20px;padding-right: 0px;">
 					
 					<div style=" padding: 10px; background:  #292c358a;border-radius:20px 20px 20px 20px / 20px 20px 20px 20px;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);">

 						<?php 

 							$DB = new Database();
 							$id = esc($_SESSION['mybook_userid']);
 							$follow = array();

 							//check content i follow
 							$sql = "select * from content_i_follow where disabled = 0 && userid = '$id' limit 100";
 							$i_follow = $DB->read($sql);
 							if(is_array($i_follow)){
 								$follow = array_column($i_follow, "contentid");
 							}

 							if(count($follow) > 0){

 								$str = "'" . implode("','", $follow) . "'";
   								$query = "select * from notifications where (userid != '$id' && content_owner = '$id') || (contentid in ($str)) order by id desc limit 30";
 							}else{

  								$query = "select * from notifications where userid != '$id' && content_owner = '$id' order by id desc limit 30";
 							}
 
 							$data = $DB->read($query);
 						?>

 						<?php if(is_array($data)): ?>

 							<?php foreach ($data as $notif_row): 
 							 
 							 	include("single_notification.php");
  					 		 endforeach; ?>
  					 	<?php else: ?>
  					 			No notifications were found
  					 	<?php endif; ?>

 					</div>
  

 				</div>
			</div>

		</div>

	</body>
</html>