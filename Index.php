

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
		

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">

                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Tugas Akhir</b> Project</span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Baius Salam</span>
                                </a>       
                            </li>  
                        </ul>
                    </div>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active treeview">
                            <a href="/TA_Project/Index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
                            </a>
                        </li>
						
						<li class="treeview">
                            <a href="/TA_Project/DataSensor.php">
                                <i class="fa fa-dashboard"></i> <span>Data Sensor</span> 
                            </a>
                        </li>
					</ul>
                </section>
                <!-- /.sidebar -->
            </aside>


            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Web Monitoring Suhu dan pH Air
                        <small>Version 1.0</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol><br>
					<!--bagian ketiga:tempat untuk jam-->
					<div > <h3 id="tempat_jam"></h3></div>
					<!--akhir bagian tiga-->
                </section>
                
                
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
					
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div>
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->

 
						
						<div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><img src="images/ph.png"> </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">pH <small>(%)</small></span>
                                    <span class="info-box-number" id="pH">6.85 </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><img src="images/tm.png" style="height:80%"></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Temperature (C)</span>
                                    <span class="info-box-number" id="temperature">29 </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
					
						
					
					
                    </div><!-- /.row -->
					

            </div><!-- /.content-wrapper -->
        </div>


        <!-- jQuery 2.1.4 -->
        <script src="jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
		
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
		<script src="script.js"></script>

    </body>
</html>
