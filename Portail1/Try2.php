<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "portail";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT nomHotel,idHotel FROM hotels";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<select name='hotel'><option name ='idHotel' value=". $row["idHotel"].">" . $row["nomHotel"]. " </option></select><br>";
echo $row["idHotel"];
    }
} else {
    echo "0 results";
}
$conn->close();



?>