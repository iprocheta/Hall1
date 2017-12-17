  <?php
 include 'lib/Session.php';
 //Session::init();
 Session::checkSession();
 ?>

 <?php include 'header.php';?>


     
           
          
    <div id="wrapper">
         
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 
       <li> 
                        <a href="http://localhost/Hall/admin/index.php"><i class="fa fa-desktop "></i>Dashboard <span class="badge"></span></a>
                    </li>
                   

                    <li class=>
                        <a href="student.php"><i class="fa fa-qrcode"></i>Students <span class="badge"></span></a>
                    </li>
                    
                    <li>
                        <a href="application.php"><i class="fa fa-bar-chart-o"></i>Application Charts</a>
                    </li>

                    <li>
                        <a href="post.php"><i class="fa fa-edit "></i>Edit Post</a>
                    </li>
                     <li>
                        <a href="adminprofile.php"><i class="fa fa-table  "></i>Admin Profile Edit </a>
                    </li>
                     <li>
                        <a href="inbox.php"><i class="fa fa-inbox "></i>Inbox Check </a>
                    </li>
                    <li>
                        <a href="video.php"><i class="fa fa-inbox "></i>Add videos </a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
      
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
    
   

