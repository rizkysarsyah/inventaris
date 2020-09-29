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
        $id_petugas=$_GET['edit'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $nama_petugas = $_POST['nama_petugas'];
        $id_level = $_POST['id_level'];
        $query = mysqli_query($mysqli, "UPDATE petugas set USERNAME='$username', PASSWORD='$password', NAMA_PETUGAS='$nama_petugas', ID_PETUGAS='$id_petugas'")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

        if ($query) { ?>
        <script language="JavaScript">
            document.location='index.php?page=petugas&alert=5';
        </script>
        <?php }} ?>
        <div class="card">
            <div class="card-header">
                <strong>Edit Data</strong> Petugas
            </div>
            <div class="card-body card-block">
                <?php 
                if (isset($_GET['edit'])) {
                  $id = $_GET['edit'];

                  $query = mysqli_query($mysqli,"SELECT * FROM petugas where ID_PETUGAS = '$id' ")or die('ada kesalahan pada query tampil data portofolio : '.mysqli_error($mysqli));
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
                                <label for="text-input" class=" form-control-label">Nama Petugas</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="nama_petugas" value="<?php echo $data['NAMA_PETUGAS'];?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Username</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="username" value="<?php echo $data['USERNAME'];?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="password" value="<?php echo $data['PASSWORD'];?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Level</label>
                            </div>
                            <div class="col-12 col-md-9">

                                <select name="id_level" class="form-control" required="required" autofocus="autofocus">
                                    <?php 
                                    $id_level = $_GET['level'];
                                    $edit3 = mysqli_query($mysqli, "SELECT * FROM level WHERE ID_LEVEL = $id_level");
                                    $dataku = mysqli_fetch_assoc($edit3);
                                    $level = $dataku['ID_LEVEL'];
                                    $query = mysqli_query($mysqli, "SELECT * FROM level");
                                    while ($data=mysqli_fetch_assoc($query)) {
                                        $id_level = $data['ID_LEVEL'];
                                        $nama_level = $data['NAMA_LEVEL'];

                                        if ($level==$id_level) {
                                            $cek="selected";
                                        }
                                        else
                                        {
                                            $cek="";
                                        }
                                        echo "<option value='$id_level' $cek>$nama_level</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>                    
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit" name="edit_simpan">Edit</button>
                        <a href="../inventaris/index.php?page=petugas" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
            <?php }} ?>
        </div>
    </div>
</div>