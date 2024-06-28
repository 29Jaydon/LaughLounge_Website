<?php
	if($_SERVER["REQUEST_METHOD"]=== "POST"){

	// Connection to the database connection file
	$conn = require __DIR__ . "/db_conn.php";

	// Retrieving users information
	$sql = sprintf("SELECT * FROM  user_info WHERE email = '%s'",
					$conn-> real_escape_string($_POST["Email"]));
					
	$result = $conn->query($sql);
	$user = $result->fetch_assoc();
	
	// Checking Password and creating a session variable 
	if($user){
		if(password_verify($_POST["Password"],$user["password"])){
			session_start();
			$_SESSION["user_id"] = $user["user_id"];
			header("Location: HomePage.php");
			exit;
		}
	}

	$AdminName="ADMIN101@gmail.com";
	$AdminPass="ADMIN@101";
	if($_POST["Password"] == $AdminPass && $_POST["Email"] == $AdminName){
		header("Location: Admin_page.php");
		exit;
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="RegStyleSheet.css" rel="stylesheet" >
    <title>Login Page</title>
</head>
<body>
    
    <header>
        <img id='SidebarLogo' src="./Images/LL_logo_vertical.png" alt='logo for website'></img>
        <P>Please Fill in your login details.</P>
    </header>

	<div class="FormQuestions">
		<form method="post">
			<label for="Email">Email Address</label>
			<input type="text" id="Email" name="Email">
			
			<label for="Password">Password</label>
			<input type="text" id="Password" name="Password"><br>
			
			<button>Login</button>
		</form>
		<p>If you don't have an account yet, you can <a href="RegistrationPage.html">create one here</a>.</p>
	</div>
</body>
</html>