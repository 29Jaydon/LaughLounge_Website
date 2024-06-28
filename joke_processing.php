<?php

$user_name = $_POST["Username"];
$joke = $_POST["joke"];

// Connection to the database connection file
$conn = require __DIR__ . "/db_conn.php";

// Insert into the data into the database with a prepared statment 
$sql_1 = "INSERT INTO user_jokes(user_name, joke_text) VALUES(?,?)";
		
$stmt_1 = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt_1, $sql_1)){
	die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt_1, "ss", $user_name, $joke);
mysqli_stmt_execute($stmt_1);

header("Location: HomePage.php");

?>