<?php
    session_start();
    require_once 'connect.php';
    $db =new connect();
    $conn=$db->connection();
    


    //check if user came from HTTP Post 
    if(isset($_POST['loginbtn'])){	
        $uname=$_POST['email'];
        $password=$_POST['pass'];

        $sqlU="select * from user where Email='".$uname."'AND Password ='".$password."' limit 1 ";
		$sqlA="select * from admin where Email='".$uname."'AND Password ='".$password."' limit 1 ";
		

        $queryU = mysqli_query($conn, $sqlU);
		$queryA = mysqli_query($conn, $sqlA);
        
        if(mysqli_num_rows($queryU)==1){
			$row = mysqli_fetch_array($queryU);
			$uid=$row['User_ID'];
          //  echo " You Have Successfully Logged in as User";
			header("Location: User_home_page.php?varLoginName=".$uid);
            exit();
        }
		else if(mysqli_num_rows($queryA)==1){
		//	echo " You Have Successfully Logged in as Admin";
			header("Location: Admin_home_page.php");
            exit();
		}
        else{
			$error_msg = "Invalid email or password";
            //echo " Faild to Login";
          //  exit();
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8-8">
        <title>Login</title>	 
        <link rel="stylesheet" href="style.css"/>
		
    </head>

    <body >
        <div class="center">
				<center><h2 >Ready to Buy Your Car</h2></center>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method = "POST">
                
                
                <div class="txt_field">
                <input type="text" name = "email" placeholder = "Email">
                <span></span>
                </div>
                    
                <div class="txt_field">
                <input type="password" name="pass" placeholder = "Password">
                <span></span>
                </div>
                
                <input type="submit" name = "loginbtn" value="Login">
                
                <div class="signup_link">
                Not a member? <a href="Registration.php">Signup</a>
                    </div>
                
                   <!-- Display error message if there is one -->
        <?php if (!empty($error_msg)) { ?>
            <div style="color: red"><?php echo $error_msg ?></div>
        <?php } ?>
                </form>
            </div>
            <div>
    </div>
</body>
</html>