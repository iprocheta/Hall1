
<?php

 //include 'lib/Session.php';
 include 'activity.php';
 //Session::init();
 

//include 'sidebar.php';
?>

 <?php
$db=new Database();
$id=Session::get('studentId');
?>
<?php
 if($_SERVER['REQUEST_METHOD']=="POST") {

       $fullname=$_POST['fullname'];
       $email=$_POST['email'];
       $username=$_POST['username'];
       $contactNo=$_POST['contactNo'];
        $father_name=$_POST['father_name'];
       $mother_name=$_POST['mother_name'];
       $discipline=$_POST['discipline'];
        $session=$_POST['session'];
         $gender=$_POST['gender'];
          $year=$_POST['year'];
           $term=$_POST['term'];
            $permited = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];
                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                        $uploaded_image = "upload/".$unique_image;
                     if(empty($fullname)  || empty($email) || 
                      empty($username) ||  empty($contactNo) || empty($father_name) || empty($mother_name) || 
                        empty($discipline) || empty($session) || empty($gender) || empty($year) || empty($term)){
                         echo  "<span style='color:red;margin-left:700px' > Field must not be  empty </span>";
                         
                     }
                     else
                     {
                       if (!empty($file_name)) {
                         if ($file_size > 1048567) {
                            echo "<span class='error'>Image Size should be less then 1MB!</span>";
                        }elseif (in_array($file_ext, $permited) === false) {
                            echo "<span class='error'>You can upload only:-"
                                . implode(', ', $permited) . "</span>";
                        }  else{
                 move_uploaded_file($file_temp, $uploaded_image);
                       


        $query = "UPDATE student set 
        fullname='$fullname',email='$email',username='$username',contactNo='$contactNo',
        father_name='$father_name',mother_name='$mother_name',discipline='$discipline',session='$session',
        gender='$gender',year='$year',term='$term',image='$uploaded_image'  where 
        studentId='$id'";
          $result=$db->update($query);

         if ($result) {
             echo "<span style='color:red;margin-left:700px' > updated successfully </span>";
    
        } else {
           echo "<span style='color:red;margin-left:700px' updated Failed </span>";
        }

      }
    }
    else{
       $query = "UPDATE student set 
        fullname='$fullname',email='$email',username='$username',contactNo='$contactNo',
        father_name='$father_name',mother_name='$mother_name',discipline='$discipline',session='$session',
        gender='$gender',year='$year',term='$term' where 
        studentId='$id'";
          $result=$db->update($query);

         if ($result) {
             echo "<span style='color:red;margin-left:700px' > updated successfully </span>";
    
        } else {
           echo "<span style='color:red;margin-left:700px' updated Failed </span>";
        }


    }
             
 }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <style type="text/css">
  table{border: 3px solid; }
    

      th{border: 1px solid black;}}
  </style>
</head>
<body>

<div class="container" style="margin-left: 264px;">

  <h2>Update Your Profile</h2>
  <?php
    $query = "SELECT * FROM student WHERE studentId='$id'";
    $result=$db->select($query);
    $row = mysqli_fetch_array($result)
    ?> 
<div class="table-responsive">           
  <table class="table">
    <thead>
    <form action="" method="POST" enctype="multipart/form-data">
    
    
    <tr>
      <td>Full Name:</td>
      <td><input type="text" name="fullname"   value="<?php echo $row['fullname']; ?>" class="form-control"style="width:300px;" ></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control"style="width:300px;"></td>
    </tr>
    <tr>
      <td>Username:</td>
      <td><input type="text" name="username" value="<?php echo $row['username']; ?>"class="form-control"style="width:300px;"></td>
    </tr>
    <tr>
      <td>Contact No:</td>
      <td><input type="text" name="contactNo" value="<?php echo $row['contactNo']; ?>"class="form-control"style="width:300px;"></td>
    </tr>
    <tr>
      <td>Father's Name:</td>
      <td><input type="text" name="father_name" value="<?php echo $row['father_name']; ?>"class="form-control"style="width:300px;"></td>
    </tr>
    <tr>
      <td>Mother's Name:</td>
      <td><input type="text" name="mother_name" value="<?php echo $row['mother_name']; ?>"class="form-control"style="width:300px;"></td>
    </tr>
    <tr>
      <td>Discipline:</td>
      <td><input type="text" name="discipline" value="<?php echo $row['discipline']; ?>"class="form-control"style="width:300px;"></td>
    </tr>
    <tr>
      <td>Session:</td>
      <td><input type="text" name="session" value="<?php echo $row['session']; ?>"class="form-control"style="width:300px;"></td>
    </tr>
    <tr>
      <td>Gender:</td>
      <td><input type="text" name="gender" value="<?php echo $row['gender']; ?>"class="form-control"style="width:300px;"></td>
    </tr>
    <tr>
      <td>Year:</td>
      <td><input type="text" name="year" value="<?php echo $row['year']; ?>"class="form-control"style="width:300px;"></td>
    </tr>
    <tr>
      <td>Term:</td>
      <td><input type="text" name="term" value="<?php echo $row['term']; ?>"class="form-control"style="width:300px;"></td>
    </tr>
     <tr>
      <td>Image:</td>

      <td> <?php echo "<img src='",$row['image'], "' width='100' height='100' />" ?> 
      <input name="image" type="file" />
      </td>
      
    </tr> 

    <tr>
      
      <td> <input id="button1" type="submit" name="update" value="Update" class="btn btn-primary" style="float:right;" /></td>
    </tr>

    </form>
     
   </thead>
  </table>
</div>
</div>

</body>
</html>