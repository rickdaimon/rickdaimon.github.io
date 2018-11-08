<?php 
include_once ('../config/config.php');
if (isset($_COOKIE['hash'])) {
		$sql = $db->query("SELECT * FROM `users` WHERE `hash` = " . $db->quote($_COOKIE['hash']));
		if ($sql->rowCount() != 0) {
			$row = $sql->fetch();
			$user = $row;
			setcookie('tradeurl', $user['tradeurl'], time() + 3600 * 24 * 7, '/');
			$user['name'] =  str_replace("script"," ", strtolower($user['name']));

			if(strlen($user['name']) > 15){
				$user['name'] = substr($user['name'], 0, 15)."...";
			}
		} else{
			setcookie("hash", "", time() - 3600, '/');
			header('Location: /login');
			exit();
		}
}
if($user['admin'] == '1'){

}else{
	header('Location: ../');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../admin/plugins/images/favicon.png">
    <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../admin/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../admin/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../admin/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                     <a href="../"><img src="../admin/plugins/images/logo.png" alt="home" /></a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li>
                        <a class="profile-pic" href="#"> <img src="<?php echo $user['avatar'];?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $user['name']; ?></b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="users.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Users</a>
                    </li>
                    <li>
                        <a href="bots.php" class="waves-effect"><i class="fa fa-android fa-fw" aria-hidden="true"></i>Bots</a>
                    </li>
                    <li>
                        <a href="items.php" class="waves-effect"><i class="fa fa-steam  fa-fw" aria-hidden="true"></i>Items</a>
                    </li>
                    <li>
                        <a href="../" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Logout</a>
                    </li>
                </ul>
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Admin Panel Bots</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Bots</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
				<!-- count users , bots, trades !---->
               <div class="row">
			    <div class="col-md-12">
			   <div class="panel panel-default">
			   <div class="panel-heading">
			   Add Bots
			   </div>
			   <div class="panel-body">
			    <?php include_once('plugins/addbots.php'); ?>
                <form class="form-group text-center" method="post">
				<div class="form-inline">
				<input style="width:45%; margin-top: 2px;" class="form-control" name="steamid" placeholder="SteamID" />
				<input style="width:45%; margin-top: 2px;" class="form-control" name="name" placeholder="Name" />
				</div>
				<div class="form-inline">
				<input style="width:45%; margin-top: 2px;" class="form-control" name="accountName" placeholder="Account Name" />
				<input style="width:45%; margin-top: 2px;" class="form-control" name="password" placeholder="Password" />
				</div>
				<div class="form-inline">
				<input style="width:45%; margin-top: 2px;" class="form-control" name="shared_secret" placeholder="Shared secret" />
				<input style="width:45%; margin-top: 2px;" class="form-control" name="identity_secret" placeholder="Identity secret" />
				</div>
			     <button style="width:90%; margin-top: 5px;" class="btn btn-lg btn-success" type="submit" name="addbot">Add bot</button>
				</form>
			   </div>
			   </div>
			   
  </div>
			   <!-- include topusers !-->
			   <div class="col-md-12">
			   <div class="panel panel-default">
			   <div class="panel-heading">
			   All Bots
			   </div>
			   <div class="panel-body">
<table class="table">
  <thead> 
    <tr>
      <th>#</th>
      <th>SteamID</th>
      <th>Account Name</th>
      <th>Password</th>
	  <th>Shared Secret</th>
	  <th>Identity Secret</th> 
    </tr>
  </thead>
  <tbody>
<?php include_once('plugins/bots.php'); ?>
<?php
foreach ($row as $key => $value) {
	 $id = $value['id'];
	$accountName = $value['accountName'];
	$password = $value['password'];
    $steamid = $value['steamid'];
	$shared_secret = $value['shared_secret'];
	$identity_secret = $value['identity_secret'];
echo " <tr>\n"; 
echo "      <th scope=\"row\">$id</th>\n"; 
echo "      <td>$steamid</td>\n"; 
echo "      <td>$accountName</td>\n"; 
echo "      <td>$password</td>\n"; 
echo "      <td>$shared_secret</td>\n"; 
echo "      <td>$identity_secret</td>\n"; 
echo "    </tr>\n"; 
echo "\n";
}
?>
  </tbody>
</table>
			   </div>
			   </div>
			   
  </div>
</div>
			   </div>
			   </div>
               
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; CSGO ROULETTE ADMIN PANEL </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../admin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="../admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../admin/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="../admin/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="../admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="../admin/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
</body>

</html>
