<?php 
$con = mysqli_connect('localhost','root','','database_tutorial');
if(isset($_GET) && !empty($_GET)){
    $name = $_GET['name'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $id = $_GET['hdn_id'];
    echo $updateQry = "UPDATE customer SET name='".$name."', email='".$email."',phone='".$phone."' WHERE id =".$id;
    mysqli_query($con,$updateQry) or die(mysqli_error($con));
    header('location:customer_data.php');
}

?>