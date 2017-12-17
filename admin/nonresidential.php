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
                        <h2>Applicants Details </h2>
                    </div>
                </div>
                <hr />

                <div class="table-responsive">           
  <table class="table">
    <thead>
      <tr>
          <th>Full Name</th>
          <th>Student ID</th>
          
           <th>Action</th>
      </tr>
    </thead>
    
    </div>
     <?php
     $query = "SELECT fullname, student.studentId FROM student WHERE student.studentId NOT IN (SELECT residential.studentid FROM residential)";
        $result=$db->select($query);
        if($result){
        while($row = mysqli_fetch_array($result)){
     ?>
     <tbody>
      <tr class="success">
        <td><?php echo $row['fullname']; ?></td>
        <td><?php echo $row['studentId']; ?></td>
        <th> <a href="nonresidentialdetails.php?stdid=<?php echo $row['studentId'];?>">Viewdetails</a></th>
        
      </tr>
      <?php  }} ?>
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
