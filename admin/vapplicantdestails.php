<?php include 'sidebar.php';?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>

 <?php
$db=new Database();
$fm=new Format();
?>
<?php
  if (isset($_GET['stdid']) || isset($_GET['vid'])) {
      $id=$_GET['stdid'];
      $vid=$_GET['vid'];
    }else{
      header("location:index.php");
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
                        <h2>Applicants Details <a href="vacationinfo.php"> <?php include 'back.php';?>  </h2></a>   
                  
                    </div>

                </div>
                <hr />
                <?php
     $query = "SELECT fullname,student.studentId,residential.room_no,leave_date,destination,arrive_date FROM student  JOIN vacationinfo ON (vacationinfo.studentId=$id) JOIN residential ON (residential.studentId=$id) and  student.studentId='$id'";
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
           <td>RoomNO</td>
           <td> <?php echo $row['room_no'];?></td>
           </tr>
          
           <tr>
           <td>Leaving Date</td>
           <td> <?php echo $fm->format_date($row['leave_date']);?></td>
           </tr>
           <tr>
           <td>Destination's Address</td>
           <td> <?php echo $row['destination'];?></td>
           </tr>
           <tr>
           <td>Arrival Date</td>
           <td> <?php echo $fm->format_date($row['arrive_date']);?></td>
           </tr>
         

    </thead>
    
    
    </div>
     </table>
     <?php
     if(isset($_POST['accept']) ) {
     $approved_id=1;
     $query="UPDATE vacationinfo set approved_id='$approved_id' where vacationinfo.studentid='$id'";
     $result=$db->update($query);
     if ($result) {
  
  echo "New record created successfully";
   } else {
    echo "data not inserted";
    }
 }
    
      
   

    ?>
     
      <h2> Confirm  the Application</h2>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      <form method="post">
<input type="submit" class="btn btn-primary" name="accept" value="Accept" >

</form>
 </div>


     



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
      <?php include 'footer.php';?>
   
</body>
</html>
