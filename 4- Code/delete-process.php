<?php

if( empty(session_id()) && !headers_sent()){
	session_start();
}

require_once 'connect.php';
$db = new connect();
$conn = $db->connection();


$sql = "DELETE FROM car WHERE Car_ID='" . $_GET["Car_ID"] . "'";
if (mysqli_query($conn, $sql)) {
    echo 'Car is deleted successfully';

} else {
    echo 'Error deleting car' . mysqli_error($conn);
}
mysqli_close($conn);

?>