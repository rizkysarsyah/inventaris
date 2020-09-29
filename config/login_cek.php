<?php
// panggil file untuk koneksi ke database
require_once "database.php";

// ambil data hasil submit dari form
$username = $_POST['username'];
$password = $_POST['password'];

	// ambil data dari tabel user untuk pengecekan berdasarkan inputan username dan passrword
$query = mysqli_query($mysqli, "SELECT * FROM petugas WHERE USERNAME='$username' AND PASSWORD='$password'")
or die('Ada kesalahan pada query user: '.mysqli_error($mysqli));
$rows  = mysqli_num_rows($query);

	// jika data ada, jalankan perintah untuk membuat session
if ($rows > 0) {
	$data  = mysqli_fetch_assoc($query);
	session_start();

	if($data['ID_LEVEL']=="1"){

		// buat session login dan username
		$_SESSION['id'] = $data['ID_PETUGAS'];
		$_SESSION['username'] = $data['USERNAME'];
		$_SESSION['password'] = $data['PASSWORD'];
		$_SESSION['nama_petugas'] = $data['NAMA_PETUGAS'];
		$_SESSION['id_level'] = $data['ID_LEVEL'];
		// alihkan ke halaman dashboard admin
		header("location:../index.php?page=admin");
		// cek jika user login sebagai pegawai
	}

	else if($data['ID_LEVEL']=="2"){
		// buat session login dan username
		$_SESSION['id'] = $data['ID_PETUGAS'];
		$_SESSION['username'] = $data['USERNAME'];
		$_SESSION['password'] = $data['PASSWORD'];
		$_SESSION['nama_petugas'] = $data['NAMA_PETUGAS'];
		$_SESSION['id_level'] = $data['ID_LEVEL'];
		// alihkan ke halaman dashboard pegawai
		header("location:../index.php?page=operator");
		// cek jika user login sebagai pengurus
	}
	else if($data['ID_LEVEL']=="3"){
		// buat session login dan username
		$_SESSION['id'] = $data['ID_PETUGAS'];
		$_SESSION['username'] = $data['USERNAME'];
		$_SESSION['password'] = $data['PASSWORD'];
		$_SESSION['nama_petugas'] = $data['NAMA_PETUGAS'];
		$_SESSION['id_level'] = $data['ID_LEVEL'];
		// alihkan ke halaman dashboard pegawai
		header("location:../index.php?page=peminjam");
		// cek jika user login sebagai pengurus
	}
}

	// jika data tidak ada, alihkan ke halaman login dan tampilkan pesan = 1
else {
	header("Location: ../login.php?alert=1");
}

?>