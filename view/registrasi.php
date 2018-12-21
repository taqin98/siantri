<script language="javascript">
alert("Anda Harus Daftar");
top.location="./daftar.php";
</script>

<?php 
include '../component/config.php';
include '../component/invoice.php';

function create_random($length)
{
    $data = 'Aa1Bb2Cc3Dd4Ee5Ff6Gg7Hh8Jj9KL0MmNnOoPpQqRrSsTtUu';
    $string = '';
    for($i = 0; $i < $length; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return $string;
}
$invoice = create_random(10); 

?>

<br><br>
<form method="POST" id="form1">
  <div class="form-row">
    <div class="col-md-3">
      <label><strong>No Rekam Medis *</strong></label>
      <input type="hidden" name="id_antrian" value="<?php echo $invoice; ?>">
      <input type="text" name="no_rm" required="required" placeholder="No. Rekam Medis" class="form-control">
    </div>

    <div class="col-md-3">
      <label><strong>Nama Pasien *</strong></label>
      <input type="text" name="nama" required="required" placeholder="Nama Pasien Baru" class="form-control">
    </div>

    <div class="col-md-3">
      <label><strong>Jenis Kelamin *</strong></label>
      <select name="jenis_kelamin" class="form-control selectpicker" data-style="btn btn-link" required="">
        <option>-- Jenis Kelamin --</option>
        <option value="Laki-Laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
    </div>

    <div class="col-md-3">
      <label><strong>Alamat *</strong></label>
      <input type="text" name="alm" required="required" placeholder="Alamat Pasien Baru" class="form-control">
    </div>


  </div>

<br>

  <div class="form-row">
    <div class="col-md-3">
      <label><strong>Tanggal Lahir *</strong></label>
      <input type="date" name="tgl_lahir" required="required" placeholder="yyy-mm-dd" class="form-control">
    </div>

    <div class="col-md-3">
      <label><strong>Pilih Poli *</strong></label>
      <select name="pil_pol" class="form-control selectpicker" onchange="tampilkan(this.value)" id="select1" required="required">
        <option>-- pilih poli --</option>
        <option value="K01">Gigi</option>
        <option value="K02">Kecantikan</option>
      </select>
    </div>

    <div class="col-md-3" id="container">
    </div>

    <div class="col-md-3" id="button">
    </div>

  </div>
</form>

<?php
include './component/config.php';
if(isset($_POST['tambah'])){
$sql = "INSERT into pasien (no_rm,nama,jenis_kelamin,alamat,tanggal_lahir,id_klinik,id_dokter,id_antrian) values 
(
'".$_POST['no_rm']."',
'".$_POST['nama']."',
'".$_POST['jenis_kelamin']."',
'".$_POST['alm']."',
'".$_POST['tgl_lahir']."',
'".$_POST['pil_pol']."',
'".$_POST['pil_dok']."',
'".$_POST['id_antrian']."') ";
$s1 = mysqli_query($conn,$sql);


if($s1){
         ?>
       <script>
alert("Berhasil Menyimpan Data"); document.location= '?halaman=print';
        </script>
        <?php
    }
    else{
      ?>
      <script>
alert("Gagal Menyimpan Data"); document.location= '?halaman=registrasi';
      </script>
            <?php
    }
    } ?>
<script>
function tampilkan(){
var nama_kota=document.getElementById("form1").select1.value;
var p_kontainer=document.getElementById("container");
var p_button=document.getElementById("button");
if (nama_kota=="K01") //K01 kode Poli Gigi
    {
        p_kontainer.
        innerHTML
        ="<?php $conn = mysqli_connect("localhost","root","","antrian"); $q = mysqli_query($conn,"SELECT id_dokter,nama_dok,id_klinik,nama_klinik from dokter JOIN klinik using(id_klinik) WHERE nama_klinik LIKE '%Gigi%'"); while ($data = mysqli_fetch_array($q)) { echo "<label><strong>Pilih Dokter</strong></label>"; echo "<select class='form-control selectpicker' name='pil_dok' required>"; echo "<option> pilih dokter </option>"; echo "<option value='D03'>".$data['nama_dok']."</option>"; echo "</select>"; } ?>";

        p_button.innerHTML="<br><input type='submit' name='tambah' class='btn btn-warning' value='proses'><input type='reset' name='reset' class='btn btn-danger' value='reset'>";
    }
else if (nama_kota=="K02") //K02 kode Poli Kecantikan
    {
        p_kontainer.innerHTML="Bandung kota kembang";
    }
}
</script>