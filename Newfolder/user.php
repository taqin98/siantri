<?php
include_once '../component/config.php';
session_start();
if(empty($_SESSION)){
	header("Location: index.php");
}
?>


<p>Anda berhasil login dengan detail sebagai berikut:</p>
<p>Username: <?php echo $_SESSION['username']; ?><br>
<p>Level: <?php echo $_SESSION['level']; ?></p>
<p><a href="logout.php" class="btn btn-primary" onclick="return confirm('Yakin ingin Logout?')">Log out</a></p>