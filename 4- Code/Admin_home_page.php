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

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 10px 10px;
  margin-top: 12px;
  font-size: 17px;
  height: 15px;
}

.topnav .search-container button {
  float: right;
  padding: 8px 10px;
  margin-top: 13px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
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
.pop-up-message {
  position: fixed;
  z-index: 1;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f44336;
  color: white;
  font-size: 16px;
  font-weight: bold;
  padding: 20px;
  border-radius: 5px;
  animation: fade-out 3s forwards;
}

@keyframes fade-out {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    display: none;
  }
}
</style>
</head>


<body>

</div>
<a href="login.php">
<button type="button" class="button" style="float:right; margin-top:20px; margin-left:20px;" >Logout</button>
</a>
<a href="AddCar.php">
<button type="button" class="button" style="float:right; margin-top:20px; margin-left:20px;" >Add Car</button>
</a>

<div style="float:right; margin-top:15px; margin-left:20px;" class="topnav">
  <div class="search-container">
  <form method="post" action="">
    <label  for="searchTerm"></label>
    <input type="text" name="searchTerm">
    <button type="submit" name="search">Search</button>
</form>
  </div>
  
</div>
  


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

if (isset($_POST['search'])) { // Check if form is submitted with search term
    $searchTerm = $_POST['searchTerm']; // Get search term from form
    if (!empty($searchTerm)) {
        $query = "SELECT * FROM car WHERE (Model LIKE '%$searchTerm%' OR BrandName LIKE '%$searchTerm%' OR Price LIKE '%$searchTerm%')";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 0) {
            echo  '<div class="pop-up-message" style="background-color: #f44336;">please try another brand or price</div>';
        }
    } else {
        echo '<div class="pop-up-message" style="background-color: #f44336;">please try another brand or price</div>';
        $query = "SELECT * FROM car";
}} else {
    $query = "SELECT * FROM car";
}$query_run = mysqli_query($conn,$query);
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

