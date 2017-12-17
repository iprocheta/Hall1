<?php include 'lib/Session.php';

//Session::checkSession(); 

Session::init(); ?>
<?php include 'helpers/Format.php'?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>

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
			<h1>Contact Us</h1>
			<?php
					if ($_SERVER['REQUEST_METHOD']=='POST') {

						 $name=$fm->validation($_POST['name']);
						 $studentId=$fm->validation($_POST['studentId']);
						 $email=$fm->validation($_POST['email']);
						 $msg=$fm->validation($_POST['msg']);
						

                         $name=mysqli_real_escape_string($db->link,$name);
                         $studentId=mysqli_real_escape_string($db->link,$studentId);
                         $email=mysqli_real_escape_string($db->link,$email);
                         $msg=mysqli_real_escape_string($db->link,$msg);
                         
                         if ($name!=""&&$studentId!=""&&$email!=""&&$msg!="") {
                         	$query="INSERT INTO contact (name,studentId,email,msg) VALUES(
                         		'$name','$studentId','$email','$msg')";
                                 $result=$db->insert($query);
                                 if ($result) {
                                     echo "<span style='color:red;' > Message Send Successfully!.
                                        </span>";
                                 }else{
                                     echo "Message not Send";
                                 }
                         }
					}
                                
				?>

			<hr>
		</div>
		<div class="content main">
			<form action="" method="post">
				<table>
				<tr>
					<td>Your  Name:</td>
					<td>
					<input type="text" name="name" placeholder="Enter your name" required="1"class="form-control" style="width:300px;margin-top:20px;" />
					</td>
				</tr>
				<tr>
					<td>Your Student ID:</td>
					<td>
					<input type="text" name="studentId" placeholder="Enter Student Id" required="1" class="form-control" style="width:300px;margin-top:20px;"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address" required="1"class="form-control" style="width:300px;margin-top:20px;"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="msg"class="form-control" style="width:300px;margin-top:20px;"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send" style="float:right" />
					</td>
				</tr>
		</table>
	<form>				
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
		</h5>

	</body>
</html>