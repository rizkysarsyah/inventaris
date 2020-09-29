<?php 
if($_SESSION['id_level']=="3"){
    echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
elseif ($_SESSION['id_level']=="2") {
   echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="index.php?page=home";</script>';
}
?>
<?php if (isset($_GET['delete'])) {
 $id  = $_GET['delete'];
 $querydelete = mysqli_query($mysqli, "DELETE FROM pegawai WHERE ID_PEGAWAI='$id' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

 if ($querydelete) {
  echo '
  <div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  <span class="badge badge-pill badge-danger">Sukses</span><br>
  Data berhasil di hapus !
  </div>';
}
}
?>
<div class="row">
 <div class="col-md-12">
  <?php include 'alert.php'; ?>
  <!-- DATA TABLE -->
  <h3 class="title-5 m-b-35">Data Pegawai</h3>
  <div class="table-data__tool">

   <form class="form-header" action="" method="POST">
    <input class="au-input au-input--xl" type="text" name="cari"  placeholder="Pencarian" />

    <button class="btn btn-info" type="submit" name="pencarian">Cari</button>
  </form>

  <div class="table-data__tool-right">
    <a href="index.php?page=tambah_pegawai">
     <button class="btn btn-primary">Tambah Data</button>
   </a>

   <a href="modul/pegawai/cetak_pegawai.php">
     <button class="btn btn-secondary">Cetak</button>
   </a>        
 </div>
</div>

<div class="table-responsive table-responsive-data2">
 <table class="table table-data2">
  <thead>
   <tr>
    <th>id</th>
    <th>nama pegawai</th>
    <th>nip</th>
    <th>alamat</th>
  </tr>
</thead>
<tbody>
 <?php 
 if(isset($_POST['pencarian']))
 {
  $cari = $_POST['cari'];
  $query = mysqli_query($mysqli, "SELECT * FROM pegawai where ID_PEGAWAI like '%$cari%' OR NAMA_PEGAWAI like '%$cari%' OR NIP like '%$cari%' OR ALAMAT like '%$cari%'") or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));;
}
else{
  $query = mysqli_query($mysqli, "SELECT * FROM pegawai ORDER BY ID_PEGAWAI DESC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli)); 
} 

while ($data = mysqli_fetch_assoc($query)) {
  ?>
  <tr class="tr-shadow">
   <td><?php echo $data['ID_PEGAWAI']; ?></td>
   <td><?php echo $data['NAMA_PEGAWAI']; ?></td>
   <td><?php echo $data['NIP']; ?></td>
   <td><?php echo $data['ALAMAT']; ?></td>
   <td>
    <a data-toggle="tooltip" title="edit" class="btn btn-secondary btn-sm" href="index.php?page=edit_pegawai&edit=<?php echo $data['ID_PEGAWAI'] ?>"onclick="return confirm('apakah anda yakin untuk edit <?php echo $data['NAMA_PEGAWAI']; ?> ?')">
     <i class=" fas fa-edit"></i>
   </a>
   <a data-toggle="tooltip" title="delete" class="btn btn-danger btn-sm" href="index.php?page=pegawai&delete=<?php echo $data['ID_PEGAWAI'] ?>" onclick="return confirm('apakah anda yakin untuk delete <?php echo $data['NAMA_PEGAWAI']; ?>?')">
     <i class="fas fa-trash"></i>
   </a>
 </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<!-- END DATA TABLE -->
</div>
</div>