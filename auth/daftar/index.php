<html>
	<head>
		<title>LSP | Daftar</title>

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
			<h2>Halaman Daftar</h2>
			<div class="login-box2">
				<form method="POST">
					<p>Silahkan isi form berikut</p>
					<h4>Create Username</h4>
					<input type="text" name="vuser">
					<h4>Enter Your Email</h4>
					<input type="email" name="vemail">
					<h4>Create Password</h4>
					<input type="password" name="vpass"><br/>
					<input type="submit" value="Daftar" name="btn" id="lbtn">
					<p id="askd">Atau <a href="../login/index.php">Login disini</a></p>
				</form>
			</div>
		</div>

		<?php 
			if(isset($_POST['btn'])){
				// jika input kosong maka akan diberi nilai default
				if(!isset($_POST['vuser'])) ($_POST['vuser'] = "");
   				if(!isset($_POST['vemail'])) ($_POST['vemail'] = "");
    			if(!isset($_POST['vpass'])) ($_POST['vpass'] = "");

    			if($_POST['vuser'] != "" && $_POST['vpass'] != ""){
	    			// letak file json
	    			$dir = "../../data/dataUser.json";
	    			
	    			// mengambil data file
	    			$dataJson =  file_get_contents($dir);

	    			// enkripsi pass
	    			$pass = md5($_POST['vpass']);
	    			
	    			// array daftar
	    			$dataDaftar = array(
						"username" => $_POST['vuser'],
						"email" => $_POST['vemail'],
						"password" => $pass,
					);

					// array data user
					$dataUser = array();
					$dataUser = json_decode($dataJson, true);
					
					// menambhakan data daftar ke file json
					array_push($dataUser, $dataDaftar);

					// menutup file
					$dataJson = json_encode($dataUser, JSON_PRETTY_PRINT);
					if(file_put_contents($dir, $dataJson)){
        				echo 'Daftar Berhasil';
   						?>
       			 		<script>window.location = "../login/index.php"</script>
    					<?php
    				}
				}
			}
		?>

	</body>
</html>