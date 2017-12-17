<?php include 'sidebar.php';?> 
 <?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>
<?php
  $db=new Database();
  $fm=new Format();
?>

     
           
          
    <div id="wrapper">
         
      
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>View Messege</h2>
                         <?php
                       if(isset($_GET['vid'])){
                         $id=$_GET['vid'];
                            $query="UPDATE contact
                            SET seen='1'
                            WHERE id='$id'";
                            $delmsg=$db->update($query);
                            if ($delmsg) {
                                 echo "Message Seen Successfully!.";
                             }else{
                                 echo "Message Not Seen!!";
                             }
                         }
                 ?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                 
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <table class="form" >      
                  <?php 
                    if (isset($_GET['id'])) {
                        $id=$_GET['id'];
                        $query="SELECT * FROM contact Where id='$id'";
                        $contact=$db->select($query);
                        if ($contact) {
                            while ($result=$contact->fetch_assoc()) {

                  ?>
                            
                        <tr>
                            <td style="width: 130px;">
                               <label> From:</label>
                            </td>
                            <td>
                                <?php echo $result['email'] ;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <label> Sender Name:</label>
                            </td>
                            <td>
                                 <?php echo $result['name'] ;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <label> Message:</label>
                            </td>
                            <td>
                                <?php echo $result['msg'] ;?>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                               <a href="replymsg.php?id=<?php echo $result['id'];?>"> <input  style="margin-right:20px;" type="submit" name="" value="Reply">
                               </a>
                               <?php 
                               if ($_GET['seen']==0) { ?>
                                   <a onclick="return confirm('Are you Sure to send the messege to seen box!!!');" href="?vid=<?php echo $result['id'];?>"><input  type="submit" value="OK">
                                </a>
                             <?php  }?>
                                
                            </td>
                        </tr>
                        <?php }}}?>
                    </table>

 </div>

                   
                   
                </div>
                <!-- /. ROW  -->
    
         
            


                
                    

                <!-- /. ROW  -->
    
                 
                <!-- /. ROW  -->

            </div>
            </div>

         <!-- /. PAGE WRAPPER  -->
        </div>
    
          

     <!-- /. WRAPPER  -->
    
<?php include 'footer.php';?>
