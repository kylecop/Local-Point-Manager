<?php

function postToSQL($messageToPost)
{

$servername = "127.0.0.1";
$username = "kyle";
$password = "**removed**";
$dbname = "beatspoints";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO logs (message) VALUES ('".date("Y-m-d H:i:s")."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

postToSQL("testing");
?>
