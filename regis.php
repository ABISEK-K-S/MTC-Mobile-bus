
<!DOCTYPE html>
<html>
<head>
	<title>Register here</title>
    

	<?php include 'links/header.php'; ?>
</head>
<body>

<center><br>

<?php include 'links/nav.php'; ?>


<h1 style="color: white"><b>Registration</b></h1><br>
<form action="sendsms.php" method="POST">

	<div class="form-group" style="color: white">
		<b>Enter the username</b>
		<input type="text" id="pass" name="name" class="form-control">
	</div>

	<div class="form-group" style="color: white">
		<b>Enter your Phone number</b>
		<input type="text" id="pass" name="number" class="form-control">
	</div>

	<div class="form-group" style="color: white">
		<b>set a password</b>
		<input type="password" id="pass" name="password" class="form-control">
	</div>

	<div class="form-group" style="color: white">
		<b>Confirm the password</b>
		<input type="password" id="pass" name="repassword" class="form-control">
	</div>
		<br>
	<button class="btn btn-outline-success" onclick="myFunction()">Proceed</button>
</form>
<br>

<h5>Already registered? Click here to Login:</h5>
<a href="login.php" class="btn btn-outline-info">Click me</a>

<?php include 'links/footer.php'; ?>

</body>
</html>
