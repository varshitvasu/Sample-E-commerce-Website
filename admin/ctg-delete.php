<?php include('connection.php'); ?>
<?php 
$id = $_POST['id'];
$sql = "UPDATE categories SET status=2 WHERE id=".$id;
if (mysqli_query($conn,$sql)) {
    echo 2;
} else {  
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);

?>

