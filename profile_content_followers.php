
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
  #takip
  {
	min-height: 400px;width:100%;background:  #292c358a;text-align: center; border-radius:20px 20px 0% 0% / 20px 20px 0% 0%;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
  }
  </style>
<div id="takip">
	<div style="padding: 20px;border-radius:20px 20px 0% 0% / 20px 20px 0% 0%;">
	<?php
 
		$image_class = new Image();
		$post_class = new Post();
		$user_class = new User();

		$followers = $post_class->get_likes($user_data['userid'],"user");

		if(is_array($followers)){

			foreach ($followers as $follower) {
				# code...
				$FRIEND_ROW = $user_class->get_user($follower['userid']);
				include("user.php");
			}

		}else{

			echo "No followers were found!";
		}


	?>

	</div>
</div>