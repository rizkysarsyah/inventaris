<div class="card">
    <div class="card-header">
        <strong>Tambah Data</strong> Peminjaman
    </div>
    <div class="card-body card-block">
        <form action="" method="POST" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Petugas</label>
                </div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static"><?php echo $_SESSION['nama_petugas']; ?></p>
                </div>
            </div>
            <?php
            date_default_timezone_set('Asia/Jakarta');
            $pinjam= date("Y-m-d h:i");
            $query = mysqli_query($mysqli, "SELECT * FROM peminjaman ORDER BY ID_PEMINJAMAN DESC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
            $data=mysqli_fetch_assoc($query) 
            ?>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Id Peminjaman</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="ID_PEMINJAMAN" value="<?php echo $data['ID_PEMINJAMAN']+1; ?>" class="form-control" >
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tanggal Pinjam</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="TANGGAL_PINJAM" value="<?php echo $pinjam ?>" class="form-control" >
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">ID Detail Pinjam</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="ID_DETAIL_PINJAM" value="<?php echo $data['ID_PEMINJAMAN']+1; ?>" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Inventaris</label>
                </div>
                <div class="col-12 col-md-9">

                    <select name="ID_INVENTARIS" class="form-control" required="required" autofocus="autofocus">
                        <option>Pilih Inventaris</option>
                        <?php 
                        $query = mysqli_query($mysqli, "SELECT * FROM inventaris ORDER BY NAMA")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                        while ($data=mysqli_fetch_assoc($query)) {
                            ?>
                            <option value="<?php echo $data['ID_INVENTARIS']; ?>"><?php echo $data['NAMA']; ?></option>
                            <?php } ?>
                        </select>

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Jumlah</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="JUMLAH" placeholder="Jumlah..." class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Pegawai</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="ID_PEGAWAI" class="form-control" required="required" autofocus="autofocus">
                            <option>Pilih pegawai</option>
                            <?php 
                            $query = mysqli_query($mysqli, "SELECT * FROM pegawai ORDER BY NAMA_PEGAWAI")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                            while ($data=mysqli_fetch_assoc($query)) { ?>
                            <option value="<?php echo $data['ID_PEGAWAI']; ?>"><?php echo $data['NAMA_PEGAWAI']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input class="btn btn-primary" type="submit" name="tambah" value="Tambah">
                <a href="index.php?page=tambah_peminjaman"><button type="reset" class="btn btn-danger">Reset</button></a>
            </div>
        </form>
    </div>
</div>
</div>
<?php
$ID_PEMINJAMAN = @$_POST['ID_PEMINJAMAN'];
@$TANGGAL_PINJAM = $_POST['TANGGAL_PINJAM'];
$ID_DETAIL_PINJAM = @$_POST['ID_DETAIL_PINJAM'];
$ID_INVENTARIS = @$_POST['ID_INVENTARIS'];
$JUMLAH = @$_POST['JUMLAH'];
$ID_PEGAWAI = @$_POST['ID_PEGAWAI'];
$tambah_peminjaman = @$_POST['tambah'];

$id_inventaris = @$_POST['ID_PEMINJAMAN'];
$query=mysqli_query($mysqli, "SELECT * FROM inventaris WHERE ID_INVENTARIS='$ID_INVENTARIS'")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
while ($data=mysqli_fetch_array($query)) {
    $kondisi =$data['KONDISI'];
    $sisa=$data['JUMLAH'];
    if($tambah_peminjaman){
        if($ID_PEMINJAMAN == ""){
            ?>
            <script type="text/javascript">
                alert("inputan tidak boleh kosong");
            </script>
            <?php
        }
        if ($sisa < $JUMLAH) {
            ?>
            <script type="text/javascript">
                alert("Barang Yang Anda pinjam Melebihi Stok Atau Stok Sedang Kosong !");
                window.location.href="?page=tambah_peminjaman";
            </script>
            <?php
        }
        elseif ($kondisi == "rusak") { ?>
        <script type="text/javascript">
            alert("Barang Yang Anda Pinjam Sedang Rusak !");
            window.location.href="?page=tambah_peminjaman";
        </script>
        <?php }
        else {
            @$query=mysqli_query($mysqli, "INSERT INTO peminjaman (ID_PEMINJAMAN, TANGGAL_PINJAM, TANGGAL_KEMBALI, STATUS_PEMINJAMAN, ID_PEGAWAI) VALUES ('$ID_PEMINJAMAN','$TANGGAL_PINJAM','0','Dipinjam','$ID_PEGAWAI')") or die (mysqli_error());
            @$query2=mysqli_query($mysqli, "INSERT INTO detail_pinjam (ID_DETAIL_PINJAM, ID_PEMINJAMAN, ID_INVENTARIS, JUMLAH_DETAIL, ID_PEGAWAI)VALUES('$ID_DETAIL_PINJAM', '$ID_PEMINJAMAN', '$ID_INVENTARIS', '$JUMLAH', $ID_PEGAWAI)") or die (mysqli_error());
            @$query3=mysqli_query($mysqli, "UPDATE inventaris SET JUMLAH=(JUMLAH-$JUMLAH) WHERE ID_INVENTARIS='$ID_INVENTARIS'") or die (mysqli_error());
            ?>
            <script type="text/javascript">
                document.location='index.php?page=peminjaman&alert=4';
            </script>
            <?php

        }}
    }
    ?>