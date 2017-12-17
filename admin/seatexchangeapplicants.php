<?php include 'sidebar.php';?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>
 <?php
$db=new Database();
$fm=new Format();
?>
<body> 

    <div id="wrapper">
         
       
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2> New Applicants </h2>
                         <?php  
                        if(isset($_GET['eid']) ) {
                        $id=$_GET['eid'];
                        $query = "delete from exchangeinfo where exform_id='$id'";
     
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
           <th>N0</th>
          <th>Application ID</th>
          <th>Student ID</th>
           <th>Name</th>
           <th>Applied Date</th>
           <th>Action</th>
      </tr>
    </thead>
    
    </div>
     <?php
     $query = "SELECT exform_id ,exchangeinfo.approved_id,student.fullname,student.studentId,ex_date FROM exchangeinfo INNER JOIN student ON exchangeinfo.studentid=student.studentId
     and approved_id=0";
        $i=1;
        $result=$db->select($query);
        if($result)
        {
        while($row = mysqli_fetch_array($result)){ ?>
      <tbody>
      <tr class="success">
       <td><?php echo $i++; ?></td>
        
        <td><?php echo $row['exform_id']; ?></td>
        <td><?php echo $row['studentId']; ?></td>
        <td><?php echo $row['fullname']; ?></td>
         <td><?php echo $fm->format_date($row['ex_date']); ?></td>
        <th> <a href="seatexchangedetails.php?stdid=<?php echo $row['studentId'];?> & eid=<?php echo $row['exform_id'];?> & approved_id=0">Viewdetails</a>|| <a onclick="return confirm('Are you want to Delete?');" href="?delid=<?php echo $row['studentId'];?> & eid=<?php echo $row['exform_id'];?>">Delete</a></th>
      </tr>
      <?php  }}else{echo "<span style='color:green'>No applicants</span>";} ?>
      </tbody>
      </table>
       




            </div>
             <div id="page-inner">
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
           <th>No</th>
          <th>Application ID</th>
          <th>Student ID</th>
           <th>Name</th>
            <th>New room no</th>
           <th>Applied Date</th>
           <th>Action</th>
      </tr>
    </thead>
    
    </div>
     <?php
     $query = "SELECT exform_id ,exchangeinfo.approved_id,student.fullname,student.studentId,new_roomno,ex_date FROM exchangeinfo INNER JOIN student ON exchangeinfo.studentid=student.studentId and approved_id=1";
        $i=1;
        $result=$db->select($query);
        if($result)
        {
        while($row = mysqli_fetch_array($result)){
     ?>
     <tbody>
      <tr class="success">
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['exform_id']; ?></td>
        <td><?php echo $row['studentId']; ?></td>
        <td><?php echo $row['fullname']; ?></td>
        <td><?php echo $row['new_roomno']; ?></td>
         <td><?php echo $fm->format_date($row['ex_date']); ?></td>
        <th> <a href="seatexchangedetails.php?stdid=<?php echo $row['studentId'];?> & eid=<?php echo $row['exform_id'];?> & approved_id=1">Viewdetails</a> || <a onclick="return confirm('Are you want to Delete?');" href="?delid=<?php echo $row['studentId'];?> & eid=<?php echo $row['exform_id'];?>">Delete</a></th>
      </tr>
      <?php  } }else{echo "<span style='color:green'>No applicants</span>";}?>
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
