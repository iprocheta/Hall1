<?php include 'lib/Session.php';
 //Session::init();
 Session::checkSession();
 ?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php
$db=new Database();
$id=Session::get('studentId');
?>
<?php  

  require("fpdf/fpdf.php");
  if($_SERVER ['REQUEST_METHOD']=="POST" ) {
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
             }
              $query2 = "INSERT INTO oldapplicationinfo(studentId,gpa,married_status,post_code,cause,type,image,applied_date) 
VALUES ('$studentId','$gpa','$married_status','$post_code','$cause','$type','$uploaded_image','$applied_date')";
 $result=$db->insert($query2);
                  
       
    
                        
    $query = "SELECT * FROM student WHERE studentId='$id'";
    $result=$db->select($query);
    $row = mysqli_fetch_array($result);
    $query1 = "SELECT * FROM oldapplicationinfo WHERE studentid='$id'";
    $result1=$db->select($query);
    $row1 = mysqli_fetch_array($result);
   

$pdf=new FPDF();
$pdf->AddPage();
$pdf->Setfont("Arial","B",16);

$pdf->Cell(0,10,"welcome{$row['fullname']}",1,1,'C');
//$pdf->Cell(50,10,"Guardian Image:{<img src='", $row['image'], "' />}",0,1);
$pdf->Cell(50,10,"Name:{$row['fullname']}",0,1);
$pdf->Cell(50,10,"studentId:{$row['studentId']}",0,1);
$pdf->Cell(50,10,"Discipline:{$row['discipline']}",0,1);
$pdf->Cell(50,10,"Term:{$row['term']}",0,1);
$pdf->Cell(50,10,"Year:{$row['year']}",0,1);
$pdf->Cell(50,10,"Father's Name:{$row['father_name']}",0,1);
$pdf->Cell(50,10,"Mother's Name:{$row['mother_name']}",0,1);
$pdf->Cell(50,10,"Contact Number:{$row['contactNo']}",0,1);
$pdf->Cell(50,10,"Parmanent Address:{$row['par_address']}",0,1);
$pdf->Cell(50,10,"Pressent Address:{$row['pre_address']}",0,1);
$pdf->Cell(50,10,"TGPA:{$gpa}",0,1);
$pdf->Cell(50,10,"Marrital Status:{$married_status}",0,1);
$pdf->Cell(50,10,"Post Code:{$post_code}",0,1);
$pdf->Cell(50,10,"Cause:{$cause}",0,1);
$pdf->Cell(50,10,"Applied Date:{$applied_date}",0,1);




$pdf->output();
   }






?>