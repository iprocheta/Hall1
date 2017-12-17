
<?php
 //include 'lib/Session.php';
 include 'activity.php';
 
 //Session::init();
 ?>


 <?php
$db=new Database();
$id=$_SESSION['studentId'];
?>



<?php
  // if (isset($_GET['stid'])) {
  //     $id=$_GET['stid'];
  //   }else{
  //     header("location:index.php");
  //   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    /*table{border: 3px solid; }*/
    tr{background-color: #fff;}
      /*{border: 1px solid black;}}*/
  </style>
</head>
<body>

<div class="container" style="margin-left: 264px;">
  <h2>Your Profile</h2>
   <?php
    $query = "SELECT * FROM student WHERE studentId='$id'";
    $result=$db->select($query);
    $row = mysqli_fetch_array($result)
    ?> 
  
<div class="table-responsive">           
  <table class="table">
    <thead>
    <form action="" method="POST">
     <tr>
      <td><b>Image:</td>
      <td> <?php echo "<img src='", $row['image'], "' width='100' height='100' />" ?> </td>
    </tr> 
    <tr>
      <td><b>Full Name:</td>
      <td><?php echo $row['fullname']; ?> </td>
    </tr>
    <tr>
      <td><b>Email:</td>
      <td><?php echo $row['email']; ?></td>
    </tr>
    <tr>
      <td><b>Username:</td>
      <td><?php echo $row['username']; ?></td>
    </tr>
    <tr>
      <td><b>Contact No:</td>
      <td><?php echo $row['contactNo']; ?></td>
    </tr>
    <tr>
      <td><b>Father's Name:</td>
      <td><?php echo $row['father_name']; ?></td>
    </tr>
    <tr>
      <td><b>Mother's Name:</td>
      <td><?php echo $row['mother_name']; ?></td>
    </tr>
    <tr>
      <td><b>Discipline:</td>
      <td><?php echo $row['discipline']; ?></td>
    </tr>
    <tr>
      <td><b>Session:</td>
      <td><?php echo $row['session']; ?></td>
    </tr>
    <tr>
      <td><b>Gender:</td>
      <td><?php echo $row['gender']; ?></td>
    </tr>
    <tr>
      <td><b>Year:</td>
      <td><?php echo $row['year']; ?></td>
    </tr>
    <tr>
      <td><b>Term:</td>
      <td><?php echo $row['term']; ?></td>
    </tr>

    

    </form>
     
   </thead>
  </table>
</div>
</div>

</body>
</html>