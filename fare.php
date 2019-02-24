<?php

include 'links/conn.php';

$sql = "select * from route_info";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Fares</title>
<?php include 'links/header.php'; ?>
</head>
<body>

<?php include 'links/nav.php'; ?>
<div class="jumbotron">
  <center>
    <form>
      <input type="text" name="search" style="background-color:#a16fe8;color:white">
      <input type="submit" value="search" class="btn btn-success">
    </form>
  </center><br>
  <table class="table table-stripped">
      <thead>
        <th>Route no</th>
        <th>from</th>
        <th>to</th>
        <th>fare</th>
      </thead>
      <tbody>
  <?php
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
?>

    <tr>
      <td><?php echo $row["route_no"] ?></td>
      <td><?php echo $row["start"]  ?></td>
      <td><?php echo $row["end"]  ?></td>
      <td><?php echo $row["fare"]  ?></td>
    </tr>


<?php     }
  } else {
      echo "0 results";
  }
?>
</tbody>
</table>
</div>

<?php include 'links/footer.php'; ?>
</body>
</html>
