<?php 


$conn = mysqli_connect("localhost", "root", "", "praktikum5");


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

	$no_cust = htmlspecialchars($data["no_cust"]);
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$email = htmlspecialchars($data["email"]);
	$handphone = htmlspecialchars($data["handphone"]);

	$query = "INSERT INTO tb_penyewa
				VALUES
			  ('','$no_cust', '$nama', '$alamat','$email','$handphone')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$no_cust = htmlspecialchars($data["no_cust"]);
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$email = htmlspecialchars($data["email"]);
	$handphone = htmlspecialchars($data["handphone"]);
	
	
	

	// $query = "UPDATE mahasiswa SET
	// 			nrp = '$nrp',
	// 			nama = '$nama',
	// 			email = '$email',
	// 			jurusan = '$jurusan',
	// 			gambar = '$gambar'
	// 		  WHERE id = $id
	// 		";

	$query = "UPDATE tb_penyewa SET
			  no_cust = '$no_cust', 
			  nama = '$nama', 
			  alamat = '$alamat',
			  email = '$email',
			  handphone = '$handphone'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_penyewa WHERE id = $id");
	return mysqli_affected_rows($conn);
}



function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO tb_user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}

function cari($keyword) {
	$query = "SELECT * FROM tb_penyewa
				WHERE
			  no_cust LIKE '%$keyword%' OR
			  nama LIKE '%$keyword%' OR
			  alamat LIKE '%$keyword%' OR
			  email LIKE '%$keyword%' OR
			  handphone LIKE '%$keyword%'
			";
	return query($query);
}



?>