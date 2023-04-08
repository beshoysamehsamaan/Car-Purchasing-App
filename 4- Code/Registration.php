<?php 
    // include our connect script 
    require_once("connect.php"); 
	$db =new connect();
    $conn=$db->connection();
    
    // check to see if there is a user already logged in, if so redirect them 
    session_start(); 
	
	function check_string($my_string){
				$regex = preg_match('/[^a-zA-Z0-9_-]/', $my_string);
				return $regex ;
				}
	function check_phone($my_string){
				$regex = is_numeric($my_string);
				return $regex ;
				}
	function check_pass($my_pass){
				$len = strlen($my_pass);
				return $len ;
				}

		if (isset($_POST['registerBtn'])){  
			
			if(check_string($_POST['firstN'])){
				 $firstname = "";
			}else{
				$firstname = $_POST['firstN'];
			}
			if(check_string($_POST['lastN'])){
				 $lastname = "";
			}else{
				$lastname = $_POST['lastN'];
			} 
			$email = $_POST['email']; 
			if(check_pass($_POST['password']) < 8 ){
				 $passwd = "";
			}else{
				$passwd = $_POST['password'];
			} 
			if(!check_phone($_POST['phone'])){
				 $phone = "";
			}else{
				$phone = $_POST['phone'];
			}
			
			$address = $_POST['address'];
			
			if ($firstname != ""&& $lastname != "" && $passwd != "" && $phone != "" ){
				$sql="insert into user (FirstName,LastName,Email,Password,Phone,Address) values('".$firstname."','".$lastname."','".$email."','".$passwd."','".$phone."','".$address."')";
				$query = mysqli_query($conn, $sql);
				header("Location: User_home_page.php");
                exit();
			}
			else{
				$message = "You Entered invalid Data";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			
			
			
		}

?>
<!--<!DOCTYPE html>-->
<html>

<head>
     <meta charset="utf-8-8">
     <title>Register</title>	 
     <link rel="stylesheet" href="style.css">
</head>

<body>	
     <div class="center">
	    <center><h2 >Ready to Buy Your Car</h2></center>
		<form method="post">

			<div class="txt_field">
				<input type="text" name ="firstN"   placeholder = "FirstName" required/>
				<span></span>
		    </div>
			
			<div class="txt_field">
				<input type="text" name ="lastN"   placeholder = "LastName" required/>
				<span></span>
		    </div>

		
			<div class="txt_field">
				<input type="email" name = "email"  placeholder = "Write your Mail" required/>
				<span></span>
			</div>
		
		   <div class="txt_field">
			<input type="text" name ="phone"   placeholder = "Phone Number" required/>
			<span></span>
		   </div>
		   
		   <div class="txt_field">
				<input type="text" name ="address"   placeholder = "Address" required/>
				<span></span>
		    </div>

	
		   <div class="txt_field">
		   <input name="password" type="password" placeholder = "Password" required/>
		   <span></span>
		   </div>
		   
		   
		   
		   <input type="submit" name = "registerBtn" value="Register">
		   
		   <div class="login_link">
		   Have an account? <a href="login.php">login here</a>
		    </div>
		
		
		</form>
	 </div>

</body>
</html>

