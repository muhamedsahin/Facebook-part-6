
<div id="friends" style="display: inline-block;vertical-align: top; width: 200px; background:  #292c358a;border-radius:20px 20px 20px 20px / 20px 20px 20px 20px;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);">
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

	<a href="<?=ROOT?>profile/<?php echo $FRIEND_ROW['userid']; ?>">
 		<img style="border-radius:20px 20px 20px 20px / 20px 20px 20px 20px;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);" id="friends_img" src="<?php echo ROOT . $image ?>">
		<br style='border-radius:20px 20px 20px 20px / 20px 20px 20px 20px;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);'>
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
		<span style="color: grey;font-size: 11px;font-weight: normal;"><?php echo $online ?></span>
 		 <br>
		<span style="display: inline-block;margin: 6px;"><?=$member['role']?></span>
		
		<?php if(group_access($_SESSION['mybook_userid'],$group_data,'admin')):?>
			<br style="clear: both;">
			<a href="<?=ROOT?>group/<?=$group_data['userid']?>/members?remove=<?=$FRIEND_ROW['userid']?>">
				<input id="post_button" type="button" value="Remove" style="font-size:11px;margin-right:10px;width:auto;border-radius:20px 20px 20px 20px / 20px 20px 20px 20px;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);">
			</a>
			<a href="<?=ROOT?>group/<?=$group_data['userid']?>/members?edit_access=<?=$FRIEND_ROW['userid']?>">
				<input id="post_button" type="button" value="Edit Access" style="font-size:11px;margin-right:10px;width:auto;border-radius:20px 20px 20px 20px / 20px 20px 20px 20px;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);">
			</a>
	 	<?php endif;?>
 	</a>
</div>