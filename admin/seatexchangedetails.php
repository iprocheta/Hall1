<?php include 'sidebar.php';?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>

 <?php
$db=new Database();
?>
<?php
  if (isset($_GET['stdid']) || isset($_GET['eid'])||isset($_GET['new_room'])) {
      $id=$_GET['stdid'];
      $eid=$_GET['eid'];
      $new_room=$_GET['new_room'];
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
                      <h2>Applicants Details <a href="exchangeapplicants.php"> <?php include 'back.php';?> </h2></a>   
                  
                    </div>

                </div>
        <?php
     $query = "SELECT student.fullname,student.studentId,discipline,term,year,exchangeinfo.present_roomno,exchangeinfo.new_roomno FROM student INNER JOIN  exchangeinfo ON exchangeinfo.studentid='$id'and  student.studentId='$id'";
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
           <td>Term</td>
           <td> <?php echo $row['term'];?></td>
           </tr>
           <tr>
           <td>Year</td>
           <td> <?php echo $row['year'];?></td>
           </tr>
           <tr>
           <td>Present RoomNo</td>
           <td> <?php echo $row['present_roomno'];?></td>
           </tr>
           <tr>
           <td>New RoomNo</td>
           <td> <?php echo $row['new_roomno'];?></td>
           </tr>
           

    </thead>
    
    
    </div>
     </table>
     <?php
     if(isset($_POST['accept']) ) {
          $approved_id=1;
          $ex_date=$_POST['ex_date'];
          $room_no=$row['new_roomno']; 
     // if( empty($ex_date)){
     //  echo  "<span style='color:red'> Field must be not empty </span>";
                         
     //  }
      //else{
       // $query = "INSERT INTO exchangeinfo(ex_date) 
//VALUES ('$ex_date')";
 //$result=$db->insert($query);
      $query="UPDATE exchangeinfo set approved_id=1 where exchangeinfo. studentid='$id'";
      $result3=$db->update($query);
      $query="UPDATE residential set room_no='$room_no' where residential. studentid='$id'";
      $result2=$db->update($query);


         
 //$query = "delete from exchangeinfo where exform_id='$approved_id'";
 //$result2=$db->delete($query);
 
if ($result3 && $result2 ) {
  
  echo "New record created successfully";
} else {
    echo "data not inserted";
}
     }
    
      
 
     

 
     
     ?>
      <h2> Confirm  the Application</h2>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      <form method="post">
      <h5>Input Exchange Date</h5>
<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="date" class="form-control" name="ex_date" placeholder="date" />
</div>
<br>

<input type="submit" class="btn btn-primary" name="accept" value="Accept" >

<a href="message.php" class="btn btn-primary" style="float:right" >Send Confirmation SMS</a>

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
