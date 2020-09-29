<?php 
if (empty($_GET['alert'])) {
}

elseif ($_GET['alert']==1) {
	echo
	'<div class="alert alert-danger">
	Username dan Password Salah !
	</div>';
}
elseif ($_GET['alert']==2) {
	echo
	'<div class="alert alert-danger">
	Login Terlebih Dahulu !
	</div>';
}
elseif ($_GET['alert']==3) {
	echo
	'<div class="alert alert-secondary">
	Logout Berhasil !
	</div>';
}
elseif ($_GET['alert']==4) {
	echo
	'<div class="alert alert-primary">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	<span class="badge badge-pill badge-primary">berhasil</span><br>
	Data berhasil di tambahkan !
	</div>';
}
elseif ($_GET['alert']==5) {
	echo
	'<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	<span class="badge badge-pill badge-success	">Berhasil</span><br>
	Data berhasil di ubah !
	</div>';
}
elseif ($_GET['alert']==6) {
	echo
	'<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	<span class="badge badge-pill badge-success	">Berhasil</span><br>
	Barang berhasil Di Kembalikan !
	</div>';
}
elseif ($_GET['alert']==7) {
	echo
	'<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	<span class="badge badge-pill badge-danger	">Gagal</span><br>
	Barang Telah Di Kembalikan Sebelumnya !
	</div>';
}
?>