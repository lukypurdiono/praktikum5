<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}
require 'functions.php';
require 'navbar.php';

 $id = $_GET["id"];

 $plg = query("SELECT * FROM tb_penyewa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'ubah.php';
			</script>
		";
	}


}
 ?>

 <h2 class="mb-1">EDIT DATA CUSTOMERS</h2>

 <form action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $plg["id"]; ?>">

  
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="no_cust">Nomor Pelanggan</label>
      <input type="text" name="no_cust" class="form-control border border-dark" id="no_cust" value="<?= $plg["no_cust"]; ?>" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="nama">Nama Lengkap</label>
      <input type="text" name="nama" class="form-control border border-dark" id="nama" value="<?= $plg["nama"]; ?>" required>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="alamat">Alamat</label>
      <input type="text" name="alamat" class="form-control border border-dark" id="alamat" value="<?= $plg["alamat"]; ?>"required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="email">Email</label>
      <input type="text" name="email" class="form-control border border-dark" id="email" value="<?= $plg["email"]; ?>" required>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="handphone">Nomor Handphone</label>
      <input type="text" name="handphone" class="form-control border border-dark" id="handphone" value="<?= $plg["handphone"]; ?>" required>
    </div>
  </div>

  
    
 
  <button class="btn btn-primary mt-2" type="submit" name="submit">Edit Data</button>

</form>