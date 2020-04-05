<?php 

	session_start();

	if( !isset($_SESSION["login"]) ) {
		header("Location: login.php");
		exit;
	}

	require 'navbar.php';
	require 'functions.php';
	
	$jumlahDataPerHalaman = 5;
	$jumlahData = count(query("SELECT * FROM tb_penyewa"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
	$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

	$penyewa = query("SELECT * FROM tb_penyewa ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman ");
	// $penyewa = query("SELECT * FROM tb_penyewa");

	// tombol cari ditekan
	if( isset($_POST["cari"]) ) {
		$penyewa= cari($_POST["keyword"]);
	}

 ?>

        
        <h2 class="mb-1">DATA CUSTOMERS</h2>

        <form action="" method="post" class="form-cari mb-3 text-primary">

			<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
			<button type="submit" name="cari" id="tombol-cari">Cari!</button>

		</form>

        <a href="tambah.php"><button type="button" class="btn btn-primary mb-3" href="tambah.php">TAMBAH DATA</button></a>
		
		<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">No. Pelanggan</th>
			      <th scope="col">Nama Lengkap</th>
			      <th scope="col">Alamat</th>
			      <th scope="col">Email</th>
			      <th scope="col">Handphone</th>
			      <th scope="col" class="aksi">Aksi</th>
			    </tr>
			  </thead>

			  	<?php $i = 1; ?>
				<?php foreach( $penyewa as $row ) : ?>
			  <tbody>
			    <tr>

			      <th scope="row"><?= $i; ?></th>
			      <td><?= $row["no_cust"]; ?></td>
			      <td><?= $row["nama"]; ?></td>
			      <td><?= $row["alamat"]; ?></td>
			      <td><?= $row["email"]; ?></td>
			      <td><?= $row["handphone"]; ?></td>
			      <td>
				      	<a href="ubah.php?id=<?= $row["id"]; ?>" class="text-success"><i class="fa fa-edit"></i></a> |
						<a href="hapus.php?id=<?= $row["id"]; ?>" class="text-danger" onclick="return confirm('yakin?');"><i class="fa fa-trash"></i></a>
			      <!-- <td class="aksi"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>      |     <i class="fa fa-trash" aria-hidden="true"></i> </td> -->
			      </td>
			    </tr>
			    <?php $i++; ?>
				<?php endforeach; ?>
			    
			    
			  </tbody>
			</table>
			<nav aria-label="Page navigation example">
			  <ul class="pagination">
			    <li class="page-item"><a class="page-link" href="?halaman=1">FIRST</a></li>
			    
			    <?php if( $halamanAktif > 1 ) : ?>
			    <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>">PREVIOUS</a></li>
			    <?php endif; ?>
			    
			    <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
					<?php if( $i == $halamanAktif ) : ?>
						<li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
					<?php else : ?>
						<li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
					<?php endif; ?>
					<?php endfor; ?>

					<?php if( $halamanAktif < $jumlahHalaman ) : ?>
						<li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">NEXT</a></li>

					<?php endif; ?>

			    <li class="page-item"><a class="page-link" href="?halaman=<?= $jumlahHalaman; ?>">LAST</a></li>
			  </ul>
			</nav>

			
		</div>



	</div>

    