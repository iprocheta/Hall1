<?php
 include 'lib/Session.php';
 Session::init();
 ?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include '../helpers/Format.php';?>
<?php
  $db=new Database();
  $fm=new Format();




if($_SERVER['REQUEST_METHOD']=='POST'){
            $username=$fm->validation($_POST['username']);
            $password=$fm->validation(md5($_POST['password']));
            $username=mysqli_real_escape_string($db->link,$username);
            $password=mysqli_real_escape_string($db->link,$password);
    // $username=$_POST['username'];
   // $password=md5($_POST['password']);

 

    if(empty($username)or empty($password)){
    echo "Field must not be empty";
    }else{
      $query="SELECT * FROM admin WHERE username='$username' AND password='$password'";
//         $query = "INSERT INTO admin(username,password) 
// VALUES ('$username','$password')";
 $result=$db->select($query);
     //$result=$db->insert($query);
    
        if ($result!=false) {
                $value=mysqli_fetch_array($result);
                $row=mysqli_num_rows($result);
                if ($row>0) {
                    Session::set("login",true);
                    Session::set("username",$value['username']);
                    Session::set("password",$value['password']);
                   
                   
                   

                    header("Location: index.php");
                }else{
                    echo "No record found!!";
                }
            }else{
                echo "Invalid a/c";
            }
//       if ($result) {
//     echo "New record created successfully";
// } else {
//     echo "data not inserted";
// }
   
     
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

    <title>Admin login</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .navbar-inner {
    background-color:transparent;
}
    </style>

</head>

<body>

    
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        
                        <!-- <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Click to view full screen</a> -->
                     <center><h2>Admin Login</h2>
                     <div class="login form"><form action="" method="post" style="border:1px;border-style:solid;width:500px;">
                     <div class="form-group">
                         <label> <input id="name" type="text" placeholder="Usename" name="username" class="form-control" style="width:450px;margin-top:20px;"/></label>
                         </div>
                         <div class="form-group">
                       <label><input id="password" type="password" placeholder="Password" name="password" class="form-control" style="width:450px;"/></label></div>
                          <div class="form-group">
                        <input id="button1" type="submit" name="signin" value="SignIn" class="btn btn-primary"  />
                        
                    
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
    // $("#menu-toggle").click(function(e) {
    //     e.preventDefault();
    //     $("#wrapper").toggleClass("toggled");
    // });
    // </script>

</body>

</html>
