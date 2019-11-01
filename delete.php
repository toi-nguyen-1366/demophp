<?php

include 'bbeCore.php';

$id = $_GET['id'];

$model = new bbeCore();
if($id){
    $sql = $sql = "DELETE FROM MyGuests WHERE id=$id";
    $resuft = $model->deleteData($sql);
    die($resuft);

}
?>
