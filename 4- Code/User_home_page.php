<!DOCTYPE html>
<html>
<head>
 <script>
    function showAlert() {
      var pay = prompt("Please your depost from 1000 to 2000");
      if (pay != null && pay >= 1000 && pay <= 2000 ) {
        alert("Thank you " + pay + ", your reservation has been received!");
      }
	  else {
        // Do nothing if the user cancels the alert dialog
        return false;
      }
    }
  </script>
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
    if (!empty($searchTerm)) {
        $query = "SELECT * FROM car WHERE Status = 0 AND (Model LIKE '%$searchTerm%' OR BrandName LIKE '%$searchTerm%' OR Price LIKE '%$searchTerm%')";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 0) {
            echo  '<div class="pop-up-message" style="background-color: #f44336;">please try another brand or price</div>';
        }
    } else {
        echo '<div class="pop-up-message" style="background-color: #f44336;">please try another brand or price</div>';
        $query = "SELECT * FROM car WHERE Status = 0";
    }
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
		<button type="submit" value='Post' style="background:#4169E1;  padding: 10px 20px;" onclick="showAlert()" >Reserve</button>
		</a>
		
	</td>
	</tr>
</table>

	<?php

}

?>


</body>
</html>

