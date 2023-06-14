<?php
$success = $nameErr = $emailErr = $phonenumberErr ="";
$name = $email = $phonenumber = $message = "";
extract($_POST);
if (isset($_POST['submit'])){
    if(empty($name)){
        $nameErr = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
    } else {
        $nameErr = true;
    } if (empty($email)){
        $emailErr = "Email is required";
    } elseif (!preg_match("/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/", $email)){
        $emailErr = "Invalid email format";     
    } else {
        $emailErr = true;
    }
    if (empty($phonenumber)){
        $phonenumberErr = "Phone number is required";
    } elseif (!preg_match('/^[0-9]{10}+$/', $phonenumber)) {
        $phonenumberErr = "Invalid phone number";
    } else {
        $phonenumberErr = true;
    }

    if ($nameErr==1 && $emailErr==1 && $phonenumberErr==1){
        echo "Thank you for contacting us. We will get back to you as soon as possible.";
        
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $phonenumber = test_input($_POST["phonenumber"]);
        $message = test_input($_POST["message"]);
    
    } else {
        echo "Please fill all the fields";
    }
} 

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

