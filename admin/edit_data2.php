<?php
include '../component/config.php';
$id = $_GET['no_rm'];
$sql = mysqli_query($conn,"SELECT * from pasien NATURAL JOIN klinik NATURAL JOIN dokter NATURAL JOIN proses WHERE no_rm='$id'");
$data = mysqli_fetch_array($sql);
?>



            <form method="POST" action="" id="form1">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group has-default bmd-form-group">
                            <label>Kode Antrian</label>
                            <input type="text" name="id_antrian" value="<?php echo $data['id_antrian']; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="form-group has-default bmd-form-group">
                            <label>No Rekam Medik</label>
                            <input type="text" name="no_rm" value="<?php echo $data['no_rm']; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group has-default bmd-form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="form-group has-default bmd-form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="row">
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
if (isset($_POST['update'])) {
    include '../component/config.php';

    $query = "UPDATE pasien NATURAL JOIN klinik NATURAL JOIN dokter NATURAL JOIN proses SET 
    id_antrian = '".$_POST['id_antrian']."',
    no_rm      = '".$_POST['no_rm']."',
    nama      = '".$_POST['nama']."',
    alamat      = '".$_POST['alamat']."',
    id_klinik      = '".$_POST['pil_pol']."',
    id_dokter      = '".$_POST['pil_dok']."' WHERE no_rm='".$id."' ";

    $hasil = mysqli_query($conn,$query);
    if ($hasil) {
        ?>
        <script>
        alert("Berhasil Edit Data"); document.location= '?halaman=data_antrian';
        </script>
        <?php
    } else {
        ?>
        <script>
        alert("Gagal Edit Data"); document.location= '?halaman=data_antrian';
        </script>
        <?php
    }
}


?>




<script>
function tampilkan(){
var nama_kota=document.getElementById("form1").select1.value;
var p_kontainer=document.getElementById("container");
var p_button=document.getElementById("button");
if (nama_kota=="K01") //K01 kode Poli Gigi
    {
        p_kontainer.
        innerHTML
        ="<?php $conn = mysqli_connect("localhost","root","","antrian"); $q = mysqli_query($conn,"SELECT id_dokter,nama_dok,id_klinik,nama_klinik from dokter JOIN klinik using(id_klinik) WHERE nama_klinik LIKE '%Gigi%'"); echo "<label><strong>Pilih Dokter</strong></label>"; echo "<select class='form-control selectpicker' name='pil_dok' required>"; echo "<option>--Pilih Dokter--</option>"; while ($data = mysqli_fetch_array($q)) { echo "<option value=".$data['id_dokter'].">".$data['nama_dok']."</option>";} echo "</select>";?>";

        p_button.innerHTML="<br><input type='submit' name='update' class='btn btn-warning' value='update'><input type='reset' name='reset' class='btn btn-danger' value='reset'>";
    }
else if (nama_kota=="K02") //K02 kode Poli Kecantikan
    {
        p_kontainer.innerHTML
        ="<?php $conn = mysqli_connect("localhost","root","","antrian"); $q = mysqli_query($conn,"SELECT id_dokter,nama_dok,id_klinik,nama_klinik from dokter JOIN klinik using(id_klinik) WHERE nama_klinik LIKE '%Kecantikan%'"); echo "<label><strong>Pilih Dokter</strong></label>"; echo "<select class='form-control selectpicker' name='pil_dok' required>"; echo "<option>--Pilih Dokter--</option>"; while ($data = mysqli_fetch_array($q)) { echo "<option value=".$data['id_dokter'].">".$data['nama_dok']."</option>";} echo "</select>";?>";

        p_button.innerHTML="<br><input type='submit' name='update' class='btn btn-warning' value='proses'><input type='reset' name='reset' class='btn btn-danger' value='reset'>";
    }
}
</script>