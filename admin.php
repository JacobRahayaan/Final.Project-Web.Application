<?php 
require 'functions.php';

session_start();
if (!isset($_SESSION['Login'])) {
    header("Location: login.php");
    exit;
}

$movie = query("SELECT * FROM movie");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$movie = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="admin.css">
	<title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Film</h1>

<a href="tambah.php" class="button">Tambah data film</a>
<a href="logout.php" class="button">Keluar</a>
<br><br>

<form action="" method="post">

	<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
	<button type="submit" name="cari">Cari!</button>
	
</form>

<br>
<table border="1" cellpadding="10" cellspacing="0">

	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>Judul</th>
		<th>Jenis film</th>
		<th>Sinopsis singkat</th>
		<th>Sinopsis</th>
		<th>Rating</th>
		<th>Tahun Rilis</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach( $movie as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
		</td>
		<td><img src="gambar/<?= $row["gambar"]; ?>" width="100"></td>
		<td><?= $row["judul"]; ?></td>
		<td><?= $row["jenis_film"]; ?></td>
		<td><?= $row["sinopsis_singkat"]; ?></td>
		<td><?= $row["sinopsis"]; ?></td>
		<td><?= $row["rating"]; ?></td>
		<td><?= $row["tahun_rilis"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
	
</table>

</body>
</html>