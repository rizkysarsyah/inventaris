<?php 
include '../../session.php';
if($_SESSION['id_level']=="3"){
	echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="../../index.php?page=home";</script>';
}
elseif ($_SESSION['id_level']=="2") {
	echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="../../index.php?page=home";</script>';
}

else { ?>


<?php
include ("config/database.php");
header("Content-type: application/vnd.ms-word");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data peminjaman.doc");
header("Pragma: no-cache");
header("Expires: 0");
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); //always modified
?>	
<table align="center" border="0" cellpadding="0" cellspacing="0">
	<h3 align="center"><font color="black">Data Inventaris SMK Negeri 1 Kamal</font></h3>
	<table border="1" align="center" cellpadding="5" cellspacing="0">
		<tr>
			<th>ID Peminjaman</th>
			<th>Tanggal Pinjam</th>
			<th>ID Detail Pinjam</th>
			<th>Status Peminjaman</th>
			<th>Nama</th>
			<th>Jumlah</th>
			<th>Nama Pegawai</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$query=mysqli_query($mysqli, "SELECT detail_pinjam.*, peminjaman.*, inventaris.*, pegawai.* FROM detail_pinjam
			LEFT JOIN peminjaman ON peminjaman.ID_PEMINJAMAN=detail_pinjam.ID_PEMINJAMAN
			LEFT JOIN inventaris ON inventaris.ID_INVENTARIS=detail_pinjam.ID_INVENTARIS
			LEFT JOIN pegawai ON pegawai.ID_PEGAWAI=peminjaman.ID_PEGAWAI")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli)); 

		while ($data = mysqli_fetch_assoc($query)) {
			?>
			<tr>
				<td><?php echo $data['ID_PEMINJAMAN']?></td>
				<td><?php echo $data['TANGGAL_PINJAM']?></td>
				<td><?php echo $data['ID_DETAIL_PINJAM']?></td>
				<td><?php echo $data['STATUS_PEMINJAMAN']?></td>
				<td><?php echo $data['NAMA']?></td>
				<td><?php echo $data['JUMLAH']?></td>
				<td><?php echo $data['NAMA_PEGAWAI']?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<!-- END DATA TABLE -->


	<?php } ?>

