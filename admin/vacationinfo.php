<?php include 'sidebar.php';?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>

 <?php
$db=new Database();
?>
<body> 

    <div id="wrapper">
         
       
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>New Applicants<a href="application.php"> <?php include 'back.php';?> </h2></a>
                        <?php  
                        if(isset($_GET['vid']) ) {
                        $id=$_GET['vid'];
                        $query = "delete from vacationinfo where vform_id='$id'";
     
                       $result=$db->delete($query);
                       if ($result) {
                       echo "Application Deleted successfully";
   
                       } else {
                       echo "Delete Failed";
                      }
                      }
                      ?>
                    </div>
                </div>
                <hr />

                <div class="table-responsive">           
  <table class="table">
    <thead>
      <tr>
           <th>Approved ID</th>
          <th>Application ID</th>
          <th>Student ID</th>
           <th>Name</th>
           <th>Action</th>
      </tr>
    </thead>
    
    </div>
     <?php
     $query = "SELECT vform_id ,vacationinfo.approved_id,student.studentId,fullname FROM vacationinfo INNER JOIN student ON vacationinfo.studentid=student.studentId
     and approved_id=0";
        $result=$db->select($query);
        if($result)
        {
        while($row = mysqli_fetch_array($result)){
     ?>
     <tbody>
      <tr class="success">
         <td><?php echo $row['approved_id']; ?></td>
        <td><?php echo $row['vform_id']; ?></td>
        <td><?php echo $row['studentId']; ?></td>
        <td><?php echo $row['fullname']; ?></td>
        <th> <a href="vapplicantdestails.php?stdid=<?php echo $row['studentId'];?> & vid=<?php echo $row['vform_id'];?>">Viewdetails</a>
        || <a onclick="return confirm('Are you want to Delete?');" href="?vid=<?php echo $row['vform_id'];?> & sid=<?php echo $row['studentId'];?>">Delete</a></th>
      </tr>
      <?php  }}else{echo "<span style='color:green'>No applicants</span>";} ?>
      </tbody>
      </table>



            </div>
            <!-- Approved applicants -->
            <div class="row">
                    <div class="col-md-12">
                        <h2>Approved Applicants</h2>
                    </div>
                </div>
                <hr />

                <div class="table-responsive">           
  <table class="table">
    <thead>
      <tr>
           <th>Approved ID</th>
          <th>Application ID</th>
          <th>Student ID</th>
           <th>Name</th>
           <th>Action</th>
      </tr>
    </thead>
    
    </div>
     <?php
     $query = "SELECT vform_id ,vacationinfo.approved_id,student.studentId,fullname FROM vacationinfo INNER JOIN student ON vacationinfo.studentid=student.studentId
     and approved_id=1";
        $result=$db->select($query);
        if($result)
        {
        while($row = mysqli_fetch_array($result)){
     ?>
     <tbody>
      <tr class="success">
         <td><?php echo $row['approved_id']; ?></td>
        <td><?php echo $row['vform_id']; ?></td>
        <td><?php echo $row['studentId']; ?></td>
        <td><?php echo $row['fullname']; ?></td>
        <th> <a href="vapplicantdestails.php?stdid=<?php echo $row['studentId'];?> & vid=<?php echo $row['vform_id'];?>">Viewdetails</a>
         || <a onclick="return confirm('Are you want to Delete?');" href="?vid=<?php echo $row['vform_id'];?> & sid=<?php echo $row['studentId'];?>">Delete</a></th>
      </tr>
      <?php  }}else{echo "<span style='color:green'>No applicants</span>";} ?>
      </tbody>
      </table>
      



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
