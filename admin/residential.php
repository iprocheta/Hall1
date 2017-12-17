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
                    <div class="col-md-6">
                        <h2>Residential Students <a href="student.php"> <?php include 'back.php';?></a>  </h2>
                        <form action="" method="post"> 
                      <input type="text" name="studentid" class="form-control" placeholder="Enter StudentID" /><br />  

                       <input id="button1" type="submit" value="Search" class="btn btn-primary" />  
                       </form>  

                    </div>
                </div>
                <hr />

                <div class="table-responsive">           
  <table class="table">
    <thead>
      <tr>
          <th>Approved Application ID</th>
          <th>Room No</th>
           <th>student ID</th>
           <th>Allot Date</th>
           <th>Action</th>
      </tr>
    </thead>
    
    </div>
     <?php

     if(!empty($_REQUEST['studentid']))
     {
      $studentid=$_REQUEST['studentid'];
      $sid=mysqli_real_escape_string($db->link,$studentid);
      $query = "SELECT approved_id ,room_no,studentid,allot_date FROM residential where studentid like '%".$studentid."%'";
           $result=$db->select($query);
           if($result){
        while($row = mysqli_fetch_array($result)){
     ?>
     <tbody>
      <tr class="success">
        <td><?php echo $row['approved_id']; ?></td>
        <td><?php echo $row['room_no']; ?></td>
        <td><?php echo $row['studentid']; ?></td>
        <td><?php echo $fm->format_date($row['allot_date']);?></td>
        <th> <a href="residentialdetails.php?stdid=<?php echo $row['studentid'];?> & aid=<?php echo $row['approved_id'];?>">Viewdetails</a></th>
      </tr>
      <?php  }}
      else
      {
        echo "<span style='color:red'>No result found</span>";
      }
    }

    
   
     else{
     $query = "SELECT approved_id ,room_no,studentid,allot_date FROM residential";
        $result=$db->select($query);
        if($result){
        while($row = mysqli_fetch_array($result)){
     ?>
     <tbody>
      <tr class="success">
        <td><?php echo $row['approved_id']; ?></td>
        <td><?php echo $row['room_no']; ?></td>
        <td><?php echo $row['studentid']; ?></td>
        <td><?php echo $fm->format_date($row['allot_date']); ?></td>
        <th> <a href="residentialdetails.php?stdid=<?php echo $row['studentid'];?> & aid=<?php echo $row['approved_id'];?>">Viewdetails</a></th>
      </tr>
      <?php  }}} ?>

      </tbody>
      </table>



            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    
          <?php include 'footer.php';?>

     <!-- /. WRAPPER  -->
    