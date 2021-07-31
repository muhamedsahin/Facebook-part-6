
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
  #tak
  {
	min-height: 400px;width:100%;background:  #292c358a;text-align: center; border-radius:20px 20px 0% 0% / 20px 20px 0% 0%;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
  }
  #y
  {
	padding: 20px; color:white;
	font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-size: 22px;
  }
  </style>
<div id="tak">
	<div id="y">
	<?php
 
		$image_class = new Image();
		$post_class = new Post();
		$user_class = new User();

		$following = $user_class->get_following($user_data['userid'],"user");

		if(is_array($following)){

			foreach ($following as $follower) {
				# code...
				$FRIEND_ROW = $user_class->get_user($follower['userid']);
				include("user.php");
			}

		}else{

			echo "This user inst following anyone!";
		}


	?>

	</div>
</div>