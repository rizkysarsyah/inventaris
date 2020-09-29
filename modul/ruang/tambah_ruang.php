<?php 
if($_SESSION['id_level']=="3"){
    echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
elseif ($_SESSION['id_level']=="2") {
 echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
?>
<?php if (isset($_POST['add'])) {
    $id_ruang = $_POST['id_ruang'];
    $nama_ruang=$_POST['nama_ruang'];
    $kode_ruang=$_POST['kode_ruang'];
    $keterangan = $_POST['keterangan'];
    $query = mysqli_query($mysqli, "INSERT INTO ruang (ID_RUANG, NAMA_RUANG, KODE_RUANG, KETERANGAN_RUANG)VALUES('$id_ruang','$nama_ruang', '$kode_ruang', '$keterangan')")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

    if ($query) { ?>
    <script language="JavaScript">
        document.location='index.php?page=ruang&alert=4';
    </script>
    <?php }} ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data</strong> Ruang
            </div>
            <div class="card-body card-block">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Petugas</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static"><?php echo $_SESSION['nama_petugas']; ?></p>
                        </div>
                    </div>
                    <?php 
                    $query = mysqli_query($mysqli, "SELECT * FROM ruang ORDER BY ID_RUANG DESC");
                    $data=mysqli_fetch_assoc($query) 
                    ?>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">ID Ruang</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="text-input" name="id_ruang" value="<?php echo $data['ID_RUANG']+1; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Nama Ruang</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="nama_ruang" placeholder="Nama Ruang..." class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Kode Ruang</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="kode_ruang" placeholder="Kode Ruang..." class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Keterangan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="keterangan" id="textarea-input" rows="9" placeholder="Keterangan..." class="form-control"></textarea>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" name="add">Tambah</button>
                    <a href="index.php?page=tambah_ruang">
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>