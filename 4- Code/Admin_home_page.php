<!DOCTYPE html>
<html>
<head>
<title> Admin home page </title>
<style>

body{
	background-image: url("homea.jpg");
	background-size: cover;
	background-repeat: no-repeat;
	height: 100vh;
	overflow:hidden;
	background-color:red;
}
table{
	background:white;
	border-radius: 20px;
	opacity: 0.8;
}
table.hello:hover {
 background-color: yellow;
}
.button {
  background-color: gray;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>


<body>
<a href="login.php">
<button type="button" class="button" style="float:right; margin-top:20px; margin-left:20px;" >Logout</button>
</a>
<a href="AddCar.php">
<button type="button" class="button" style="float:right; margin-top:20px; margin-left:20px;" >Add Car</button>
</a>

<!--<a href="Add_admin">
<button type="button" style="float:right; margin-top:20px; margin-left:20px;">Update car</button>
</a>-->
<br><br><br><br><br><br>




<?php

if( empty(session_id()) && !headers_sent()){
	session_start();
}

require_once 'connect.php';
$db = new connect();
$conn = $db->connection();

$query = "select * from car";
$query_run = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($query_run))
{
	?>
	
<table class="hello" style="display: inline-block ; width:300px ; border-radius: 30px;">
	<tr>
		<td>
			<?php echo '<img src="data:image;base64, '.base64_encode($row ['Photo']).'" alt = "image" style="width:250px; height:200px; padding:20px;">';?> 
		</td>
	</tr>
	<tr>	
		<td style="text-align: left; padding: 8px;" ><b> $ <?php echo $row['Price'] ?></b> </td><!--.'style=" padding-left: -200px;"'-->
		<td style="text-align: left; padding: 8px;" ><b style="margin-left:-110px;"> Model : <?php echo $row['Model'] ?> </b></td>
	</tr>	
	<tr>
		<td style="text-align: left; padding: 8px;"><b> BrandName : <?php echo $row['BrandName'] ?> </b></td>
		<td style="text-align: left; padding: 8px;"><b style="margin-left: -110px;"> Car_ID : <?php echo $row['Car_ID'] ?> </b></td>
	</tr>
	<tr>
		<td style="text-align: left; padding: 8px;"><b> Desc : <?php echo $row['Description'] ?> </b></td>
	</tr>
	<tr>
		<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<center><button type="button"  style="background:darkred;  padding: 10px 20px;">
		<a style="text-decoration:none; color:white;"  href="delete-process.php?Car_ID=<?php echo $row["Car_ID"]; ?>"> Delete</a>
	</button>
		</center>
	</td>
	</tr>
</table>
	<?php


}

/*
$sql = "DELETE FROM car WHERE id=1";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}


$sql = "SELECT id, price, brand FROM car Where id=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "" . $row["id"]. " " . $row["brand"]. "<br>";
  }
} else {
  echo "0 re
  sults";
}


$conn->close();
*/
?>


</body>
</html>

