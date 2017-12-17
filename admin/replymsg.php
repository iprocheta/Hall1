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
                        <h2>Reply for incomming Messege</h2>
                        <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {

                         $to=$fm->validation($_POST['to']);
                         $from=$fm->validation($_POST['from']);
                         $sbj=$fm->validation($_POST['sbj']);
                         $msg=$fm->validation($_POST['msgtxt']);
                        $from="From: ".$from;

                         if ($to!=""&&$from!=""&&$msg!=""&&$sbj!="") {
                         $query="INSERT INTO message (send_to,sender,subject,msg) VALUES('$to','$from','$sbj','$msg')";
                        $result=$db->insert($query);

                            $mail=mail($to,$sbj,$msg,$from);
                                 if ($mail||$result) {
                                     echo "Message Send Successfully!.
                                        ";
                                        
                                 }else{
                                     echo "Message not Send!!";
                                 }
                         }
                    }
                                
                ?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                 
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <form action="" method="post">  
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
                          
                            <td >
                               <label>To:</label><br>
                            </td>
                            
                            <td>
                            <input type="text" class="form-control"name="to" value=" <?php echo $result['email'];?>">
                               <br>
                            </td>
                          

                        </tr>
                        <tr>
                        
                            <td>
                                 <label>From:</label><br>
                            </td>
                            <br>
                            <td>
                                <input type="text"class="form-control" name="from" name="email"><br>
                            </td>
                           
                        </tr>
                        <tr>
                            <td>
                                 <label>Subject:</label><br>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="sbj"><br>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label> Message:</label><br>
                            </td>
                            <td>
                                <textarea name="msgtxt" class="form-control"></textarea><br>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <input  type="submit" name="" value="Send">
                            </td>
                        </tr>
                        <?php }}}?>
                    </table>
                    </form>

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
