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
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />             
                    <div class="col-lg-6 col-md-6">
                        <a href="#" class="btn btn-primary">Add impotant notice</a>
                        <a href="postlist.php" class="btn btn-success">News List</a>
                        
                    </div>
                    <br>
                    <br>
                    <div class="container-fluid">,
                    <form action="" method="post"> 
                     <input type="text" class="form-control" placeholder="Add Catagory" name="cat_name" /><br>
                    <textarea class="ckeditor" name="editor"></textarea>
                    <input type="submit" value="INSERT" name="insert">

              </form>

        
                       

                    </div>
                    <?php
if(isset($_POST['insert']) )
{
     $comment=mysqli_real_escape_string($db->link, $_POST['editor']);
    
    $cat_name=mysqli_real_escape_string($db->link,$_POST['cat_name']);
    $query="INSERT INTO editor(comment,cat_name) VALUES('$comment','$cat_name')";
    $result=$db->insert($query);
    if($result)
    {
        echo "<span style='color:red'>News inserted Successfully.</span>";
    }
    else 
    {
        echo "<span class='error'>News Not inserted !</span>";
    }
    
}

?>
        

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

    
   


