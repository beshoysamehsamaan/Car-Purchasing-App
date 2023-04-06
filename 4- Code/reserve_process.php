<?php
	if( empty(session_id()) && !headers_sent()){
	session_start();
}

require_once 'connect.php';
$db = new connect();
$conn = $db->connection();
if (isset($_GET['varname'])){
$carid=$_GET['varname'];
echo "welcome <b>$carid</b>";

$sql = "UPDATE car SET Status = 1 WHERE Car_ID = '".$carid."' "; 

if (mysqli_query($conn, $sql))
{ 
    echo "Car is reserved Successfully."; 
} 
else
{ 
    echo "ERROR: Could not able to proceed";
} } 
else {
    echo "ERROR: Car ID not found.";
}
?>



