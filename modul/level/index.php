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
        <h3 class="title-5 m-b-35">Data Level</h3>
        <div class="table-data__tool">
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>id level</th>
                            <th>nama level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $query = mysqli_query($mysqli, "SELECT * FROM level ORDER BY ID_LEVEL DESC");  
                        while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                            <tr class="tr-shadow">
                                <td><?php echo $data['ID_LEVEL']; ?></td>
                                <td><?php echo $data['NAMA_LEVEL']; ?></td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>