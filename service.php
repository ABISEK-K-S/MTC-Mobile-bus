<!DOCTYPE html>
<html>
<head>
	<title>Service</title>
<?php include 'links/header.php'; ?>
</head>
<body>

<?php include 'links/nav.php'; ?>
<div class="jumbotron">

<?php 

include 'links/conn.php';

$sql = "select type,nos from route_info";
$result = $conn->query($sql);

$ord=0;
$lss=0;
$exp=0;
$gs=0;
$night=0;

if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
    	if($row["type"]==="ORD"){
    		$ord++;
    	}
    	else if($row["type"]==="LSS"){
    		$lss++;
    	}
    	else if($row["type"]==="EXP"){
    		$exp++;
    	}
    	else if($row["type"]==="NIGHT"){
    		$night++;
    	}
    	else if($row["type"]==="GS"){
    		$gs++;
    	}
    }
?>
<p>No of LSS: <?php echo $ord ?></p>
<p>No of ORD: <?php echo $lss ?></p>
<p>No of EXP: <?php echo $exp ?></p>
<p>No of NIGHT: <?php echo $night ?></p>
<p>No of GS: <?php echo $gs ?></p>

<?php
}else{
	echo "0 results";
}

?>
  
</div>

<?php include 'links/footer.php'; ?>
</body>
</html>
