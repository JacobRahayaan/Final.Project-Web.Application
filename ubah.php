<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mvi = query("SELECT * FROM movie WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'admin.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'admin.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data film</title>
</head>
<body>
	<h1>Ubah data film</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mvi["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mvi["gambar"]; ?>">
		<ul>
        <li>
				<label for="judul">Judul : </label>
				<input type="text" name="judul" id="judul" required>
			</li>
            Jenis film : <br>
			<li>
                <input type="radio" name="jenis_film" id="anime">
				<label for="anime">Anime</label>
			</li>
			<li>
                <input type="radio" name="jenis_film" id="action">
				<label for="action">Action</label>
			</li>
			<li>
                <input type="radio" name="jenis_film" id="family">
				<label for="family">Family</label>
			</li>
			<li>
				<label for="sinopsis_singkat">Sinopsis singkat :</label>
				<textarea name="sinopsis_singkat" id="sinopsis_singkat">
			</li>
			<li>
				<label for="sinopsis">Sinopsis :</label>
				<textarea name="sinopsis" id="sinopsis">
			</li>
			<li>
				<label for="rating">Rating :</label>
				<input type="text" name="rating" id="rating">
			</li>
			<li>
				<label for="tahun_rilis">Tahun rilis :</label>
				<input type="text" name="tahun_rilis" id="tahun_rilis+">
			</li>
			<li>
				<label for="gambar">Gambar :</label> <br>
				<img src="img/<?= $mhs['gambar']; ?>" width="40"> <br>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
			</li>
		</ul>

	</form>




</body>
</html>