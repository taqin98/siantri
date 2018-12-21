<?php
include '../component/config.php';

$id   = $_GET['no_rm'];

$query="DELETE from pasien where no_rm='$id'";
$del = mysqli_query($conn, $query);

if ($del)
	{
		?>

		<script> alert("Berhasil Pembatalan Antrian");document.location = "?halaman=registrasi";
		</script>
		<?php
	}else
	{
		?>
	
		<script> alert("Gagal Pembatalan Antrian");document.location = '?halaman=registrasi';
		</script>
		<?php
	}
?>