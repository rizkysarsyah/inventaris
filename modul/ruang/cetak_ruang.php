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
header("Content-Disposition: attachment; filename=data ruang.doc");
header("Pragma: no-cache");
header("Expires: 0");
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); //always modified


?>	
<table align="center" border="0" cellpadding="0" cellspacing="0">
	<h3 align="center"><font color="black">Data Ruang SMK Negeri 1 Kamal</font></h3>
	<table border="1" align="center" cellpadding="5" cellspacing="0">
		<tr>
			<th>id</th>
			<th>nama ruang</th>
			<th>kode ruang</th>
			<th>keterangan</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$query = mysqli_query($mysqli, "SELECT * FROM ruang ORDER BY ID_RUANG DESC");  

		while ($data = mysqli_fetch_assoc($query)) {
			?>
			<tr>
				<td><?php echo $data['ID_RUANG']; ?></td>
				<td><?php echo $data['NAMA_RUANG']; ?></td>
				<td><?php echo $data['KODE_RUANG']; ?></td>
				<td><?php echo $data['KETERANGAN_RUANG']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php } ?>
	<!-- END DATA TABLE -->
