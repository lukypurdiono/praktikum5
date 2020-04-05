<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}
require 'functions.php';
require 'navbar.php';

if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'tambah.php';
			</script>
		";
	}


}


?>

 <h2 class="mb-1">TAMBAH DATA CUSTOMERS</h2>

 <form action="" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="no_cust">Nomor Pelanggan</label>
      <input type="number" name="no_cust" class="form-control border border-dark" id="no_cust" placeholder="nama" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="nama">Nama Lengkap</label>
      <input type="text" name="nama" class="form-control border border-dark" id="nama" placeholder="nama" required>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="alamat">Alamat</label>
      <input type="text" name="alamat" class="form-control border border-dark" id="alamat" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control border border-dark" id="email" placeholder="nama" required>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="handphone">Nomor Handphone</label>
      <input type="number" name="handphone" class="form-control border border-dark" id="handphone" required>
    </div>
  </div>

  
    
 
  <button class="btn btn-primary mt-2" type="submit" name="submit">Tambah Data</button>

</form>