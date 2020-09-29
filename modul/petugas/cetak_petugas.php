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
header("Content-Disposition: attachment; filename=data petugas.doc");
header("Pragma: no-cache");
header("Expires: 0");
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); //always modified


?>	
<table align="center" border="0" cellpadding="0" cellspacing="0">
	<h3 align="center"><font color="black">Data Petugas SMK Negeri 1 Kamal</font></h3>
	<table border="1" align="center" cellpadding="5" cellspacing="0">
		<tr>
			<th>id</th>
			<th>username</th>
			<th>password</th>
			<th>nama petugas</th>
			<th>id level</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$query = mysqli_query($mysqli, "SELECT * FROM petugas ORDER BY ID_PETUGAS DESC");  

		while ($data = mysqli_fetch_assoc($query)) {
			?>
			<tr>
				<td><?php echo $data['ID_PETUGAS']; ?></td>
				<td><?php echo $data['USERNAME']; ?></td>
				<td><?php echo $data['PASSWORD']; ?></td>
				<td><?php echo $data['NAMA_PETUGAS']; ?></td>
				<td><?php echo $data['ID_LEVEL']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php } ?>
	<!-- END DATA TABLE -->
