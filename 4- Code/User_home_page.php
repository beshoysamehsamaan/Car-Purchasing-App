<!DOCTYPE html>
<html>
<head>
<title> User home page </title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="pop_up_message.css">
<style>
body{
	background-image: url("homeu.jpg");
	background-size: cover;
	background-repeat: no-repeat;
	height: 100vh;
	overflow:hidden;
	background-color:red;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px 10px;
  margin-top: 8px;
  font-size: 17px;
  height: 15px;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}


@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  } 
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

<div style="float:right; margin-top:20px; margin-left:20px;" class="topnav">
  <div class="search-container">
  <form method="post" action="">
    <label  for="searchTerm"></label>
    <input type="text" name="searchTerm">
    <button type="submit" name="search">Search</button>
</form>
  </div>
  
</div>
<br><br><br><br><br><br>




<?php

if( empty(session_id()) && !headers_sent()){
	session_start();
}

require_once 'connect.php';
$db = new connect();
$conn = $db->connection();
if (isset($_POST['search'])) { // Check if form is submitted with search term
    $searchTerm = $_POST['searchTerm']; // Get search term from form
    $query = "SELECT * FROM car WHERE Status = 0 AND Model LIKE '%$searchTerm%' OR BrandName LIKE '%$searchTerm%' OR Price LIKE '%$searchTerm%'";
} else {
    $query = "SELECT * FROM car WHERE Status = 0";
}

if (isset($_GET['varLoginName'])){
$uid=$_GET['varLoginName'];
}

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
		<td type="text" name="car_id"style="text-align: left; padding: 8px;"><b style="margin-left: -110px;"> Car_ID :
		<?php echo $row['Car_ID'] ;
		$varid=$row['Car_ID'];
		?> 
		</b></td>
	</tr>
	<tr>
		<td style="text-align: left; padding: 8px;"><b> Desc : <?php echo $row['Description'] ?> </b></td>
	</tr>
	<tr>
		<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<a href="reserve_process.php?varLoginName=<?php echo $uid?>& varname=<?php echo $varid?>">
		<button type="submit" value='Post' style="background:#4169E1;  padding: 10px 20px;">Reserve</button>
		</a>
		
	</td>
	</tr>
</table>

	<?php

}
/*?id=<?php echo $row["Car_ID"]; ?>
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

