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
        
	<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0,
		directionNav:false,
		directionNavHide:false, 
		controlNav:false, 
		controlNavThumbs:false, 
		pauseOnHover:true, 
		manualAdvance:false, 
		captionOpacity:0.8, 
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} 
	});
});
</script>
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
		<?php
		  $id=Session::get('studentId');
		  $query = "SELECT oldapplicationinfo.approved_id,residential.room_no,residential.allot_date FROM oldapplicationinfo INNER JOIN residential ON oldapplicationinfo.studentid=$id and residential.studentid=$id";
          $result=$db->select($query);
          if($result){
          $row = mysqli_fetch_array($result);
          
          $aid=$row['approved_id'] ;
          if($aid==1){



		?>
		<div class="content area contact">
			<center><p style="font-size: 60px;margin: 110px auto; color: green;">You are selected and your room no is: <?php echo $row['room_no'] ;?></p></center>
		</div>
		
		<div class="content main" style="height:300px">
		<center>
			<p style="font-size: 60px;margin: 110px auto; color: green;">
			  
			   Allotment date is:<?php echo $row['allot_date'] ;?>
			  
			</p>
			</center>
		</div>
		<?php }}else {?> <p style="font-size: 60px;margin: 110px auto; color: green;">There is no notification for you... <?php } ?>
                
		        	
		     
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
		</h5>

	</body>
</html>