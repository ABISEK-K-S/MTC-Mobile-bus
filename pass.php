<!DOCTYPE html>
<html>
<head>
	<title>Monthly passes</title>
<?php include 'links/header.php';
session_start()
 ?>
</head>
<body>

<?php include 'links/nav1.php'; ?>
<div class="jumbotron">

<h1>Pass Details</h1>

<?php 

	include 'links/conn.php';
	$name = $_SESSION["user"];
      if($name!=null){
	$sql = "SELECT * FROM LOGIN WHERE name='$name'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      $day = $row["bought"];
      	if($row["bought"]!=null){
      		echo "You have a monthly pass ending on $day";
      	}

      	if($row["bought"] < date("y-m-d")){
      		echo "You pass has ended get a new one";
      }}}
      }
      else echo "Sigin to view details";
?>

</div>


</body>
</html>