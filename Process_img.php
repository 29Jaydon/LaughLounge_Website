<?php

if (isset($_POST['submit']) && isset($_FILES['uploaded_pic']) ){

    include "db_conn.php";

    echo "<pre>";
    print_r($_FILES['uploaded_pic']);
    echo "</pre>";

    $img_name = $_FILES['uploaded_pic']['name'];
    $img_size = $_FILES['uploaded_pic']['size'];
    $tmp_name = $_FILES['uploaded_pic']['tmp_name'];
    $error = $_FILES['uploaded_pic']['error'];
    $full_path = $_FILES['uploaded_pic']['full_path'];
    $type = $_FILES['uploaded_pic']['type'];

    $Uname = $_POST["Uname"];

    if ($error === 0){
        if($img_size > 1000000){
            $error_msg1 = "The file that you have uploaded is too large. Please upload a smaller file";
            header("Location: Upload_img.php?err=$error_msg1");
        }
        else{
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_ex = array("jpg","jpeg", "png");

            if (in_array($img_ex_lc, $allowed_ex)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                $uploaded_img_path = 'Uploaded_Images/'.$new_img_name;
                move_uploaded_file($tmp_name, $uploaded_img_path);

                // Insert into Database
                $sql_1 = "INSERT INTO user_images(image_url, user_name) VALUES('$new_img_name', '$Uname')";
                $sql_2 = "INSERT INTO images(image_url) VALUES('$new_img_name')";
                mysqli_query($conn, $sql_1);
                mysqli_query($conn, $sql_2);
                header("Location: HomePage.php");
            }
            else{
                $error_msg3 = "This file type is not supported. Please upload either a jpg, jpeg, or a png.";
                header("Location: Upload_img.php?err=$error_msg3");
            }
        }
    }
    else{
        $error_msg2 = "Please select a file. If a file was selected, please contact Admin: Jaydon Perumal";
        header("Location: Upload_img.php?err=$error_msg2");
    }
}
else{
    header("Location: HomePage.php");
}
 
?>