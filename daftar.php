<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'component/head.php'; ?>
<style type="text/css">
    .green-filter:after{
        background:-webkit-linear-gradient(135deg, rgba(40, 220, 145, 0.88) 0%, rgba(104, 188, 236, 0.9) 70%);
    }
</style>
</head>
<body>
<<div class="container">
                
<div class="col-md-4 ml-auto mr-auto">
<div class="card card-nav-tabs">
                            <div class="card-header card-header-info text-center">
                                    <h4>Daftar</h4>
                                
                                </div>
                                <div class="card-body ">
                                    <div class="tab-content">
                                      
                                                <form method="POST" style="margin-top: 30px;">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" autofocus="" required="">
                                                    </div>
                                                    <br>
                                                    <div class="input-group">
                                                        <input type="email" class="form-control" name="email" placeholder="Email Anda..." autofocus="" required="">
                                                    </div>
                                                    <br>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="username" placeholder="Username" autofocus="" required="">
                                                    </div>
                                                    <br>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" name="password" placeholder="Password Anda..." autofocus="" required="">
                                                    </div>
                                                    <br>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" name="password2" placeholder="Ulangi Password Anda..." autofocus="" required="">
                                                        <input type="hidden" name="level" value="2">
                                                    </div>

                                                    <br>
                                                    <input type="submit" name="daftar" value="daftar" style="border-radius: 30px; background: orange; width: 100%;" class="btn">
                                                    <input type="reset" name="batal" class="btn btn-danger" style="border-radius: 30px; width: 100%;" value="batal">

                                                    <div class="input-group">
                                                        <a href="login.php"><p>sudah punya akun !! login disini</p></a>
                                                    </div>

                                                </form>


                                       
                                    </div>
                                </div>

                       
                           
                            
        </div>
    </div>
</div>
    <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/bootstrap-material-design.js"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
    <script src="./assets/js/plugins/moment.min.js"></script>
    <!--    Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="./assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--    Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="./assets/js/plugins/nouislider.min.js"></script>
    <!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
    <script src="./assets/js/material-kit.js?v=2.0.2"></script>
    <!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
    <script src="./assets/assets-for-demo/js/material-kit-demo.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            //init DateTimePickers
            materialKit.initFormExtendedDatetimepickers();

            // Sliders Init
            materialKit.initSliders();
        });
    </script>

</body>
</html>
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include 'component/config.php';
        if(isset($_POST['daftar'])){
          $nama   = $conn->real_escape_string($_POST['nama']);
          $email  = $conn->real_escape_string($_POST['email']);
          $user   = $conn->real_escape_string($_POST['username']);
          $pass   = md5($conn->real_escape_string($_POST['password']));
          $pass2  = md5($conn->real_escape_string($_POST['password2']));
          $akses  = $conn->real_escape_string($_POST['level']);
          if(strlen($pass) >= 5){
            if($pass == $pass2){
              $password = md5($pass);
              $insert = $conn->query("INSERT INTO user(nama, email, username, password, level) VALUES('$nama', '$email', '$user', '$pass', '$akses')");
              if($insert){
                ?>
                <script type="text/javascript">
                    alert("Anda Berhasil mendaftar");document.location = 'login.php';
                </script>
                <?php
              }else{
                ?>
                <script type="text/javascript">
                    alert("Anda Gagal mendaftar");document.location = 'daftar.php';
                </script>
                <?php
              }
            }else{
              ?>
                <script type="text/javascript">
                    alert("Konfirmasi password tidak sesuai");document.location = 'daftar.php';
                </script>
                <?php
            }
          }else{
            ?>
                <script type="text/javascript">
                    alert("Password Minimal 3 karakter");document.location = 'daftar.php';
                </script>
                <?php
          }
        }
    ?>