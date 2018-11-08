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
                        <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> 
                     </form>
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
                     <h4 class="page-title">Dashboard</h4>
                  </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                     <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
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
               <?php include('plugins/usersview.php'); ?>
               <?php include('plugins/botscount.php'); ?>
               <?php include('plugins/tradescount.php'); ?>
               <div class="row">
                  <div class="col-lg-4 col-sm-6 col-xs-12">
                     <div class="white-box analytics-info">
                        <h3 class="box-title">Total users</h3>
                        <ul class="list-inline two-part">
                           <li>
                              <div id="sparklinedash"></div>
                           </li>
                           <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?php echo $usercount; ?></span></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-xs-12">
                     <div class="white-box analytics-info">
                        <h3 class="box-title">Total bots</h3>
                        <ul class="list-inline two-part">
                           <li>
                              <div id="sparklinedash2"></div>
                           </li>
                           <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?php echo $botscount; ?></span></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-xs-12">
                     <div class="white-box analytics-info">
                        <h3 class="box-title">Total trades</h3>
                        <ul class="list-inline two-part">
                           <li>
                              <div id="sparklinedash3"></div>
                           </li>
                           <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo $tradescount; ?></span></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!--/.row -->
               <!--row -->
               <!-- ============================================================== -->
               <!-- table -->
               <!-- ============================================================== -->
               <div class="row">
                  <div class="col-md-3">
                     <div class="panel panel-default">
                        <?php include_once ('plugins/settings.php'); ?>
                        <div class="panel-heading">Site name</div>
                        <div class="panel-body">
                           <form action="" method="post" class="form-group">
                              <input class="form-control" type="text" name="sitename" placeholder="<?php echo $sitename; ?>"/>
                              <button style="width: 100%; margin-top: 5px;" class="btn btn-sm btn-success" type="submit" name="submit">Edit Site name</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="panel panel-default">
                        <div class="panel-heading">Site IP</div>
                        <div class="panel-body">
                           <form action="" method="post" class="form-group">
                              <input class="form-control" type="text" name="ip" placeholder="<?php echo $ip; ?>"/>
                              <button style="width: 100%; margin-top: 5px;" class="btn btn-sm btn-success" type="submit" name="sitename">Edit Site IP</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="panel panel-default">
                        <div class="panel-heading">Referal coins</div>
                        <div class="panel-body">
                           <form action="" method="post" class="form-group">
                              <input class="form-control" type="text" name="referal" placeholder="<?php echo $referal_summa; ?>"/>
                              <button style="width: 100%; margin-top: 5px;" class="btn btn-sm btn-success" type="submit" name="submit">Edit Referal Coins</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="panel panel-default">
                        <div class="panel-heading">Min withdraw</div>
                        <div class="panel-body">
                           <form action="" method="post" class="form-group">
                              <input class="form-control" type="text" name="min" placeholder="<?php echo $min; ?>"/>
                              <button style="width: 100%; margin-top: 5px;" class="btn btn-sm btn-success" type="submit" name="submit">Edit Min Withdraw</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div style="background: #2d2d2d !important; color: #fefefe;" class="panel panel-default">
                        <div style="background: #2d2d2d !important; color: #fefefe;" class="panel-heading"><i class="fa fa-steam-square" aria-hidden="true"></i> Steam API Key</div>
                        <div style="background: #2d2d2d !important; color: #fefefe;" class="panel-body">
						 <form action="" method="post" class="form-group">
                              <input class="form-control" type="text" name="steamapi" placeholder="<?php echo $steamapi; ?>"/>
                              <button style="width: 100%; margin-top: 5px;" class="btn btn-sm btn-success" type="submit" name="submit">Edit Steam API Key</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div style="background: #F44336 !important; color: #fefefe;" class="panel panel-default">
                        <div style="background: #F44336 !important; color: #fefefe;" class="panel-heading"><i class="fa fa-google" aria-hidden="true"></i> Google Recaptca API Key</div>
                        <div style="background: #F44336 !important; color: #fefefe;" class="panel-body">
						 <form action="" method="post" class="form-group">
						      <p>Google api secret key</p>
                              <input class="form-control" type="text" name="googleapisecret" placeholder="<?php echo $googleapisecret; ?>"/></br>
							  <p>Google api site key</p>
							   <input class="form-control" type="text" name="googleapisite" placeholder="<?php echo $googleapisite; ?>"/>
                              <button style="width: 100%; margin-top: 5px;" class="btn btn-sm btn-success" type="submit" name="submit">Edit Google Api Recaptcha</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <!-- include topusers !-->
               <div class="col-md-12">
                  <div class="panel panel-default">
                     <div class="panel-heading">Most users</div>
                     <div class="panel-body">
                        <?php
                           include ('plugins/topusers.php');
                           echo "<table class=\"table\">\n"; 
                           echo "  <thead>\n"; 
                           echo "    <tr>\n"; 
                           echo "      <th>ID</th>\n"; 
                           echo "      <th>SteamID</th>\n"; 
                           echo "      <th>Name</th>\n"; 
                           echo "      <th>Balance</th>\n"; 
                           echo "    </tr>\n"; 
                           echo "  </thead>\n"; 
                           foreach ($row as $key => $value) {
                           echo "  <tbody>\n"; 
                           echo "    <tr>\n";
                               $id = $value['id'];
                           	$name = $value['name'];
                               $steamid = $value['steamid'];
                           	$balance = $value['balance'];
                           echo " <th scope=\"row\">$id</th>\n"; 
                           echo "      <td>$name</td>\n"; 
                           echo "      <td>$steamid</td>\n"; 
                           echo "      <td>$balance</td>\n";
                           }
                           echo "</tr>\n"; 
                           echo "  </tbody>\n"; 
                           echo "</table>\n";
                           ?>
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