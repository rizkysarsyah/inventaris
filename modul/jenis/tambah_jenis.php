<?php 
if($_SESSION['id_level']=="3"){
    echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
elseif ($_SESSION['id_level']=="2") {
   echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
?>
<div class="col-lg-12">
    <?php if (isset($_POST['add'])) {
        $id_jenis = $_POST['id'];
        $nama_jenis = $_POST['nama_jenis'];
        $kode_jenis=$_POST['kode_jenis'];
        $keterangan=$_POST['keterangan'];

        $query = mysqli_query($mysqli, "INSERT INTO jenis (ID_JENIS, NAMA_JENIS, KODE_JENIS, KETERANGAN)VALUES('$id_jenis', '$nama_jenis', '$kode_jenis', '$keterangan')")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

        if ($query) { ?>
        <script language="JavaScript">
            document.location='index.php?page=jenis&alert=4';
        </script>

        <?php }} ?>
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data</strong> Jenis
            </div>
            <div class="card-body card-block">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Petugas</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static"><?php echo $_SESSION['nama_petugas']; ?></p>
                        </div>
                    </div>
                    <?php 
                    $query = mysqli_query($mysqli, "SELECT * FROM jenis ORDER BY ID_JENIS DESC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                    $data=mysqli_fetch_assoc($query) 
                    ?>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">ID Jenis</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" name="id" value="<?php echo $data['ID_JENIS']+1; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Nama Jenis</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="nama_jenis" placeholder="Nama Jenis..." class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Kode Jenis</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="kode_jenis" placeholder="Kode Jenis..." class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="textarea-input" class="form-control-label">Keterangan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="keterangan" rows="5" placeholder="Keterangan..." class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" name="add">Tambah</button>
                    <a href="index.php?page=tambah_jenis"><button type="reset" class="btn btn-danger">Reset</button></a>
                </div>
            </form>
        </div>
