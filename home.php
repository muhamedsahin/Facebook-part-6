<?php 

	include("classes/autoload.php");
 

	$login = new Login();
	$user_data = $login->check_login($_SESSION['mybook_userid']);
 
 	$USER = $user_data;
 	
 	if(isset($_GET['id']) && is_numeric($_GET['id'])){

	 	$profile = new Profile();
	 	$profile_data = $profile->get_profile($_GET['id']);

	 	if(is_array($profile_data)){
	 		$user_data = $profile_data[0];
	 	}

 	}

  
	//posting starts here
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$post = new Post();
		$id = $_SESSION['mybook_userid'];
		$result = $post->create_post($id, $_POST,$_FILES);
		
		if($result == "")
		{
			header("Location:" . ROOT . "home");
			die;
		}else
		{

			echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
			echo "<br>The following errors occured:<br><br>";
			echo $result;
			echo "</div>";
		}
	}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Mfşbook</title>
</head>
<style>
body
{
    background: rgb(50, 108, 233);
    text-decoration:none;
}
#blue_bar
{
    
    background-color: #222324;
    background-color: rgb(255, 255, 255);
    text-decoration: none;
    border-color:black;
    border:2px;
}
</style>
<style type="text/css">
body {
    margin: 0%;
    padding: 0%;
   
}

#blue_bar {
    padding: 0%;
    margin-top: -1.30%;
    height: 50px;
    width: 100%;
    
    color: #d9dfeb;

}

#search_box {


    border-radius: 5px;
    border: none;
    padding: 4px;
    font-size: 14px;
    background-image: url(search.png);
    background-repeat: no-repeat;
    background-position: right;

}

#profile_pic {

    width: 150px;
    border-radius: 50%;
}

#menu_buttons {

    width: 100px;
    display: inline-block;
    margin: 2px;
}

#friends_img {

    width: 75px;
    float: left;
    margin: 8px;

}

#friends_bar {

    min-height: 400px;
    margin-top: 20px;
    padding: 8px;
    text-align: center;
    font-size: 20px;
    color: #405d9b;
}

#friends {

    clear: both;
    font-size: 12px;
    font-weight: bold;
    color: #405d9b;
}

textarea {

    width: 100%;
    border: none;
    font-family: tahoma;
    font-size: 14px;
    height: 60px;

}

#post_button {

    float: right;
    background-color: #405d9b;
    border: none;
    color: white;
    padding: 4px;
    font-size: 14px;
    border-radius: 2px;
    width: 50px;
    cursor: pointer;
}

#post_bar {

    margin-top: 20px;
    background-color: white;
    padding: 10px;
}

#post {

    padding: 4px;
    font-size: 13px;
    display: flex;
    margin-bottom: 20px;
}
</style>
<style>
body
{
    background-color: #212529;
    text-decoration:none;
}
#blue_bar
{
    background:  #292c358a;
    text-decoration: none;
    border-color:black;
    border:2px;
}
</style>
<style type="text/css">
body {
    margin: 0%;
    padding: 0%;
   
}

#blue_bar {
    padding: 0%;
    height: 50px;
    width: 100%;
    
    color: #d9dfeb;
    margin-top:-3.38%; 
}

#search_boxx {

    border-radius: 5px;
    border: none;
    padding: 0px;
    font-size: 14px;
    background-repeat: no-repeat;
    background-position: right;

}

#profile_picc {

    width: 60px;
    border-radius: 50%;
    box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
}

#menu_buttons {

    width: 100px;
    display: inline-block;
    margin: 2px;
}

#friends_img {

    width: 75px;
    float: left;
    margin: 8px;

}

#friends_bar {

    min-height: 400px;
    margin-top: 20px;
    padding: 8px;
    text-align: center;
    font-size: 20px;
    color: #405d9b;
}

#friends {

    clear: both;
    font-size: 12px;
    font-weight: bold;
    color: #405d9b;
}

textarea {

    width: 100%;
    border: none;
    font-family: tahoma;
    font-size: 14px;
    height: 60px;
    background:  #292c358a;
    box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
    border-radius:15px;
    color:white;
}

#post_button {

    float: right;
    background-color: #405d9b;
    border: none;
    
    padding: 4px;
    font-size: 14px;
   
    cursor: pointer;
    
			width: 43%;
			height: 6%;
			border-radius: 50px;
			font-weight: bold;
			border:none;
			background-color: rgb(50, 108, 233);
			color: white;
}
#post_button:hover {

float: right;
background-color: #405d9b;
border: none;

padding: 4px;
font-size: 14px;

cursor: pointer;

background-color: rgb(255, 255, 255);
			color: rgb(50, 108, 233);
			width: 43%;
			height: 6%;
			text-align: center;
			border-radius: 50px;
			
			border-style: solid;
			border-width: 1px;
			border-color: rgb(50, 108, 233);
}
#post_bar {

    margin-top: 20px;
    background-color: white;
    padding: 10px;
    border-radius:20px 20px 20px 20px / 20px 20px 20px 20px;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
}

#post {

    padding: 4px;
    font-size: 13px;
    display: flex;
    margin-bottom: 20px;
}
b
{
    position: relative;
    display: inline-block;
    padding: 10px 30px;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 2px;
    color: #5a84a2;
    font-size: 18px;
    border-radius: 40px;
    box-shadow: -2px -2px 8px rgba(255, 255, 255, 1),
    -2px -2px 12px rgba(255, 255, 255, 0.5),
    inset 2px 2px 4px rgba(255, 255, 255, 0.1),
    2px 2px 8px rgba(0, 0, 0, 0.15);
}
b:hover
{
    box-shadow: inset -2px -2px 8px rgba(255, 255, 255, 1),
    inset -2px -2px 12px rgba(255, 255, 255, 0.5),
    inset 2px 2px 4px rgba(255, 255, 255, 0.1),
    inset 2px 2px 8px rgba(0, 0, 0, 0.15);  
}
b:hover span
{
    display: inline-block;
    transform: scale(0.98);
}
#profile_picc
{
    width: 10px;
}
body
{
    background-color: #212529;
    cursor: url(""), url(""), default;
}
#search_box
{
  border:none;
}
.büyütec
{
    background-image:url('https://static.xx.fbcdn.net/rsrc.php/v3/yl/r/1KHVDkwRbsL.png');background-position:-34px -450px;background-size:auto;width:16px;height:16px;background-repeat:no-repeat;display:inline-block;
}
.file
{
    color:white;
    background:  #292c358a;
    box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
    border-radius:30px;
}
</style>

	<link rel="stylesheet" type="text/css" href="post.css">
<body  style=" font-family: tahoma; background-color: #212529; text-decoration: none;  ">
<br>

<?php  include("header.php"); ?>

  

    <!--cover area-->
    <div style="width: 800px;margin:auto;min-height: 400px;">


        <!--below cover area-->
        <div style="display: flex;">

            <!--friends area-->
            <div style="min-height: 400px;flex:1;">

                <div id="friends_bar" >

                    <?php 

							$image = "images/user_male.jpg";
							if($user_data['gender'] == "Female")
							{
								$image = "images/user_female.jpg";
							}
							if(file_exists($user_data['profile_image']))
							{
								$image = $image_class->get_thumb_profile($user_data['profile_image']);
							}
						?>

                   

                </div>

            </div>

            <!--posts area-->
            
        
            <div style=" min-height: 500px;flex:2.5;padding: 20px;padding-right: 0px;">
            
                <div style=" height: 175px;  padding: 10px;background-color: white; border-radius:20px;
			border-color: rgb(50, 108, 233);border-radius:20px 20px 20px 20px / 20px 20px 20px 20px;box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12); background:  #292c358a;">

                    <form method="post" style="" enctype="multipart/form-data">
                    
                    <img style="width: 75px; margin-top: 10px; float:left;" id="profile_picc"   src="<?php echo ROOT . $image ?>"><br />

                        <textarea style="margin-left: 12%; width:87%; outline: 0;" name="post" placeholder="Ne düşünüyon <?php echo $user_data['first_name'] . " " . $user_data['last_name'] ?>"></textarea>
                       
                        <input type="file" class="file"  name="file">
                        <input id="post_button" type="submit" value="Post">
                        
                    </form>
                    </b>
                </div>
               
        
                <!--posts-->
                <div id="post_bar">

                    <?php 

 							$page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  							$page_number = ($page_number < 1) ? 1 : $page_number;

 							
 							$limit = 10;
 							$offset = ($page_number - 1) * $limit;

  							$DB = new Database();
 							$user_class = new User();
 							$image_class = new Image();

 							$followers = $user_class->get_following($_SESSION['mybook_userid'],"user");

 							$follower_ids = false;
 							if(is_array($followers)){

 								$follower_ids = array_column($followers, "userid");
 								$follower_ids = implode("','", $follower_ids);

 							}

 							if($follower_ids){
 								$myuserid = $_SESSION['mybook_userid'];
 								$sql = "select * from posts where parent = 0 and owner = 0 and (userid = '$myuserid' || userid in('" .$follower_ids. "')) order by id desc limit $limit offset $offset";
 								$posts = $DB->read($sql);
 							}

 	 					 	if(isset($posts) && $posts)
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

    </div>
    <script>
var input = document.getElementById("myInput");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("myBtn").click();
  }
});
</script>
</body>

</html>