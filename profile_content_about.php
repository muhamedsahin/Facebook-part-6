<link rel="stylesheet" type="text/css" href="post.css">
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
  br
  {
	  color:white;
  }
  </style>
  	<link rel="stylesheet" type="text/css" href="post.css">
	<div style="min-height: 400px;width:100%;background:  #292c358a;border-radius:20px 20px 0% 0% / 20px 20px 0% 0%;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
text-align: center;">
	<div style="padding: 20px;max-width:350px;display: inline-block;">
		<form method="post" enctype="multipart/form-data">

  						
			<?php
		 
				$settings_class = new Settings();

				$settings = $settings_class->get_settings($_SESSION['mybook_userid']);

				if(is_array($settings)){
 
					echo "<h2 style='border:none; font-family:Arial, Helvetica, sans-serif; color:white;'>About me:<h2>
							<div id='textbox' style='height:200px;border:none; font-family:Arial, Helvetica, sans-serif; color:white;' >".htmlspecialchars($settings['about'])."</div>
						";

					 
				}
				
			?>
 

		</form>
	</div>
</div>