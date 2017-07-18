<?php

	include("connect.php"); 		
	$link=Connection();
	$result=mysql_query("SELECT * FROM `tbl_dataSensor` ORDER BY `time` Desc",$link);
	
	if(isset($_POST['delete'])) {
		$id = $_POST['id'];  
        $delete = "delete from tbl_datasensor where id = $id" ;
		$hasil = mysql_query($delete);

		if(! $hasil ) {
               die('Could not delete data: ' . mysql_error());
            }
            
            echo " <center> <b> <font color = 'red' size = '4'> <p> Data dengan nama $id Berhasil dihapus </p> </center> </b> </font> <br/>
				  ";
            
            mysql_close($link);
         }else {
	
?>


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
		<!-- DataTables -->
		<link rel="stylesheet" href="datatables/dataTables.bootstrap.css">
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
                        <li class="treeview">
                            <a href="/TA_Project/Index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
                            </a>
                        </li>
						<li class="active treeview">
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
                        <li class="active">Data Sensor</li>
                    </ol>
                </section>
             
                
				
				<section class="content">
          <div class="row">
            <div class="col-xs-12">
			
			<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kualitas Air Berdasarkan Suhu dan pH</h3></br></br>
				  <a href="excel1.php" >Cetak laporan</a>
                </div><!-- /.box-header -->
                <div class="box-body">
				<form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th class="sorting_desc">Time</th>
                        <th>Temperature</th>
                        <th>pH</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php if($result!==FALSE){
					while($row = mysql_fetch_array($result)) {
                       ?> 
                      <tr>
                        <td><?php printf($row["time"]) ?></td>
                        <td><?php printf($row["temperature"]) ?></td>
                        <td><?php printf($row["pH"]) ?></td>
                        <td>
	
							<a class="btn btn-danger" href="/Ta_Project/delete.php?id=<?php echo $row["id"]?>">Hapus</a>
							</td>
                      </tr>
					  <?php }
					 mysql_free_result($result);
					mysql_close();
					}
				?>
					</tbody>
			</table>
			</form>
            <?php
         }
      ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        </div>


        <!-- jQuery 2.1.4 -->
        <script src="jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
		<!-- DataTables -->
    <script src="datatables/jquery.dataTables.min.js"></script>
    <script src="datatables/dataTables.bootstrap.min.js"></script>
        <script>
      $(function () {
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": true
        });
      });
    </script>
		
    </body>
</html>
