<?php
require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'admin.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'admin.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="admin.css">
	<title>Tambah data film</title>
</head>
<body>
	<h1>Tambah data film</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="judul">Judul : </label>
				<input type="text" name="judul" id="judul" required>
			</li>
            <li>
                <label for="jenis_film">Jenis film : </label> <br>
                <select name="jenis_film" id="jenis_film">
                    <option value="anime">Anime</option>
                    <option value="action">Action</option>
                    <option value="family">Family</option>
                </select>
            </li>
            
			<li>
				<label for="sinopsis_singkat">Sinopsis singkat :</label>
				<textarea name="sinopsis_singkat" id="sinopsis_singkat"></textarea>
			</li>
			<li>
				<label for="sinopsis">Sinopsis :</label>
				<textarea name="sinopsis" id="sinopsis"></textarea>
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
				<label for="gambar">Gambar :</label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>

	</form>




</body>
</html>