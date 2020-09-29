<?php 
	session_start();
	require_once"config/database.php";

	//fungsi untuk pengecekan status login user
	//jika user belum login, alihkan ke halaman login fan tampilkan message = 1

 	if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
 	{
		header('Location: login.php?alert=2');
 	}
	 //memulai session
 ?>