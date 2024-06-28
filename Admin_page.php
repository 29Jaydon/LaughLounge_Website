<?php
$conn = require __DIR__ . "/db_conn.php";
$sql_usercomplaint = mysqli_query($conn,"SELECT * FROM reported_users")or die('query_1 failed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="GobalStyleSheet.css">
    <title>Admin Page</title>
</head>
<body>
    <h1> Reported Users</h1><hr>
    <p>If a user has posted something that another user found offensive their username will appear below.</p>
    <p>Please review the compliant and determine if further action is needed.</p>
    <p>If further action is needed please log into the datbase and delete the post or user</p><hr><br>

    <div class='Timeline'>
            <table border="2" >
                <thead>
                    <th>Username</th>
                    <th>Post</th>
                </thead>
                <tbody>
                    <?php
                        if(mysqli_num_rows($sql_usercomplaint) > 0){
                        // output data of each row
                        while($fetch_Info = mysqli_fetch_assoc($sql_usercomplaint)) {
                    ?>
                    <tr>
                        <td><?php echo $fetch_Info['user_name']; ?></td>
                        <td><?php echo $fetch_Info['complaint']; ?></td>
                    </tr>
                    <?php
                        }
                    }
                    if(mysqli_num_rows($sql_usercomplaint) == 0){
                    ?>
                    <tr>
                        <td><?php echo "There are no reported users." ?></td>
                        <td><?php echo "There are no reported jokes." ?></td>
                    </tr>
                    <?php
                        } 
                    ?>
                </tbody>
            </table>
        </div>

</body>
</html>