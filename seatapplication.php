<?php
//include 'sidebar.php' ;
include 'activity.php' ;
?>
<?php
$db=new Database();
$id=Session::get('studentId');
?>
<?php
if($_SERVER ['REQUEST_METHOD']=="POST" ) {
    //$fullname=$_POST['fullname'];
    //$studentid=$_POST['studentid'];
    $studentId=Session::get('studentId');
    /*$discipline=$_POST['discipline'];
    $semister=$_POST['semister'];
    $year=$_POST['year'];*/
     $gpa=$_POST['gpa'];
     // $father_name=$_POST['father_name'];
      //$mother_name=$_POST['mother_name'];
    //$contactNo=$_POST['contactNo'];
    //$father_name=$_POST['father_name'];
    $married_status=$_POST['married_status'];
     /*$par_address=$_POST['par_address']; 
    $pre_address=$_POST['pre_address'];
    $post_code=$_POST['post_code'];*/ 
    $post_code=$_POST['post_code']; 
    $cause=$_POST['cause']; 
     $type=$_POST['type']; 
      $applied_date=$_POST['applied_date'];   
    



 
   
   
   
    $permited = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];
                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                        $uploaded_image = "upload/".$unique_image;

           
      echo "Welcome ". $studentid=Session::get('studentId');
     if(empty($gpa) || empty($married_status) || 
                        empty($post_code) || empty($cause) || empty($type) || empty($uploaded_image) || empty($applied_date)){
                         echo  "<span style='color:red'> Field must be not empty </span>";
                         
                     }
                     elseif ($file_size > 1048567) {
                            echo "<span class='error'>Image Size should be less then 1MB!</span>";
                        } elseif (in_array($file_ext, $permited) === false) {
                            echo "<span class='error'>You can upload only:-"
                                . implode(', ', $permited) . "</span>";
                        }
                     else{
                 move_uploaded_file($file_temp, $uploaded_image);
                  
         $query = "INSERT INTO oldapplicationinfo(studentId,gpa,married_status,post_code,cause,type,image,applied_date) 
VALUES ('$studentId','$gpa','$married_status','$post_code','$cause','$type','$uploaded_image','$applied_date')";
 $result=$db->insert($query);

if ($result) {
     echo "<span style='color:red;margin-left:600px' >Your Application is submitted successfully</span>";
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

                        
                        
                        <center><h2 style="background-color:#284761;width:550px;height: 50px;text-align: center;border: 1px;border-style: solid;padding-top: 5px; color:white">Apply for Seat</h2>
                        <!-- data retrive -->
                        <?php
    $query = "SELECT * FROM student WHERE studentId='$id'";
    $result=$db->select($query);
    $row = mysqli_fetch_array($result);
    ?> 
                        
                        <form action="form.php" method="post" enctype="multipart/form-data" class="table" style=" width:550px;border:1px;border-style:solid;">
                          <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['fullname']; ?>" readonly="readonly" name="fullname" class="form-control" style="width:500px;margin-top:20px;" /></label>
                         </div>
                          <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['studentId']; ?>" name="studentid" readonly="readonly" class="form-control"style="width:500px;" /></label>
                         </div>
                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['discipline']; ?>" name="discipline" readonly="readonly" class="form-control" style="width:500px;"/></label>
                         </div>
                          <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['term']; ?>" name="semister" readonly="readonly" class="form-control" style="width:500px;"/></label>
                         </div>
                          <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['year']; ?>" name="year" readonly="readonly" class="form-control" style="width:500px;"/></label>
                         </div>
                        
                        
                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['father_name']; ?>" name="father_name" readonly="readonly"class="form-control" style="width:500px;"/></label>
                         </div>
                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['mother_name']; ?>" name="mother_name" readonly="readonly" class="form-control" style="width:500px;" /></label>
                         </div>
                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="<?php echo $row['contactNo']; ?>" name="contact_info" readonly="readonly" class="form-control" style="width:500px;"/></label>
                         </div>
                        
                         <div class="form-group">
                         <label> <textarea class="form-control" rows="4" cols="55" id="name" name="par_address" readonly="readonly" placeholder="<?php echo $row['par_address']; ?>" ></textarea></label>
                         </div>
                         <div class="form-group">
                         <label> <textarea class="form-control" rows="4" cols="55" id="name" name="pre_ddress" readonly="readonly" placeholder="<?php echo $row['pre_address']; ?>" ></textarea></label>
                         </div>
                          <div class="form-group">
                         <label> <input id="name" type="text" placeholder="TGPA/YGPA" name="gpa" class="form-control"style="width:500px;" /></label>
                         </div>
                          <div class="form-group">
                         <label> <select class="form-control" required="" name="married_status" style="width: 500px"  >
                                      <option value="" selected="selected" >Marital status</option>
                                      <option>Married</option>
                                      <option>Unmarried</option>
                                      
                                      </select></label>
                       <br></label>

                         </div>
                         <div class="form-group">
                         <label> <input id="name" type="text" placeholder="Post Code" name="post_code" class="form-control" style="width:500px;"/></label>
                         </div>
                         <div class="form-group">
                         <label> <textarea class="form-control" rows="4" cols="55" id="name" name="cause"  placeholder="Cause" ></textarea></label>
                         </div>


                        <div class="form-group">
                         <label> <select class="form-control" required="" name="type" style="width: 500px"  >
                                      <option value="" selected="selected" >Application type</option>
                                      <option>Dormatory</option>
                                      <option>Block</option>
                                      
                                      </select></label>
                       <br></label>
                        
                      
                    </div>
                    <div class="form-group">
                                      <label> Select your Gurdian image<input id="name" type="file" name="image" style="width:500px" class="form-control"></label>
                                        
                                      </div>
                        <div class="form-group">
                         <label> <input  type="date" placeholder="Applied date" name="applied_date"  class="form-control" style="width:500px;"/></label>
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
        </center>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>
