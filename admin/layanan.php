<table class="table">
    <thead>
        <tr>
            <th>No Urut</th>
            <th>Kode Antrian</th>
            <th>No Rekam Medis</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kode Klinik</th>
            <th>Nama Klinik</th>
            <th>Kode Dokter</th>
            <th>Nama Dokter</th>
            <th>Proses</th>
            <td><a href="?halaman=tambah" class="btn btn-success">Tambah</a></td>
        </tr>
    </thead>
    <tbody>
    <?php 
        //include pagignation
        include '../pagination.php';
        //Koneksi ke database 
        //include '../component/config.php';
        $conn = new mysqli("localhost","root","","antrian");

        //Query
        $sql = "SELECT * from pasien NATURAL JOIN klinik NATURAL JOIN dokter NATURAL JOIN proses order by no_rm";
        $result = mysqli_query($conn,$sql);

        //Setting start pagignation
        //pagination config start
        $rpp = 5; // jumlah record per halaman
        $reload = "?halaman=data_antrian&pagination=true";
        $page = intval($_GET["page"]);
        if($page<=1) $page = 1;  
        $tcount = mysqli_num_rows($result);
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
        $count = 0;
        $i = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
        //pagination config end
        $nomor=1;
        while (($count<$rpp) && ($i<$tcount)) {
            mysqli_data_seek($result,$i);
            $data = mysqli_fetch_array($result);
            
        ?>
        <tr>
            <td class="text-center"><?php echo $nomor++; ?></td>
            <td><?php echo $data['id_antrian']; ?></td>
            <td><?php echo $data['no_rm']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['id_klinik']; ?></td>
            <td><?php echo $data['nama_klinik']; ?></td>
            <td><?php echo $data['id_dokter']; ?></td>
            <td><?php echo $data['nama_dok']; ?></td>
            <td><b style="background: #f08f00; color: white; border-radius: 25px; padding: 5px;"><?php echo $data['ket']; ?></b>
            </td>
            <td class="td-actions">
                <a href="?halaman=edit2&no_rm=<?php echo $data['no_rm']; ?>">
                <button type="button" data-toggle="tooltip" data-placement="top" title="Edit Data" class="btn btn-warning btn-sm">
                    <i class="fa fa-edit"></i>
                </button>
                </a>
                <a href="?halaman=delete&no_rm=<?php echo $data['no_rm']; ?>">
                <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete Data">
                    <i class="fa fa-trash"></i>
                </button>
                </a>
            </td>
        </tr>
        <?php
            $i++; 
            $count++;
        }
    ?>
    </tbody>
</table>
<div>
    <nav aria-label="Page navigation example">
        <?php echo paginate_one($reload, $page, $tpages); ?>
    </nav>
</div>



