
  <style>
 ::-webkit-scrollbar {
    width: 7px;
    height: 10px;
  }
  
  /* Track */
  ::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px #ffffff00;
    border-radius: 10px;
  }
  
  /* Handle */
  ::-webkit-scrollbar-thumb {
          background:linear-gradient(
45deg,
#06dee1,
#79ff6c

    );
    border-radius: 10px;
  }
  </style>
<div style="min-height: 400px;width:100%;text-align: center;border-radius:20px 20px 0% 0% / 20px 20px 0% 0%;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);">

	<br>
	<a href="<?=ROOT?>create_group">
		<input id="post_button" type="button" value="Create Group" style="float:none;margin-right:10px;background-color: #1b9186;width:auto;">
	</a>

	<div style="padding: 20px;">
	<?php
 
		$image_class = new Image();
		$group_class = new Group();
		$user_class = new User();

		$groups = $group_class->get_my_groups($user_data['userid']);

		if(is_array($groups)){

			foreach ($groups as $group) {
				# code...
				$FRIEND_ROW = $user_class->get_user($group['userid']);
				include("group.inc.php");
			}

		}else{

			echo "No groups were found!";
		}


	?>

	</div>
</div>