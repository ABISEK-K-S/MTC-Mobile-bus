
<!DOCTYPE html>
<html>
<head>
	<title>login</title>

	<?php include 'links/header.php'; ?>
</head>
<body>

<?php include 'links/nav.php'; ?>
<center>
<h1 style="color: white"><b>Welcome </b></h1><br>

	<form action="check.php" method="post">
		<div class="form-group" style="color: white">
			<b>Enter your username</b>
			<input type="text" id="pass" class="form-control" name="name" required>
		</div>
		<div class="form-group" style="color: white">
			<b>Enter your password</b>
			 <input type="password" id="pass" class="form-control" name="password" required>
		</div>
	<br>
	<button class="btn btn-outline-success">Proceed</button>
	</form>

<br>

<h5>New to site? Click here to Register:</h5>
<a href="regis.php" class="btn btn-outline-info">Click me</a>

<?php include 'links/footer.php'; ?>
</body>
</html>
