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
        $id_jenis = $_GET['edit'];
        $nama_jenis = $_POST['nama_jenis'];
        $kode_jenis=$_POST['kode_jenis'];
        $keterangan=$_POST['keterangan'];
        $query = mysqli_query($mysqli, "UPDATE jenis set NAMA_JENIS='$nama_jenis', KODE_JENIS='$kode_jenis', KETERANGAN='$keterangan' where ID_JENIS= '$id_jenis'")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

        if ($query) { ?>
        <script language="JavaScript">
            document.location='index.php?page=jenis&alert=5';
        </script>
        <?php }} ?>
        <div class="card">
            <div class="card-header">
                <strong>Edit Data</strong> Jenis
            </div>
            <div class="card-body card-block">
                <?php 
                if (isset($_GET['edit'])) {
                  $id = $_GET['edit'];

                  $query = mysqli_query($mysqli,"SELECT * FROM jenis where ID_JENIS = '$id' ")or die('ada kesalahan pada query tampil data portofolio : '.mysqli_error($mysqli));
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
                                <label for="text-input" class=" form-control-label">Nama Jenis</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="nama_jenis" value="<?php echo $data['NAMA_JENIS'];?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Kode Jenis</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="kode_jenis" value="<?php echo $data['KODE_JENIS'];?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="textarea-input" class="form-control-label">Keterangan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="keterangan" rows="5" class="form-control" required><?php echo $data['KETERANGAN']; ?></textarea>
                            </div>
                        </div> 
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit" name="edit_simpan">Edit</button>
                        <a href="../inventaris/index.php?page=jenis" class="btn btn-danger">Cancel</a>
                    </div>  
                </form>
                <?php }} ?>
            </div>
        </div>
    </div>