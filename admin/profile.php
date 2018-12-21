<?php
$conn = mysqli_connect("localhost","root","","master_sanindo");

session_start();
if(empty($_SESSION)){
	header("Location: index.php");
}

$s = $_SESSION['admin'];
?>

<?php
$q = mysqli_query($conn,"SELECT * FROM  users WHERE username='$s' ");
$data = mysqli_fetch_array($q);

?>
<p>	Anda berhasil login dengan detail sebagai berikut: <br>
	Nama : <?php echo $data['nama']; ?><br>
    Username: <?php echo $_SESSION['admin']; ?><br>
	<a href="../logout.php" class="btn btn-warning" onclick="return confirm('Yakin ingin Logout?')">
		<i class="material-icons">exit_to_app</i> Log out
	</a>
</p>