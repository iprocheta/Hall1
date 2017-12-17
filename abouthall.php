<?php include 'lib/Session.php';
//Session::checkSession(); 

Session::init(); ?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>

<?php

$db=new Database();
?>
      



<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/queries.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
        

	</head>
	<body>
		<div class="header_area fix">
			<div class="header content fix">
				<div class="logo floatleft fix">
					<img src="image/logo.png"/>
				</div>
				<div class="write fix">
					<h4>APARAZITA HALL</h4>
					<h3>KHULNA UNIVERSITY</h3>
				</div>
				<div class="image floatright fix">
					<img src="image/logo.jpg"/>
				</div>
				<!-- <div class="searchbtn floatright fix">
				  <form action="" method="">
					 <input type="text" name=""/>
					 <input type="submit" value="search" onclick=""/>
				  </form>
				</div> -->
			</div>
		</div>
		<div class="menu_area fix">
			<div class="menu content fix">
				<ul>
					<li><a href="indexx.php">Home</a></li>
					<li><a href="abouthall.php">About Hall</a></li>
					
					<li><a href="contact.php">Contact Us</a></li>
					 <?php if (isset($_SESSION['studentId'])) { ?>
                    <li><a href="activity.php">Activity</a></li>
                     <li><a href="logout.php">Sign out</a></li>
                     <?php } else { ?>
                     
                      <li><a href="signin.php">Sign in</a></li> 
                      <li><a href="signup.php">Sign up</a></li> 
                   
                    <?php } ?>
				</ul>
			</div>

		</div>
		   
		<div class="content area contact">
			 <h1>History of Aparajita Hall</h1>
		</div>
		<div class="content main" >
			<h4>
			 Some text will go here. Some text will go here. Some text will go here. Some text will go here. Some text will go here. Some text will go here. Some text will go here.v Some text will go here. Some text will go here. Some text will go here. Some text will go here. Some text will go here. Some text will go here.Some text will go here. Some text will go here.Some text will go here. Some text will go here.Some text will go here. Some text will go here.Some text will go here. Some text will go here.Some text will go here. Some text will go here.Some text will go here. Some text will go here.Some text will go here. Some text will go here.Some text will go here. Some text will go here.Some text will go here. Some text will go here.Some text will go here. Some text will go here.Some text will go here. Some text will go here.Some text will go here. Some text will go here.Some text will go here. Some text will go here.
			</h4>


		</div>
		
		<div class="event" style="color:red;background:#95cbd4; border:solid 2px black">
		<center><h1>Events</h1></center>
		  
		<?php
		  $query="select * from video";
          $result=$db->select($query);
          $num=0;
          while($all_video=mysqli_fetch_array($result)){
          $num++;
          if($num==5) break;?>   
		
             <video width="300" height="200" controls>

               <source src="admin/test_upload/<?php echo $all_video['video_name']; ?>" type="video/mp4">
          </video>
         <?php } ?>
		  

		</div>
                
		        	
		     
		<div class="footer_area fix">
			<div class="footer content fix">
				<div class="first floatleft fix">
					<h4>Aparajita Hall</h4>
					<h5>Khulna University,Khulna-9208 Bangladesh</h5>
					<h5>&copy;2016,khulna university Aparajita hall,All Rights Reserved</h4>
				</div>
				<div class="second floatleft fix">
					<h4>Phone : </h4>
					<h5>Fax : </h5>
				</div>
				<div class="third floatleft fix">
					<h4>Web :aparajitahall@yahoo.com</h4>
					<h5>Email : something</h5>
				</div>
			</div>
		</div>

	</body>
</html>