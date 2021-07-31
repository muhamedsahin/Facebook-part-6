<style type="text/css">
	
</style><link rel="stylesheet" type="text/css" href="profile.css"><link rel="stylesheet" type="text/css" href="post.css"><link rel="stylesheet" href="/facebook-mfs/profil.css">
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
  #post_bar
  {width: 630px;
}
  .file
{
    color:white;
    background:  #292c358a;
    box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
    border-radius:30px;
}
.mfş
{
    color:white;
    background:  #292c358a;
    box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
    border-radius:30px;
}
.mfşş
{
	
    color:white;
    background:  #292c358a;
    box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
    border-radius:5px;
	outline: 0;
}
  </style>
		<div style="display: flex;">	

<!--friends area-->			
<div style="min-height: 400px;flex:1;">
	
	<div id="friends_bar">
		
		Following<br>

		 <?php 

			   if($friends)
			   {

				   foreach ($friends as $friend) {
					   # code...

					 $FRIEND_ROW = $user->get_user($friend['userid']);
					   include("user.php");
				   }
			   }
   

		  ?>

	</div>

</div>

<!--posts area-->

 <div style="min-height: 400px;  width: 750px; margin-right: 100px;padding: 20px;padding-right: 0px;" >
	 
	 <div style="padding: 10px;width: 630px;box-shadow: -3px -3px 10px rgb(255 255 255 / 5%), 3px 3px 15px rgb(0 0 0 / 50%);"class="mfş">

		 <form method="post" style="width: 100%;" enctype="multipart/form-data" >

			 <textarea class="mfşş" name="post" placeholder="Whats on your mind?"></textarea>
			 <input type="file" class="file" name="file">
			 <input id="post_button" type="submit" value="Post">
			 <br>
		 </form>
	 </div>

	 <!--posts-->
	 <div id="post_bar" style="">
		 
		   <?php 

			   if($posts)
			   {

				   foreach ($posts as $ROW) {
					   # code...

					   $user = new User();
					   $ROW_USER = $user->get_user($ROW['userid']);

					   include("post.php");
				   }
			   }
   
			   //get current url
			 $pg = pagination_link();
		  ?>
		   
		   <a href="<?= $pg['next_page'] ?>">
		  <input id="post_button" type="button" value="Next Page" style="float: right;width:150px;">
		  </a>
		  <a href="<?= $pg['prev_page'] ?>">
		  <input id="post_button" type="button" value="Prev Page" style="float: left;width:150px;">
		  </a>
	 </div>

 </div>
</div>