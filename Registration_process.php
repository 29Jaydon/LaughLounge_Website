<?php
// Attributes of the users table
$Fname = $_POST["Fname"];
$Lname = $_POST["Lname"];
$Uname = $_POST["Uname"];
$PhoneNum = $_POST["PhoneNum"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];


// creating hash value for the password
$Password_hash= password_hash($Password, PASSWORD_DEFAULT);

// Connection to the database connection file
$conn = require __DIR__ . "/db_conn.php";

// Creating the prepared statment for the attributes of the user_info table
$sql_1 = "INSERT INTO user_info (first_name, last_name, phone_number, email, password, user_name)
		VALUES(?,?,?,?,?,?)";
		
$stmt_1 = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt_1, $sql_1)){
	die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt_1, "ssssss", $Fname, $Lname, $PhoneNum, $Email, $Password_hash, $Uname);

mysqli_stmt_execute($stmt_1);

header("Location: success_msg.html");
?>