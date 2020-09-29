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
    $querydelete = mysqli_query($mysqli, "DELETE FROM petugas WHERE ID_PETUGAS='$id' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

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
        <!-- DATA TABLE -->
        <?php include 'alert.php'; ?>
        <h3 class="title-5 m-b-35">Data Petugas</h3>
        <div class="table-data__tool">
            <form class="form-header" action="" method="POST">
                <input class="au-input au-input--xl" type="text" name="cari"  placeholder="Pencarian" />
                <button class="btn btn-info" type="submit" name="pencarian">Cari</button>
            </form>
            <div class="table-data__tool-right">
                <a href="index.php?page=tambah_petugas">
                 <button class="btn btn-primary">Tambah Data</button>
             </a>
             <a href="modul/ruang/cetak_petugas.php">
                 <button class="btn btn-secondary">Cetak</button>
             </a>        
         </div>
     </div>
     <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>password</th>
                    <th>nama petugas</th>
                    <th>level</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($_POST['pencarian']))
                {
                    $cari = $_POST['cari'];
                    $query = mysqli_query($mysqli, "SELECT * FROM petugas where ID_PETUGAS like '%$cari%' OR USERNAME like '%$cari%' OR PASSWORD like '%$cari%' OR NAMA_PETUGAS like '%$cari%' OR ID_LEVEL like '%$cari%'");
                }
                else{
                    $query = mysqli_query($mysqli, "SELECT * FROM petugas ORDER BY ID_PETUGAS DESC");  
                }
                while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr class="tr-shadow">
                        <td><?php echo $data['ID_PETUGAS']; ?></td>
                        <td><?php echo $data['USERNAME']; ?></td>
                        <td><?php echo $data['PASSWORD']; ?></td>
                        <td><?php echo $data['NAMA_PETUGAS']; ?></td>
                        <td>
                            <?php 
                            $id_level = $data['ID_LEVEL'];
                            if ($id_level ==1) {
                                echo "admin";
                            }
                            elseif ($id_level ==2) {
                               echo "operator";
                           }
                           elseif ($id_level ==3) {
                               echo "peminjam";
                           } ?>
                       </td>                                        
                       <td>
                        <a data-toggle="tooltip" data-placement="top" title="edit" class="btn btn-secondary btn-sm" href="index.php?page=edit_petugas&edit=<?php echo $data['ID_PETUGAS']; ?>&level=<?php echo $data['ID_LEVEL']; ?>"  onclick="return confirm('apakah anda yakin untuk edit <?php echo $data['NAMA_PETUGAS']; ?> ?')">
                            <i class=" fas fa-edit"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="delete" class="btn btn-danger btn-sm" href="index.php?page=petugas&delete=<?php echo $data['ID_PETUGAS']; ?>" onclick="return confirm('apakah anda yakin untuk delete <?php echo $data['NAMA_PETUGAS']; ?> ?')">
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