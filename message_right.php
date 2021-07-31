
	<div id="message_right" style="box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12); background-color:#292c358a; color:white;text-decoration:none;">

		<div style="width: 100%; text-align: right;">
			<div style="font-weight: bold;color: #405d9b;width: 100%;">
				<?php 
					echo "<a style='text-decoration:none; color:white;' href='".ROOT."profile/$MESSAGE[msgid]'>";
					echo htmlspecialchars($ROW_USER['first_name']) . " " . htmlspecialchars($ROW_USER['last_name']); 
					echo "</a>";

				 
				?>
			</div>
			
			<body>
			
</body>			
			<?php echo check_tags($MESSAGE['message']) ?>
  
			<?php 

				if(file_exists($MESSAGE['file']))
				{

					$post_image = ROOT . $image_class->get_thumb_post($MESSAGE['file']);

					echo "<img src='$post_image' style='width:80%;' />";
				}
				
			?>

		<br/><br/>
		 
		<span style="color: #999;">
			
			<?php echo Time::get_time($MESSAGE['date']) ?>

		</span>

		<?php 

			if(file_exists($MESSAGE['file'])){

				echo "<a  href='".ROOT."image_view/msg/$MESSAGE[id]' >";
				echo ". View Full Image . ";
				echo "</a>";
			}
		?>

		<span style="color: #999;float:left">
			
			<?php 

				$post = new Post();
 
 					echo "<a style='text-decoration:none; color:white;' href='".ROOT."delete/msg/$MESSAGE[id]' >";
		 				echo '<svg fill="orange" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>';
					echo "</a>";
  
			 ?>

		</span>
 
		</div>
		<!--a label-->
		<div>
		
			<?php 

				$image = "images/user_male.jpg";
				if($ROW_USER['gender'] == "Female")
				{
					$image = "images/user_female.jpg";
				}

				if(file_exists($ROW_USER['profile_image']))
				{
					$image = $image_class->get_thumb_profile($ROW_USER['profile_image']);
				}
  
			?>

			<img src="<?php echo ROOT . $image ?>" style="width: 75px;margin-right: 4px;border-radius: 50%;">
		</div>
	</div>