<?php 
    include('config.php');
    $emailID = mysqli_real_escape_string($conn, $_POST['emailid1']);
    $password = mysqli_real_escape_string($conn, $_POST['password1']);
    $sql = "SELECT * FROM users_db WHERE email_id = '$emailID' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['email_id'] == $emailID && $row['password'] == $password && $row['is_admin'] == 1) {                
                echo 1;
            } else if ($row['email_id'] == $emailID && $row['password'] == $password && $row['is_admin'] == 0) {
                echo 2;
            } else {
                echo 0;
            }
            $_SESSION['email_id'] = $row['email_id'];
            $_SESSION['user_id'] = $row['id'];
        }
    } else {
        echo 0;
    }
    mysqli_close($conn);
?>


<?php 
//  COMMENTS

    // $sql = "CREATE TABLE login_db (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     user_id VARCHAR(256) NOT NULL,
    //     password VARCHAR(256) NOT NULL,
    //     status INT(11) DEFAULT 1,
    //     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    // )";
    // if (mysqli_query($conn, $sql)) {
    //     echo "Table created successfully";
    // } else {
    //     echo "Error creating table: ".mysqli_error($conn);
    // }
    // $sql = "INSERT INTO login_db (user_id, password) VALUES ('admin@gmail.com', 'Sample@123')";
    // if (mysqli_query($conn, $sql)) {
    //     echo "New record created successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }

    // $sql = "SELECT count(*) as cntUser FROM login_db WHERE user_id='".$userID."' and password='".$password."'";
    // $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_array($result);

    // $count = $row['cntUser'];
    // if($count>0){
    //     $_SESSION['user_id'] = $userID;
    //     echo 1;
    // } else {
    //     echo 0;
    // }
    
?>