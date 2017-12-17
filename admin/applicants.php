<?php include 'sidebar.php';?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>

 <?php
$db=new Database();
$fm=new Format();
?>

    <div id="wrapper">
         
       
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>New Applicants </h2>
                    </div>
                </div>
                <hr />

                <div class="table-responsive">           
  <table class="table">
    <thead>
      <tr>
          <th>No</th>
          <th>Application Id</th>
          <th>Student ID</th>
           <th>Name</th>
           <th>Applied Date</th>
           <th>Action</th>
      </tr>
    </thead>
    
    </div>
     <?php
     $query = "SELECT application_id ,student.studentId,fullname,applied_date FROM oldapplicationinfo INNER JOIN student ON oldapplicationinfo.studentid=student.studentId
     and approved_id=0";
        $result=$db->select($query);
        if($result){
          $i=1;
        while($row = mysqli_fetch_array($result)){
      ?>
     <tbody>
      <tr class="success">
        <td><?php echo $i++;?></td>
        <td><?php echo $row['application_id']; ?></td>
        <td><?php echo $row['studentId']; ?></td>
        <td><?php echo $row['fullname']; ?></td>
        <td><?php echo $fm->format_date($row['applied_date']);?></td>
        <th> <a href="applicantdetails.php?stdid=<?php echo $row['studentId'];?> & aid=<?php echo $row['application_id'];?>">Viewdetails</a></th>
        
      </tr>
      <?php  }}else{echo "<span style='color:green'>No applicants</span>";}  ?>
      </tbody>
      </table>



            
            <!-- Approved applicants -->

           
                <div class="row">
                    <div class="col-md-12">
                        <h2>Approved Applicants </h2>
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
           <th>Applied Date</th>
           <th>Action</th>
      </tr>
    </thead>
    
    </div>
     <?php
     $query = "SELECT application_id ,student.studentId,fullname,applied_date FROM oldapplicationinfo INNER JOIN student ON oldapplicationinfo.studentid=student.studentId
     and approved_id=1";
        $result=$db->select($query);
        if($result){
          $i=1;
        while($row = mysqli_fetch_array($result)){
      ?>
     <tbody>
      <tr class="success">
          <td><?php echo $i++; ?></td>
        <td><?php echo $row['application_id']; ?></td>
        <td><?php echo $row['studentId']; ?></td>
        <td><?php echo $row['fullname']; ?></td>
        <td><?php echo $fm->format_date($row['applied_date']);?></td>
        <th> <a href="applicantdetails.php?stdid=<?php echo $row['studentId'];?> & aid=<?php echo $row['application_id'];?>">Viewdetails</a></th>
        
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
   

