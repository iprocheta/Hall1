<?php include 'sidebar.php';?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>
 <?php
$db=new Database();
 $fm=new Format();
?>
<body> 

    <div id="wrapper">
         
       
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>News List</h2>
                    </div>
                </div>
                <hr />

                <div class="table-responsive">           
  <table class="table">
    <thead>
      <tr>
          <th>No</th>
          <th>Content</th>
          <th>Catagory</th>
          <th>Action</th> 
           
      </tr>
    </thead>
    
    </div>
     <?php
     $query = "SELECT * FROM editor ORDER BY id DESC";
        $result=$db->select($query);
        $i=1;
        if($result){
        while($row = mysqli_fetch_array($result)){
        
      ?>
     <tbody>
      <tr class="success">

        <td width="1%"><?php echo $i++ ?></td>
        <td width="50%"><?php echo $fm->textShortent($row['comment'],50); ?></td>
           <td width="10%"> <?php echo $row['cat_name']; ?></td>
        
        <th> <a href="postlistdetails.php?pid=<?php echo $row['id'];?>">Edit/Delete</a></th>
        
      </tr>
      <?php  }} ?>
      </tbody>
      </table>



            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    
          <?php include 'footer.php';?>

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
