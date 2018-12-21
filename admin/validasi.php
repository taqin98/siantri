<div class="form-row">
    <div class="col-md-3">
      <form id="form1" name="form1" method="post" action="">
          <label><strong>Validasi Data</strong></label>
          <input class="form-control" name="cari" type="text" id="cari" size="50" placeholder="Kode Antrian" />
    
  </div>
  <div class="col-md-3">
    <br>
          <input type="submit" name="Submit" value="Pencarian" class="btn btn-warning" />
      </form>
  </div>
</div>
      <?php
      include '../component/config.php';
      /* Membuat fungsi untuk pencarian data pada database */
      $cari=$_POST['cari'];
      if(!empty($cari))
      {
        ?>
            <p align="center"><strong>HASIL PENCARIAN BEDASARKAN NAMA</strong></p>
            <p>
        <?php
      $lissiswa=mysqli_query($conn,"SELECT * from pasien NATURAL JOIN klinik NATURAL JOIN dokter WHERE id_antrian LIKE '%$cari%'");
      $totalseluruhsiswa=mysqli_num_rows($lissiswa);
      if($totalseluruhsiswa=='0'){
      echo "<center><blink>Maaf Data yang anda cari tidak ada di dalam database</bink></center>";
      } else {
      echo "Jumlah Seluruh Data yang ditemukan Adalah <b>$totalseluruhsiswa</b> Data";
      }
      ?>
      
      
      <?php   /* Membuat Penampil data jika data di temukan */    ?>
      <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#D78EFA" border="1">
      <thead>    
          <tr>
            <th bgcolor="#F0D7FD"><strong>Kode Antrian</strong></td>
            <th bgcolor="#F0D7FD"><strong>No. Rekam Medis</strong></td>
            <th bgcolor="#F0D7FD"><strong>Nama</strong></td>
            <th bgcolor="#F0D7FD"><strong>Detail</strong></td>
          </tr>
      </thead>
      <?php
      while($lissiswa1=mysqli_fetch_array($lissiswa)){
      ?>
      <tr>
        <td bgcolor="#FFFFFF"><?php echo $lissiswa1['id_antrian']?></td>
        <td bgcolor="#FFFFFF"><?php echo $lissiswa1['no_rm']?></td>
        <td bgcolor="#FFFFFF"><?php echo $lissiswa1['nama']?></td>
        <td bgcolor="#FFFFFF"><a href="?halaman=edit&no_rm=<?php echo $lissiswa1['no_rm']; ?>" class="btn btn-warning">Detail</a></td>
       </tr>
        <?php
        }
        ?>
    </table>
    </p>
    <?php
    }
    ?>
  







