<?php
//session_start();
class connect{
PROTECTED $username='root';
PROTECTED $password='';
PROTECTED $servername='localhost';
PROTECTED $database='car-purchasing-app';

public function connection (){
	$connect_db=new mysqli($this->servername,$this->username,$this->password,$this->database);
	if (mysqli_connect_errno ()){
		printf("connection failed :%s",mysqli_connect_error ());
		exit ();

	}
	return $connect_db;
}
	/*public function __construct()
	{
		
		$username='root';
 $password='';
 $servername='localhost';
	$conn=mysqli_connect($servername,$username,$password);

	if($conn){
	$conn_db=mysqli_select_db($conn,"mydb");
	echo "you are connected    ";
}
else{
	echo "cant not connect   ";
}
	}
 

public function return_connection(){
	return $conn;
}*/

/*if ( empty($_SESSION['name']) && empty($_SESSION['relation'])){

if (isset($_POST['Add'])) {
	
$name=$_POST['name'];
$relation=$_POST['relation'];

$insert="INSERT INTO `users` (name,relation) VALUES ( '$name','$relation')";
if($conn->query($insert)==TRUE){
		echo "data inSerted successfully";
	}
	else{
		echo "cant insert data";
	}
}

else if(isset($_POST['Delete'])){

	$id=$_POST['id'];
$delete="DELETE FROM `users` WHERE id=$id ";
if($conn->query($delete)==TRUE){
		echo "data deleted successfully";
	}
	else{
		echo "cant delete data";
	}
}
else if(isset($_POST['Update'])){
	$newID=$_POST['newID'];
	$id=$_POST['id'];
	$update="UPDATE `users` SET id=$newID WHERE id=$id ";
	if($conn->query($update)==TRUE){
		echo "data updated successfully";
	}
	else{
		echo "cant update data";
	}
}
else if(isset($_POST['List'])){
	/*while ($row = mysql_fetch_assoc($res)) {
    echo $row['Database'] . "\n";
}*/
/*$arr=array('sql' >" SELECT * FROM `users`");
//$arr=" SELECT * FROM `users`";
foreach ($arr as $i) {
	//echo "$i";
	print_r($i);
}*/
/*$query = "SELECT * FROM `users`";
$row=array();
        $result = $conn->query($query);
        while ($row = mysqli_fetch_array($result)) {
            echo $row;
        }*/
	//mysql> show `users`;
	/*$arr=array();
	$list="SELECT * FROM `users`";
	$var=mysqli_query($conn,$list);
	while($var2=mysqli_fetch_array($var)){
	$arr[]=$var2;
}
	return $arr;*/

	/*$id=$_POST['id'];
	$query = " SELECT * FROM `users` WHERE id=$id ";
	$result=mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	echo $row;*/
	/*$id=$_POST['id'];
	$result=mysqli_query($conn," SELECT * FROM `users` WHERE id=$id ");
	while ($row = mysqli_fetch_array($result,' MYSQL_ASSOC')) {
    printf("relation: %s  Name: %s", $row["relation"], $row["name"]);
}

mysqli_free_result($result);*/
// Read records
/*$sql= "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
    
// Put them in array
for($i = 0; $array[$i] = mysqli_fetch_assoc($result); $i++) ;
    
// Delete last empty one
array_pop($array);
for($j=0;$array<3;$j++){
	echo $array[$j];
}*/
//dah ele rann
/*
$query = "SELECT * FROM users";

if ($result = mysqli_query($conn, $query)) {

 
    while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s (%s)\n", $row["name"], $row["relation"]);
    }



 mysqli_free_result($result);
 */

/*}
}
}*/
}
?>

<html>
<head>
	
</head>
<body>
	<!--<form method="post">
		<table>

			<p> Name</p>
			<input type="Text" name="name" >
						<p> Relation</p>
			<input type="Text" name="relation" >
			 <input type="submit" name="Add" value="Add">
			  <input type="submit" name="Delete" value="Delete">
			  <input type="submit" name="Update" value="Update">
			 <input type="number" name="id">
			 <p> New ID </p>
			 <input type="Text" name="newID" >
			 <input type="submit" name="List" value="List">
		</table>
	</form>-->
</body>
</html>