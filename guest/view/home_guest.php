<div style="text-align:center">
		<h2>User Area</h2>
		<p><a href="index.php">Home</a> / <a href="../logout.php" onclick="return confirm(\'Yakin Ingin Logout\')">Logout</a></p>
 		
 		<?php
 		include '../component/config.php';
        $sql = $conn->query("SELECT * FROM user WHERE id_user='{$_SESSION['id_user']}'");
        $data = $sql->fetch_assoc();
        ?>

		<p>Selamat datang di User Area, Anda Login dengan id_user <?php echo $_SESSION['id_user'];?></p>
		<p>Username :<?php echo $_SESSION['guest']; ?></p>
		<p>Nama :<?php echo $data['nama']; ?></p>
		<p>Email :<?php echo $data['email']; ?></p>
	</div>