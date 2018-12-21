<?php
include '../component/config.php';
$query = mysqli_query($conn,"SELECT max(id_dokter) as maxRM FROM dokter");
$result  = mysqli_fetch_array($query);
$kodeRm = $result['maxRM'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodeRm, 2, 2);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "D";
$dok = $char . sprintf("%02s", $noUrut);

?>

<br><br>
<form method="POST" id="form1">
  <div class="form-row">
    <div class="col-md-3">
      <label><strong>No Rekam Medis *</strong></label>
      <input type="text" name="id_dokter" value="<?php echo $dok; ?>" disabled class="form-control">
    </div>

    <div class="col-md-3">
      <label><strong>Nama Dokter *</strong></label>
      <input type="text" name="nama" required="required" placeholder="Nama Pasien Baru" class="form-control">
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
      <input type="submit" name="tambah" class="btn btn-warning" value="tambah">
      <input type="reset" name="reset" class="btn btn-danger" value="reset">
    </div>


  </div>
</form>

<?php
include './component/config.php';
if(isset($_POST['tambah'])){
$sql = "INSERT into dokter (id_dokter,nama_dok,id_klinik) values 
(
'".$dok."', '".$_POST['nama']."', '".$_POST['pil_klinik']."') ";
$s1 = mysqli_query($conn,$sql);


if($s1){
         ?>
       <script>
alert("Berhasil Menyimpan Data"); document.location= '?halaman=view_dokter';
        </script>
        <?php
    }
    else{
      ?>
      <script>
alert("Gagal Menyimpan Data"); document.location= '?halaman=view_dokter';
      </script>
            <?php
    }
    } ?>