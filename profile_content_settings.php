
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
<div style="min-height: 400px;width:100%;background:  #292c358a;text-align: center;">
	<div style="padding: 20px;max-width:350px;display: inline-block;">
	<center>
		<form method="post" enctype="multipart/form-data">



	
  						
			<?php
		 
				$settings_class = new Settings();

				$settings = $settings_class->get_settings($_SESSION['mybook_userid']);

				if(is_array($settings)){

					echo "<input type='text' id='textbox' name='first_name' value='".htmlspecialchars($settings['first_name'])."' placeholder='First name' />";
					echo "<input type='text' id='textbox' name='last_name' value='".htmlspecialchars($settings['last_name'])."' placeholder='Last name' />";

					echo "<select id='alma'  name='email' style='height:30px;'>

							<option>".htmlspecialchars($settings['gender'])."</option>
							<option >Male</option>
							<option >Female</option>
						</select>";

					echo "<input type='text' id='textbox' name='email'  value='".htmlspecialchars($settings['email'])."' placeholder='Email'/>";
					echo "<input type='password' id='textbox' name='password'  value='".htmlspecialchars($settings['password'])."' placeholder='Password'/>";
					echo "<input type='password' id='textbox' name='password2'  value='".htmlspecialchars($settings['password'])."' placeholder='Password'/>";
					
					echo "<br>About me:<br>
							<textarea id='textbox' style='height:200px;' name='about'>".htmlspecialchars($settings['about'])."</textarea>
						";

					echo '<input id="post_button" type="submit" value="Save">';
				}
				
			?>
		</form>
		</center>
	</div>
</div>