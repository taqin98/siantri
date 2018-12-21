<?php
include '../component/config.php';
$id = $_GET['no_rm'];
$sql = mysqli_query($conn,"SELECT * from pasien NATURAL JOIN klinik NATURAL JOIN dokter NATURAL JOIN proses WHERE no_rm='$id'");
$data = mysqli_fetch_array($sql);
?>



<form method="POST" action="">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No Antrian</th>
                <th>No Rekam Medis</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kode Klinik</th>
                <th>Nama Klinik</th>
                <th>Kode Dokter</th>
                <th>Nama Dokter</th>
                <th>Proses</th>
                <td>
                    <input type="hidden" name="proses" value="P01">
                    <input type="submit" name="update" value="verifikasi" class="btn btn-warning">
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $data['id_antrian']; ?></td>
                <td><?php echo $data['no_rm']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['id_klinik']; ?></td>
                <td><?php echo $data['nama_klinik']; ?></td>
                <td><?php echo $data['id_dokter']; ?></td>
                <td><?php echo $data['nama_dok']; ?></td>
                <td><?php echo $data['ket']; ?></td>
            </tr>
        </tbody>
    </table>                
</form>


<?php
if (isset($_POST['update'])) {
    include '../component/config.php';

    $query = "UPDATE pasien SET id_proses = '".$_POST['proses']."' WHERE no_rm='".$id."' ";

    $hasil = mysqli_query($conn,$query);
    if ($hasil) {
        ?>
        <script>
        alert("Berhasil Verifikasi Data"); document.location= '?halaman=data_antrian';
        </script>
        <?php
    } else {
        ?>
        <script>
        alert("Gagal Verifikasi Data"); document.location= '?halaman=data_antrian';
        </script>
        <?php
    }
}


?>