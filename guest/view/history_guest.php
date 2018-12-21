<table class="table">
    <thead>
        <tr>
            <th>No Urut</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tujuan Klinik</th>
            <th>Proses</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../component/config.php';
        $sql = mysqli_query($conn,"SELECT * from pasien NATURAL JOIN klinik NATURAL JOIN dokter NATURAL JOIN proses WHERE ket LIKE '%Menunggu%'");
        $nomor=1;
        while ($data = mysqli_fetch_array($sql)) {
            # code...
            ?>

        <tr>
            <td class="text-center"><?php echo $nomor++; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['nama_klinik']; ?></td>
            <td><b style="background: #f08f00; color: white; border-radius: 25px; padding: 5px;"><?php echo $data['ket']; ?></b></td>
        </tr>
            <?php
        }
        ?>
    </tbody>
</table>
