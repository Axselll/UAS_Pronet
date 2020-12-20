<?php
	session_start();
	require "func_data_admin.php";
	if ( isset($_SESSION["login"]) ) {
        header("Location: index.php");
		exit;
    }

	if( isset($_POST["login"]) ) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($connection, "SELECT * FROM administrator WHERE
        username = '$username'");

        if ( mysqli_num_rows($result) === 1 ) {
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"]) ) {
                $_SESSION["login"] = true;
                header("Location: index.php");
                exit;
            }
        }
        $error = true;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Halaman Login</title>
		<link rel="stylesheet" href="assets/css/login-style.css" />
		</style>
	</head>
	<body>
		<form action="" method="post">
		<div class="container">
			<div class="flex-container">
				<h1>Login</h1>
				<label for="username">Username</label>
				<input
					type="text"
					name="username"
					id="username"
					placeholder="Username"
				/>
				<label for="password">Password</label>
				<input
					type="password"
					name="password"
					id="password"
					placeholder="Password"
				/>
				<button type="submit" name="login">Login</button>
				<?php if ( isset($error) ): ?>
					<script>alert("Username atau Password Salah");</script>
				<?php endif; ?>
			</div>
		</div>
		</form>
	</body>
</html>
