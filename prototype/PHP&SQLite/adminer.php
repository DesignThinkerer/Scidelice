<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
function adminer_object() {
	include_once "./plugins/plugin.php";
	include_once "./plugins/login-password-less.php";
	return new AdminerPlugin(array(
		// TODO: inline the result of password_hash() so that the password is not visible in source codes
		new AdminerLoginPasswordLess(password_hash("admin", PASSWORD_DEFAULT)),
	));
}

include "./adminer-4.8.2.php";
include "./nav.php";
?>
</body>
</html>