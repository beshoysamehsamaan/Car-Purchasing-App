<?php 
    // include our connect script 
    require_once("connect.php"); 
	$db =new connect();
    $conn=$db->connection();
    
    // check to see if there is a user already logged in, if so redirect them 
    session_start(); 

		if (isset($_POST['registerBtn'])){ 
			$firstname = $_POST['firstN']; 
			$lastname = $_POST['lastN']; 
			$email = $_POST['email']; 
			$passwd = $_POST['password'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			
			$sql="insert into user (FirstName,LastName,Email,Password,Phone,Address) values('".$firstname."','".$lastname."','".$email."','".$passwd."','".$phone."','".$address."')";
			$query = mysqli_query($conn, $sql);
			 header("Location: User_home_page.php");
                exit();
			
	
			// verify all the required form data was entered
			if ($email != "" && $passwd != ""){
			// make sure the password meets the min strength requirements
			if ( strlen($passwd) >= 5 && strpbrk($passwd, "!#$.,:;()") != false ){
				// next code block
				
			}
			else
				$error_msg = 'Your password is not strong enough. Please use another.';
		
	}
	else
		$error_msg = 'Please fill out all required fields.';
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

