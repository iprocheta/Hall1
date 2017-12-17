<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>

 <?php
$db=new Database();
if($_SERVER ['REQUEST_METHOD']=="POST" ) {
    $fullname=$_POST['fullname'];
    $studentId=$_POST['studentId'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $contactNo=$_POST['contactNo'];
    $father_name=$_POST['father_name'];
    $mother_name=$_POST['mother_name'];
    $discipline=$_POST['discipline'];
    $session=$_POST['session'];
    $gender=$_POST['gender'];
    $year=$_POST['year'];
    $term=$_POST['term'];
    $par_address=$_POST['par_address']; 
    $pre_address=$_POST['pre_address']; 

    $permited = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];
                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                        $uploaded_image = "upload/".$unique_image;

             
     
     if(empty($fullname) or empty($studentId)or empty($email) or empty($username) or 
                        empty($password) or empty($contactNo) or empty($father_name) or empty($mother_name) or 
                        empty($discipline) or empty($session)or empty($gender)  or empty($year) or empty($term)or empty($par_address) or empty($pre_address) or empty(  $uploaded_image) ){
                         echo  "<span style='color:red;margin-left:700px' > Field must be not empty </span>";
                         
                     }
                     elseif ($file_size > 1048567) {
                            echo "<span class='error'>Image Size should be less then 1MB!</span>";
                        } elseif (in_array($file_ext, $permited) === false) {
                            echo "<span class='error'>You can upload only:-"
                                . implode(', ', $permited) . "</span>";
                        }
                     else{
                 move_uploaded_file($file_temp, $uploaded_image);
                       
         $query = "INSERT INTO student(fullname,studentId,email,username,password,contactNo,father_name,mother_name,discipline,session,gender,year,term,par_address,pre_address,image) 
VALUES ('$fullname','$studentId','$email','$username','$password','$contactNo','$father_name','$mother_name','$discipline',
'$session','$gender',' $year','$term','$par_address','$pre_address','$uploaded_image')";
 $result=$db->insert($query);

if ($result) {
    echo "<span style='color:red;margin-left:700px' >Welcome ". $_POST['username']." </span>";
    echo "<span style='color:red;margin-left:700px' >your registration is successfully completed</span>";
} else {
    echo "data not inserted";
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

    <title>Sign up</title>

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
                <li>
                    <a href="http://localhost/Hall/signin.php">sign in</a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->


        <!-- Sidebar -->
        

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12";>

                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Click to view full screen</a>
                        
                      <center> <h2 style="background-color: #284761;width:500px;height: 50px;text-align: center;border: 1px;border-style: solid;padding-top: 5px; color:white">Student Registration Form</h2>
                     
                    
                        <form action="signup.php" method="post" enctype="multipart/form-data" class="table" style=" width:530px; border:1px;border-style:solid;padding-left:20px;" >
                        <div class="form-group">
                         <label> <input id="name" type="text" placeholder="Enter full name" name="fullname" class="form-control" style="width:500px;margin-top:20px;" /></label>
                         </div>
                         <div class="form-group"><label> <input id="student_id" type="text" placeholder="StudentID" name="studentId"  class="form-control" style="width:500px" /></label>
                        </div>
                        <div class="form-group">
                        <label> <input id="email" type="text" placeholder="Email" name="email"  class="form-control" style="width:500px"/></label></div>
                        <div class="form-group">
                        <label> <input id="username" type="text" placeholder="username" name="username" class="form-control" style="width:500px"/></label></div>
                        <div class="form-group">
                       <label> <input id="password" type="password" placeholder="password" name="password"class="form-control" style="width:500px"/></label></div>
                       <div class="form-group">
                       <label> <input id="contact_no" type="text" placeholder="Contact No" name="contactNo"class="form-control" style="width:500px"/></label></div>
                       <div class="form-group">
                       <label> <input id="father_name" type="text" placeholder="Father's Name" name="father_name"class="form-control" style="width:500px" /></label></div>
                       <div class="form-group">
                       <label> <input id="mother_name" type="text" placeholder="Mother's Name" name="mother_name"class="form-control" style="width:500px" /></label></div>
                       <div class="form-group">
                       <label> <input id="discipline" type="text" placeholder="Discipline" name="discipline" class="form-control" style="width:500px"  /></label>
                        </div>
                       <div class="form-group">
                        <label> <select class="form-control" required="" name="session" class="form-control"style="width: 500px"  >
                                      <option value="" selected="selected" >Session</option>
                                      <option>2011-2012</option>
                                      <option>2012-2013</option>
                                       <option>2013-2014</option>
                                        <option>20115-2016</option>
                                         <option>2016-2017</option>
                                          <option>2018-2019</option>
                                           <option>2020-2021</option>
                                      </select></label></div>

                       
                           <div class="form-group">  
                       <label> <select class="form-control" required="" name="gender" style="width: 500px"  >
                                      <option value="" selected="selected" >Gender</option>
                                      <option>Male</option>
                                      <option>Female</option>
                                      </select></label></div>
                               <div class="form-group">       
                          <label> <select class="form-control" required="" name="year" style="width: 500px"  >
                                      <option value="" selected="selected" >Year</option>
                                      <option>1st</option>
                                      <option>2nd</option>
                                      <option>3rd</option>
                                      <option>4th</option>
                                      </select></label></div>
                                      <div class="form-group">
                                   <label> <select class="form-control" required="" name="term" style="width: 500px"  >
                                      <option value="" selected="selected" >Term</option>
                                      <option>1st</option>
                                      <option>2nd</option>
                                      </select></label></div>
                                      <div class="form-group">
                         <label> <textarea class="form-control" rows="4" cols="55" id="name" name="par_address"  placeholder="Parmanent address" ></textarea></label>
                         </div>
                         <div class="form-group">
                         <label> <textarea class="form-control" rows="4" cols="55" id="name" name="pre_address"  placeholder="Present address" ></textarea></label>
                         </div>
                                      <div class="form-group">
                                      <label> Select your image<input id="name" type="file" name="image" style="width:500px" class="form-control"></label>
                                        
                                      </div>
                            
                            
                             <div class="form-group">
                        <input id="button1" type="submit" name="register" value="Register" class="btn btn-primary"  style="float:right" />
                        <input id="button1" type="reset" name="reset" value="Reset" class="btn btn-primary" style="float:right">
                        
                    
                      <span class="text-danger"</span>
                        

                             
                        
                             
                         
                     </form>
                    
                 
                          
                           
                    
                  </div>
                    </div>
                </div>
            </div>
        </div>
        </center>
        <!-- /#page-content-wrapper -->
    

    </div>
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
