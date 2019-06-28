<?php

include('header.php');

if(!empty($_GET['user']) && !empty($_GET['action']) ){
   addCoins( $_GET['user'], $_GET['action'] );
}else{
   displayCoins();
}

function addCoins ($user, $action)
{


	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file))
  {

	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
		//echo "<td>".$line . "</td>";
	}

	if(strpos($username[1], $user) !== FALSE)
	{

		if(strpos($line, 'Bonus') !== FALSE)
		{
			$coins = explode("=", $line);
			if(strpos($action, '50morningChores') !== false || strpos($action, '50eveningChores') !== false)
				$newcoins = intval($coins[1]) + 50;
			if(strpos($action, '34Task') !== false)
				$newcoins = intval($coins[1]) + 34;//preg_replace_callback("|(\d+)|", "inc", $coins[1]);
			if(strpos($action, '50RefundCoins') !== false)
				$newcoins = intval($coins[1]) + 50;//preg_replace_callback("|(\d+)|", "inc", $coins[1]);
			if(strpos($action, '5testingCoins') !== false)
				$newcoins = intval($coins[1]) + 5;//preg_replace_callback("|(\d+)|", "inc", $coins[1]);
			if(strpos($action, '50testingSpendCoins') !== false)
				$newcoins = intval($coins[1]) - 50;//preg_replace_callback("|(\d+)|", "inc", $coins[1]);
			if(strpos($action, '500SpendCoins') !== false)
				if(intval($coins[1]) >= 500)
					$newcoins = intval($coins[1]) - 500;//preg_replace_callback("|(\d+)|", "inc", $coins[1]);
				else
					$newcoins = intval($coins[1]);
			if(strpos($action, '50SpendCoins') !== false)
				if(intval($coins[1]) >= 50)
					$newcoins = intval($coins[1]) - 50;//preg_replace_callback("|(\d+)|", "inc", $coins[1]);
				else
					$newcoins = intval($coins[1]);
  			//fputs($file, "Bonus=".strval($newcoins));


			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}

  }

	echo "<br />Added '$action' coins to $user, old total: $coins[1] new total: $newcoins";
	postToSQL(date("Y-m-d H:i:s")." Added ".$action." coins to ".$user.", old total: ".$coins[1]." new total: ".$newcoins." ");
	header( 'Location: index.php' ) ;
fclose($file);


	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);

	displayCoins();
}



function displayCoins(){
  $fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
  $file = fopen_utf8($fileToOpen);
  echo "";
  while(! feof($file))
  {
    $line = fgets($file);
    //echo $line . "<br />";
    if(strpos($line, 'Kyle') === false)
    {
    	if(strpos($line, 'UserName') !== FALSE){
    		$username = explode("=", $line);
    		echo "<div class=\"col-sm-4\"><h3>";
    		echo $username[1];
    		echo  "</h3>";
    	}
    	if(strpos($line, 'Bonus') !== FALSE)
    	{
        echo "<p>Coins : ";
    		$coins = explode("=", $line);
      		echo $coins[1];
     		echo "</p>";
    		echo "
            <p>
            	<div class=\"dropdown\">
        			<button class=\"btn btn-primary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">Give Coins
        			<span class=\"caret\"></span></button>
        			<ul class=\"dropdown-menu\">
          			<li><a href=\"index.php?user=".$username[1]."&action=50morningChores\">Give 50 Coins (Morning Chores)</a></li>
          			<li><a href=\"index.php?user=".$username[1]."&action=34Task\">Give 34 Coins (Tasks: like cleaning, exercise)</a></li>
          			<li><a href=\"index.php?user=".$username[1]."&action=50eveningChores\">Give 50 Coins (Evening Chores)</a></li>
          			<!--<li><a href=\"index.php?user=".$username[1]."&action=5testingCoins\">Give 5 Testing Coins</a></li>-->
          			<li><a href=\"index.php?user=".$username[1]."&action=50RefundCoins\">Give 50 Refund Coins</a></li>
        			</ul>
            	</div>
            	<div class=\"dropdown\">
        			<button class=\"btn btn-danger dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">Spend Coins
        			<span class=\"caret\"></span></button>
        			<ul class=\"dropdown-menu\">
          			<li><a href=\"index.php?user=".$username[1]."&action=50SpendCoins\">Spend 50 Coins</a></li>
          			<li><a href=\"index.php?user=".$username[1]."&action=500SpendCoins\">Spend 500 Coins</a></li>
        			</ul>
            	</div>
            </p>
          </div>
        ";
    	}
    }

  }
  fclose($file);
}


function fopen_utf8($filename){
    $encoding='';
    $handle = fopen($filename, 'r+');
    $bom = fread($handle, 2);
//  fclose($handle);
    rewind($handle);

    if($bom === chr(0xff).chr(0xfe)  || $bom === chr(0xfe).chr(0xff)){
            // UTF16 Byte Order Mark present
            $encoding = 'UTF-16';
    } else {
        $file_sample = fread($handle, 1000) . 'e'; //read first 1000 bytes
        // + e is a workaround for mb_string bug
        rewind($handle);

        $encoding = mb_detect_encoding($file_sample , 'UTF-8, UTF-7, ASCII, EUC-JP,SJIS, eucJP-win, SJIS-win, JIS, ISO-2022-JP');
    }
    if ($encoding){
        stream_filter_append($handle, 'convert.iconv.'.$encoding.'/UTF-8');
    }
    return  ($handle);
}
//echo "<br /><a href='index.php'>REFRESH</a>";
function postToSQL($message)
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

$sql = "INSERT INTO logs (message) VALUES ('$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

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
        echo "<div class=\"well\"> &nbsp;</div>";
    while($row = $result->fetch_assoc()) {
        echo "<div class=\"well\">".$row["message"]. "</div>";
        if($count >= 10)
          break;
        $count++;
    }
} else {
    echo "0 results";
}
$conn->close();

}
echo "</div>";
getLogFromSQL();


include('footer.php');


?>
