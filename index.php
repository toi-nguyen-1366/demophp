<?php
$servername = "localhost";
$username = "root";
$password = "toinv123";
$dbname = "user";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn->connect_error) {
    echo "connect succefully";
}else{
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM MyGuests";
$result = $conn->query($sql);
$urlEdit = url() . 'edit.php';

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'><tr><th>ID</th><th>Name</th>><th>Email</th><th>Action</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td><td>".$row["email"]."</td><td>".
            '<a href = "' . $urlEdit .'?id='.$row["id"]. '" >Edit</a>'
            ."</td>"."</tr>";    }
    echo "</table>";
} else {
    echo "0 results";
}

function url(){
    return sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        $_SERVER['REQUEST_URI']
    );
}
