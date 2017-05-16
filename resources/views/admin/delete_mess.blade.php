<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom CSS for view notifications -->
    <link href="css/view-notifications.css" rel="stylesheet">
    
    <!-- Custom CSS for Sidebar -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- Custom CSS for this page -->
    <link href="css/registered-user-home-page.css" rel="stylesheet">
     
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom CSS for view notifications -->
    <script src="js/view_notifications.js"></script>

    <style>
        .page-header{
            color:#c9302c; 
            border-color:#761c19;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Mess Finder</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="services.html">Services</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
                <ul class = "nav navbar-nav navbar-right">
                    <li id="noti_Container">
                        <div id="noti_Counter" title="Notifications"></div>   <!--SHOW NOTIFICATIONS COUNT.-->
                        
                        <!--A CIRCLE LIKE BUTTON TO DISPLAY NOTIFICATION DROPDOWN.-->
                        <!--
                        <div id="noti_Button"></div>    
                        -->
                        <div id="noti_Button" title="Notifications"><a href="#"><span class="glyphicon glyphicon-bell"></span></a></div>

                        <!--THE NOTIFICAIONS DROPDOWN BOX.-->
                        <div id="notifications">
                            <h3 id=noti_header>Notifications</h3>
                            <div style="height:300px;"></div>
                            <div class="seeAll"><a href="#">See All</a></div>
                        </div>
                    </li>
                    <li>
                        <a href="view_profile.html" title="View Profile">Raihan Ahmed</a>
                    </li>
                    <li class="dropdown" style="margin-right:120px">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        More Options<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li>
                            <a href="#">Edit Profile</a>
                        </li>
                        <li>
                          <a href="#">Change Preference</a>
                        </li>
                        <hr class="divider">
                        <li>
                            <a href="view_profile.html">LogOut</a>
                        </li>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                        Manage Mess           
                </li>
                <li>
                    <a href="#">View My Mess</a>
                </li>
                <li>
                    <a href="#">View Seat Requests</a>
                </li>
                <li>
                    <a href="#">Update Mess Data</a>
                </li>
                <li>
                    <a href="#">Change Manager</a>
                </li>
                <li>
                    <a href="#">Delete Mess</a>
                </li>
                <li class="sidebar-brand">
                        Manage Events
                </li>
                <li>
                    <a href="#">Create New Event</a>
                </li>
                <li>
                    <a href="#">View My Events</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->


    <div class="container" id="page_container">
      <h3 class="page-header">Delete Mess</h3>
          <div class="content">
            <label>Are you sure you want to delete the mess with all its data?</label>
            <button class="btn btn-danger"> Delete Mess</button>
         </div>
    </div>
</body>
</html>
