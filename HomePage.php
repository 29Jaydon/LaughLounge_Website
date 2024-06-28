<?php

 include "db_conn.php";

session_start();

if(isset($_SESSION["user_id"])){

// Connection to the database connection file
    $conn = require __DIR__ . "/db_conn.php";

	$sql ="SELECT * FROM user_info WHERE user_id = {$_SESSION["user_id"]} ";
					
	$result = $conn->query($sql);
	$user = $result->fetch_assoc();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="HomePage.css" rel="stylesheet" >
    <title>Laugh Lounge</title>
</head>
<body>
<h1>😂Home Page🤣</h1>

<?php if (isset($user)):?>
    <h4>Welcome back <?= htmlspecialchars($user["user_name"])?> 👋</h4>
<?php endif; ?>

<h2> Your Posts </h2>

    <nav class='Sidebar'>
        <img id='SidebarLogo' src="./Images/LL_logo_vertical.png" alt='logo for website'></img>
        <h3>Laugh Lounge</h3>

        <a href="HomePage.php">
            <button class='Button'>
            <span>Home</span>
            </button>
        </a>

        <a href="ExplorePage.html">
            <button class='Button'>
                <span>Explore</span>
            </button>
        </a>

        <a href="view_meme.html">
            <button class='Button'>
            <span>Meme Center</span>
            </button>
        </a>

        <a href="joke_page.html">
            <button class='Button'>
            <span>Joke Center</span>
            </button>
        </a>

        <a href="Upload_img.php">
            <button class='Button'>
            <span>Upload Image</span>
            </button>
        </a>

        <a href="Report_user.html">
            <button class='Button'>
            <span>Report User</span>
            </button>
        </a>

        <a href="AuthenticationPage.html">
            <button class='Button'>
            <span>Logout</span>
            </button>
        </a>

    </nav>

<h4>Your Images</h4>
    <div class='Timeline'>
        <?php 
            $username = $user["user_name"];
            $sql_1 = "SELECT 	image_url FROM user_images where user_name= '$username'";
            $result = mysqli_query($conn, $sql_1);

            if (mysqli_num_rows($result) > 0){
                while ($images = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="album">
                        <img src="Uploaded_Images/<?=$images['image_url']?>">
                    </div>

                <?php
                }
            }?>
    </div>

<h4>Your Jokes</h4>
    <div class ='Timeline_Jokes'>
        <?php 
            $username = $user["user_name"];
            $sql_2 = "SELECT joke_text FROM user_jokes where user_name= '$username'";
            $result = mysqli_query($conn, $sql_2);

            if (mysqli_num_rows($result) > 0){
                while ($jokes = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="album">
                        <p><?=$jokes['joke_text']?></p>
                    </div>

                <?php
                }
        }?>
    </div>
    
</body>
</html>