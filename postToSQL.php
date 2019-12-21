<?PHP

function postToLogSQL($message)
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

$sql = "INSERT INTO logs (message) VALUES ('$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}


function postToBankAccountsSQL($user,$amount)
{

$servername = "127.0.0.1";
$username = "kyle";
$password = "**removed**"";
$dbname = "beatspoints";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//UPDATE `bankaccounts` SET `amount` = '1' WHERE `bankaccounts`.`username` = 'Madilynn'; 
$sql = "UPDATE bankaccounts SET `amount`='".$amount."' WHERE `username`='".$user."'";
echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}


function createBankAccountSQL($user)
{

$servername = "127.0.0.1";
$username = "kyle";
$password = "**removed**"";
$dbname = "beatspoints";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO BankAccounts VALUES ('$user','0')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}


function postToSqlComputerSettings($tableName, $insertValues, $insertColumns)
{

$servername = "127.0.0.1";
$username = "kyle";
$password = "**removed**"";
$dbname = "beatspoints";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//UPDATE `bankaccounts` SET `amount` = '1' WHERE `bankaccounts`.`username` = 'Madilynn'; 
$sql = "UPDATE ".$tableName." SET `value`='".$insertValues."' WHERE `settings`.`settingName`='".$insertColumns."'";
echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>
