<?php
$conn = require __DIR__ . "/db_conn.php";
$sql_userjoke = mysqli_query($conn,"SELECT * FROM user_jokes")or die('query_1 failed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jokes</title>
    <link rel="stylesheet" href="GobalStyleSheet.css">
</head>
<body>
    <h1>😂 Explore Jokes 🤣</h1>
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

    <div class='Timeline'>
        <table border="2" >
            <thead>
                <th>Username</th>
                <th>Post</th>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($sql_userjoke) > 0){
                    // output data of each row
                    while($fetch_Info = mysqli_fetch_assoc($sql_userjoke)) {
                ?>
                <tr>
                    <td><?php echo $fetch_Info['user_name']; ?></td>
                    <td><?php echo $fetch_Info['joke_text']; ?></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>