<html><head></head><body>

  <?php
  session_start();
  include 'links/conn.php';


  $name = $_POST['name'];
  $password = $_POST['password'];

  //echo $email." ".$password;

  $sql = "select * from login";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($name === $row["name"] && $password === $row["password"]){
              $count++;
              $_SESSION["validuser"]="validuser";
              $_SESSION["user"]=$row["name"];
        }
    }

            if($count!=0){
              header("refresh:0.001 ; url=index.php");
            }
            else{
              echo '<script type="text/javascript"> window.alert("Please, Check the name and Password");</script>';
              header("refresh:0.001 ; url=login.php");
            }
}
 else {
    echo "0 results";
}



?>
</body></html>
