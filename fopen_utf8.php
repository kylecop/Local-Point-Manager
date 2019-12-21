<?php


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


?>
