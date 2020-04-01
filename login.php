<?php
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM tb_user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}


}

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}


if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

			header("Location: index.php");
			exit;
		}
	}

	$error = true;

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>LOGIN PAGE</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>



<section class="container">
			<section class="login-form">
				<?php if( isset($error) ) : ?>
					<script>
						alert('Username / Password Anda Salah!');
						document.location.href = 'login.php';
					</script>
					<!-- <center><p style="color: red; font-style: italic;">USERNAME / PASSWORD ANDA SALAH</p></center> -->
				<?php endif; ?>
				<form method="post" action="" role="login">
					<h3><center>LUCKY RENT CAR</center></h3>
				
					<input type="username" name="username" placeholder="Username" required class="form-control input-lg" />
					<input type="password" name="password" placeholder="Password" required class="form-control input-lg" />
					
					<input type="checkbox" name="remember" value="1" /> Remember me<br />
					
					
					<button type="submit" name="login" class="btn btn-lg btn-block btn-primary">Sign in</button>
				
					<a href="registrasi.php" class="text-primary"><center>Create account</center></a>
				
				</form>
				
			</section>
	</section>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>



<!-- <section class="container">
<form action="" method="post">
<section class="login-form">
	<ul>
		<li>
			<label for="username">Username :</label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember me</label>
		</li>
		<li>
			<button type="submit" name="login">Login</button>
		</li>
	</ul>
	
</form> -->







</body>
</html>