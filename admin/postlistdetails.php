<?php include 'sidebar.php';?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>

 <?php
$db=new Database();
?>
<?php
  if (isset($_GET['pid'])) {
      $id=$_GET['pid'];
     

    }else{
      header("location:index.php");
      exit();
    }
    //echo "$id";
    //echo "$aid";
?>
 
        
    <div id="wrapper">
        
        <!-- /. NAV SIDE  -->
      
      <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Post Area</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />  
                <?php
        $query = "SELECT comment,cat_name FROM editor where id='$id'";
        $result=$db->select($query);
        $row = mysqli_fetch_array($result);
      ?>           
                    <div class="col-lg-6 col-md-6">
                        <a href="post.php" class="btn btn-primary">Add Post</a>
                        <a href="postlist.php" class="btn btn-success">Post List</a>
                    </div>
                    <br>
                    <br>
                    <div class="container-fluid">
                    <form action="" method="post"> 
                    <h5><b>Catagory Name:</h5>
                    <input type="text" class="form-control" placeholder="<?php echo $row['cat_name']; ?>" name="cat_name" /><br>
                    <textarea class="ckeditor" name="editor" <?php echo $row['comment']; ?>
                    </textarea>
                    <input type="submit" value="Update" name="update">
                     <input type="submit" value="Delete" name="delete">


                    </form>
        
                       

                    </div>
        <?php
    if(isset($_POST['update']) )
    {
        $comment=mysqli_real_escape_string($db->link, $_POST['editor']);
        $cat_name=mysqli_real_escape_string($db->link,$_POST['cat_name']);
         $query="UPDATE editor
                                SET
                                comment='$comment',cat_name='$cat_name' Where id='$id' ";
         $result=$db->update($query);
         if ($result) {
                  echo "<span style='color:red'>post Updated Successfully.</span>";
                  
                      } else {
                 echo "<span class='error'>post Not Updated !</span>";
                      }

    }
    
    if(isset($_POST['delete']) )
    {
        $comment=mysqli_escape_string($db->link,$_POST['editor']);
        $cat_name=mysqli_real_escape_string($db->link,$_POST['cat_name']);
         $query="Delete  FROM editor
                                where
                                id='$id' ";
         $result=$db->delete($query);
         if ($result) {
                  echo "<span style='color:red'>post deleted Successfully.</span>";
                  
                      } else {
                 echo "<span class='error'>post Not deleted !</span>";
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
    
   


