<?php 
session_start(); //memulai session
?>
<html>
<head>
<title>Session POST</title>
<style type="text/css">
	label.txt{
		font:normal 12px Tahoma,Verdana;
		display:block;
		color:#666666;
		text-transform:uppercase;
	}
</style>
</head>
<body>
<?php
if(isset($_POST['btn'])):
	//membuat session array dengan variabel - variabel POST
	$_SESSION['pos']=$_POST;
endif;

if(isset($_SESSION['pos'])):
	$nama   =$_SESSION['pos']['nama'];
	$alamat =$_SESSION['pos']['alamat'];
	$telp	=$_SESSION['pos']['telp']; 
else:
	$nama   ='';
	$alamat ='';
	$telp	='';
endif;
?>
<form method="post" name="frm" action="">
	<label class="txt">Nama</label>
	<input type="text" name="nama" value="<?php echo $nama; ?>" />
	<label class="txt">Alamat</label>
	<textarea name="alamat"> <?php echo $alamat;?> </textarea>
	<label class="txt">Telp</label>
	<input type="text" name="telp" value="<?php echo $telp; ?>" />
	<br />
	<input type="submit" name="btn" value="Submit" />
</form>
<?php
echo $_SESSION['pos']['nama'];
?>
</body>
</html>