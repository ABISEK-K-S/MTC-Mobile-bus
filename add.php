<?php 

include 'links/conn.php';

$comment = $_POST["comment"];

$sql = "INSERT INTO comments (comment) VALUES ('$comment')";

if ($conn->query($sql) === TRUE) {
    header("refresh:0.001 ; url=index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
     header("refresh:0.001 ; url=feedback.php");
}

