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
                        <h2>Up Comming Message</h2>
                         <?php
                          if(isset($_GET['delid'])){
                          $id=$_GET['delid'];
                          $query="DELETE FROM contact WHERE id='$id'";
                          $delmsg=$db->delete($query);
                          if ($delmsg) {
                          echo "Messege deleted successfully";
                        }else{
                         echo "Messege Not deleted!!";
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
          <th>Name</th>
          <th>Student ID</th>
           <th>Email</th>
           <th>Messege</th>
           <th>Action</th>
      </tr>
    </thead>
    
    </div>
     <?php
     $query = "SELECT * FROM contact WHERE seen=0 order by id desc";
        $result=$db->select($query);
        if($result){
          $i=1;
        while($row = mysqli_fetch_array($result)){
      ?>
     <tbody>
      <tr class="success">
        <td><?php echo $i++;?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['studentId']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['msg']; ?></td>
       
        <th> <a href="replymsg.php?stdid=<?php echo $row['studentId'];?> & id=<?php echo $row['id'];?>">Reply</a> <a onclick="return confirm('Are you Sure to Delete!');" href="?delid=<?php echo $row['id'];?>">Delete</a> <a href="msgview.php?id=<?php echo $row['id'];?>&seen=0">View</a></th>
        
      </tr>
      <?php  }}else{echo "<span style='color:green'>No Messege</span>";}  ?>
      </tbody>
      </table>



            
            <!-- seen -->

           
                <div class="row">
                    <div class="col-md-12">
                        <h2>Seen Messege </h2>
                    </div>
                </div>
                <hr />

                <div class="table-responsive">           
  <table class="table">
    <thead>
      <tr>
            <th>No</th>
          <th>Name</th>
          <th>Student ID</th>
           <th>Email</th>
           <th>Messege</th>
           <th>Action</th>
      </tr>
    </thead>
    
    </div>
     <?php
     $query = "SELECT * FROM contact WHERE seen=1 order by id desc";
        $result=$db->select($query);
        if($result){
          $i=1;
        while($row = mysqli_fetch_array($result)){
      ?>
     <tbody>
      <tr class="success">
         <td><?php echo $i++;?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['studentId']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['msg']; ?></td>
       
        <th> <a href="replymsg.php?stdid=<?php echo $row['studentId'];?> & id=<?php echo $row['id'];?>">Reply </a> <a onclick="return confirm('Are you Sure to Delete!');" href="?delid=<?php echo $row['id'];?>">Delete</a> <a href="msgview.php?id=<?php echo $row['id'];?>&seen=1">View</a></th>
        
      </tr>
      <?php  }}else{echo "<span style='color:green'>No Messege</span>";} ?>
      </tbody>
      </table>



            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    
         

  
     <?php include 'footer.php';?>
   

