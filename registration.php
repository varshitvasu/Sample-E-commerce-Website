<?php 
include('config.php');

$username = $_POST['username'];
$emailID = $_POST['emailid'];
$password = $_POST['password'];

$query = "SELECT * FROM users_db WHERE username = '$username' AND email_id = '$emailID'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    $insertQuery = "INSERT INTO users_db (username, email_id, password) VALUES ('$username', '$emailID', '$password')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        echo "1";
    } else {
        echo "2";
    }
} else {
    echo "2";
}

mysqli_close($conn);


?>