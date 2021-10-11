<?php session_start();
	if($_SESSION['user'] == ""){
    	?>
    	<script>window.location = "../auth/login/index.php?mess=Silahkan login terlebih dahulu"</script>
    	<?php
	}
 ?>
<html>
	<head>
		<title>LSP | Home</title>

		<!-- css file -->
		<link rel="stylesheet" href="../css/style.css">

		<!-- fontawesome -->
		<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

		<!-- google font -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	</head>
	<body>
		<div class="home-container">
			<div class="home-menu">
				<div class="home-logo">
					<img src="../img/logo.png" alt="">
					<p>Kompeten<br/>Profesional<br/>Inovatif</p>
				</div>
				<div class="list-menu">
					<ul>
						<li><a href="#">Beranda</a></li>
						<li><a href="#">Profil</a></li>
						<li><a href="#">Daftar Pelatihan</a></li>
						<li><a href="#">Cek Status</a></li>
						<li><a href="#">Lihat Sertifikat</a></li>
						<li><a href="./logout.php">Logout</a></li>
				 	</ul>
				</div>
			</div>
			<div class="home-content">
				<div class="home-content1">
					<?php 
						$nama = $_SESSION['user'];
						echo "<h3>Halo " . $nama . "<i class='fas fa-hand-paper fa-lg'></i></h3>";
						echo "<h4>Selamat Datang Di Halaman Admin LSP<h4>";
						echo "<p>Anda dapat mengakses menu di sebelah kanan untuk memulai.</p>";
					?>
				</div>
			</div>
		</div>
	</body>
</html>