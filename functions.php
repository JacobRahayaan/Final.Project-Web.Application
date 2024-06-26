<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "final_project");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;

	$judul = htmlspecialchars($data["judul"]);
	$jenis_film = htmlspecialchars($data["jenis_film"]);
	$sinopsis_singkat = htmlspecialchars($data["sinopsis_singkat"]);
	$sinopsis = htmlspecialchars($data["sinopsis"]);
	$rating = htmlspecialchars($data["rating"]);
	$tahun_rilis = htmlspecialchars($data["tahun_rilis"]);

	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO movie
				VALUES
			  ('', '$judul', '$jenis_film', '$sinopsis_singkat', '$sinopsis', '$rating', '$tahun_rilis', '$gambar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 10000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'gambar/' . $namaFileBaru);

	return $namaFileBaru;
}




function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM movie WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$judul = htmlspecialchars($data["judul"]);
	$jenis_film = htmlspecialchars($data["jenis_film"]);
	$sinopsis_singkat = htmlspecialchars($data["sinopsis_singkat"]);
	$sinopsis = htmlspecialchars($data["sinopsis"]);
	$rating = htmlspecialchars($data["rating"]);
	$tahun_rilis = htmlspecialchars($data["tahun_rilis"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
	

	$query = "UPDATE movie SET
				judul = '$judul',
				jenis_film = '$jenis_film',
				sinopsis_singkat = '$sinopsis_singkat',
				sinopsis = '$sinopsis',
				rating = '$rating',
				sinopsis = '$sinopsis',
				tahun_rilis = '$tahun_rilis'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM movie
				WHERE
			  judul LIKE '%$keyword%'
			";
	return query($query);
}












?>