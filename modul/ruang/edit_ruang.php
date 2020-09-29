<?php 
if($_SESSION['id_level']=="3"){
    echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
elseif ($_SESSION['id_level']=="2") {
 echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
?>
<div class="col-lg-12">
    <?php if (isset($_POST['edit_simpan'])) {
        $id_ruang=$_GET['edit'];
        $nama_ruang=$_POST['nama_ruang'];
        $kode_ruang=$_POST['kode_ruang'];
        $keterangan = $_POST['keterangan'];
        $query = mysqli_query($mysqli, "UPDATE ruang set NAMA_RUANG='$nama_ruang', KODE_RUANG='$kode_ruang', KETERANGAN_RUANG='$keterangan' where ID_RUANG= '$id_ruang'")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

        if ($query) { ?>
        <script language="JavaScript">
            document.location='index.php?page=ruang&alert=5';
        </script>
        <?php }} ?>
        <div class="card">
            <div class="card-header">
                <strong>Edit Data</strong> Ruang
            </div>
            <div class="card-body card-block">
                <?php 
                if (isset($_GET['edit'])) {
                  $id = $_GET['edit'];

                  $query = mysqli_query($mysqli,"SELECT * FROM ruang where ID_RUANG = '$id' ")or die('ada kesalahan pada query tampil data portofolio : '.mysqli_error($mysqli));
                  while($data = mysqli_fetch_assoc($query)){
                    ?>
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Petugas</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static"><?php echo $_SESSION['nama_petugas']; ?></p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama Ruang</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="nama_ruang" value="<?php echo $data['NAMA_RUANG']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Kode Ruang</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="kode_ruang" value="<?php echo $data['KODE_RUANG']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class=" form-control-label">Keterangan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="keterangan" id="textarea-input" rows="9" class="form-control"><?php echo $data['KETERANGAN_RUANG']; ?></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit" name="edit_simpan">Edit</button>
                        <a href="../inventaris/index.php?page=ruang" class="btn btn-danger">Cancel</a>
                    </button>
                </div>
            </form>
            <?php }} ?>
        </div>
    </div>
</div>