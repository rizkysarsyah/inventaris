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
        $id_inventaris = $_POST['id_inventaris'];
        $id_petugas = $_SESSION['id'];
        $id_ruang=$_POST['id_ruang'];
        $id_jenis=$_POST['id_jenis'];
        $nama = $_POST['nama'];
        $keterangan = $_POST['keterangan'];
        $tanggal = date("Y-m-d");
        $jumlah = $_POST['jumlah'];
        $kondisi = $_POST['kondisi'];
        $kode_inventaris = $_POST['kode_inventaris'];

        $query = mysqli_query($mysqli, "INSERT INTO inventaris (ID_INVENTARIS, ID_PETUGAS, ID_RUANG, ID_JENIS, NAMA, KONDISI, KETERANGAN_INVENTARIS, JUMLAH, TANGGAL_REGISTER, KODE_INVENTARIS)VALUES('$id_inventaris','$id_petugas', '$id_ruang', '$id_jenis', '$nama', '$kondisi', '$keterangan', '$jumlah', '$tanggal', '$kode_inventaris')")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

        if ($query) { ?>
        <script language="JavaScript">
            document.location='index.php?page=inventaris&alert=4';
        </script>

        <?php }} ?>
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data</strong> Inventaris
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
                            <label for="text-input" class=" form-control-label">ID Inventaris</label>
                        </div>
                        <?php 
                        $query = mysqli_query($mysqli, "SELECT * FROM inventaris ORDER BY ID_INVENTARIS DESC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                        $data=mysqli_fetch_assoc($query) 
                        ?>
                        <div class="col-12 col-md-9">
                            <input type="number" name="id_inventaris" value="<?php echo $data['ID_INVENTARIS']+1; ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Ruang</label>
                        </div>
                        <div class="col-12 col-md-9">

                            <select name="id_ruang" class="form-control" required="required" autofocus="autofocus">
                                <option>Pilih Ruang</option>
                                <?php 
                                $query = mysqli_query($mysqli, "SELECT * FROM ruang ORDER BY NAMA_RUANG")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                                while ($data=mysqli_fetch_assoc($query)) {
                                    ?>
                                    <option value="<?php echo $data['ID_RUANG']; ?>"><?php echo $data['NAMA_RUANG']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Jenis</label>
                            </div>
                            <div class="col-12 col-md-9">

                                <select name="id_jenis" class="form-control" required="required" autofocus="autofocus">
                                    <option>Piilh Jenis</option>
                                    <?php 
                                    $query = mysqli_query($mysqli, "SELECT * FROM jenis ORDER BY NAMA_JENIS");
                                    while ($data=mysqli_fetch_assoc($query)) {
                                        ?>
                                        <option value="<?php echo $data['ID_JENIS']; ?>"><?php echo $data['NAMA_JENIS']; ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama Barang</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="nama" placeholder="Nama Barang..." class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Kondisi</label>
                                </div>
                                <div class="col-12 col-md-9">

                                    <select name="kondisi" class="form-control" required="required" autofocus="autofocus">
                                        <option>Piilh Kondisi</option>
                                        <option value="baik">Baik</option>
                                        <option value="rusak">Rusak</option>
                                    </select>

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
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class="form-control-label">Jumlah</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" name="jumlah" placeholder="Jumlah..." class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class="form-control-label">Kode Inventaris</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="kode_inventaris" placeholder="Kode Inventaris..." class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit" name="add">Tambah</button>
                            <a href="index.php?page=tambah_inventaris"><button type="reset" class="btn btn-danger">Reset</button></a>
                        </div>
                    </form>
                </div>
            </div>