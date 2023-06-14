<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jbn_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//INSERT DATA

$customer_name = $_POST['name1'];
$customer_email = $_POST['email1'];
$customer_phone = $_POST['contact1'];
$customer_message = $_POST['message1'];

$sql = "INSERT INTO jbn_contact_details (customer_name, customer_email, customer_phone, customer_message) 
VALUES ('$customer_name', '$customer_email', '$customer_phone', '$customer_message')";


if (mysqli_query($conn, $sql)){
    echo 1;
} else {
    echo 0;
}

//DISCONNECT
mysqli_close($conn);








// if (!$conn){
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     echo "connected successfully";
// }

// // CREATE TABLE
// $sql = "CREATE TABLE jbn_ContactForm (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     customer_name VARCHAR(256) NOT NULL,
//     customer_email VARCHAR(50) NOT NULL,
//     customer_phone BIGINT NOT NULL,
//     customer_message TEXT,
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     status INT(11) DEFAULT 1 
// )";

// if (mysqli_query($conn, $sql)) {
//     echo "Table created successfully";
// } else {
//     echo "Error creating table: ".mysqli_error($conn);
// }

?>