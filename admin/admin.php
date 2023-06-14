<?php 
    include('dashboard-header.php'); 
    session_start();
    if(!$_SESSION['email_id']){
        header("Location: ../login-page.php");
    }

?>

<?php include('footer.php'); ?>