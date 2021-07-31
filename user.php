
<div id="friends" style="display: inline-block; width: 200px;background:  #292c358a; color:white; text-decoration: none;border-radius:20px 20px 20px 20px / 20px 20px 20px 20px;box-shadow: -3px -3px 10px rgb(255 255 255 / 5%), 3px 3px 15px rgb(0 0 0 / 50%);">
	<?php 

		$image = "images/user_male.jpg";
		if($FRIEND_ROW['gender'] == "Female")
		{
			$image = "images/user_female.jpg";
		}

		if(file_exists($FRIEND_ROW['profile_image']))
		{
			$image = $image_class->get_thumb_profile($FRIEND_ROW['profile_image']);
		}
 

	?>

	<a style="color:white; text-decoration: none; 20px;" href="<?=ROOT?><?php echo $FRIEND_ROW['type']; ?>/<?php echo $FRIEND_ROW['userid']; ?>">
 		<img style="color:white; text-decoration: none;border-radius:20px 20px 20px 20px / 20px 20px 20px 20px;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);" id="friends_img" src="<?php echo ROOT . $image ?>">
		<br>
		<?php echo $FRIEND_ROW['first_name'] . " " . $FRIEND_ROW['last_name'] ?>
		<br>

		<?php 

			$online = "Last seen: <br> Unknown";
			if($FRIEND_ROW['online'] > 0){
				$online = $FRIEND_ROW['online'];

				$current_time = time();
				$threshold = 60 * 2;//2 minutes

				if(($current_time - $online) < $threshold){
					$online = "<span style='color:green;'>Online</span>";
				}else{
					$online = "Last seen: <br>" . Time::get_time(date("Y-m-d H:i:s",$online));
				}
			}
		?>
		<br>
		<span style="color: grey;font-size: 11px;font-weight: normal;"><?php echo $online ?></span>
 	</a>
</div>