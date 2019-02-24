<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
<?php include 'links/header.php'; ?>
</head>
<body>

<?php include 'links/nav.php'; ?>
<div class="jumbotron">

<h1>Feedback Form</h1>

<form action="add.php" method="POST">
	<div class="form-group"><br>
		<label for="comments">Comments:</label>
		<textarea name="comment" class="form-control" rows="7"></textarea>
	</div>
	<center><input type="submit" value="Submit" class="btn btn-outline-success"></center>
</form>

</div>

<?php include 'links/footer.php'; ?>
</body>
</html>
