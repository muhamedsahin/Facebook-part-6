
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
	<div style="padding: 20px;">
	<?php

		$DB = new Database();
		$sql = "select image,postid from posts where has_image = 1 && userid = $user_data[userid] order by id desc limit 30";
		$images = $DB->read($sql);

		$image_class = new Image();

		if(is_array($images)){

			foreach ($images as $image_row) {
				# code...
				echo "<a href='".ROOT."single_post/$image_row[postid]' >";
				echo "<img src='" . ROOT . $image_class->get_thumb_post($image_row['image']) . "' style='box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);width:150px;margin:10px;' />";
				echo "</a>";
			}

		}else{

			echo "No images were found!";
		}


	?>

	</div>
</div>