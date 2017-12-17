<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

  
	<!-- <meta name="viewport"    content="width=device-width, initial-scale=1.0"> -->
	<meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<title>hall</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
    
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
   <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

  
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
      <style>

  /* Note: Try to remove the following lines to see the effect of CSS positioning */
  .affix {
      top: 0;
      width: 100%;
      padding-top: 20px;
      padding-right: 40px;
  }
  .modal-header, h4, .close {
      background-color: #5eb0ba;
      color:white !important;
      text-align: center;
      font-size: 30px;


  </style>

</head>
</header>
  <!-- /Header -->
  <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <ul class="nav navbar-nav">
    <li class="active"><a href="#">Home</a></li>
    <li><a href="#">About Us</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="#">Registration</a></li>
  </ul>
     <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
        <li><a href="#myModal2" data-toggle="modal" data-target="#myModal2">><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <!-- trigger the modal with login click  -->
        <!-- <li><a href=""><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
        <li><a href="#myModal1" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-log-in"></span> Login</a> </li> 
      </ul>
</nav>
<!--login  Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content for login-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4><span class="glyphicon glyphicon-lock"></span> Login</h4> -->
          <h4> Welcome to Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
             <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
            <a href="#" data-dismiss="modal" class="btn">Close</a>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!--        signup-->
        <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4> If u dont hv an account please singnup here</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-envelope"></span> email</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter password">
            </div>
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>type Password</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter password">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>confirm Password</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter password">
            </div>
           
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Sign-Up</button>
          </form>
        </div>
        <div class="modal-footer">
            <a href="#" data-dismiss="modal" class="btn">Close</a>
        </div>
      </div>
      
    </div>
  </div>
</div>
<body>

    <div id="wrapper">

      

<!--    sighup ses-->
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="assets/js/headroom.min.js"></script>
  <script src="assets/js/jQuery.headroom.min.js"></script>
  <script src="assets/js/template.js"></script>
</body>
</html>
