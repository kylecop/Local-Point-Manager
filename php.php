<?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?><?PHP
function addCoins ($user, $action, $amount)
{
	$bankAmount = 0;
	$bankAmount = getBankAccountFromSQL($user);
	$fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
$file = fopen_utf8($fileToOpen);
//echo "<table><tr>";
$username = "none yet";
$newcoins = 0;
$newfile = fgets($file);
while(! feof($file)){
	$line = fgets($file);
	if(strpos($line, 'UserName') !== FALSE){
		$username = explode("=", $line);
	}
	if(strpos($username[1], $user) !== FALSE){
		if(strpos($line, 'Bonus') !== FALSE){
			$coins = explode("=", $line);
			if($action == "add"){
				$newcoins = intval($coins[1]) + (int)$amount;
				$logMessage = "Added ".$amount." coins to ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
			}else if($action == "remove"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$logMessage = "Removed ".$amount." coins from ".$user.". old total: ".$coins[1].", new total: ".$newcoins;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to remove more coins than they have. Operation aborted.";
				}
			}else if($action == "transfer"){
				if(intval($coins[1]) >= $amount){
					$newcoins = intval($coins[1]) - (int)$amount;
					$newBankAmount = (int)$bankAmount + (int)$amount;
					postToBankAccountsSQL($user,$newBankAmount);
					$logMessage = "Transferred ".$amount." coins to ".$user."\'s Bank. old coin total: ".$coins[1].", new coin total: ".$newcoins.", old bank total: ".$bankAmount.", new bank total: ".$newBankAmount;
				}else{
					$newcoins = intval($coins[1]);
					$logMessage = "Tried to transfer more coins than they have. Operation aborted.";
				}
			}
			$newfile = $newfile . "Bonus=". strval($newcoins) . "\n";
		}else{
			$newfile = $newfile . $line;
		}
	}else{
		$newfile = $newfile . $line;
	}
  }
	//postToSQL(date("Y-m-d H:i:s").", ".$user.", ".$action.", old total: ".$coins[1]." new total: ".$newcoins." ");
	postToSQL(date("Y-m-d H:i:s")." ".$logMessage);
	header( 'Location: '.$_SERVER['PHP_SELF'] ) ;
fclose($file);
	//$fileToOpen = "_Users.dat";
	$file = fopen($fileToOpen, "wb");
  	fputs($file, $newfile);
	fclose($file);
	//displayCoins();
}
?>
