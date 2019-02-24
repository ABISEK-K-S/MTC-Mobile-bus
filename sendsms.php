<html>
<head>
	<?php 

	include 'links/conn.php';
	include 'links/header.php';

	$name = $_POST["name"];
	$number = $_POST["number"];
	$password  = $_POST["password"];

	$sql = "insert into login(name,password,number) values('$name','$password','$number')" ; 
	$result = $conn->query($sql);

	if ($conn->query($sql) === TRUE) {
    	//header("refresh:0.001 ; url=index.php");
} else {
   echo '<script type="text/javascript"> window.alert("Data unable to insert");</script>';
              header("refresh:0.001 ; url=regis.php");

             }

	?>
<script>
var mes;
function sendOTP()
{
var to;
mes=Math.random();
mes=parseInt(mes*1000000);
//alert("random number is "+mes);
to=document.getElementById("to").value;
var url="https://smsapi.engineeringtgr.com/send/?Mobile=9952056265&Password=qwerty&Message="+mes+"&To="+to+"&Key=arundPTOrWKkXF9ScnZC";
//alert(url);
	req=new XMLHttpRequest();
	try
	{par="";
	 req.onreadystatechange=status;
	 req.open("GET",url,false);
	 req.send();			
	}
	catch(e)
	{
		alert(e);
	}

}
function status()
   {	//alert("entered print_que");
	if(req.readyState==4)
	{	 //alert("readstate 4");
	 var val;
	val=req.responseText;
	//alert(val);
   }
}
function check()
{
var otp=document.getElementById("otp").value;
//alert("otp is "+otp);
//var res=mes.localeCompare(otp);
if(mes==otp)
	alert("authentication Successfull");
else
	alert("authentication failure!!");
}
</script>
<link href="sms.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>



<body>

	<center>
<form name="f"><br><br>
     <p style="font-family: ubuntu;">Enter Phone number:</p>
     <input type="text" id="to" required><br>
     <input type="button"  class="button button1" onclick="sendOTP()" value="Generate OTP" pattern="[6-9][0-9]{9}"><br>
	 <p style="font-family: ubuntu;	color:red">Enter the recieved OTP:</p>
	 <input type="text" id="otp" name="otp" required><br>
	 <input type="button" class="button button1"  value="Proceed" onclick="check()">


<?php include "links/footer.php"?>
</form>
</body>
</html>