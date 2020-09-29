<?php 
if(isset($_GET['page'])){
	$page = $_GET['page'];

	switch ($page) {
		case 'home':
		include "home.php";
		break;

		//admin
		case 'admin':
		include 'home.php';
		break;

		//operator
		case 'operator':
		include 'home.php';
		break;

		//peminjam
		case 'peminjam':
		include 'home.php';
		break;

		//peminjaman
		case 'peminjaman':
		include 'modul/peminjaman/index.php';
		break;

		case 'tambah_peminjaman':
		include 'modul/peminjaman/tambah_peminjaman2.php';
		break;

		case 'kembali_peminjaman':
		include 'modul/peminjaman/kembali_peminjaman.php';
		break;

		case 'cetak_peminjaman':
		include 'modul/peminjaman/cetak_peminjaman.php';
		break;

		
		//inventaris
		case 'inventaris':
		include "modul/inventaris/index.php";
		break;

		case 'tambah_inventaris':
		include "modul/inventaris/tambah_inventaris.php";
		break;

		case 'edit_inventaris':
		include "modul/inventaris/edit_inventaris.php";
		break;

		//ruang
		case 'ruang':
		include "modul/ruang/index.php";
		break;

		case 'tambah_ruang':
		include "modul/ruang/tambah_ruang.php";
		break;

		case 'edit_ruang':
		include "modul/ruang/edit_ruang.php";
		break;

		//petugas
		case 'petugas':
		include "modul/petugas/index.php";
		break;

		case 'tambah_petugas':
		include "modul/petugas/tambah_petugas.php";
		break;

		case 'edit_petugas':
		include "modul/petugas/edit_petugas.php";
		break;

		//jenis
		case 'jenis':
		include "modul/jenis/index.php";
		break;
		
		case 'tambah_jenis':
		include "modul/jenis/tambah_jenis.php";
		break;

		case 'edit_jenis':
		include "modul/jenis/edit_jenis.php";
		break;
		
		//level
		case 'level':
		include "modul/level/index.php";
		break;	

		//pegawai
		case 'pegawai':
		include "modul/pegawai/index.php";
		break;

		case 'tambah_pegawai':
		include "modul/pegawai/tambah_pegawai.php";
		break;

		case 'edit_pegawai':
		include "modul/pegawai/edit_pegawai.php";
		break;	

		default:
		echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
		break;
	}
}else{
	include "home.php";
}

?>