<?php
include '../component/config.php';
$id = $_GET['id_dokter'];
$sql = mysqli_query($conn,"SELECT * from dokter WHERE id_dokter='$id'");
$data = mysqli_fetch_array($sql);
?>

<br><br>
<form method="POST" id="form1">
  <div class="form-row">
    <div class="col-md-3">
      <label><strong>No Rekam Medis *</strong></label>
      <input type="text" name="id_dokter" value="<?php echo $data['id_dokter']; ?>" disabled class="form-control">
    </div>

    <div class="col-md-3">
      <label><strong>Nama Dokter *</strong></label>
      <input type="text" name="nama" required="required" value="<?php echo $data['nama_dok']; ?>" class="form-control">
    </div>

    <div class="col-md-3">
      <label><strong>Klinik *</strong></label>
      <select name="pil_klinik" class="form-control selectpicker" data-style="btn btn-link" required="">
        <option>--Pilih Klinik--</option>
        <?php
        include '../component/config';
        $sql = "SELECT * FROM klinik";
        $query = mysqli_query($conn,$sql);
        while ($data = mysqli_fetch_array($query)) {
          # code...
          ?>
          <option value="<?php echo $data['id_klinik']; ?>"><?php echo $data['nama_klinik']; ?></option>
          <?php
        }
        ?>        
      </select>
    </div>

    <div class="col-md-3">
      <input type="submit" name="update" class="btn btn-warning" value="update">
      <input type="reset" name="reset" class="btn btn-danger" value="reset">
    </div>


  </div>
</form>


<?php
if (isset($_POST['update'])) {
    include '../component/config.php';

    $query = "UPDATE dokter SET 
    nama_dok      = '".$_POST['nama']."',
    id_klinik = '".$_POST['pil_klinik']."' WHERE id_dokter='".$id."' ";

    $hasil = mysqli_query($conn,$query);
    if ($hasil) {
        ?>
        <script>
        alert("Berhasil Edit Data"); document.location= '?halaman=view_dokter';
        </script>
        <?php
    } else {
        ?>
        <script>
        alert("Gagal Edit Data"); document.location= '?halaman=view_dokter';
        </script>
        <?php
    }
}


?>