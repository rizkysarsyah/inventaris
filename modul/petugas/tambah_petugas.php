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
        $id_petugas = $_POST['id_petugas'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $nama_petugas = $_POST['nama_petugas'];
        $id_level = $_POST['id_level'];
        $query = mysqli_query($mysqli, "INSERT INTO petugas (ID_PETUGAS, USERNAME, PASSWORD, NAMA_PETUGAS, ID_LEVEL)VALUES('$id_petugas','$username', '$password', '$nama_petugas', '$id_level')")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

        if ($query) { ?>
        <script language="JavaScript">
            document.location='index.php?page=petugas&alert=4';
        </script>
        <?php }} ?>
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data</strong> Petugas
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
                    $query = mysqli_query($mysqli, "SELECT * FROM petugas ORDER BY ID_PETUGAS DESC");
                    $data=mysqli_fetch_assoc($query) 
                    ?>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">ID Petugas</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="id_petugas" value="<?php echo $data['ID_PETUGAS']+1; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Nama Petugas</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="nama_petugas" placeholder="Nama Petugas..." class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Username</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="username" placeholder="Username..." class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="password" placeholder="Password..." class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Level</label>
                        </div>
                        <div class="col-12 col-md-9">

                            <select name="id_level" class="form-control" required="required" autofocus="autofocus">
                                <option>Piilh Level</option>
                                <?php 
                                $query = mysqli_query($mysqli, "SELECT * FROM level ORDER BY NAMA_LEVEL");
                                while ($data=mysqli_fetch_assoc($query)) {
                                    ?>
                                    <option value="<?php echo $data['ID_LEVEL']; ?>"><?php echo $data['NAMA_LEVEL']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>                    
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit" name="add">Tambah</button>
                        <a href="index.php?page=tambah_petugas"><button type="reset" class="btn btn-danger">Reset</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>