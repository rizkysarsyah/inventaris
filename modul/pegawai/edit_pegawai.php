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
      $id = $_GET['edit'];
      $nama_pegawai=$_POST['nama_pegawai'];
      $nip=$_POST['nip'];
      $alamat = $_POST['alamat'];
      $query = mysqli_query($mysqli, "UPDATE pegawai set NAMA_PEGAWAI='$nama_pegawai', NIP='$nip', ALAMAT='$alamat' where ID_PEGAWAI= '$id'")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

      if ($query) { ?>
      <script language="JavaScript">
        document.location='index.php?page=pegawai&alert=5';
    </script>
    <?php }} ?>
    <div class="card">
        <div class="card-header">
            <strong>Edit Data</strong> Pegawai
        </div>
        <div class="card-body card-block">
            <?php 
            if (isset($_GET['edit'])) {
              $id = $_GET['edit'];

              $query = mysqli_query($mysqli,"SELECT * FROM pegawai where ID_PEGAWAI = '$id' ")or die('ada kesalahan pada query tampil data portofolio : '.mysqli_error($mysqli));
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
                            <label for="text-input" class=" form-control-label">Nama Pegawai</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="nama_pegawai" value="<?php echo $data['NAMA_PEGAWAI']; ?>" class="form-control" none>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">NIP</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="text-input" name="nip" value="<?php echo $data['NIP']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Alamat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="alamat" value="<?php echo $data['ALAMAT']; ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit" name="edit_simpan">Edit</button>
                    <a href="../inventaris/index.php?page=pegawai" class="btn btn-danger">Cancel</a>
                </button>
            </div>
        </form>
        <?php }} ?>
    </div>
</div>
</div>