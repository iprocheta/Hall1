<?php include 'lib/Session.php';
//Session::checkSession(); 
Session::init(); ?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>

<?php

$db=new Database();
 $fm=new Format();
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
					<li><a href="">Home</a></li>
					<li><a href="abouthall.php">About Hall</a></li>
					
					<li><a href="contact.php">Contact Us</a></li>
					 <?php if (isset($_SESSION['studentId'])) { ?>
                    <li><a href="activity.php">Activity</a></li>
                    <li><a href="notification.php?id=<?php echo $_SESSION['studentId']; ?>">Notification</a></li>

                     <li><a href="logout.php">Sign out</a></li>
                     <?php } else { ?>
                     
                      <li><a href="signin.php">Sign in</a></li> 
                      <li><a href="signup.php">Sign up</a></li> 
                   
                    <?php } ?>
				</ul>
			</div>
		</div>
		<div class="maincontent1_area fix">
		   <div class="sliding content fix">
		    <?php 
		   			         $num =0;
		   			         $query="SELECT * FROM editor ORDER BY id DESC";
		   			         $result=$db->select($query);
		   			         if($result){
		   			         $row = mysqli_fetch_array($result); 
		   			                 $t=substr($row['comment'], 0,60);?>
		   			                <a href="news.php?pid=<?php echo $row['id'];?>"><marquee direction="left" scrollamount="5"> <?php echo $t; ?></marquee></a>
		   			              
		   			                
		   			                 

		   			       <?php }else{ echo "There is no updated news";}?> 
			   
		   </div>
		</div>
	    <div class="maincontent_area fix">
		   <div class="maincontent content fix">
		     <div class="firstcontent fix">
		        <div class="slid floatleft fix">
			       <div id="slider" class="sli fix">
				       <img src="image/1.jpg" title="Entering gate to the hall"/>
				       <img src="image/2.jpg" title="night view of hall"/>
				       <img src="image/3.jpg" title="front view of hall"/>
				       <img src="image/4.jpg" title="inside of hall"/>
			       </div>
			    </div>
                <div class="noticeandlink fix">
			        <div class="link floatleft fix">
		   		        <h4>Important links</h4>
		   		        <div class="linkmenu fix">
		   			       <ul>
		   			       <?php 
		   			         $num =0;
		   			         $query="SELECT * FROM editor ORDER BY id DESC";
		   			         $result=$db->select($query);
		   			         if($result){
		   			         while($row = mysqli_fetch_array($result)){ ?>
		   			                <li><a href="news.php?pid=<?php echo $row['id'];?>"> <?php echo $row['cat_name'];?></a></li>
		   			               <?php $num=$num+1;
		   			                if ($num > 5)
		   			                	
		   			                	break;?>
		   			                	
		   			                 

		   			       <?php }}else{ echo "There is no notice in the notice board";}?>
		   				     
		   			       </ul>
		   		        </div>
		        	</div>
		        	<div class="noticeboard floatright fix">
		   		       <h4>Notice board</h4>
		   		       <div class="noticemenu fix">
		   			       <ul>
		   			       <?php 
		   			         $num =0;
		   			         $query="SELECT * FROM editor ORDER BY id DESC";
		   			         $result=$db->select($query);
		   			         if($result){
		   			         while($row = mysqli_fetch_array($result)){ ?>
		   			                <li> <?php echo $fm->textShortent($row['comment'],60);?><a href="news.php?pid=<?php echo $row['id'];?>">show all</a></li>
		   			               <?php $num=$num+1;
		   			                if ($num >2)
		   			                	
		   			                	break;?>
		   			                	
		   			                 

		   			       <?php }}else{ echo "There is no notice in the notice board";}?> 
		   			       </ul>
<!--		   			      <div class="anbtn fix">-->
<!--		   		    	      <a href="">show all</a>-->
<!--		   		          </div>-->
		   		       </div>

			        </div>
			    </div>
			  </div>
		     <div class="last fix"> 
		   	    <div class="second-part floatleft fix">
			   	    <div class="messageheding fix">
			   	     	<h4>Message From Provost</h4>
			   	     </div>
			   	     <div class="prome fix">
			   	  	    <div class="provostimage floatleft fix">
			   	  		    <img src="image/pro.PNG"/>
			   	  	    </div>
			   	  	    <div class="message floatright fix">
			   	  		   <p>Aparajita Hall </p>
			   	  	    </div>
			   	  	</div>
<!--			   	  	<div class="btn floatright fix">-->
<!--			   	  		<a href=""><p>read more...</p></a>-->
<!--			   	  	</div>-->
			   	</div>
			   	<div class="right-sidebar floatright fix">
			   	   <div class="first-part fix">
			   	  	 <h4>Welcome to Aparajita Hall</h4>
			   	  	  <p>Aparajita Hall is the Female hall of khulna university.
			   	 .</p>
			   	  	 
			   	   </div>
		   	    </div>
		   	  </div>


		   	  

		    </div>
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