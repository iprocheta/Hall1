<?php include 'activity.php' ?>

<?php
$db=new Database();
$id=Session::get('studentId');

?>
<?php
if($_SERVER ['REQUEST_METHOD']=="POST" ) {
    $studentId=Session::get('studentId');
    $relation=$_POST['relation'];
    $guestaddress=$_POST['guestaddress'];
    $entry_date=$_POST['entry_date']; 
    $leave_date=$_POST['leave_date']; 
    
   if(empty($relation) || empty($guestaddress) || 
                        empty($entry_date) || empty($leave_date)){
                         echo  "<span style='color:red'> Field must be not empty </span>";
                         
                     }
                    
                     else{
                $query = "INSERT INTO guestinfo(studentId,relation,guestaddress,entry_date,leave_date) 
VALUES ('$studentId','$relation','$guestaddress','$entry_date','$leave_date')";
 $result=$db->insert($query);

if ($result) {
    echo "New record created successfully";
} else {
    echo "data not inserted";
}
     }
    

   }


?>












<!DOCTYPE html>
<html lang="en">

<head>


</head>

<body>

    <div id="wrapper">

       
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        
                        
                         <h2>Apply for Holding Guest</h2>
                      <?php
    $query = "SELECT fullname,student.studentId,discipline,room_no FROM student INNER JOIN residential ON  student.studentId='$id' and residential.studentid='$id'";
    $result=$db->select($query);
    $row = mysqli_fetch_array($result);
    ?>
                        
                        <form action="guestform.php" method="post" class="table">
                          <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['fullname']; ?>" readonly="readonly" name="name" class="form-control" /></label>
                         </div>
                          <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['studentId']; ?>" readonly="readonly" class="form-control" /></label>
                         </div>
                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['discipline']; ?>" readonly="readonly" name="discipline" class="form-control" /></label>
                         </div>
                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['room_no']; ?>" readonly="readonly" name="room_no" class="form-control" /></label>
                         </div>
                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="Relation with guest" name="relation" class="form-control" /></label>
                         </div>
                         <div class="form-group">
                         <label> <textarea rows="5" id="name" name="guestaddress"  placeholder="Address of guest" style="height:50" width:500></textarea><br></label>
                         </div>
                         <div class="form-group">
                         <label> <input id="name" type="date" placeholder="Entry date" name="entry_date" class="form-control" /></label>
                         </div>
                         <div class="form-group">
                         <label> <input id="name" type="date" placeholder="Leaving date" name="leave_date" class="form-control" /></label>
                         
                         </div>
                         <div class="form-group">
                        <input id="button1" type="submit" name="apply" value="Apply" class="btn btn-primary"  />
                    
                      <span class="text-danger"</span>
                        </div>
                        
                      
                        

                    </form>
                
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

   

</body>

</html>
