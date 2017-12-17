
<?php
$db=new Database();
$sid = Session::get('studentId');
$query="select * from residential where studentid='$sid'";
$r=$db->select($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student's Activity</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .navbar-inner {
    background-color:transparent;
}
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        What do you want??
                    </a>
                </li>
                <li>
                    <a href="http://localhost/hall/indexx.php">Home</a>
                </li>
                <li>
                    <a href="http://localhost/hall/profile.php">Dashboard</a>
                </li>
                <?php if($r == false){?>
                <li>
                    <a href="http://localhost/hall/seatapplication.php">Apply for seat</a>
                </li>
                <?php } ?>
                 <?php if($r !=false){ ?>
                <li>
                    <a href="http://localhost/hall/seatexchange.php">Apply for Seat exchange</a>
                </li>
               
                <li>
                    <a href="http://localhost/hall/vacationform.php">Apply for vacation</a>
                </li>
                <li>
                    <a href="http://localhost/hall/guestform.php">Apply for Holding guest</a>
                </li>
                <li>
                    <a href="http://localhost/hall/notification.php">Notification</a>
                </li>

                <?php

                 } ?>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        
                      <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Click to view full screen</a> 
                    </div>
                </div>

            </div>
        </div>
        <!-- /#page-content-wrapper -->
        
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
