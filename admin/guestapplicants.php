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
                        <h2>New applicants</h2>
                         <?php  
                        if(isset($_GET['aid']) ) {
                        $id=$_GET['aid'];
                        $query = "delete from guestinfo where gform_id='$id'";
     
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
          <th>No</th>
          <th>Application ID</th>
          <th>Student ID</th>
           <th>Name</th>
           <th>Action</th>
      </tr>
    </thead>
    
    </div>
     <?php
     $query = "SELECT approved_id,gform_id,student.studentId,fullname FROM guestinfo INNER JOIN student ON guestinfo.studentid=student.studentId
     and approved_id=0";
        $result=$db->select($query);
        if($result){
          $i=1;
        while($row = mysqli_fetch_array($result)){
      ?>
     <tbody>
      <tr class="success">
        <td><?php echo $i++?></td>
        <td><?php echo $row['gform_id']; ?></td>
        <td><?php echo $row['studentId']; ?></td>
        <td><?php echo $row['fullname']; ?></td>
        <th> <a href="guestdetails.php?stdid=<?php echo $row['studentId'];?> & aid=<?php echo $row['gform_id'];?>">Viewdetails</a>
         || <a onclick="return confirm('Are you want to Delete?');" href="?aid=<?php echo $row['gform_id'];?> & stdid=<?php echo $row['studentId'];?>">Delete</a></th>
        
      </tr>
      <?php  }}else{echo "<span style='color:green'>No applicants</span>";} ?>
      </tbody>
      </table>



            </div>
            <!-- Approved applicants -->
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Approved applicants</h2>
                    </div>
                </div>
                <hr />

                <div class="table-responsive">           
  <table class="table">
    <thead>
      <tr>
          <th>No</th>
          <th>Application ID</th>
          <th>Student ID</th>
           <th>Name</th>
           <th>Action</th>
      </tr>
    </thead>
    
    </div>
     <?php
     $query = "SELECT approved_id,gform_id,student.studentId,fullname FROM guestinfo INNER JOIN student ON guestinfo.studentid=student.studentId
     and approved_id=1";
        $result=$db->select($query);
        if($result){
          $i=1;
        while($row = mysqli_fetch_array($result)){
      ?>
     <tbody>
      <tr class="success">
        <td><?php echo $i++?></td>
        <td><?php echo $row['gform_id']; ?></td>
        <td><?php echo $row['studentId']; ?></td>
        <td><?php echo $row['fullname']; ?></td>
        <th> <a href="guestdetails.php?stdid=<?php echo $row['studentId'];?> & aid=<?php echo $row['gform_id'];?>">Viewdetails</a>
         || <a onclick="return confirm('Are you want to Delete?');" href="?aid=<?php echo $row['gform_id'];?> & stdid=<?php echo $row['studentId'];?>">Delete</a></th>
        
      </tr>
      <?php  }} else{echo "<span style='color:green'>No applicants</span>";}?>
      </tbody>
      </table>



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
