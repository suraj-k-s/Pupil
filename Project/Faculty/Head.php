<!DOCTYPE html>
<html>
  <head>
    <?php
    session_start();
    include('SessionValidator.php');
    include("../Assets/Connection/Connection.php");
    ?>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../Assets/Template/Admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="../Assets/Template/Admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="../Assets/Template/form.css" rel="stylesheet" type="text/css" />

    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../Assets/Template/Admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../Assets/Template/Admin/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../Assets/Template/Admin/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../Assets/Template/Admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../Assets/Template/Admin/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../Assets/Template/Admin/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../Assets/Template/form.css" rel="stylesheet" type="text/css" />
    <link href="../Assets/Template/Admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
      .small-box{
    background-color: #2c3b41 !important;
    color: #ecf0f5 !important;
      }
    </style>
  </head>
  <body class="skin-yellow">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="HomePage.php" class="logo"><b>PUP</b>IL</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li><a href="HomePage.php">Home</a></li>
              <li><a href="../logout.php">Logout</a></li>
            
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <?php
      $selQry="select * from tbl_faculty where faculty_id=".$_SESSION['fid'];
      $res=$con->query($selQry);
      $data=$res->fetch_assoc()
      ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
          <div class="pull-left image">
          <img src="../Assets/Files/Faculty_file/Photo/<?php echo $data['faculty_photo']?>" class="img-circle" alt="User Image" />
            </div>
          <div class="pull-left image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['fname']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="Attendance.php">
                <i class="fa fa-table"></i> <span>Attendance</span>
              </a>
            </li>
            <li class="active treeview">
              <a href="AssignedSubjects.php">
                <i class="fa fa-dashboard"></i> <span>Internal Mark</span>
              </a>
            </li>
            <li class="active treeview">
              <a href="Fnotes.php">
                <i class="fa fa-folder"></i> <span>Notes</span>
              </a>
            </li>
            <li class="active treeview">
              <a href="ViewTimeTable.php">
                <i class="fa fa-table"></i> <span>Time Table</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Student Manage</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="Verifiedstudentlist.php"><i class="fa fa-circle-o"></i>Verified Students</a></li>
                <li><a href="Studentpending.php"><i class="fa fa-circle-o"></i>Student Verification</a></li>
                <li><a href="Rejectedstudentlist.php"><i class="fa fa-circle-o"></i>Rejected Students</a></li>
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-edit"></i> <span>Manage Profile</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="Myprofile.php"><i class="fa fa-edit"></i>My Profile</a></li>
            <li><a href="Editprofile.php"><i class="fa fa-edit"></i>Edit Profile</a></li>
            <li><a href="Changepassword.php"><i class="fa fa-edit"></i>Change Password</a></li>
              </ul> 
            </li>
            <ul>
            </ul>
          <ul>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper" >