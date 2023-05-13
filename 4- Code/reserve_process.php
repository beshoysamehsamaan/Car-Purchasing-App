<?php
if (empty(session_id()) && !headers_sent()) {
  session_start();
}

require_once 'connect.php';
$db = new connect();
$conn = $db->connection();

if (isset($_GET['varname'])) {
  $carid = $_GET['varname'];
  $userid = $_GET['varLoginName'];

  if (isset($_POST['reserve'])) {
    $confirmation = "<script>return showAlert();</script>";

    if ($confirmation) {
      $sql = "UPDATE car SET Status = 1, User_Res_ID = '$userid' WHERE Car_ID = '$carid'";

      if (mysqli_query($conn, $sql)) {
        echo "Car is reserved successfully.";
      } else {
        echo "The reservation was canceled successfully.";
      }
    } else {
	  echo"<script> alert('The reservation was canceled')</script>";}
  }else {
	  echo"<script> alert('The reservation was canceled')</script>";
    }
} else {
  echo "ERROR: Car ID not found.";
}
?>