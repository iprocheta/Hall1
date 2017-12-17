<?php include 'sidebar.php';?> 
 <?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include '../helpers/Format.php';?>
<?php
  $db=new Database();
  $fm=new Format();




if($_SERVER['REQUEST_METHOD']=='POST'){
           
    $username=$_POST['username'];
    $password=md5($_POST['password']);

 

    if(empty($username)or empty($password)){
    echo "Field must not be empty";
    }else{
     $query = "UPDATE admin set username='$username', password='$password' where id='1'";
        
       $result=$db->update($query);
        
      if ($result) {
    echo "update successfully";
} else {
    echo "update fail";
}
   
     
 }   
}
?>
<html>
<body>
     
           
          
    <div id="wrapper">
         
      
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Edit your profile</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                 <form action="" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <h5>Input username</h5>
                       <div class="input-group">
                      
  <span class="input-group-addon">@</span>
  <input type="text" class="form-control" placeholder="Username" name="username" />
</div>
<br />
<h5>Password</h5>
<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="text" class="form-control" placeholder="password" name="password" />
</div>
<br>
<!-- <a href="#" class="btn btn-primary">Submit</a> -->
<input id="button1" type="submit" name="signin" value="Update" class="btn btn-primary"  />
</form>
 </div>

                   
                   
                </div>
                <!-- /. ROW  -->
    
         
            


                
                    

                <!-- /. ROW  -->
    
                 
                <!-- /. ROW  -->

            </div>
            </div>

         <!-- /. PAGE WRAPPER  -->
        </div>
    
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
     <?php include 'footer.php'?>
   
</body>
</html>
