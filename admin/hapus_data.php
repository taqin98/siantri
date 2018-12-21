<?php
include '../component/config.php';

$id   = $_GET['no_rm'];

$query="DELETE from pasien where no_rm='$id'";
$del = mysqli_query($conn, $query);

if ($del)
	{
		?>

		<script> alert("berhasil delete");document.location = "?halaman=data_antrian";
		</script>
		<?php
	}else
	{
		?>
	
		<script> alert("gagal");document.location = '?halaman=data_antrian';
		</script>
		<?php
	}
?>