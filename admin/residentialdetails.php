<?php include 'sidebar.php';?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>

 <?php
$db=new Database();
?>
<?php
  if (isset($_GET['stdid']) || isset($_GET['aid'])) {
      $id=$_GET['stdid'];
      $aid=$_GET['aid'];
    }else{
      //header("location:index.php");
      //exit();
    }
    //echo "$id";
    //echo "$aid";
?>



<body> 

    <div id="wrapper">
         
       
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                        <h2>Residential students Details <a href="residential.php"> <?php include 'back.php';?></a> </h2>
                        

                    </div>
                </div>
                <hr />
                <?php
     $query = "SELECT image,fullname,student.studentId,discipline,term,year,father_name,mother_name,contactNo,par_address,pre_address FROM student INNER JOIN residential ON student.studentId='$id'and  residential.studentid='$id'";
        $result=$db->select($query);
        $row = mysqli_fetch_array($result)
     ?>

    <div class="table-responsive">           
  <table class="table" >
    <thead>
    <tr>
               <td>Image</td>
              <td> <?php echo "<img src='../",$row['image'],"' width='100' height='100' />" ?></td>

      </tr>
      <tr>
        <td width="15%">FullName</td> 
        <td> <?php echo $row['fullname'];?></td>
        </tr>
        <tr>
          <td>Student ID</td>
          <td> <?php echo $row['studentId'];?></td>
          </tr>
          <tr>
           <td>Disciplne</td>
           <td> <?php echo $row['discipline'];?></td>
           </tr>
         <tr>
        <td>Semister</td>
        <td> <?php echo $row['term'];?></td>
        </tr>
        <tr>
        <td>Year</td>
        <td> <?php echo $row['year'];?></td>
        </tr>
        
         <tr>
         <tr>
           <td>Father's Name</td>
           <td> <?php echo $row['father_name'];?></td>
           </tr>
          <td>Mother's Name</td>
          <td> <?php echo $row['mother_name'];?></td>
          </tr>
          
          
          <tr>
              <td>Parmanent Address</td>
              <td> <?php echo $row['par_address'];?></td>
              <tr>
                 <td>Present Address</td>
                 <td> <?php echo $row['pre_address'];?></td>
                 </tr>
                 <tr>
            
             
              

    </thead>
    
    
    </div>
     </table>
     <?php
    

//get data from student table
      //  $query = "select email from student where studentId='$studentId'";
      //  //$arr = array($studentId);
      //  $email=$db->select($query,$arr);
      //  //print_r($email);
      // // $result3=false;
      //  if($email){
      //      $to=$email;
      //      $subject="Seat Confirmation";
      //      $msg="Your seat application accepted.\n Your room number is ".$room_no; 
      //      $msg=wordwrap($msg,70);
      //      //mail($email,"Seat Confirmation",$msg);
      //   //   $result3=true;   
      //  }




   if(isset($_POST['reject']) ) {
     $approved_id=$aid;
        $query = "delete from residential where approved_id='$approved_id'";
        $result=$db->delete($query);
      $query="UPDATE student set approved_id=0 where approved_id='$approved_id'";
       $result2=$db->update($query);
if ($result && $result2) {
    echo "Application Deleted successfully";
   // header("Location:residential.php");
    exit();
} else {
    echo "Delete Failed";
}
     }
     
     ?>
     
      <h2> Recject seat</h2>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      <form method="post">
                      
<input type="submit" class="btn btn-primary" name="reject" value="Reject" >
 
</form>
 </div>


     



            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    
          <?php include 'footer.php';?>

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
