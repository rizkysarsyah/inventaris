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
include ("../../config/database.php");
header("Content-type: application/vnd.ms-word");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data inventaris.doc");
header("Pragma: no-cache");
header("Expires: 0");
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); //always modified


?>	
<table align="center" border="0" cellpadding="0" cellspacing="0">
	<h3 align="center"><font color="black">Data Inventaris SMK Negeri 1 Kamal</font></h3>
	<table border="1" align="center" cellpadding="5" cellspacing="0">
		<tr>
			<th>id</th>
			<th>nama barang</th>
			<th>keterangan</th>
			<th>tanggal</th>
			<th>jumlah</th>
			<th>kondisi</th>
			<th>kode inventaris</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$query = mysqli_query($mysqli, "SELECT * FROM inventaris ORDER BY ID_INVENTARIS DESC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));  

		while ($data = mysqli_fetch_assoc($query)) {
			?>
			<tr>
				<td><?php echo $data['ID_INVENTARIS']; ?></td>
				<td><?php echo $data['NAMA']; ?></td>
				<td><?php echo $data['KETERANGAN_INVENTARIS']; ?></td>
				<td><?php echo $data['TANGGAL_REGISTER']; ?></td>
				<td><?php echo $data['JUMLAH']; ?></td>
				<td><?php echo $data['KONDISI']; ?></td>
				<td><?php echo $data['KODE_INVENTARIS']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php } ?>

	<!-- END DATA TABLE -->
