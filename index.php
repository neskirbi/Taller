<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>

	<script src="panel/js/jquery.min.js"></script>
	<script src="panel/js/poper.min.js"></script>
	<script src="panel/js/bootstrap.min.js"></script>
	<script src="panel/js/funciones.js"></script>
	<link rel="stylesheet" type="text/css" href="panel/css/styles.css">
	<link rel="stylesheet" href="panel/css/bootstrap.min.css">
	<link href="panel/faIcons5/css/all.css" rel="stylesheet">
	<link href="panel/faIcons4/css/font-awesome.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<span class="login100-form-title p-b-55">
						Ingresar
				</span>

				<div class="wrap-input100 validate-input m-b-16" data-validate="Valid email is required: ex@abc.xyz">
					<input class="input100" id="user" pattern="[A-Za-z0-9_-]{1,20}" type="text" placeholder="Usuario">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="fas fa-user"></span>
					</span>
				</div>

				<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
					<input class="input100" id="pass" pattern="[A-Za-z-0-9_-]{1,20}" type="password" placeholder="Contraseña">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="fas fa-lock"></span>

					</span>
				</div>

				
				
				<div class="container-login100-form-btn p-t-25">
					<button onclick="Ingresar();" id="login" class="login100-form-btn">
						Enviar
					</button>
				</div>

				
				<div class="p-t-115">
					
				</div>
			</div>			
		</div>
	</div>
	

</body>
</html>