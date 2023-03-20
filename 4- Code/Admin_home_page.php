<!DOCTYPE html>
<html>
<head>
<title> Admin home page </title>
</head>


<body>
<a href="Add_car.html">
<button type="button" style="float:right; margin-top:20px; margin-left:20px;" >Add Car</button>
</a>
<a href="Add_admin">
<button type="button" style="float:right; margin-top:20px; margin-left:20px;">Update car</button>
</a>
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
	<tr>
		<table style="display: inline-block">
	<tr>
		<td>
			<?php echo '<img src="data:image;base64, '.base64_encode($row ['image']).'" alt = "image" style="width:420px; height:300px; padding:20px;">';?> 
		</td>
	</tr>
	<tr>	
		<td ><b> <?php echo $row['price'] ?></b> </td><!--.'style=" padding-left: -200px;"'-->
		<td><b style="margin-left:-240px;"> <?php echo $row['color'] ?> </b></td>
	</tr>	
	<tr>
		<td><b> <?php echo $row['brand'] ?> </b></td>
		<td><b style="margin-left: -240px;"> <?php echo $row['id'] ?> </b></td>
	</tr>
	<tr>
		<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<button type="button"  style="background:darkred;  padding: 4px 7px;">
		<a style="text-decoration:none; color:white;"  href="delete-process.php?id=<?php echo $row["id"]; ?>"> Delete</a>
	</button></td>
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

