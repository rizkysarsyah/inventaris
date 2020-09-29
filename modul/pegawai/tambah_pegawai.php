<?php 
if($_SESSION['id_level']=="3"){
    echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
elseif ($_SESSION['id_level']=="2") {
   echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
?>
<?php if (isset($_POST['add'])) {
    $id_pegawai = $_POST['id_pegawai'];
    $nama_pegawai=$_POST['nama_pegawai'];
    $nip=$_POST['nip'];
    $alamat = $_POST['alamat'];
    $query = mysqli_query($mysqli, "INSERT INTO pegawai (ID_PEGAWAI, NAMA_PEGAWAI, NIP, ALAMAT)VALUES('$id_pegawai','$nama_pegawai', '$nip', '$alamat')")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

    if ($query) { ?>
    <script language="JavaScript">
        document.location='index.php?page=pegawai&alert=4';
    </script>
    <?php }} ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data</strong> Pegawai
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
                    $query = mysqli_query($mysqli, "SELECT * FROM pegawai ORDER BY ID_PEGAWAI DESC");
                    $data=mysqli_fetch_assoc($query) 
                    ?>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">ID Pegawai</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="text-input" name="id_pegawai" value="<?php echo $data['ID_PEGAWAI']+1; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Nama Pegawai</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="nama_pegawai" placeholder="Nama Pegawai..." class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">NIP</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="text-input" name="nip" placeholder="NIP..." class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Alamat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="alamat" placeholder="alamat..." class="form-control">
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