<html>
<head>
<link rel="stylesheet" 
type="text/css" 
href="AddCar.css" />   
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  </head>
<body>
  <form method="post" enctype="multipart/form-data"><!--action="/action_page.php"-->
  	<div id="display_image" name="img" >


<label class="btn .btn photofile">
<i class="fa fa-image"></i> Upload Image<input type="file" style="display: none;" accept="image/png, image/jpg, image/jpeg" name="Photo" id="image_input"><!--" name="imagefilebtn"-->
</label>
<!---<input type="file" value="Upload image" class="photofile custom-file-input"  accept="image/png, image/jpg, image/jpeg" name="photo" id="image_input">-->
  <!--  <label class="custom-file-input" for="Upload" >
</label>

<input id="Upload" type="file" multiple="multiple" name="_photos" accept="image/*" style="visibility: hidden">-->
 
 </div>
  <br><br> <br><br>
 
  <b><label class="menu"for="cars">Brand</label></b>
    <b><label class="menu"for="cars">Model</label></b>
    <b><label class="menu"for="cars">Price</label></b>
	<b><label class="menu"for="cars">Description</label></b>

   <br><br>
  <select class="menu" name="Brand" id="Brand">
    <option value="Audi">Audi</option>
    <option value="Saab">Saab</option>
    <option value="Opel">Opel</option>
    <option value="Volvo">Volvo</option>
  </select>
   <select class="menu" name="Model" id="Model">
    <option value="Black">Black</option>
    <option value="Red">Red</option>
    <option value="Gray">Gray</option>
  </select>
  <input class="menu price" type="number" name="price" placeholder="Enter car price" style="height:25px;"  required>
    <input class="menu Description" type="text" name="Description" placeholder="Enter car Description" style="height:25px;"  required>

  
  <br><br><br><br>
  <input class="AddBtn" type="submit" name="submit" value="Add">
</form>
<script src="AddCar.js"></script>
</body>
</html>

<?php
session_start();
//class Add{
require_once 'connect.php';
$db =new connect();
$conn=$db->connection();
//public function AddUser(){
  //if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['number']) && !isset($_SESSION['relatedfaculty']) ){ 
   // echo "1111111111";
    if (isset($_POST['submit'])){//&&!empty($_POST['submit']))
      //echo "2222222222222";
     // $photo=$_POST['Photo'];
    $Photo=addslashes(file_get_contents($_FILES['Photo']['tmp_name']));
      $BrandName=$_POST['Brand'];
      $Model=$_POST['Model'];
      $Price=$_POST['price'];
	  $Description=$_POST['Description'];

if($Price<1){
  echo"<script> alert('Enter Car price')</script>";
}
else{ 
  $Add="insert into car (price,BrandName,Model,Photo,Description) VALUES('".$Price."','".$BrandName."','".$Model."','".$Photo."','".$Description."')";

  $query=mysqli_query($conn,$Add);
    
    if ($query==TRUE){
    	echo"<script> alert('car added successfully')</script>";
}
  }   
}
//}
?>
