<html>
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<style>
	body {
  background-image: url("homea.jpg");
	background-size: cover;
	background-repeat: no-repeat;
	height: 100vh;
	overflow:hidden;
	background-color:red;
}

.container {
  margin-top: 20px;
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
	<script>
      function validateForm() {
        var fileInput = document.getElementById("image_input");
        var errorMessage = document.getElementById("image_error");

        if (fileInput.files.length === 0) {
          errorMessage.textContent = "Please upload an image.";
          return false;
        }

        return true;
      }
    </script>
  </head>
  <body>
    <form method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
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
                  <span id="image_error" style="color: red;" ></span>
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
                    <option value="Toyota ">Crola</option>
                    <option value="Ford ">Yares</option>
                    <option value="Honda ">focus</option>
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
   
   function check_price($my_string){
				if ($my_string > 0){
					$regex = is_numeric($my_string);
					return $regex ;
				}else
					return 0 ;
				}
    if (isset($_POST['submit'])){
	  $Photo=addslashes(file_get_contents($_FILES['Photo']['tmp_name']));
      $BrandName=$_POST['Brand'];
      $Model=$_POST['Model'];
	  		if(!check_price($_POST['price'])){
				 $Price = "";
			}else{
				$Price=$_POST['price'];
			}
	  $Description=$_POST['Description'];

		if($Price == "" || $Photo == NULL ){
			$message = "You Entered invalid Data or Missed";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}else{ 
			$Add="insert into car (price,BrandName,Model,Photo,Description) VALUES('".$Price."','".$BrandName."','".$Model."','".$Photo."','".$Description."')";
			$query=mysqli_query($conn,$Add);
			if ($query==TRUE){
				echo"<script> alert('car added successfully')</script>";
				}
		
  }   
}
?>
