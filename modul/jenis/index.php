<?php 
if($_SESSION['id_level']=="3"){
    echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
elseif ($_SESSION['id_level']=="2") {
   echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
?>
<?php if (isset($_GET['delete'])) {
    $id  = $_GET['delete'];
    $querydelete = mysqli_query($mysqli, "DELETE FROM jenis WHERE ID_JENIS='$id' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

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
?>
<div class="row">
    <div class="col-md-12">
        <?php include 'alert.php'; ?>
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Data Jenis</h3>
        <div class="table-data__tool">
            <form class="form-header" action="" method="POST">
                <input class="au-input au-input--xl" type="text" name="cari"  placeholder="Pencarian" />
                <button class="btn btn-info" type="submit" name="pencarian">Cari</button>
            </form>
            <div class="table-data__tool-right">
                <a href="index.php?page=tambah_jenis">
                 <button class="btn btn-primary">Tambah Data</button>
             </a>
             <a href="modul/ruang/cetak_jenis.php">
                 <button class="btn btn-secondary">Cetak</button>
             </a>        
         </div>
     </div>
     <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nama</th>
                    <th>kode jenis</th>
                    <th>keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($_POST['pencarian']))
                {
                    $cari = $_POST['cari'];
                    $query = mysqli_query($mysqli, "SELECT * FROM jenis where ID_JENIS like '%$cari%' OR NAMA_JENIS like '%$cari%' OR KODE_JENIS like '%$cari%' OR KETERANGAN like '%$cari%'")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                }
                else{
                    $query = mysqli_query($mysqli, "SELECT * FROM jenis ORDER BY ID_JENIS DESC") or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));  
                }
                while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr class="tr-shadow">
                        <td><?php echo $data['ID_JENIS']; ?></td>
                        <td><?php echo $data['NAMA_JENIS']; ?></td>
                        <td><?php echo $data['KODE_JENIS']; ?></td>
                        <td><?php echo $data['KETERANGAN']; ?></td>
                        <td>
                            <a data-toggle="tooltip" data-placement="top" title="edit" class="btn btn-secondary btn-sm" href="index.php?page=edit_jenis&edit=<?php echo $data['ID_JENIS']; ?>"  onclick="return confirm('apakah anda yakin untuk edit <?php echo $data['NAMA_JENIS']; ?> ?')">
                                <i class=" fas fa-edit"></i>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="delete" class="btn btn-danger btn-sm" href="index.php?page=jenis&delete=<?php echo $data['ID_JENIS']; ?>" onclick="return confirm('apakah anda yakin untuk delete <?php echo $data['NAMA_JENIS']; ?> ?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>