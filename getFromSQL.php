<?php

function getLogFromSQL()
{

$servername = "127.0.0.1";
$username = "kyle";
$password = "***REMOVED***";
$dbname = "beatspoints";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT number, message FROM logs ORDER BY number DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $count = 0;
        echo "<div class=\"well\"> &nbsp;</div><div class=\"well\">";
    while($row = $result->fetch_assoc()) {
        echo $row["message"]. "<br>";
        if($count >= 40)
          break;
        $count++;
    }
	echo "</div>";
} else {
    echo "0 results";
}
$conn->close();

}

function getBankAccountFromSQL($userForBankAccount)
{
$servername = "127.0.0.1";
$username = "kyle";
$password = "***REMOVED***";
$dbname = "beatspoints";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//SELECT `amount` FROM `bankaccounts` WHERE `username`='Madilynn'
$sql = "SELECT * FROM `bankaccounts` WHERE `username`='".$userForBankAccount."'";
$result = $conn->query($sql);

$bankAccountResult = 0;
if ($result->num_rows > 0) {
    // output data of each row
    $count = 0;
    while($row = $result->fetch_assoc()) {
        $bankAccountResult = $row["amount"];
        if($count >= 10)
          break;
        $count++;
    }
}
$conn->close();
return $bankAccountResult;
}




function getSqlString($sqlQuery)
{
$servername = "127.0.0.1";
$username = "kyle";
$password = "***REMOVED***";
$dbname = "beatspoints";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//SELECT `amount` FROM `bankaccounts` WHERE `username`='Madilynn'
//$sql = "SELECT * FROM `bankaccounts` WHERE `username`='".$userForBankAccount."'";
$result = $conn->query($sqlQuery);

$bankAccountResult = 0;
if ($result->num_rows > 0) {
    // output data of each row
    $count = 0;
    while($row = $result->fetch_assoc()) {
        $bankAccountResult = $row["value"];
        if($count >= 10)
          break;
        $count++;
    }
}
$conn->close();
return $bankAccountResult;
}

?>
