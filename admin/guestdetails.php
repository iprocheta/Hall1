<?php include 'sidebar.php';?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>

 <?php
$db=new Database();
?>
<?php
  if (isset($_GET['stdid']) || isset($_GET['aid'])) {
      $id=$_GET['stdid'];
      $aid=$_GET['aid'];

    }else{
      header("location:index.php");
      exit();
    }
    //echo "$id";
    //echo "$aid";
?>



<body> 

    <div id="wrapper">
         
       
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                        <h2>Applicants Details <a href="guestapplicants.php"> <?php include 'back.php';?></a> </h2>
                        

                    </div>
                </div>
                <hr />
                <?php
     $query = "SELECT fullname,student.studentId,discipline,term,year,contactNo,relation,guestaddress,entry_date,leave_date  FROM guestinfo INNER JOIN student ON guestinfo.studentid='$id' and  student.studentId='$id' and guestinfo.gform_id='$aid'";
        $result=$db->select($query);
        $row = mysqli_fetch_array($result)
     ?>

    <div class="table-responsive">           
  <table class="table" >
    <thead>
      
        <td width="15%">FullName</td> 
        <td> <?php echo $row['fullname'];?></td>
        
        <tr>
          <td>Student ID</td>
          <td> <?php echo $row['studentId'];?></td>
          </tr>
          <tr>
           <td>Disciplne</td>
           <td> <?php echo $row['discipline'];?></td>
           </tr>
         <tr>
        <td>Semister</td>
        <td> <?php echo $row['term'];?></td>
        </tr>
        <tr>
        <td>Year</td>
        <td> <?php echo $row['year'];?></td>
        </tr>
        <tr>
         <td>Contact No</td>
         <td> <?php echo $row['contactNo'];?></td>
         </tr>
         <tr>
         <tr>
           <td>Relation with guest</td>
           <td> <?php echo $row['relation'];?></td>
           </tr>
          <td>Guest Address</td>
          <td> <?php echo $row['guestaddress'];?></td>
          </tr>
          
           <tr>
            <td>Entry Date</td>
            <td> <?php echo $row['entry_date'];?></td>
            </tr>
          <tr>
              <td>Leaving Date</td>
              <td> <?php echo $row['leave_date'];?></td>
            </tr>
              
               
     

    </thead>
    
    
    </div>
     </table>
    <?php
     if(isset($_POST['accept']) ) {
     $approved_id=1;
      
     $query="UPDATE guestinfo set approved_id='$approved_id' where guestinfo.studentid='$id'";
     $result=$db->update($query);
  
     
 
 //$query = "delete from guestinfo where gform_id='$approved_id'";
 //$result2=$db->delete($query);
// $query="UPDATE student set approved_id='$approved_id' where studentId='$studentId'";
 //$result3=$db->update($query);

//get data from student table
       //$query = "select email from student where studentId='$studentId'";
       //$arr = array($studentId);
      // $email=$db->select($query,$arr);
       //print_r($email);
      // $result3=false;
       // if($email){
       //     $to=$email;
       //     $subject="Seat Confirmation";
       //     $msg="Your seat application accepted.\n Your room number is ".$room_no; 
       //     $msg=wordwrap($msg,70);
       //     //mail($email,"Seat Confirmation",$msg);
       //  //   $result3=true;   
       // }


if ($result) {
  
  echo "Accept guest";
} else {
    echo "Not accepted";
}
     
    
      
   }

//    if(isset($_POST['reject']) ) {
//      $approved_id=$aid;
//         $query = "delete from guestinfo where gform_id='$approved_id'";
//        $result=$db->delete($query);

// if ($result) {
//     echo "Application Deleted successfully";
    
// } else {
//     echo "Delete Failed";
// }
//      }
     
  
     
     ?>
     
      <h2> Accept Or Recject the Application</h2>
      <form method="post">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
     
<input type="submit" class="btn btn-primary" name="accept" value="Accept" >
<!-- <input type="submit" class="btn btn-primary" name="reject" value="Reject" > -->
 <a href="#" class="btn btn-success" style="float:right;">send confirmation email</a>
</form>
 </div>


     



            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    
          <?php include 'footer.php';?>

    
   
</body>
</html>
