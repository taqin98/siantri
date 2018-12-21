<?php
include '../component/config.php';

$id   = $_GET['id_dokter'];

$query="DELETE from dokter where id_dokter='$id'";
$del = mysqli_query($conn, $query);

if ($del)
	{
		?>

		<script> alert("berhasil delete");document.location = "?halaman=view_dokter";
		</script>
		<?php
	}else
	{
		?>
	
		<script> alert("gagal");document.location = '?halaman=view_dokter';
		</script>
		<?php
	}
?>