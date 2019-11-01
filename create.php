<?php

include 'bbeCore.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

$model = new bbeCore();
if($firstname && $lastname && $email){
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('$firstname', '$lastname', '$email')";
    $model->createData($sql);
}
?>
