<?php
 include 'lib/Session.php';
 Session::init();


 ?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>
<?php
  $db=new Database();
 $fm=new Format();



if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$fm->validation($_POST['email']);  
    $password=$fm->validation(md5($_POST['password'])); 
    $email=mysqli_real_escape_string($db->link,$email);
    $password=mysqli_real_escape_string($db->link,$password); 

    if(empty($email)or empty($password)){
    echo "Field must not be empty";
    }else{
      $query="SELECT * FROM student WHERE email='$email'AND password='$password'";
      $result=$db->select($query);
    
        if ($result!=false) {
                $value=mysqli_fetch_array($result);
                $row=mysqli_num_rows($result);
                if ($row>0) {
                    Session::set("login",true);
                    Session::set("email",$value['email']);
                    Session::set("password",$value['password']);
                    Session::set("studentId",$value['studentId']);
                    Session::set("username",$value['username']);
                   

                    header("Location: activity.php");
                }else{
                    echo "No record found!!";
                }
            }else{
                echo "Invalid a/c";
            }
     
 }   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign in</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    
    <style>
        .navbar-inner {
    background-color:transparent;
}
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        What do you want??
                    </a>
                </li>
                
                <li>
                    <a href="http://localhost/Hall/indexx.php">Home</a>
                </li>
                
                
                
                <li>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Click to view full screen</a>
                     <center><h2>Login</h2>
                     <div class="login form"><form action="" method="post" style="border:1px;border-style:solid;width:500px;">
                     <div class="form-group">
                         <label> <input id="name" type="text" required=""placeholder="Email" name="email" class="form-control" style="width:450px;margin-top:20px;"/></label>
                         </div>
                         <div class="form-group">
                       <label><input id="password" type="password" placeholder="Password" name="password" class="form-control" style="width:450px;"/></label></div>
                          <div class="form-group">
                        <input id="button1" type="submit" name="signin" value="SignIn" class="btn btn-primary"  />
                        <!-- <input id="button1" type="submit" name="reset" value="SignUp" class="btn btn-primary" style="margin-left:50px;"> -->
                        <a  href="signup.php" id='button1' class="btn btn-primary">Signup</a>
                      <span class="text-danger"</span>
                           </form>
                            
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    </center>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
