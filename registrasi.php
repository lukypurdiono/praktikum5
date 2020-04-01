<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
				document.location.href = 'login.php';
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>REGISTER PAGE</title>
	
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
				<form method="post" action="" role="login">

	
	<h3><center>UMT RENT CAR</center></h3>
				
					<input type="username" name="username" placeholder="Username" required class="form-control input-lg" />
					<input type="password" name="password" placeholder="Password" required class="form-control input-lg" />
					<input type="password" name="password2" placeholder="Konfirmasi Password" required class="form-control input-lg" />
					
					
					
					
					<button type="submit" name="register" class="btn btn-lg btn-block btn-primary">REGISTER</button>
				</form>
				
			</section>
	</section>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

	<!-- <ul>
		<li>
			<label for="username">username :</label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<label for="password2">konfirmasi password :</label>
			<input type="password" name="password2" id="password2">
		</li>
		<li>
			<button type="submit" name="register">Register!</button>
		</li>
	</ul>
	
</form>

</body>
</html> -->