<?php 
if($_SESSION['id_level']=="3"){
    echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
elseif ($_SESSION['id_level']=="2") {
   echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
?>
<div class="col-lg-12">
    <?php 
    if (isset($_POST['edit_simpan'])) {
      $id = $_GET['edit']; 
      $nama = $_POST['nama'];
      $keterangan = $_POST['keterangan'];
      $tanggal = $_POST['tanggal'];
      $jumlah = $_POST['jumlah'];
      $kondisi = $_POST['kondisi'];
      $kode_inventaris = $_POST['kode_inventaris'];
      $id_ruang = $_POST['id_ruang'];
      $id_jenis = $_POST['id_jenis'];
      $query = mysqli_query($mysqli, "UPDATE inventaris set ID_RUANG='$id_ruang', ID_JENIS='$id_jenis', NAMA='$nama', KONDISI='$kondisi', KETERANGAN_INVENTARIS='$keterangan', JUMLAH='$jumlah', TANGGAL_REGISTER='$tanggal', KODE_INVENTARIS='$kode_inventaris' where ID_INVENTARIS= '$id' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

      if ($query) { ?>
      <script language="JavaScript">
        document.location='index.php?page=inventaris&alert=5';
    </script>
    <?php }} ?>

    <div class="card">
        <div class="card-header">
            <strong>Edit Data</strong> Inventaris
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
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Ruang</label>
                    </div>
                    <div class="col-12 col-md-9">

                        <select name="id_ruang" class="form-control" autofocus="autofocus">

                            <?php 
                            $id_ruang = $_GET['ruang'];
                            $edit1 = mysqli_query($mysqli, "SELECT * FROM ruang WHERE ID_RUANG = $id_ruang")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                            $dataku = mysqli_fetch_assoc($edit1);
                            $ruang = $dataku['ID_RUANG'];
                            $query = mysqli_query($mysqli, "SELECT * FROM ruang")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                            while ($data=mysqli_fetch_assoc($query)) {
                                $id_ruang = $data['ID_RUANG'];
                                $nama_ruang = $data['NAMA_RUANG'];

                                if ($ruang==$id_ruang) {
                                    $cek="selected";
                                }
                                else
                                {
                                    $cek="";
                                }
                                echo "<option value='$id_ruang' $cek>$nama_ruang</option>";
                            }
                            ?>
                        </select>

                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Jenis</label>
                    </div>
                    <div class="col-12 col-md-9">

                        <select name="id_jenis" class="form-control" required="required" autofocus="autofocus">
                          <?php 
                          $id_jenis = $_GET['jenis'];
                          $edit2 = mysqli_query($mysqli, "SELECT * FROM jenis WHERE ID_JENIS = $id_jenis")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                          $dataku = mysqli_fetch_assoc($edit2);
                          $jenis = $dataku['ID_JENIS'];
                          $query = mysqli_query($mysqli, "SELECT * FROM jenis")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                          while ($data=mysqli_fetch_assoc($query)) {
                            $id_jenis = $data['ID_JENIS'];
                            $nama_jenis = $data['NAMA_JENIS'];

                            if ($jenis==$id_jenis) {
                                $cek="selected";
                            }
                            else
                            {
                                $cek="";
                            }
                            echo "<option value='$id_jenis' $cek>$nama_jenis</option>";
                        }
                        ?>
                    </select>

                </div>
            </div>
            <?php 
            if (isset($_GET['edit'])) {
              $id = $_GET['edit'];

              $query = mysqli_query($mysqli,"SELECT * FROM inventaris where ID_INVENTARIS = '$id' ")or die('ada kesalahan pada query tampil data portofolio : '.mysqli_error($mysqli));
              while($data = mysqli_fetch_assoc($query)){
                ?>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">ID Inventaris</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" name="id_inventaris" value="<?php echo $data['ID_INVENTARIS']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nama</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="nama" value="<?php echo $data['NAMA']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Kondisi</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="kondisi" class="form-control" required="required" autofocus="autofocus">
                            <option selected="<?php echo $data['KONDISI']; ?>"><?php echo $data['KONDISI']; ?></option>
                            <?php if ($data['KONDISI'] == 'baik') { ?>
                            <option value="rusak">rusak</option>
                            <?php } else{ ?>
                            <option value="baik">baik</option>
                            <?php } ?>
                        </select>

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class="form-control-label">Keterangan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="keterangan" rows="5" placeholder="Keterangan..." class="form-control" required><?php echo $data['KETERANGAN_INVENTARIS']; ?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Jumlah</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" name="jumlah" value="<?php echo $data['JUMLAH']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Tanggal</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="date" name="tanggal" value="<?php echo $data['TANGGAL_REGISTER']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Kode Inventaris</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="kode_inventaris" value="<?php echo $data['KODE_INVENTARIS']; ?>" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit" name="edit_simpan">Edit</button>
                <a href="../inventaris/index.php?page=inventaris" class="btn btn-danger">Cancel</a>
            </div>
        </form>
        <?php }} ?>
    </div>
</div>