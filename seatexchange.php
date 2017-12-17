<?php include 'activity.php' ?>
<?php
$db=new Database();
$id=Session::get('studentId');
$fullname=Session::get('fullname');
?>
<?php
if($_SERVER ['REQUEST_METHOD']=='POST' ) {
    
    $studentId=Session::get('studentId');
    $name=Session::get('fullname');
    //$present_roomno=$_POST['present_roomno'];
    $new_roomno=$_POST['new_roomno'];
    $ex_date=$_POST['ex_date'];
    if( empty($new_roomno) || empty($ex_date)){
    echo  "<span style='color:red'> Field must not be empty </span>";

    }else{
        $query = "INSERT INTO exchangeinfo (studentId,new_roomno,ex_date) 
   VALUES ('$studentId','$new_roomno','$ex_date')";
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

                        
                        
                        <h2>Apply for Seat Exchange</h2>
                         <?php
    $query = "SELECT fullname,student.studentId,discipline,residential.room_no FROM student INNER JOIN residential ON  student.studentId=$id and residential.studentid=$id";
    $result=$db->select($query);
    $row = mysqli_fetch_array($result);
    ?>
                     
                        
                        <form action="seatexchange.php" method="post" class="table">
                          <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['fullname']; ?>" readonly="readonly" name="name" class="form-control" /></label>
                         </div>
                          <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['studentId']; ?>" readonly="readonly" name="student_id" class="form-control" /></label>
                         </div>
                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['discipline']; ?>" readonly="readonly" name="discipline" class="form-control" /></label>
                         </div>
                         
                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['room_no']; ?>" readonly="readonly" name="present_roomno" class="form-control" /></label>
                         </div>
                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="New RoomNo" name="new_roomno" class="form-control" /></label>
                         </div>
                         <div class="form-group">
                         <label> <input  type="date" placeholder="Exchange date" name="ex_date" class="form-control" /></label>
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
