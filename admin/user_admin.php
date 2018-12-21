<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/kit/free/apple-icon.png">
    <link rel="icon" href="../assets/img/kit/free/favicon.png">
    <title>
       ADMIN MASTER SANINDO
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="../assets/css/material-kit-font.css" />
    <link rel="stylesheet" href="../assets/css/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/material-kit.css?v=2.0.2">
    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/assets-for-demo/demo.css" rel="stylesheet" />
    <!-- iframe removal -->
    <style type="text/css">
        .biru{
            background:-webkit-linear-gradient(135deg, rgb(8, 162, 178) 0%, rgba(125, 46, 185, 0.45) 100%);
        }
    </style>
	
<style type="text/css">
    .green-filter:after{
        background:-webkit-linear-gradient(135deg, rgb(0, 204, 255) 50%, rgba(104, 188, 236, 0.9) 70%);
    }

</style>
</head>
<body>

<div class="main main-raised" style="margin-top: 30px;">
	
<div class="card card-nav-tabs">
                                <div class="card-header card-header-warning">
                                    <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul class="nav nav-tabs" >
                                                <li class="nav-item">
                                                    <a class="nav-link" href="user_admin.php" >
                                                        <i class="material-icons">face</i> Profile
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="?halaman=layanan" >
                                                        <i class="material-icons">chat</i> Master Data
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                            
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="tab-content">
                                      
                                            <?php
                                            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                                            	session_start();
                                            	switch ($_GET['halaman']) 
                                            	{
                                            		case 'layanan':
                                            			# code...
                                            			include 'layanan.php';
                                            			break;

                                                    case 'edit':
                                                        include 'edit_data.php';
                                                        break;
                                            		
                                            		default:
                                            			# code...
                                            			include 'user_admin.php';
                                            			break;
                                            	}
                                            ?>
                                  
                                       
                                    </div>
                                </div>
                           
                            
<hr>
<footer class="footer ">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="https://www.jdkstudio.com">
                            WG SANINDO
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, dibuat dengan <i class="material-icons">favorite</i> by
                <a href="https://www.instagram/taqin_jdk" target="_blank">taqin_jdk</a> untuk masyarakat.
            </div>
        </div>
	</footer>

	<script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/bootstrap-material-design.js"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
    <script src="../assets/js/plugins/moment.min.js"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../assets/js/plugins/nouislider.min.js"></script>
    <!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
    <script src="../assets/js/material-kit.js?v=2.0.2"></script>
    <!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
    <script src="../assets/assets-for-demo/js/material-kit-demo.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            //init DateTimePickers
            materialKit.initFormExtendedDatetimepickers();

            // Sliders Init
            materialKit.initSliders();
        });
    </script>
	</div>
</div>
</body>
</html>