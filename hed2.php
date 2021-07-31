<!--top bar-->
<?php 

	$corner_image = "images/user_male.jpg";
	if(isset($USER)){
		
		if(file_exists($USER['profile_image']))
		{
			$image_class = new Image();
			$corner_image = $image_class->get_thumb_profile($USER['profile_image']);
		}else{

			if($USER['gender'] == "Female"){

				$corner_image = "images/user_female.jpg";
			}
		}
	}
?>

<img style="width:3%;margin-top:0.50%;margin-left:1.40%;" src="http://localhost/facebook-mfs/facebookicon.svg"/>
<div id="blue_bar" style="margin-top:-3.80%;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);  height: 55px;">

	<form method="get" action="<?=ROOT?>search">
		<div style="width: 800px;margin:auto;font-size: 30px;">
			
			<a href="<?=ROOT?>home" class="mybook" style=" color:white;text-decoration: none;">Mybook</a> 
			&nbsp &nbsp <input type="text" id="search_box" name="find" placeholder="Search for people" />

			<?php if(isset($USER)): ?>
				<a href="<?=ROOT?>profile">
				<img src="<?php echo ROOT . $corner_image ?>" style="border-radius:50px; width: 50px;float: right;">
				</a>
				<a href="<?=ROOT?>logout">
				<span style="font-size:11px;float: right;margin:10px;color:white;">Logout</span>
				</a>

				<a style="		text-decoration: none;" href="<?=ROOT?>notifications">
				<span style="display: inline-block;position: relative;		text-decoration: none;">
					
					<svg fill="white" style="width:25px;float:right;margin-top: 10px;		text-decoration: none;" width="25" height="25" viewBox="0 0 24 24"><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"></path></svg>
					<?php 
						$notif = check_notifications();
					?>
					<?php if($notif > 0): ?>
						<div style="color: white;background-color:red;position: absolute;right:4px;
						width:20px;height: 20px;border-radius: 50%;padding: 4px;text-align:center;font-size: 18px; padding: 0%; margin:0%;"><?= $notif ?></div>
					
					<?php endif; ?>
				</span>
				</a>

				<a href="<?=ROOT?>messages">
				<span style="display: inline-block;position: relative;margin-left: 10px;">
 					<svg fill="white" style="float:right;margin-top: 10px" width="25" height="25" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.971l-11.986 9.713zm-5.425-1.822l-6.575-5.329v12.501l6.575-7.172zm10.85 0l6.575 7.172v-12.501l-6.575 5.329zm-1.557 1.261l-3.868 3.135-3.868-3.135-8.11 8.848h23.956l-8.11-8.848z"/></svg>
					<?php 
						$notif = check_messages();
					?>
					<?php if($notif > 0): ?>
						<div style="background-color: red;color: white;position: absolute;right:-15px;
						width:15px;height: 15px;border-radius: 50%;padding: 4px;text-align:center;font-size: 14px;"><?= $notif ?></div>
					<?php endif; ?>
				</span>
				</a>

				

			<?php else: ?>
				<a href="<?=ROOT?>login">
				<span style="font-size:13px;float: right;margin:10px;color:white;">Login</span>
				</a>
			<?php endif; ?>


		</div>
	</form>
</div>