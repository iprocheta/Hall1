<?php include 'sidebar.php';?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php
$db=new Database();
?>       
    <div id="wrapper">
        
        <!-- /. NAV SIDE  -->
      
      <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Hall Notice  Area</h2>
                         <?php
                        if(isset($_GET['vid']) ) {
                        $id=$_GET['vid'];
                        $query = "delete from video where v_id='$id'";
     
                       $result=$db->delete($query);
                       if ($result) {
                       echo "video Deleted successfully";
   
                       } else {
                       echo "Delete Failed";
                      }
                  }
                      ?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />             
                    <div class="col-lg-6 col-md-6">
                        <form method="post" enctype="multipart/form-data">
<table border="1">
<tr>
<td>Upload  Video</td></tr>
<tr><td><input type="file" name="fileToUpload"/></td></tr>
<tr><td>
<input type="submit" value="Uplaod Video" name="upd"/>
<input type="submit" value="Display Video" name="disp"/>

</td></tr>
</table>
</form>
                        
                    </div>
                    <br>
                    <br>
                    <br>
                    <hr>
                    <div class="container-fluid">
                    <!-- <form action="" method="post">  -->
                    
                  <!-- </form> -->
<?php

$con = mysqli_connect("localhost", "root", "", "se") or die("Error " . mysqli_error($con));
extract($_POST);
$target_dir = "test_upload/";
if(!empty($_FILES) && !empty($_FILES["fileToUpload"]["name"]) ){
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
}
if(!empty($upd))
{
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg")
    {
        echo "File Format Not Suppoted";
    }
    else
    {
        $video_path=$_FILES['fileToUpload']['name'];
        mysqli_query($con,"insert into video(video_name) values('$video_path')");
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
        echo "uploaded ";
    }
}
if(isset($_POST['dlt']))
{
    
}
if(!empty($disp))
{
    $query=mysqli_query($con,"select * from video");
    while($all_video=mysqli_fetch_array($query))
    {
        ?>

    <video width="300" height="200" controls>

    <source src="test_upload/<?php echo $all_video['video_name']; ?>" type="video/mp4">


    </video> 
    <a  onclick="return confirm('Are you want to Delete?');" href="?vid=<?php echo $all_video['v_id'];?>"> delete video</a>

    
    <?php } } ?>

        
                       

                    </div>
                    
        

            </div>
           
         <!-- /. PAGE WRAPPER  -->
        </div>
    
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
     <?php include 'footer.php'?>

    <!-- <script src="assets/js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script> -->

    
   
