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
      header("location:index.php");
      exit();
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

                        <h2>Applicants Details <a href="appiicants.php"> <?php include 'back.php';?></a> </h2>
                        

                    </div>
                </div>
                <hr />
                <?php
     $query = "SELECT fullname,student.studentId,discipline,term,year,gpa,father_name,mother_name,contactNo,married_status,par_address,pre_address,post_code,cause,type,oldapplicationinfo.image FROM oldapplicationinfo INNER JOIN student ON oldapplicationinfo.studentid='$id'and  student.studentId='$id'";
        $result=$db->select($query);
        $row = mysqli_fetch_array($result)
     ?>

    <div class="table-responsive">           
  <table class="table" >
    <thead>
      
        <td width="15%">FullName</td> 
        <td> <?php echo $row['fullname'];?></td>
        
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
         <td>GPA</td>
         <td> <?php echo $row['gpa'];?></td>
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
            <td>Marital Staus</td>
            <td> <?php echo $row['married_status'];?></td>
            </tr>
          <tr>
              <td>Parmanent Address</td>
              <td> <?php echo $row['par_address'];?></td>
              <tr>
                 <td>Present Address</td>
                 <td> <?php echo $row['pre_address'];?></td>
                 </tr>
                 <tr>
             <td>Post Code</td>
             <td> <?php echo $row['post_code'];?></td>
             </tr>
             <tr>
              <td>Cause</td>
              <td> <?php echo $row['cause'];?></td>
              </tr>
                 <tr>

              <td>Application Type</td>
              <td> <?php echo $row['type'];?></td>
              </tr>
              <tr>
               <td>Gurdian image</td>
               
                <td> <?php echo "<img src='../",$row['image'],"' width='100' height='100' />" ?></td>
      </tr>

    </thead>
    
    
    </div>
     </table>
     <?php
     if(isset($_POST['accept']) ) {
     $approved_id=$aid;
     $room_no=$_POST['room_no'];
     $studentId=$id;
     $allot_date=$_POST['allot_date']; 
     if(empty($room_no) || empty($allot_date)){
      echo  "<span style='color:red'> Field must be not empty </span>";
                         
      }
      else{
        $query = "INSERT INTO residential(approved_id,room_no,studentId,allot_date) 
VALUES ('$approved_id','$room_no','$studentId','$allot_date')";
 $result=$db->insert($query);
 $query="UPDATE oldapplicationinfo set approved_id=1 where oldapplicationinfo.studentid='$studentId'";
     $result2=$db->update($query);
 
 // $query = "delete from oldapplicationinfo where application_id='$approved_id'";
 // $result2=$db->delete($query);
 //$query="UPDATE student set approved_id='$approved_id' where studentId='$studentId'";
 //$result3=$db->update($query);

//get data from student table
       //$query = "select email from student where studentId='$studentId'";
       //$arr = array($studentId);
      // $email=$db->select($query,$arr);
       //print_r($email);
      // $result3=false;
       // if($email){
       //     $to=$email;
       //     $subject="Seat Confirmation";
       //     $msg="Your seat application accepted.\n Your room number is ".$room_no; 
       //     $msg=wordwrap($msg,70);
       //     //mail($email,"Seat Confirmation",$msg);
       //  //   $result3=true;   
       // }


if ($result && $result2 ) {
  
  echo "New record created successfully";
} else {
    echo "data not inserted";
}
     }
    
      
   }

   if(isset($_POST['reject']) ) {
     $approved_id=$aid;
        $query = "delete from oldapplicationinfo where application_id='$approved_id'";
       $result=$db->delete($query);

if ($result) {
    echo "Application Deleted successfully";
    header("Location:applicants.php");
    exit();
} else {
    echo "Delete Failed";
}
     }
     
     ?>
     
      <h2> Add Residential Or Recject the Application</h2>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      <form method="post">
                        <h5>Input RoomNo</h5>
                       <div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="text" class="form-control" name="room_no" placeholder="RoomNo" />
</div>
<br />
<h5>Input Allotement Date</h5>
<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="date" class="form-control" name="allot_date" placeholder="date" />
</div>
<br>
<input type="submit" class="btn btn-primary" name="accept" value="Accept" >
<input type="submit" class="btn btn-primary" name="reject" value="Reject" >
 <a href="#" class="btn btn-success" style="float:right;">send confirmation email</a>
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
