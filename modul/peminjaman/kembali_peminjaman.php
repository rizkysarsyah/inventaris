<?php 

if($_SESSION['id_level']=="3"){
	echo '<script language="javascript">alert("Selain Admin Dan Operator Tidak Bisa Melakukan Aksi Ini !"); document.location="index.php?page=home";</script>';
}
else
{
	include ("config/database.php");
	date_default_timezone_set('Asia/Jakarta');
	$id_peminjaman 	= $_GET['id_peminjaman'];
	$id_inventaris 	= $_GET['id_inventaris'];
	$jumlah_detail 	= $_GET['jumlah_detail'];
	$kembali		= date("Y-m-d h:i");
	$ambil=mysqli_query($mysqli, "SELECT * FROM peminjaman WHERE ID_PEMINJAMAN = '$id_peminjaman'");
	$hasil=mysqli_fetch_array($ambil);
	$status = $hasil['STATUS_PEMINJAMAN'];
	if($status == 'Kembali'){
		?> 
		<script language="JavaScript">
			document.location='index.php?page=peminjaman&alert=7'; 
		</script> 
		<?php 
	}else if($status == 'Dipinjam'){
		$query = mysqli_query($mysqli, "UPDATE peminjaman SET TANGGAL_KEMBALI='$kembali', STATUS_PEMINJAMAN='Kembali' where ID_PEMINJAMAN = '$id_peminjaman'")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
		$query2	= mysqli_query($mysqli, "UPDATE inventaris SET JUMLAH=(JUMLAH+$jumlah_detail) WHERE ID_INVENTARIS='$id_inventaris' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
		if($query&&$query2) 
		{ 
			?> 
			<script language="JavaScript">
				document.location='index.php?page=peminjaman&alert=6';
			</script> 
			<?php 
		}
	}else 
	{
		echo "Terjadi Kesalahan";
	}
}