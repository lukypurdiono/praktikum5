<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
require 'functions.php';
require 'navbar.php';

$users = query("SELECT * FROM tb_user");
 ?>

 <h2 class="mb-1">DATA USERS</h2>

 <table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Nama User</th>
			    </tr>
			  </thead>
			  <?php $i = 1; ?>
				<?php foreach( $users as $row ) : ?>
			  <tbody>
			    <tr>

			      <th scope="row"><?= $i; ?></th>
			      <td><?= $row["username"]; ?></td>
			      </tr>
			    <?php $i++; ?>
				<?php endforeach; ?>
			    
			    
			  </tbody>

</table>