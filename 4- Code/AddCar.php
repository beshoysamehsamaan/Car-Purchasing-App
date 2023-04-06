<html>
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<style>
	body {
  background-color: #f5f5f5;
}

.container {
  margin-top: 50px;
}


.card-header {
  background-color: #3d3d3d;
  color: white;
}

.card-body {
  background-color: #fff;
}

.menu {
  font-weight: bold;
  margin-right: 10px;
}

.photofile {
  background-color: #3d3d3d;
  color: white;
  margin-top: 20px;
}

.photofile:hover {
  background-color: #424242;
}
.AddBtn, .cancel-btn {
  background-color: #555;
  color: white;
  border: none;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.AddBtn:hover, .cancel-btn:hover {
  background-color: #777;
}


 

	</style>
  </head>
  <body>
    <form method="post" enctype="multipart/form-data">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header text-center">
                <h3>Add Car</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="image_input" class="btn .btn-block photofile">
                    <i class="fa fa-image"></i> Upload Image
                  </label>
                  <input type="file" style="display: none;" accept="image/png, image/jpg, image/jpeg" name="Photo" id="image_input">
                </div>
                <div class="form-group">
                  <label for="Brand" class="menu">Brand:</label>
                  <select class="form-control" name="Brand" id="Brand">
                    <option value="Toyota">Toyota</option>
                    <option value="Ford">Ford</option>
                    <option value="Honda">Honda</option>
                    <option value="Volvo">Volvo</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Model" class="menu">Model:</label>
                  <select class="form-control" name="Model" id="Model">
                    <option value="Toyota ">Toyota </option>
                    <option value="Ford ">Ford </option>
                    <option value="Honda ">Honda </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="price" class="menu">Price:</label>
                  <input class="form-control" type="number" name="price" placeholder="Enter car price" required>
                </div>
                <div class="form-group">
                  <label for="Description" class="menu">Description:</label>
                  <textarea class="form-control" name="Description" placeholder="Enter car description" required></textarea>
                </div>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary AddBtn" name="submit">Add</button>
				  <button type="button" class="btn btn-secondary cancel-btn" onclick="window.location.href='Admin_home_page.php'">Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
?>
