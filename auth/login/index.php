<?php session_start();
 ?>
<html>
	<head>
		<title>LSP | Login</title>

		<!-- css file -->
		<link rel="stylesheet" href="../../css/style.css">

		<!-- fontawesome -->
		<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

		<!-- google font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="login-container">
			<h2>Halaman Login</h2>
			<div class="login-box">
				<form method="POST">

					<?php  
						if(!isset($_GET['mess'])) ($_GET['mess'] = "Sign in to start your session");
						$mess = $_GET['mess'];
						echo '<p>' . $mess . '</p>';
					?>

					<h4>Username</h4>
					<input type="text" name="vuser">
					<h4>Password</h4>
					<input type="password" name="vpass"><br/>
					<input type="submit" value="Login" name="btn" id="lbtn">
					<p id="askl">Belum punya akun? <a href="../daftar/index.php">Daftar disini</a></p>
				</form>
			</div>
		</div>

		<?php 
			if(isset($_POST['btn'])){

				// jika input kosong maka akan diisi nilai default
				if(!isset($_POST['vuser'])) ($_POST['vuser'] = "");
				if(!isset($_POST['vpass'])) ($_POST['vpass'] = "");

				$user = $_POST['vuser'];
				$pass = md5($_POST['vpass']); //enkripsi

				$dir = "../../data/dataUser.json";

				// akses file
				$dataJson = file_get_contents($dir);

				// membuat array data user
				$dataUser = array();
				$dataUser = json_decode($dataJson, true);

				// mencari data user
				for($i = 0; $i < count($dataUser); $i++){
					if($dataUser[$i]['username'] == $user && $dataUser[$i]['password'] == $pass){
						$_SESSION['user'] = $dataUser[$i]['username'];
						$_SESSION['email']= $dataUser[$i]['email'];
						$_SESSION['pass'] = $dataUser[$i]['password'];

						print_r($dataUser[$i]);
			
						?>
						<script>window.location = "../../home/index.php"</script>
						<?php
					}
				}
			}
		?>

	</body>
</html>