<?php include 'activity.php' ?>
<?php
$db=new Database();
$id=Session::get('studentId');
//$discipline=Session::get('discipline');
//$discipline=Session::get('discipline');
?>
<?php
if($_SERVER ['REQUEST_METHOD']=='POST' ) {
    
    $studentId=Session::get('studentId');
  // $discipline=Session::get('discipline');
   
    $leave_date=$_POST['leave_date'];
    $destination=$_POST['destination'];
    $arrive_date=$_POST['arrive_date'];
 
    if( empty($leave_date)||empty($arrive_date)){
    echo  "<span style='color:red'> Field must be not empty </span>";

    }else{
        $query = "INSERT INTO vacationinfo (studentId,leave_date,destination,arrive_date) 
   VALUES ('$studentId','$leave_date','$destination','$arrive_date')";
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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

   
    <style>
        .navbar-inner {
    background-color:transparent;
}
    </style>

</head>

<body>

    <div id="wrapper">

        

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        
                        
                        <h2>Apply for Vacation</h2>
                    <?php
         $query = "SELECT residential.studentid,fullname,discipline,residential.room_no FROM student INNER JOIN residential ON residential.studentid=$id and student.studentId=$id";
     $result=$db->select($query);
     $row = mysqli_fetch_array($result)
     ?>
                     
                        
                        <form action="vacationform.php" method="post" class="table">
                          <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['fullname']; ?>" name="name" readonly="readonly" class="form-control" /></label>
                         </div>
                          <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['studentid']; ?>" name="student_id" readonly="readonly" class="form-control" /></label>
                         </div>
                       
                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['room_no']; ?>" name="room_no" readonly="readonly" class="form-control" /></label>
                         </div>
                         
                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="Leaving date" name="leave_date" class="form-control" /></label>
                         </div>
                        
                         <div class="form-group">
                         <label> <textarea rows="5" id="name" name="destination"  placeholder="Where to go" style="height:50" width:500></textarea></label>
                         </div>

                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="Arrival date" name="arrive_date" class="form-control" /></label>
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
    

</body>

</html>
