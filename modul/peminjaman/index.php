<?php if (isset($_GET['delete'])) {
    if($_SESSION['id_level']=="3"){
        echo '<script language="javascript">alert("Selain Admin Dan Operator Tidak Bisa Melakukan Aksi Ini !"); document.location="index.php?page=home";</script>'; 
    }
    else
    {
       $id  = $_GET['delete'];
       $id2  = $_GET['delete2'];
       $querydelete = mysqli_query($mysqli, "DELETE FROM peminjaman WHERE ID_PEMINJAMAN='$id' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
       $querydelete2 = mysqli_query($mysqli, "DELETE FROM detail_pinjam WHERE ID_DETAIL_PINJAM='$id2' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
       if ($querydelete) {
        echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Sukses</span><br>
        Data berhasil dihapus.  
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
}
}
?>
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <?php  $query=mysqli_query($mysqli, "SELECT SUM(JUMLAH) FROM inventaris")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
            $data=mysqli_fetch_assoc($query)    
            ?>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--green">
                    <h2 class="number"><?php echo $data['SUM(JUMLAH)']; ?></h2>
                    <span class="desc">Barang</span>
                </div>
            </div>


            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--orange">
                    <h2 class="number">
                       <?php               


                       $query=mysqli_query($mysqli, "SELECT SUM(JUMLAH_DETAIL) FROM detail_pinjam
                        LEFT JOIN peminjaman ON peminjaman.ID_PEMINJAMAN=detail_pinjam.ID_PEMINJAMAN WHERE peminjaman.STATUS_PEMINJAMAN = 'Dipinjam' ORDER BY peminjaman.ID_PEMINJAMAN DESC ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));  
                       while ($data = mysqli_fetch_assoc($query)) {
                        echo $data['SUM(JUMLAH_DETAIL)'];
                    }
                    ?>
                </h2>
                <span class="desc">barang dipinjam</span>
            </div>
        </div>


        <?php 
        $query = mysqli_query($mysqli, "SELECT  * FROM ruang ORDER BY NAMA_RUANG DESC");
        $data=mysqli_num_rows($query);  
        ?>
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--blue">
                <h2 class="number"><?php echo $data; ?></h2>
                <span class="desc">Ruang</span>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <?php  
            $query=mysqli_query($mysqli, "SELECT SUM(JUMLAH) FROM inventaris where KONDISI = 'rusak' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
            while($data=mysqli_fetch_assoc($query)){    
                ?>
                <div class="statistic__item statistic__item--red">
                    <h2 class="number"><?php echo $data['SUM(JUMLAH)']; ?></h2>
                    <span class="desc">barang rusak</span>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- STATISTIC-->
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <?php include 'alert.php'; ?>
        <h3 class="title-5 m-b-35">Data Peminjaman</h3>
        <div class="table table-data__tool">
         <form class="form-header" action="" method="POST">
            <input class="au-input au-input--xl" type="text" name="cari"  placeholder="Pencarian" />
            <button class="btn btn-info" type="submit" name="pencarian">Cari</button>
        </form>
        <div class="table-data__tool-right">
            <a href="index.php?page=tambah_peminjaman">
             <button class="btn btn-primary">Tambah Data</button>
         </a>
         <a href="modul/peminjaman/cetak_peminjaman.php">
             <button class="btn btn-secondary">Cetak</button>
         </a>        
     </div>
 </div>

 <div class="table-responsive table-responsive-data2">
    <table class="table table-data2">
        <thead>
            <tr>
                <th>id</th>
                <th>tanggal pinjam</th>
                <th>tanggal kembali</th>
                <th>status</th>
                <th>nama</th>
                <th>jumlah</th>
                <th>nama pegawai</th>
            </tr>
        </thead>
        <tbody>
         <?php               

         if(isset($_POST['pencarian']))
         {
            $cari = $_POST['cari'];
            $query=mysqli_query($mysqli, "SELECT detail_pinjam.*, peminjaman.*, inventaris.*, pegawai.* FROM detail_pinjam
                LEFT JOIN peminjaman ON peminjaman.ID_PEMINJAMAN=detail_pinjam.ID_PEMINJAMAN
                LEFT JOIN inventaris ON inventaris.ID_INVENTARIS=detail_pinjam.ID_INVENTARIS
                LEFT JOIN pegawai ON pegawai.ID_PEGAWAI=peminjaman.ID_PEGAWAI WHERE NAMA like '%$cari%' OR peminjaman.ID_PEMINJAMAN like '%$cari%' OR peminjaman.TANGGAL_PINJAM like '%$cari%' OR peminjaman.TANGGAL_KEMBALI like '%$cari%' OR peminjaman.STATUS_PEMINJAMAN like '%$cari%' ORDER BY peminjaman.ID_PEMINJAMAN DESC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
        }
        else{
            $query=mysqli_query($mysqli, "SELECT detail_pinjam.*, peminjaman.*, inventaris.*, pegawai.* FROM detail_pinjam
                LEFT JOIN peminjaman ON peminjaman.ID_PEMINJAMAN=detail_pinjam.ID_PEMINJAMAN
                LEFT JOIN inventaris ON inventaris.ID_INVENTARIS=detail_pinjam.ID_INVENTARIS
                LEFT JOIN pegawai ON pegawai.ID_PEGAWAI=peminjaman.ID_PEGAWAI ORDER BY peminjaman.ID_PEMINJAMAN DESC ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));  
        }
        while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr class="tr-shadow">
                <td><?php echo $data['ID_PEMINJAMAN']; ?></td>
                <td><?php echo $data['TANGGAL_PINJAM']; ?></td>
                <td><?php echo $data['TANGGAL_KEMBALI']; ?></td>
                <td><strong><?php echo $data['STATUS_PEMINJAMAN']; ?></strong></td>
                <td><?php echo $data['NAMA']; ?></td> 
                <td><?php echo $data['JUMLAH_DETAIL']; ?></td> 
                <td><?php echo $data['NAMA_PEGAWAI']; ?></td>                                         
                <td>
                    <a data-toggle="tooltip" data-placement="top" title="kembali" class="btn btn-warning btn-sm" href="index.php?page=kembali_peminjaman&id_peminjaman=<?php echo $data['ID_PEMINJAMAN'] ?>&id_inventaris=<?php echo $data['ID_INVENTARIS'] ?>&jumlah_detail=<?php echo $data['JUMLAH_DETAIL'] ?>
                        " >
                        <button>Kembali</button>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="delete" class="btn btn-danger btn-sm" href="index.php?page=peminjaman&delete=<?php echo $data['ID_PEMINJAMAN']; ?>&delete2=<?php echo $data['ID_DETAIL_PINJAM']; ?>" onclick="return confirm('apakah anda yakin untuk delete <?php echo $data['NAMA_PETUGAS']; ?> ?')">
                        <i class="fas fa-trash"></i>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>
</div>