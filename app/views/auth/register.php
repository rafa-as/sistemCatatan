<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>	
	<link rel="stylesheet" href="public/css/style.css">
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-header">Register Admin Baru</div>
			<?php
			if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; 
			?>

			<form action="index.php?act=register-process" method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" class="form-control" required>
				</div>
				<button type="submit" class="btn">Register</button>
			</form>
			<hr>
			<a href="index.php" class="text-center">Sudah Punya Akun? <span class="underline">Login</span></a>
		</div>
	</div>
</body>
</html>