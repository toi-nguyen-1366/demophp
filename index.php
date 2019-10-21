<?php
include_once "bbeCore.php";

$model = new bbeCore();
$result = $model->getAllData('MyGuests');

$urlEdit =$model->url() . 'edit.php';

if ($result) {
    echo "<table class='table table-bordered'><tr><th>ID</th><th>Name</th>><th>Email</th><th>Action</th></tr>";
    // output data of each row
    foreach ($result as $row) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td><td>".$row["email"]."</td><td>".
            '<a href = "' . $urlEdit .'?id='.$row["id"]. '" >Edit</a>'
            ."</td>"."</tr>";    }
    echo "</table>";

} else {
    echo "0 results";
}


