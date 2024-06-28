<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Upload_img.css">
    <title>Image Upload Page</title>
</head>
<body>

    <h1>😂Upload Page🤣</h1>
    <h2>You can upload an image using the buttons below.</h2>
    <h2>The images that you upload will appear both on your Homepage as well as the Explore page, 
        where everyone can view them.</h2>
    <h2>Upon clicking the upload button you will be redirected to the home page <h2><hr>

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

    <?php if (isset($_GET['err'])): ?>
        <p>
            <?php echo $_GET['err']; ?>
        </p>
    <?php endif ?>

    <div class ='FormQuestions'>
        <form action="Process_img.php" method="post" enctype="multipart/form-data">
            <label for="Uname">Username</label>
            <input type="text" id="Uname" name="Uname">
            <input  type="file" name="uploaded_pic">
            <input  type="submit" name="submit" value="Upload">
        </form>
    </div>

</body>
</html>