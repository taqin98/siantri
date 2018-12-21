<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN MASTER</title>
<?php include_once 'component/head.php'; ?>
<style type="text/css">
    .green-filter:after{
        background:-webkit-linear-gradient(135deg, rgba(40, 220, 145, 0.88) 0%, rgba(104, 188, 236, 0.9) 70%);
    }
</style>
</head>
<body>
<div class="container">
                
<div class="col-md-4 ml-auto mr-auto">
<div class="card card-nav-tabs">
    <div class="card-header card-header-info text-center">
        <h4>MASUK</h4>
    </div>
         <div class="card-body ">
            <div class="tab-content">
                                     
<?php
include('component/config.php');
if(isset($_POST['login'])){
    $user   = $conn->real_escape_string($_POST['username']);
    $pass   = md5($conn->real_escape_string($_POST['password']));
 
    $sql = mysqli_query($conn,"SELECT * FROM user WHERE username='$user' AND password='$pass'") or die(mysqli_error());
    if(mysqli_num_rows($sql) == 0){
        echo 'User tidak ditemukan';
    }else{
        $row = mysqli_fetch_assoc($sql);
        if($row['level'] == 1){
            $_SESSION['admin']=$user;
            echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="admin/index.php";</script>';
        }else{
            $_SESSION['guest']=$user;
            $_SESSION['id_user']=$row['id_user'];
            echo '<script language="javascript">alert("Anda berhasil Login Guest!"); document.location="guest/index.php";</script>';
        }
    }
}
?> 
    <form method="POST" action="" style="margin-top: 30px;">
        <div class="input-group">
            <input type="text" class="form-control" name="username" placeholder="Username Anda..." autofocus="" required="">
        </div>
        <br>
        <div class="input-group">
            <input type="password" class="form-control" name="password" placeholder="Password Anda..." autofocus="" required="">
        </div>

        <br>
        <input type="submit" name="login" class="btn" style="border-radius: 30px; background: orange; width: 280px;" value="masuk">

        <div class="input-group">
            <p><a href="">Lupa kata sandi !!</a> <a href="daftar.php">Daftar</a></p>
        </div>

        <button class="btn" style="border-radius: 30px; background: red; width: 130px;">google</button>
        &nbsp;&nbsp;
        <button class="btn" style="border-radius: 30px; background: blue; width: 130px;">facebook</button>


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