<?php

	include("classes/autoload.php");

	$login = new Login();
	$_SESSION['mybook_userid'] = isset($_SESSION['mybook_userid']) ? $_SESSION['mybook_userid'] : 0;
	
	$user_data = $login->check_login($_SESSION['mybook_userid'],false);
 
 	$USER = $user_data;
 	
 	if(isset($URL[1]) && is_numeric($URL[1])){

	 	$profile = new Profile();
	 	$profile_data = $profile->get_profile($URL[1]);

	 	if(is_array($profile_data)){
	 		$user_data = $profile_data[0];
	 	}

 	}
 	
	//posting starts here
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		include("change_image.php");
		
		if(isset($_POST['first_name'])){

			$settings_class = new Settings();
			$settings_class->save_settings($_POST,$_SESSION['mybook_userid']);

		}elseif(isset($_POST['post'])){

			$post = new Post();
			$id = $_SESSION['mybook_userid'];
			$result = $post->create_post($id, $_POST,$_FILES);
			
			if($result == "")
			{
				header("Location: " . ROOT . "profile");
				die;
			}else
			{

				echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
				echo "<br>The following errors occured:<br><br>";
				echo $result;
				echo "</div>";
			}
		}
			
	}

	//collect posts
	$post = new Post();
	$id = $user_data['userid'];
	
	$posts = $post->get_posts($id);

	//collect friends
	$user = new User();
 	
	$friends = $user->get_following($user_data['userid'],"user");

	$image_class = new Image();

	//check if this is from a notification
	if(isset($URL[2])){
		notification_seen($URL[2]);
	}

?>


<!DOCTYPE html>
	<html>
	<head>
		<title>Mfsbook | <?php echo $user_data['first_name'] . " " . $user_data['last_name']  ?></title>
		















		<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "a7face62-6e1a-44ef-9115-bb78eecbcd1a",
    });
  });
</script>










	<style type="text/css">
	
</style>


<link rel="stylesheet" type="text/css" href="profile.css">

<link rel="stylesheet" type="text/css" href="post.css">
<link rel="stylesheet" href="/facebook-mfs/profil.css">

</head>
<body translate="no" class="arka" style="background-color: #212529; text-decoration: none;outline: 0;">

    

  

	<div style="width: 100%;" class="container">
        
       

		<br>
	<style>
	#search_boxx {

border-radius: 5px;
border: none;
padding: 0px;
font-size: 14px;
background-repeat: no-repeat;
background-position: right;

}
.file
{
    color:white;
    background:  #292c358a;
    box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
    border-radius:30px;
}
#pırofil
{
	width: 2000px;
}
#post_bar
{
	backdrop-filter: blur(5px) saturate(180%);
    -webkit-backdrop-filter: blur(5px) saturate(180%);
	box-shadow: -3px -3px 10px rgb(255 255 255 / 5%), 3px 3px 15px rgb(0 0 0 / 50%);
}
	</style>












		<?php  include("header.php"); ?>
 
 		<!--change profile image area-->
 		<div id="change_profile_image" style="display:none;position:absolute;width: 100%;height: 100%;background-color: #000000aa;position: fixed;" >
 			
			 <div style="max-width:600px;margin:auto;min-height: 400px;flex:2.5;padding: 20px;padding-right: 0px; " class="form">
 					<form method="post" action="<?=ROOT?>profile/profile" enctype="multipart/form-data">
					 <div style="border:solid thin #aaa; padding: 10px;background-color: white;">

	 						<input type="file" name="file"><br>
	 						<input id="post_button" type="submit" class="dosyasec" value="Change">
	 						<br>
							<div style="text-align: center; ">
								<br><br>
							<?php

								echo "<img style='width: 500px;' src='" . ROOT . "$user_data[profile_image]' class='pırofil' >";
  
	 						?>
							</div>
	 					</div>
  					</form>

 				</div>
 		</div>
		
		<!--change cover image area-->
 		<div id="change_cover_image" style="display:none;position:absolute;width: 100%;height: 100%;background-color: #000000aa;">
 			<div style="max-width:600px;margin:auto;min-height: 400px;flex:2.5;padding: 20px;padding-right: 0px;">
 					
 					<form method="post" action="<?=ROOT?>profile/cover" style=" align-items: center;text-align: center;" enctype="multipart/form-data">
	 					<div style="border:solid thin #aaa; padding: 10px;background-color: white;">

	 						<input type="file"  name="file"><br>
	 						<input id="post_button" type="submit" style="width:120px;" value="Change">
	 						<br>
							<div style=" text-align: center;">
								<br><br>
							<?php

 	 							echo "<img src='" . ROOT . "$user_data[cover_image]' style='max-width:500px;' >";
								 
	 						?>
							</div>
	 					</div>
  					</form>

 				</div>
 		</div>

		<!--cover area-->
	
		<div style="width: 950px;margin:auto;min-height: 600px; margin-top: 0.00%;">
		
			 
		
			<div style="width: 100%; background-color: #405d9b00;text-align: center;color: #405d9b">
			
			
					<?php 

						$image = "images/cover_image.jpg";
						if(file_exists($user_data['cover_image']))
						{
							$image = $image_class->get_thumb_cover($user_data['cover_image']);
						}
						
					?>
         
		 
				<img src="<?php echo ROOT . $image ?>" style="border-radius:
0% 0% 20px 20px / 0% 0% 20px 20px; width:100%;height: 350px;   -webkit-box-reflect: 0px -webkit gradientinin altında (doğrusal, sol üst, sol alt, (saydam), ila (rgba (250, 250, 250, 0.1)));">


				<span style="font-size: 12px;">
					<?php 

						$image = "images/user_male.jpg";
						if($user_data['gender'] == "Female")
						{
							$image = "images/user_female.jpg";
						}
						if(file_exists($user_data['profile_image']))
						{
							$image = $image_class->get_thumb_profile($user_data['profile_image']);
						}
					?>
 
                
					<img style="border-radius: 100px;
    " id="profile_pic" src="<?php echo ROOT . $image ?>"><br/>
					
					<?php if(i_own_content($user_data)):?>
					
						<a onclick="show_change_profile_image(event)" class="profiler" href="<?=ROOT?>change_profile_image/profile"><i data-visualcompletion="css-img" class="hu5pjgll lzf7d6o1" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yc/r/ORTZm91dBky.png&quot;); background-position: 0px -246px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i></a>  
						<div class="mert"><a onclick="show_change_cover_image(event)" class="arkapilann" style="text-decoration: none; color:white;" href="<?=ROOT?>change_profile_image/cover">Arka pilanı degiştir</a></m>
					
					<?php endif; ?>

				</span>
			


				<br>
					<div style="font-size: 20px;color:text-decoration:none; black; color:white;">
						<a href="<?=ROOT?>profile/<?php echo $user_data['userid'] ?>"style="text-decoration:none;color:rgb(50, 108, 233);">
						<div style="color:white;">	
						<?php echo  $user_data['first_name'] . " " . $user_data['last_name']  ?>
							<br><span  style="font-size:12px;">@<?=$user_data['tag_name']?></span>
					</div>
						</a>

						<?php 
							$mylikes = "";
							if($user_data['likes'] > 0){

								$mylikes = "(" . $user_data['likes'] . " Followers)";
							}
						?>
						<br>

						<a href="<?=ROOT?>like/user/<?php echo $user_data['userid'] ?>">
							<input id="post_button" type="button" value="Follow <?php echo $mylikes ?>" style="margin-right:10px;width:auto;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);">
						</a>
                       
						<?php if($user_data['userid'] == $_SESSION['mybook_userid']): ?>
							<a href="<?=ROOT?>messages">
								<input id="post_button" type="button" value="Messages" style="margin-right:10px;width:auto;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);">
							</a>
							
						<?php else: ?>
							<a href="<?=ROOT?>messages/new/<?=$user_data['userid']?>">
							
								<input id="post_button" type="button" value="Message"  style=" margin-right:10px;background-color: #326ce9;width:auto;">
							
							</a>
							
						<?php endif; ?>
 						

					</div>
					
				<br>
				<br>

               <div class="menü">
				<a href="<?=ROOT?>home"><div id="menu_buttons"style="text-decoration: none;color:white;">Timeline</div></a>
				<a href="<?=ROOT?>profile/<?php echo $user_data['userid'] ?>/about"><div id="menu_buttons"style="text-decoration: none;color:white;">About</div></a>
				<a href="<?=ROOT?>profile/<?php echo $user_data['userid'] ?>/followers"><div id="menu_buttons" style="text-decoration: none;color:white;">Followers</div></a>
				<a href="<?=ROOT?>profile/<?php echo $user_data['userid'] ?>/following"><div id="menu_buttons"style="text-decoration: none;color:white;">Following</div></a>
				<a href="<?=ROOT?>profile/<?php echo $user_data['userid'] ?>/photos"><div id="menu_buttons"style="text-decoration: none;color:white;">Photos</div></a>
				
				<?php 
					if($user_data['userid'] == $_SESSION['mybook_userid']){
						
						echo '<a href="'.ROOT. 'profile/'.$user_data['userid'].'/groups"><div id="menu_buttons"style="text-decoration: none;color:white;">Groups</div></a>';
						echo '<a href="'.ROOT. 'profile/'.$user_data['userid'].'/settings"><div id="menu_buttons"style="text-decoration: none;color:white;">Settings</div></a>';
					}
				?>
			</div>
</div></div>
			<!--below cover area-->
	 
	 		<?php 

	 			$section = "default";

	 			if(isset($URL[2])){

	 				$section = $URL[2];
	 			}

	 			if($section == "default"){

	 				include("profile_content_default.php");
	 			 
	 			}elseif($section == "following"){
	 				
	 				include("profile_content_following.php");

	 			}elseif($section == "followers"){

	 				include("profile_content_followers.php");

	 			}elseif($section == "about"){

	 				include("profile_content_about.php");

	 			}elseif($section == "settings"){

	 				include("profile_content_settings.php");

	 			}elseif($section == "photos"){

	 				include("profile_content_photos.php");
	 			}elseif($section == "groups"){

	 				include("profile_content_groups.php");
	 			}



	 		?>

		</div>
		<script>
		
const modeB = new Pineapple()

modeB.ModeButton({brightColor:'#fffff9',darkColor:'#242426'})
		</script>
		<script type="text/javascript">
	
	function show_change_profile_image(event){

		event.preventDefault();
		var profile_image = document.getElementById("change_profile_image");
		profile_image.style.display = "block";
	}


	function hide_change_profile_image(){

		var profile_image = document.getElementById("change_profile_image");
		profile_image.style.display = "none";
	}

	
	function show_change_cover_image(event){

		event.preventDefault();
		var cover_image = document.getElementById("change_cover_image");
		cover_image.style.display = "block";
	}


	function hide_change_cover_image(){

		var cover_image = document.getElementById("change_cover_image");
		cover_image.style.display = "none";
	}


	window.onkeydown = function(key){

		if(key.keyCode == 27){

			//esc key was pressed
			hide_change_profile_image();
			hide_change_cover_image();
		}
	}

	
</script>
	</body>
</html>

