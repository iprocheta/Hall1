<?php
 include 'lib/Session.php';
 //Session::init();
 Session::checkSession();
 ?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';
 include 'sidebar.php'; ?>

 <?php
// $db=new Database();
// $id=$_SESSION['studentId'];
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>student profile</title>
 
  <meta content="width=device-width, initial-scale=1.0" name="viewport" >
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>


<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="navbar1">
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['studentId'])) { ?>
        <li><p class="navbar-text">Signed in as <a href="updateprofile.php?stid=<?php echo $_SESSION['studentId']; ?>"><?php echo $_SESSION['username']; ?></p></a></li>
        <li><a href="logout.php">Log Out</a></li>
        <?php } else { ?>
        <li><a href="signin.php">Login</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        
        <?php } ?>
      </ul>
    </div>
    
</nav>

  
  
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>