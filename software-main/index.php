<!DOCTYPE html>
<html>

<head>
	<title>Registro de Clientes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<style>
		body {
			background-color: #429fe6;
			background-image: linear-gradient(45deg, #4EACF5, #4C6BFC, #27D9F5);
			background-size: 200% 200%;
			animation: gradientAnimation 10s ease infinite;


		}

		@keyframes gradientAnimation {
			0% {
				background-position: 0% 50%;
			}

			50% {
				background-position: 100% 50%;
			}

			100% {
				background-position: 0% 50%;
			}
		}

		.login-box {
			width: 350px;
			background: #CCD9D4;
			padding: 40px;
			margin: auto;
			margin-top: 100px;
			border-radius: 5px;
			border: 2px solid blue;
			box-shadow: 0px 0px 10px #888;
			text-align: center;
		}

		.login-box i {
			color: #333;
		}

		.login-box h1 {
			font-size: 24px;
			margin-bottom: 20px;
			color: #333;
		}

		.login-box label {
			display: block;
			margin-bottom: 10px;
			font-size: 16px;
			color: #333;
			text-align: left;
		}

		.login-box input[type="text"],
		.login-box input[type="password"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
			border: 1px solid #ccc;
			font-size: 16px;
		}

		.login-box input[type="submit"] {
			background: #333;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
		}

		.login-box input[type="submit"]:hover {
			background: #555;
		}

		img {
			height: 50px;
		}

		.titulo {
			font-family: sans-serif;
		}
		

		
	</style>

<body>
	<div class="login-box">

		<Div>
			<h4 class="titulo" style="background-color: black; color: #fff; border-radius: 15px;">CONTROL DE NO CONFORMIDADES</h4>
		</Div>
		<div style="background-color: transparent; border-radius:15px; ">
			<img src="img/carpeta.png" alt="">
			<h1>CNC</h1>

		</div>


		<form action="cliente.php" method="post">
			<label for="username">Username:</label>
			<input style="background-color: #555; color:white;" placeholder="usuario" type="text" name="usuario" required>
			<label for="password">Password:</label>
			<input style="background-color: #555; color:white;" placeholder="contraseña" type="password" name="clave" required>

			<input style="background-color: blue;" type="submit" name="submit" value="INGRESAR">
			<input style="background-color: red;" type="submit" name="submit" value="SALIR">
		</form>
	</div>
</body>

</html>